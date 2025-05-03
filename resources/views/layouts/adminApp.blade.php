<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gym Management System')</title>


    <!-- All CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Select 2 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"
        rel="stylesheet" />
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.cs" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        /* Sidebar styling */
        .sidebar {
            width: 250px;
            /* Fixed width for the sidebar */
            position: fixed;
            height: 100%;
            background-color: #343a40;
            padding-top: 10px;
        }

        .main-content {
            margin-left: 250px;
            /* Match the sidebar width */
            padding: 20px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .sidebar {
            overflow-y: auto;
            position: fixed;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            width: 220px;
            background-color: #2c3e50;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 130px;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background-color: #1abc9c;
        }

        .main-content {
            margin-left: 220px;
            padding: 20px;
            padding-top: 160px;
        }

        .header {
            background-color: #34495e;
            padding: 20px;
            color: white;
            text-align: center;
        }

        .dashboard-section {
            margin: 20px 0;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin-top: 0;

        }


        .member-list {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;

        }

        th {
            background-color: #34495e;
            color: white;
        }

        img {
            border-radius: 50%;

        }

        /* Navbar styles */
        a {
            text-decoration: none !important;
        }

        .navbar {
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
            background-color: #fff;
            box-shadow: none;
            padding: 18px 0;
            border-bottom: 1px solid rgba(80, 80, 80, 0.1);
        }

        /* Scrolled down: hide the navbar */
        .navbar-hidden {
            transform: translateY(-100%);
        }

        /* Revealed: show the navbar with background and shadow */
        .navbar-scrolled {
            background-color: #ffffff;
            box-shadow: 0 0 10px 3px rgba(0, 0, 0, 0.05);
        }

        /* Navbar reveal animation */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10%);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }



        .nav-item .nav-link {
            font-weight: 500;
            font-size: 16px;
            color: #000 !important;
            transition: all 0.3s linear 0s;
        }

        .nav-item .nav-link:hover {
            color: #ff4e59 !important;
        }

        .button-group .primary-button {
            display: inline-block;
            color: #ffffff;
            font-weight: 700;
            font-size: 16px;
            line-height: 19px;
            padding: 15px 30px;
            background: linear-gradient(0deg, #ff4e59, #ff4e59), #d9d9d9;
            border-top-left-radius: 16px !important;
            border-top-right-radius: 6px !important;
            border-bottom-left-radius: 16px !important;
            border-bottom-right-radius: 6px !important;
            box-shadow: 5px 15px 45px rgba(22, 27, 45, 0.1);
            transition: all 0.3s linear 0s;
        }

        .nav-logo {
            width: 60px !important;
        }

        footer {
            background-color: #d9d9d9;
        }

        .footer-title {
            margin-bottom: 30px;
            font-size: 20px;
            font-weight: 500;
            color: #ff4e59 !important;
        }
    </style>

</head>

<body>
    <!-- <div class="navbar bg-black px-10">
        <div class="navbar-start">
            <div class="dropdown">
                <button tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </button>
                <ul class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="/">Home</a></li>
                    <li>
                        <a>Parent</a>
                        <ul class="p-2">
                            <li><a>Submenu 1</a></li>
                            <li><a>Submenu 2</a></li>
                        </ul>
                    </li>
                    <li><a href="/">Contact</a></li>
                </ul>
            </div>
            <a class="btn btn-ghost text-xl" href="/">
                <img class="w-10 rounded-full" src="{{ asset('images/logo6.0ba8ae29.jpg') }}" alt="Logo">
            </a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal px-1">
                <li><a href="/">Home</a></li>
                <li><a href="/">About Us</a></li>
                <li><a href="/">Contact</a></li>
            </ul>
        </div>
        <div class="navbar-end">
            @guest
                                                                                                                                                            <a class="btn" href="{{ route('login') }}">Log In</a>
                                                                                                                                                            <a class="btn" href="{{ route('register') }}">Apply for registration</a>
@else
    <span class="text-white mr-4">{{ Auth::user()->name }}</span>
                                                                                                                                                            <a class="btn" href="{{ route('logout') }}"
                                                                                                                                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                                                                                                                Log Out
                                                                                                                                                            </a>
                                                                                                                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                                                                                                                @csrf
                                                                                                                                                            </form>
            @endguest
        </div>
    </div> -->


    <!-- Navbar Start-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <!-- Navbar logo -->
            <a class="" href="/">
                <img class="img-fluid nav-logo" src="{{ asset('images/just.jpg') }}" alt="Logo">
            </a>

            <!-- Right side toggle button for mobile view -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links and login button -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav mx-auto gap-4">

                </ul>

                <!-- Right side login button -->
                <div class="d-flex align-items-center button-group">
                    @guest
                        <a class="primary-button" href="{{ route('login') }}">Login</a>
                        <a class="primary-button ms-3" href="{{ route('register') }}">Apply For Registration</a>
                    @else
                        <span class="nav-link text-dark me-3">Welcome, {{ Auth::user()->name }}</span>
                        <a class="primary-button ms-3" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End-->

    <!-- Navbar End-->
    <div class="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="" data-section="dashboard"><i
                class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ route('admin.manageUsers') }}" class="" data-section="members"><i
                class="fas fa-users"></i> Manage Members</a>
        <a href="{{ route('admin.manageEquipment') }}" class="" data-section="equipment"><i
                class="fas fa-tools"></i> Manage Equipment</a>
        {{-- <a href="#" class="" data-section="plans"><i class="fas fa-dumbbell"></i> Workout Plans</a> --}}
        <a href="{{ route('admin.manageMembership') }}" class="" data-section="trainers"><i
                class="fas fa-user-tie"></i> Membership Plan</a>
        <a href="{{ route('admin.manageSchedule') }}" class="" data-section="schedule"><i
                class="fas fa-calendar-alt"></i> Manage Schedule</a>
        <a href="{{ route('admin.activation.index') }}" class="" data-section="payments"><i
                class="fas fa-credit-card"></i>Activation Payments</a>
        <a href="{{ route('admin.manageReqPayments') }}" class="" data-section="payments"><i
                class="fas fa-hand-holding-usd"></i> Request Payments</a>
        <a href="{{ route('admin.timeManage') }}" class="" data-section="times"><i class="fas fa-clock"></i>
            Manage Times</a>
        <a href="{{ route('review.index') }}" class="" data-section="reviews"><i class="fas fa-comments"></i>
            Manage Reviews</a>
        <a href="{{ route('notices.index') }}" class="" data-section="notices"><i
                class="fas fa-bullhorn"></i> Manage Notices</a>

        <a href="javascript:void(0);" class="" data-section="withdraw" data-bs-toggle="modal"
            data-bs-target="#withdrawModal"><i class="fas fa-sack-dollar"></i>
            Withdraw</a>
        @if (Auth::user()->user_type == 'superadmin')
            <a href="{{ route('withdrawals.index') }}" class="" data-section="withdrawals"><i
                    class="fas fa-bullhorn"></i> Manage Withdrawals</a>
        @endif
    </div>
    <!-- Withdraw Modal -->
    <div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                @php

                    $admin = App\Models\User::where('user_type', 'admin')->get()->first();
                    $totalAmounts = $admin->amount;
                @endphp
                <form method="POST" action="{{ route('withdrawals.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="withdrawModalLabel">Withdraw Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="amount" class="form-label">Receiver</label>
                            <input type="text" class="form-control" id="receiver" name="receiver" required>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" step="0.01" min="0" max={{ $admin->amount }}
                                class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="mb-3">
                            <label for="purpose" class="form-label">Purpose</label>
                            <textarea class="form-control" id="purpose" name="purpose" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="main-content">
        @yield('content')
    </div>


    <!-- <footer class="py-5">
    <div id="contact" class="container">
      <div class="row">
        <div class="col-6 col-md-2 mb-3">
          <h5 class="footer-title">Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
          </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">
          <h5 class="footer-title">Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
          </ul>
        </div>

        <div class="col-6 col-md-2 mb-3">
          <h5 class="footer-title">Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
          </ul>
        </div>

        <div class="col-md-5 offset-md-1 mb-3">
          <form>
            <h5 class="footer-title">Subscribe to our newsletter</h5>
            <p>Monthly digest of what's new and exciting from us.</p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Email address</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
              <button class="btn btn-primary" type="button">Subscribe</button>
            </div>
          </form>
        </div>
      </div>

      <div class="d-flex flex-column flex-sm-row justify-content-center py-4 my-4 border-top">
        <p>&copy; 2022 Company, Inc. All rights reserved.</p>

      </div>
    </div>
  </footer> -->


    <!-- Script Cdn -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Magnific Popup JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="script.js"></script>
</body>



<script>
    $(document).ready(function() {
        // Initialize DataTable with custom options
        var table = $('#example').DataTable();

        // Status filter functionality
        $('#status-filter').on('change', function() {
            let status = $(this).val();
            table.column(7).search(status ? '^' + status + '$' : '', true, false)
                .draw(); // exact match for status
        });
    });
</script>
