<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Department;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $departments = Department::all();

        return view('auth.register', compact('departments'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'nullable|string|max:15',
            'user_type' => 'required|string',
            'father_name' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'roll_no' => 'nullable|string|max:50',
            'session' => 'nullable|string|max:50',
            'designation' => 'nullable|string|max:255',
            'relationship' => 'nullable|string|max:255',
            'institute_name' => 'nullable|string|max:255',
            'present_address' => 'nullable|string|max:255',
            'permanent_address' => 'nullable|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_card_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle validation failure
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // dd($request->user_type);
        // Create new user instance
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->user_type = $request->user_type;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        if ($request->department == 'Select your department') {
            $user->department = "NULL";
        } else {
            $user->department = $request->department;
        }
        //$user->department = $request->department;
        $user->roll_no = $request->roll_no;
        $user->session = $request->session;
        $user->designation = $request->designation;
        $user->relationship = $request->relationship;
        $user->institute_name = $request->institute_name;
        $user->present_address = $request->present_address;
        $user->permanent_address = $request->permanent_address;

        // Handle file uploads
        // if ($request->hasFile('profile_photo')) {
        //     $user->profile_photo = $request->file('profile_photo')->store('profile_photos', 'public');
        // }
        // if ($request->hasFile('id_card_photo')) {
        //     $user->id_card_photo = $request->file('id_card_photo')->store('id_card_photos', 'public');
        // }

        // Inside your RegisterController

        if ($request->hasFile('profile_photo')) {
            $imageName = time() . '_' . $request->file('profile_photo')->getClientOriginalName();
            $user->profile_photo = $request->file('profile_photo')->storeAs('public/profile_photos', $imageName) ? 'storage/profile_photos/' . $imageName : null;
        }

        if ($request->hasFile('id_card_photo')) {
            $imageName = time() . '_' . $request->file('id_card_photo')->getClientOriginalName();
            $user->id_card_photo = $request->file('id_card_photo')->storeAs('public/id_card_photos', $imageName) ? 'storage/id_card_photos/' . $imageName : null;
        }

        // Generate a random password and hash it
        $pass = NULL;
        // $generatedPassword = Str::random(12);
        // $user->password = Hash::make($generatedPassword);
        $user->password = $pass;
        $user->status = 'pending'; // Set initial status to pending
        // dd($user);
        // Save user and fire registration event
        $user->save();
        event(new Registered($user));

        // Optional: Send the generated password to the user via email or notify them in another way
        // You might consider implementing an email sending function here

        // Redirect to login page
        return redirect()->route('login')->with('success', 'Registration successful! Please wait for admin approval.');
    }
}
