<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivationPayment;
use App\Models\User;
use App\Models\MembershipPlan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ActivationPaymentController extends Controller
{
    /**
     * Store the payment details submitted by the user.
     */

    public function store()
    {
        $user = Auth::user();
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
        $total = $amount->registration_fee + $amount->id_card + $amount->monthly_fee;
        $total = number_format($total, 2, '.', '');

        if ($total > $user->amount) {
            return back()->with('error', 'Insufficient amount. Please recharge your account.');
        }

        $memberId = 'MEM-' . mt_rand(10000000, 99999999);
        $user->member_id = $memberId;
        $user->status = 'active';
        $user->amount = $user->amount - $total;
        $user->save();

        $name = 'admin';
        $admin = User::where('name', $name)->first();
        $admin->amount = $admin->amount + $total;
        $admin->save();

        return redirect()->back()->with('success', 'Member activated successfully.');
    }
    public function approve($paymentId)
    {
        $payment = ActivationPayment::findOrFail($paymentId);
        $user = User::findOrFail($payment->user_id);

        // Generate a unique member id (this is just an example; you can use any algorithm)
        $memberId = 'MEM-' . mt_rand(10000000, 99999999);
        // Update the user record
        $user->member_id = $memberId;
        // Optionally, update the user's status to active
        $user->status = 'active';
        $user->save();

        // Update payment status
        $payment->status = 'approved';
        $payment->save();

        return redirect()->back()->with('success', 'Member activated successfully.');
    }

    /**
     * Optionally, list all pending payments for admin review.
     */
    public function index()
    {
        $payments = ActivationPayment::with('user')->where('status', 'pending')->orderBy('created_at', 'desc')->get();
        return view('admin.payments.index', compact('payments'));
    }
}
