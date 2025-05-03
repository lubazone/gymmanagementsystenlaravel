<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\MembershipPlan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class Mailcontroller extends Controller
{
    //
    // public function index($id)
    // {
    //     $user = User::findOrFail($id);
    //     $email = $user->email;
    //     $name = $user->name;
    //     $user_type = $user->user_type;
    //     if ($user_type == 'student') {
    //         $user_type = 'Student';
    //     } else if ($user_type == 'teacher') {
    //         $user_type = 'Teacher';
    //     } else if ($user_type == 'staffFamily') {
    //         $user_type = 'Teacher Family';
    //     } else {
    //         $user_type = 'Outsider';
    //     }
    //     $amount = MembershipPlan::where('user_category', $user_type)->first();
    //     $mailData = [
    //         'title' => 'Payment',
    //         'name' => $name,
    //         'body' => 'Please pay the following amount',
    //         'regFee' => $amount->registration_fee,
    //         'idCardFee' => $amount->id_card,
    //         'monthlyFee' => $amount->monthly_fee,
    //         'total' => $amount->registration_fee + $amount->id_card + $amount->monthly_fee
    //     ];

    //     Mail::to($email)->send(new SendMail($mailData));

    //     return redirect()->back()->with('message', 'Mail Send Successfully');
    //     //dd("Mail Send Successfully");
    // }

    public function index($id)
    {
        $user = User::findOrFail($id);
        $email = $user->email;
        $name = $user->name;
        $generatedPassword = Str::random(8);
        //dd($generatedPassword);
        $user->password = Hash::make($generatedPassword);
        $user->save();
        $mailData = [
            'title' => 'Password',
            'name' => $name,
            'password' => $generatedPassword,
            'email' => $email,
            'body' => 'Please pay the following amount',
        ];

        Mail::to($email)->send(new SendMail($mailData));

        return redirect()->back()->with('message', 'Mail Send Successfully');
        //dd("Mail Send Successfully");
    }
}
