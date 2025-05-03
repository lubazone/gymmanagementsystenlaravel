<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your Website Title')</title>


    <!-- All CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Select 2 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
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
        /* Navbar styles */
        a {
            text-decoration: none !important;
        }

        .navbar {
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
            background-color: #fff;
            box-shadow: none;
            padding: 24px 0;
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
            font-weight: 600;
            font-size: 18px;
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
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#booking">Booking</a>
                    </li>
                </ul>

                <!-- Right side login button -->
                <div class="d-flex button-group">
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

    <div class="content">
        @yield('content')
    </div>


    <footer class="py-5">
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
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Booking</a></li>
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
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Booking</a></li>

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
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Booking</a></li>
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
                <p>&copy; 2025 Gymnasium Management System. All rights reserved.</p>

            </div>
        </div>
    </footer>


    <!-- Script Cdn -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Magnific Popup JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="script.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>



    <script>
        // Select2 jquery code
        $(document).ready(function() {
            $(".select2").select2();
        });

        const navbar = document.querySelector('.navbar');
        let lastScrollY = window.scrollY;

        window.addEventListener('scroll', () => {
            if (window.scrollY > lastScrollY && window.scrollY >= 56) {
                // User is scrolling down, hide the navbar 
                navbar.classList.add('navbar-hidden');
            } else {
                // User is scrolling up, show the navbar 
                navbar.classList.remove('navbar-hidden');
                if (window.scrollY >= 56) {
                    navbar.classList.add('navbar-scrolled');
                } else {
                    navbar.classList.remove('navbar-scrolled');
                }
            }

            // Update the last scroll position 
            lastScrollY = window.scrollY;
        });
    </script>



</body>

</html>
