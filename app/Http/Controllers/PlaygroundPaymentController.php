<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\MembershipPlan;
use App\Models\PlaygroundPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaygroundPaymentController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'scroll_number' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $book = Booking::where('user_id', $user->id)->where('status', 'pending')->first();
        $type = MembershipPlan::where('user_category', $user->user_type)->first();
        $amount = 0;
        if($book->type == 'badminton'){
            $amount = $type->badminton_court_fee;
        }
        else if($book->type == 'volleyball'){
            $amount = $type->volleyball_court_fee;
        }
        PlaygroundPayment::create([
            'user_id'      => Auth::id(),
            'scroll_number' => $request->input('scroll_number'),
            'status'       => 'pending', // Default status as pending
            'amount'       => $amount,
            'type'         => $book->type,
        ]);
        return back()->with('success', 'Payment information submitted successfully. Please wait for admin approval.');
    }
    public function approve($paymentId)
    {
        $payment = PlaygroundPayment::findOrFail($paymentId);

        // Update payment status
        $payment->status = 'approved';
        $payment->save();

        $book = Booking::where('user_id', $payment->user_id)->where('status', 'pending')->first();
        if ($book) {
            $book->status = 'confirmed';
            $book->save();
        }
        return redirect()->back()->with('success', 'Playground booked successfully!');
    }

    /**
     * Optionally, list all pending payments for admin review.
     */
    public function index()
    {
        $payments = PlaygroundPayment::with('user')->where('status', 'pending')->orderBy('created_at', 'desc')->get();
        return view('admin.payments.index1', compact('payments'));
    }
}
