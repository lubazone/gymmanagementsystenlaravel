<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{



    public function index()
    {
        // Fetch all withdrawals with pending status
        $withdrawals = Withdrawal::all();
        return view('admin.withdrawals.index', compact('withdrawals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $admin = User::where('user_type', 'admin')->get()->first();
        $totalAmounts = $admin->amount;
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'purpose' => 'required|string',
            'receiver' => 'required|string',
        ]);
        if ($totalAmounts < $request->amount) {
            return redirect()->back()->with('error', 'Insufficient balance.');
        }
        Withdrawal::create([
            'user_id' => Auth::id(),
            'receiver' => $request->receiver,
            'amount' => $request->amount,
            'purpose' => $request->purpose,
            'status' => 'pending',
            'action_by' => null,
        ]);

        return redirect()->back()->with('success', 'Withdrawal request submitted.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    public function accept($id)
    {
        // Find the withdrawal request
        $withdrawal = Withdrawal::findOrFail($id);

        // Check if the user is an admin (for example)
        if (Auth::user()->user_type !== 'superadmin') {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Update the status to accepted
        $withdrawal->status = 'accepted';
        $withdrawal->action_by = Auth::id();
        $withdrawal->save();
        $user = User::find($withdrawal->user_id);
        $user->amount -= $withdrawal->amount;
        $user->save();
        return redirect()->route('withdrawals.index')->with('success', 'Withdrawal accepted.');
    }

    public function reject($id)
    {
        // Find the withdrawal request
        $withdrawal = Withdrawal::findOrFail($id);

        // Check if the user is an superadmin (for example)
        if (Auth::user()->user_type !== 'superadmin') {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Update the status to rejected
        $withdrawal->status = 'rejected';
        $withdrawal->action_by = Auth::id();
        $withdrawal->save();

        return redirect()->route('withdrawals.index')->with('success', 'Withdrawal rejected.');
    }
}
