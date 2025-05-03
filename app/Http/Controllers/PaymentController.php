<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PaymentController extends Controller
{
    //
    public function index()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $payments = Payment::where('user_id', $user_id)->get();
        return view('user.payment.index', compact('user', 'payments'));
    }

    public function index1()
    {
        $payments = Payment::where('status', 'pending')->get();
        return view('admin.payments.index2', compact('payments'));
    }

    public function approve($id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            $payment->status = 'approved';
            $user = User::find($payment->user_id);
            if ($user) {
                $user->amount += $payment->amount;
                $user->save();
            }
            $payment->save();
            return redirect()->route('admin.manageReqPayments')->with('success', 'Payment approved successfully.');
        }
        return redirect()->route('admin.manageReqPayments')->with('error', 'Payment not found.');
    }

    public function deposit(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'scroll_number' => 'required|string|max:255'
        ]);


        $user_id = Auth::id();
        Payment::create([
            'user_id' => $user_id,
            'amount' => $data['amount'],
            'scroll_number' => $data['scroll_number'],
            'status' => 'pending',
        ]);

        return redirect()->route('payment.index')->with('success', 'Payment request submitted successfully.');
    }
}
