@extends('layouts.adminApp')

@section('title', 'Gym Management System - User View')

@section('content')

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e8eaf6;
            display: flex;
            justify-content: center;
            /* Display cards side by side */
            align-items: center;
            flex-wrap: wrap;
            /* Ensure cards stack on small screens */
            height: 100vh;
            margin: 0;
            padding-top: 60px;
        }

        .card {

            background-color: #fdfdfd;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 750px;
            padding: 30px;
            text-align: center;
            position: relative;
            margin: 20px;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-header {
            position: relative;
            margin-bottom: 30px;
        }

        .card-header img.profile-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #3498db;
            margin-bottom: 20px;
        }

        /* .card-header img.id-card-photo {

                                                                                    border-radius: 10px;
                                                                                    object-fit: cover;
                                                                                    border: 3px solid #3498db;
                                                                                    position: absolute;
                                                                                    top: 0;
                                                                                    right: 20px;
                                                                                    background-color: #fff;
                                                                                  } */

        .card-body-details {
            display: flex !important;
            justify-content: space-between !important;

        }

        .id-card-photo {
            width: 250px;
            border-radius: 5px;
            height: 130px;
            margin-top: 10%;
        }

        .card h2 {
            font-size: 28px;
            color: #333;
            margin: 10px 0;
            font-weight: bold;
        }

        .card h3 {
            font-size: 18px;
            color: #777;
            margin-bottom: 25px;
        }

        .card .details {
            text-align: left;
            font-size: 16px;
            color: #555;
        }

        .details p {
            margin: 12px 0;
            font-weight: 500;
        }

        .details p span {
            font-weight: bold;
            color: #3498db;
        }

        .button-edit {


            display: inline-block;
            color: #ffffff;
            font-weight: 700;
            font-size: 16px;
            line-height: 19px;
            padding: 15px 45px;
            background: linear-gradient(0deg, #ff4e59, #ff4e59), #d9d9d9;

            box-shadow: 5px 15px 45px rgba(22, 27, 45, 0.1);
            transition: all 0.3s linear 0s;
            border: none;
            border-radius: 8px;

        }

        @media (max-width: 600px) {
            body {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 100%;
                padding: 20px;
            }

            .card-header img.profile-photo {
                width: 120px;
                height: 120px;
            }

            /* .card-header img.id-card-photo {
                                                                                      width: 60px;
                                                                                      height: 60px;
                                                                                    } */

            .card h2 {
                font-size: 22px;
            }

            .card h3 {
                font-size: 16px;
            }


        }
    </style>
    <!-- Student Information Card -->

    @if ($user->user_type == 'student')
        <div class="card">
            <div class="card-header">
                <img class="profile-photo" src={{ asset($user->profile_photo) }} alt="Student Profile Photo">

            </div>
            <h2>{{ $user->name }}</h2>
            <h3>Roll No: {{ $user->roll_no }}</h3>
            <div class="card-body-details">
                <div class="details">
                    <p><span>Father's Name:</span> {{ $user->father_name }}</p>
                    <p><span>Mother's Name:</span> {{ $user->mother_name }}</p>
                    <p><span>Department:</span> {{ $user->department }}</p>
                    <p><span>Session:</span> {{ $user->session }}</p>
                    <p><span>Mobile No:</span> {{ $user->mobile }}</p>
                    <p><span>Email:</span> {{ $user->email }}</p>
                </div>
                <div class="card-id">
                    <img class="id-card-photo" src={{ asset($user->id_card_photo) }} alt="Student ID Card Photo">
                </div>
            </div>
            <div class="button-wrapper">
                <a href={{ route('admin.users.edit', $user->id) }}>
                    <button class="button-edit">Edit</button></a>
            </div>



        </div>
    @elseif($user->user_type == 'teacher')
        <!-- Teacher Information Card -->
        <div class="card">
            <div class="card-header">
                <img class="profile-photo" src={{ asset($user->profile_photo) }} alt="Teacher Profile Photo">

            </div>
            <h2>{{ $user->name }}</h2>
            <h3>Designation: {{ $user->designation }}</h3>
            <div class="card-body-details">
                <div class="details">
                    <p><span>Department:</span> {{ $user->department }}</p>
                    <p><span>Mobile No:</span> {{ $user->mobile }}</p>
                    <p><span>Email:</span> {{ $user->email }}</p>
                </div>
                <div class="card-id">
                    <img class="id-card-photo" src={{ asset($user->id_card_photo) }} alt="teacher ID Card Photo">
                </div>
            </div>
            <div class="button-wrapper">
                <a href={{ route('admin.users.edit', $user->id) }}>
                    <button class="button-edit">Edit</button></a>
            </div>
        </div>
    @elseif($user->user_type == 'staffFamily')
        <!-- Teacher/Officer/Staff (Family) Information Card -->
        <div class="card">
            <div class="card-header">
                <img class="profile-photo" src={{ asset($user->profile_photo) }} alt="Staff Profile Photo">

            </div>
            <h2>{{ $user->name }}</h2>
            <div>
                <div class="d-flex justify-content-between">
                    <div class="details">
                        <p><span>University Employee Designation:</span> {{ $user->designation }}</p>
                        <p><span>Relationship:</span> {{ $user->relationship }}</p>
                        <p><span>Mobile No:</span> {{ $user->mobile }}</p>
                        <p><span>Email:</span> {{ $user->email }}</p>
                    </div>
                    <div class="card-id">
                        <img class="id-card-photo" src={{ asset($user->id_card_photo) }} alt="Student ID Card Photo">
                    </div>
                </div>
                <div class="button-wrapper mt-5">
                    <a href={{ route('admin.users.edit', $user->id) }}>
                        <button class="button-edit">Edit</button></a>
                </div>
            </div>
        </div>
        
    @elseif($user->user_type == 'other')
        <!-- Others Information Card -->
        <div class="card">
            <div class="card-header">
                <img class="profile-photo" src={{ asset($user->profile_photo) }} alt="Staff Profile Photo">
            </div>
            <h2>{{ $user->name }}</h2>
            <h3>Designation: {{ $user->designation }}</h3>
            <div class="p-5">
                <div class="d-flex justify-content-between">
                    <div class="details">
                        <p><span>Father's Name:</span> {{ $user->father_name }}</p>
                        <p><span>Institute Name:</span> {{ $user->institute_name }}</p>
                        <p><span>Mobile No:</span> {{ $user->mobile }}</p>
                        <p><span>Email:</span> {{ $user->email }}</p>
                    </div>
                    <div class="card-id ">
                        <img class="id-card-photo" src={{ asset($user->id_card_photo) }} alt="Student ID Card Photo">
                    </div>
                </div>
                <div class="button-wrapper mt-5">
                    <a class="w-50" href={{ route('admin.users.edit', $user->id) }}>
                        <button class="button-edit">Edit</button></a>
                </div>
            </div>
        </div>
    @endif
@endsection
