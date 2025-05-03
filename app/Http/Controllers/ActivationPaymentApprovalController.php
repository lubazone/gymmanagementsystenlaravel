<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivationPayment;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ActivationPaymentApprovalController extends Controller
{
    /**
     * Approve a pending activation payment.
     */
    public function approve($paymentId)
    {
        $payment = ActivationPayment::findOrFail($paymentId);
        $user = User::findOrFail($payment->user_id);

        // Generate a unique member id (this is just an example; you can use any algorithm)
        $memberId = 'MEM-' . strtoupper(Str::random(8));

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
        $payments = ActivationPayment::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.payments.index', compact('payments'));
    }
}
