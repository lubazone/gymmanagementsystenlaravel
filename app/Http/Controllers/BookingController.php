<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\MembershipPlan;
use App\Models\Time;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display the booking page along with the schedule.
     */
    public function index(Request $request)
    {
        // If a date is provided via query string, use it; otherwise, default to today.
        $date = $request->input('date') ?? date('Y-m-d');

        // Retrieve all bookings for the specified date.
        $bookings = Booking::where('date', $date)->get();

        // Timeslots array for rendering.
        // $timeSlots = [
        //     '08:00' => '08:00 - 09:00',
        //     '09:00' => '09:00 - 10:00',
        //     '10:00' => '10:00 - 11:00',
        // ];

        $user = Auth::user();
        $plan = MembershipPlan::where('user_category', $user->user_type)->first();

        $timeSlots = Time::pluck('time');

        return view('user.bookings.index', compact('bookings', 'date', 'timeSlots', 'plan'));
    }

    /**
     * Store a new booking.
     */
    public function store(Request $request)
    {
        // Validate input.
        $data = $request->validate([
            'date'  => 'required|date',
            'time'  => 'required',
            'type'  => 'required|in:badminton,volleyball,basketball',
            'court' => 'required|integer'
        ]);

        // Set the user_id from the authenticated user.
        $data['user_id'] = Auth::id();

        // Define a mapping for volleyball.
        // For volleyball, the available options are:
        // - Court 1 reserved means courts 1 and 2 become unavailable.
        // - Court 3 reserved means courts 3 and 4 become unavailable.
        $volleyballMapping = [
            1 => [1, 2],
            3 => [3, 4],
        ];

        if ($data['type'] === 'volleyball') {
            // Ensure that the chosen court is allowed.
            if (!array_key_exists($data['court'], $volleyballMapping)) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Invalid court choice for volleyball booking.');
            }

            // For volleyball, get the affected badminton courts.
            $affectedCourts = $volleyballMapping[$data['court']];

            // Conflict checking:
            // Check if any booking (volleyball or badminton) exists on the affected courts.
            $conflict = Booking::where('date', $data['date'])
                ->where('time', $data['time'])
                ->whereIn('court', $affectedCourts)
                ->exists();

            if ($conflict) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Conflict: One of the required courts is already booked.');
            }
        }

        if ($data['type'] === 'badminton') {
            // For badminton bookings, simply check if the same court is already booked for badminton.
            $alreadyBooked = Booking::where('date', $data['date'])
                ->where('time', $data['time'])
                ->where('type', 'badminton')
                ->where('court', $data['court'])
                ->exists();

            if ($alreadyBooked) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', "Conflict: Court {$data['court']} is already booked for badminton at this time.");
            }
        }

        if ($data['type'] === 'basketball') {
            // For basketball bookings, check if the same court is already booked for basketball.
            $alreadyBooked = Booking::where('date', $data['date'])
                ->where('time', $data['time'])
                ->where('type', 'basketball')
                ->where('court', $data['court'])
                ->exists();

            if ($alreadyBooked) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', "Conflict: Court {$data['court']} is already booked for basketball at this time.");
            }
        }

        $user = Auth::user();
        $fee = 0;
        $playgroundFee = MembershipPlan::where('user_category', $user->user_type)->first();
        if ($playgroundFee) {
            if ($data['type'] === 'badminton') {
                $fee = $playgroundFee->badminton_court_fee;
            } elseif ($data['type'] === 'volleyball') {
                $fee = $playgroundFee->volleyball_court_fee;
            } elseif ($data['type'] === 'basketball') {
                $fee = $playgroundFee->basketball_court_fee;
            }
        }
        if ($user->amount < $fee) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Insufficient balance. Please recharge your account.');
        }

        $user = User::find($user->id);
        $user->amount -= $fee;
        $user->save();
        Booking::create($data);
        //update this bookings status
        $booking = Booking::where('date', $data['date'])
            ->where('time', $data['time'])
            ->where('court', $data['court'])
            ->first();
        $booking->status = 'confirmed';
        $booking->save();

        $name = 'admin';
        $admin = User::where('name', $name)->first();
        $admin->amount = $admin->amount + $fee;
        $admin->save();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking created successfully.');
    }
}
