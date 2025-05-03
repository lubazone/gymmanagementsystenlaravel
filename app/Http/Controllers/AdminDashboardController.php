<?php

namespace App\Http\Controllers;

use App\Models\ActivationPayment;
use App\Models\Department;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    // public function __construct()
    // {
    //     // Check if the user is authenticated and is an admin
    //     $this->middleware(function ($request, $next) {
    //         if (Auth::user()->user_type !== 'admin' || Auth::user()->user_type !== 'superadmin') {
    //             return redirect('/login');  // Or show an unauthorized page
    //         }
    //         return $next($request);
    //     });
    // }
    /**
     * Display a listing of the resource.
     */
    public function view()
    {
        //

        $totalUsers = User::where('status', 'active')->count();
        $admin = User::where('user_type', 'admin')->get()->first();
        $totalAmounts = $admin->amount;
        $totalEquipments = Equipment::count();
        //dd($user);
        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalEquipments' => $totalEquipments,
            'totalAmounts' => $totalAmounts,
        ]);
    }
    public function view1()
    {
        //
        $departments = Department::all();
        return view('admin.createUsers', ['departments' => $departments]);
    }

    public function view2($id)
    {
        $user = User::find($id);
        return view('admin.viewUser', ['user' => $user]);
    }

    public function view3()
    {
        $user = User::where('user_type', '<>', 'admin')->get();
        return view('admin.userManage', ['users' => $user]);
    }

    public function approve($id)
    {
        $user = User::find($id);
        if ($user->status == 'pending') {
            $user->status = 'approved';
            $user->save();
        } else if ($user->status == 'approved') {
            $user->status = 'active';
            $user->save();
        } else if ($user->status == 'active') {
            $user->status = 'inactive';
            $user->member_id = NULL;
            $user->save();
        } else if ($user->status == 'inactive') {
            $user->status = 'active';
            $user->save();
        }
        if ($user->status == 'approved') {
            return Redirect::route('send.mail', ['id' => $user->id]);
        } else {
            return Redirect::route('admin.manageUsers');
        }
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return Redirect::route('admin.manageUsers');
    }
    public function edit($id)
    {
        //
        $user = User::find($id);
        $departments = Department::all();
        return view('admin.user.edit', ['user' => $user, 'departments' => $departments]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'mobile' => 'nullable|string|max:20',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'roll_no' => 'nullable|string|max:255',
            'session' => 'nullable|string|max:255',
            'institute_name' => 'nullable|string|max:255',
            'present_address' => 'nullable|string|max:255',
            'permanent_address' => 'nullable|string|max:255',
            'relationship' => 'nullable|string|max:255',
            'user_type' => 'nullable|string|max:255',
            'employee_designation' => 'nullable|string|max:255',
            'amount' => 'nullable|numeric',
            'status' => 'nullable|string|max:255',
            'member_id' => 'nullable|string|max:255',
            'payment_status' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'id_card_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        // dd($request->all());

        $user = User::findOrFail($id);

        // Assign values
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->department = $request->department;
        $user->designation = $request->designation;
        $user->roll_no = $request->roll_no;
        $user->session = $request->session;
        $user->session = $request->session;
        if ($request->designation == NULL) {
            $user->designation = $request->employee_designation;
        }
        $user->institute_name = $request->institute_name;
        $user->present_address = $request->present_address;
        $user->permanent_address = $request->permanent_address;
        $user->relationship = $request->relationship;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->session = $request->session;

        // Handle profile photo upload
        if ($request->hasFile('profile_photo')) {
            $profilePath = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo = 'storage/' . $profilePath;
        }

        // Handle ID card photo upload
        if ($request->hasFile('id_card_photo')) {
            $idCardPath = $request->file('id_card_photo')->store('id_card_photos', 'public');
            $user->id_card_photo = 'storage/' . $idCardPath;
        }

        $user->save();

        return redirect()->route('admin.manageUsers')->with('success', 'User updated successfully');
    }
}
