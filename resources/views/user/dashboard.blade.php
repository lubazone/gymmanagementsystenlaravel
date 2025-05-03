@extends('layouts.userApp')

@section('title', 'Gym Management System - User Dashboard')

@section('content')

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 40px;
        }

        .dashboard {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            background: white;
            padding: 20px;
            width: 300px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .card p {
            color: #666;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        #activationDetails,
        #activationDetails1 {
            margin-top: 20px;
            display: none;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        #activationDetails,
        #activationDetails1 h3 {
            margin-bottom: 10px;
        }

        #activationDetails,
        #activationDetails1 p {
            background: #e7f1ff;
            padding: 10px;
            border-left: 4px solid #007bff;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        table td:last-child {
            text-align: right;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .submit-btn {
            background-color: #28a745;
        }

        .submit-btn:hover {
            background-color: #218838;
        }
    </style>


    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


    <!-- Main Content -->

    <div class="content">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="dashboard">
            <!-- Card 1: Activation -->
            @if ($user->status != 'active')
                <div class="card">
                    @if ($check)
                        <h3>Payment Pending</h3>
                        <p>Your payment is pending. Please wait for Admin approval.</p>
                    @else
                        <h3>Not an Active Member</h3>
                        <p>Please pay the activation fee to continue using the services.</p>
                        <button class="btn" onclick="showActivationDetails()">Pay Activation Fee</button>
                    @endif
                </div>
            @else
                <div class="card">
                    <h3>Active Member</h3>
                    <p>Welcome back! You are an active member.</p>
                    <p>Your Membership ID: {{ $user->member_id }}</p>

                    <a href="{{ route('members.idcard', $user) }}" class="btn btn-primary mt-3">
                        Download ID Card
                    </a>
                </div>
            @endif
            {{-- <div class="card">
                <div class="balance-text">Your Account Balance is</div>
                <div class="balance-amount" id="accountBalance">{{ $user->amount ?? 0 }}</div>
            </div> --}}



            <!-- Card 2: Playground -->
            {{-- <div class="card">
                @if ($check2)
                    <h3>Playground Booking Update</h3>
                    <p>Your payment is pending. Please wait for Admin approval.</p>
                @else
                    <h3>Playground Access</h3>
                    <p>You need to pay for playground access to proceed.</p>
                    @if ($check1)
                        <a href="#" class="btn" onclick="showActivationDetails1()">Pay for Playground</a>
                    @else
                        <a href="{{ route('bookings.index') }}" class="btn">Playground Booking</a>
                    @endif
                @endif
            </div>
        </div> --}}

            <!-- Hidden Payment Info -->
            <div id="activationDetails">
                <h3>Member Activation Fee</h3>



                <table>
                    <tr>
                        <td>Registration Fee</td>
                        <td>৳ {{ $amount->registration_fee }}</td>
                    </tr>
                    <tr>
                        <td>ID Card Fee</td>
                        <td>৳ {{ $amount->id_card }}</td>
                    </tr>
                    <tr>
                        <td>Monthly Fee</td>
                        <td>৳ {{ $amount->monthly_fee }}</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        @php
                            $total = $amount->registration_fee + $amount->id_card + $amount->monthly_fee;
                            $total = number_format($total, 2, '.', '');
                        @endphp
                        <td><strong>৳ {{ $total }}</strong></td>
                    </tr>
                </table>


                <!-- Wrap the input and submit button in a form -->
                <form action="{{ route('activation.payment') }}" method="POST">
                    @csrf
                    {{-- <input type="text" name="scroll_number" placeholder="Enter Scroll Number"> --}}
                    <button type="submit" class="btn submit-btn">Submit</button>
                </form>
            </div>
            {{--
        <div id="activationDetails1">
            <h3>Go to Bank and Pay</h3>

            <p><strong>Bank Account Number:</strong> 1234567890123456 (XYZ Bank Ltd.)</p>

            <table>
                @php
                    $total = 0;
                @endphp
                @if ($booking != null)
                    <tr>
                        <td>{{ $booking->type }} court fee</td>
                        @if ($booking->type == 'badminton')
                            @php
                                $total += $amount->badminton_court_fee;
                            @endphp
                            <td>৳ {{ $amount->badminton_court_fee }}</td>
                        @endif
                        @if ($booking->type == 'volleyball')
                            @php
                                $total += $amount->volleyball_court_fee;
                            @endphp
                            <td>৳ {{ $amount->volleyball_court_fee }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>৳ {{ $total }}</strong></td>
                    </tr>
                @else
                    <tr>
                        <td>Badminton court fee</td>
                        <td>৳ 0.00</td>
                        <td>৳ {{ $amount->volleyball_court_fee }}</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>৳ 0.00</strong></td>
                    </tr>
                @endif
            </table>

            <!-- Wrap the input and submit button in a form -->
            <form action="{{ route('playground.payment') }}" method="POST">
                @csrf
                <input type="text" name="scroll_number" placeholder="Enter Scroll Number">
                <button type="submit" class="btn submit-btn">Submit</button>
            </form>
        </div> --}}
            <script>
                function showActivationDetails() {
                    document.getElementById('activationDetails').style.display = 'block';
                }

                function showActivationDetails1() {
                    document.getElementById('activationDetails1').style.display = 'block';
                }
            </script>

        @endsection
