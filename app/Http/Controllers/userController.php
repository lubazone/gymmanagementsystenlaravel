<?php

namespace App\Http\Controllers;

use App\Models\ActivationPayment;
use App\Models\Booking;
use App\Models\MembershipPlan;
use App\Models\PlaygroundPayment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $payment = ActivationPayment::where('user_id', $user->id)->where('status', 'pending')->first();
        $check = false;
        $check1 = false;
        if ($payment) {
            $check = true;
        }
        $booking = Booking::where('user_id', $user->id)->where('status', 'pending')->first();
        if ($booking) {
            $check1 = true;
        }
        if (!$booking) {
            $booking = Booking::where('user_id', $user->id)->where('status', 'confirmed')->first();
        }
        $check2 = false;
        $play = PlaygroundPayment::where('user_id', $user->id)->where('status', 'pending')->first();
        if ($play) {
            $check2 = true;
        }
        //dd($booking, $check1);
        $user_type = $user->user_type;
        if ($user_type == 'student') {
            $user_type = 'Student';
        } else if ($user_type == 'teacher') {
            $user_type = 'Teacher';
        } else if ($user_type == 'staffFamily') {
            $user_type = 'Teacher Family';
        } else {
            $user_type = 'Outsider';
        }
        $amount = MembershipPlan::where('user_category', $user_type)->first();
        return view(
            'user.dashboard',
            [
                'user' => $user,
                'amount' => $amount,
                'check' => $check,
                'check1' => $check1,
                'payment' => $payment,
                'booking' => $booking,
                'check2' => $check2,
            ]
        );
    }

    public function downloadIdCard(User $user)
    {
        // return view('idcard', ['user' => $user]);
        $pdf = Pdf::loadView('idcard', ['user' => $user])
            ->setPaper([0, 0, 290, 200], 'portrait'); // width=380px, height=250px

        return $pdf->download("ID_Card_{$user->member_id}.pdf");
    }
}
