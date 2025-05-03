<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MembershipPlan;

class MembershipPlanController extends Controller
{
    /**
     * Display a listing of the membership plans.
     */
    public function index()
    {
        $membershipPlans = MembershipPlan::all();
        return view('admin.membership.index', compact('membershipPlans'));
    }

    /**
     * Show the form for creating a new membership plan.
     */
    public function create()
    {
        return view('admin.membership.create');
    }



    /**
     * Store a newly created membership plan in the database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_category' => 'required|string|max:255',
            'registration_fee' => 'required|numeric',
            'id_card' => 'required|numeric',
            'monthly_fee' => 'required|numeric',
        ]);

        $membershipPlan = MembershipPlan::create($validatedData);

        return redirect()->route('admin.manageMembership')
            ->with('success', 'Membership Plan created successfully.');
    }
    public function edit(MembershipPlan $membership)
    {
        return view('admin.membership.edit', compact('membership'));
    }

    public function update(Request $request, MembershipPlan $membership)
    {
        $data = $request->validate([
            'user_category'          => 'required|string',
            'registration_fee'       => 'required|numeric|min:0',
            'id_card'                => 'required|numeric|min:0',
            'monthly_fee'            => 'required|numeric|min:0',
            'basketball_court_fee'   => 'required|numeric|min:0',
            'badminton_court_fee'    => 'required|numeric|min:0',
            'volleyball_court_fee'   => 'required|numeric|min:0',
        ]);

        $membership->update($data);

        return redirect()
            ->route('admin.editMembership', $membership->id)
            ->with('success', 'Membership plan updated successfully.');
    }

    /**
     * Remove the specified membership plan from the database.
     */
    public function destroy($id)
    {
        $membershipPlan = MembershipPlan::findOrFail($id);
        $membershipPlan->delete();

        return response()->json(['message' => 'Membership Plan deleted successfully!']);
    }
}
