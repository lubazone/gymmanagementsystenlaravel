@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <style>
        .about {
            font-size: 2rem !important;
            font-weight: 500;
            color: red;

        }

        .service {
            font-size: 2rem !important;
            font-weight: 500;
            color: red;
        }



        /* Custom styles for the home page */
        .hero-section {
            background-image: url(images/gymbanner.JPG);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 120vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-content-wrapper {
            max-width: 900px;
            margin: 0 auto;
            background-color: #00000089;
            padding: 4rem 2rem;
            border-radius: 1rem;

        }



        .padd {
            padding: 2rem 2rem;
        }

        body {
            background-color: white !important;
            scroll-behavior: smooth;
        }

        .container .work-process {
            background-color: white;
        }

        .works-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .works-header h2 {
            font-size: 4rem;
            font-weight: 600;
        }

        .works-header p {
            font-size: 1.2rem;
        }

        .works {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
            gap: 3rem;
        }

        .single-work {
            text-align: center;
            padding: 10px 20px;
        }

        .single-work img {
            width: 100px;
            height: 100px;
            margin: 0 auto;
            border-radius: 50px;
        }

        .single-work h3 {
            font-size: 2rem;
            margin: 1rem 0;
        }

        .single-work p {
            font-size: 1rem;
            max-width: 300px;
            margin: 0 auto;
        }

        .work-outs {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
            gap: 3rem;
        }

        .work-outs-show {
            padding: 10px 20px;
            text-align: center;
        }

        .work-outs-show img {
            width: 100%;
            border-radius: 1rem;
        }

        .work-outs-show h3 {
            font-size: 1.4rem;
            margin: 1rem;
            color: black;
            font-weight: 600;
        }

        /* About Section */
        .about-hero-content {
            padding: 190px 0;
            text-align: center;
        }

        .about-content {
            max-width: 900px;
            margin: 0 auto;
        }

        .about-content p {
            font-size: 18px;
            line-height: 32px;
            text-align: center;
        }

        .about-content-wrapper {
            display: flex;
            justify-content: space-between;
            gap: 4rem;
            margin-top: 60px;
        }

        .about-content-title {
            font-size: 30px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .about-text {
            font-size: 18px;
            line-height: 32px;
            text-align: justify;
        }

        .about-title {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .about-titlee {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .about-people-text {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        span {
            color: #ffa500;
        }

        .about-people-cards {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            margin-top: 60px;
        }

        .people-card {
            text-align: center;
            overflow: hidden;
        }

        .people-card img {
            width: 100%;
            height: 100%;
            transition: all .3s ease;
        }

        .people-card img:hover {
            transform: scale(.95);
        }

        .people-card h4 {
            font-size: 24px;
            margin-top: 16px;
        }

        .primary-button {
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

        .hero-sub-text {
            font-size: 20px;
            font-weight: 500;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        html,
        body {
            color: #333;
            font-size: 18px;
            line-height: 30px;
            font-family: "Urbanist", sans-serif;
            font-weight: 400;
            line-height: 24px;
        }



        /* services Section Style Start */
        .services-section {
            padding: 80px 0;
        }

        .service-image-wrapper {
            height: 560px;
            width: 100%;
        }

        .service-image-wrapper img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 6px;
        }

        .service-right-content-wrapper {
            padding-left: 30px;
        }

        .section-title-wrapper {
            position: relative;
            margin-bottom: 24px;
        }

        .service-top-sub-title p {
            font-weight: 600;
            font-size: 20px;
            line-height: 24px;
        }

        .service-title {
            font-weight: 700;
            font-size: 44px;
            line-height: 1.4;
            color: black;
            margin-bottom: 0;
        }

        .service-hero-title-line {
            position: absolute;
            bottom: -10px;
            left: 0;
        }

        .service-sub-text {
            margin-bottom: 25px;
            max-width: 501px;
        }

        .service-sub-text p {
            font-weight: 400;
            font-size: 18px;
            line-height: 30px;
        }

        .check-list-wrapper {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-bottom: 40px;
        }

        .check-list-item {
            display: flex;
            align-items: center;
            gap: 10px;

        }

        .check-list-item i {
            color: var(--primary-color);
            margin-top: 3px;
        }

        .check-list-item p {
            align-items: center;
            font-weight: 600;
            font-size: 20px;
            line-height: 24px;
            color: var(--secondary-color);
        }

        .btn-gradient {
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: white;
            transition: all 0.3s ease-in-out;
            border: none;
        }

        .btn-gradient:hover {
            background: linear-gradient(135deg, #0056b3, #009ec3);
            transform: scale(1.05);
        }

        .services-section {
            font-family: 'Segoe UI', sans-serif;
        }


        /* services Section Style End */

        /* About Section Style start */


        .about-section {
            padding: 120px 0;
        }

        .about-image-wrapper {
            margin-top: 10px height: 500px;
            width: 100%;
        }

        .about-image-wrapper img {
            height: 80%;
            width: 100%;
            object-fit: cover;
            border-radius: 6px;
        }

        /* .service-right-content-wrapper {
                                                                                                                                                                                                                                                                                                                    padding-left: 30px;
                                                                                                                                                                                                                                                                                                                } */

        .section-title-wrapper {
            position: relative;
            margin-bottom: 24px;
        }

        .about-top-sub-title p {
            font-weight: 600;
            font-size: 20px;
            line-height: 24px;
        }

        .about-title {
            font-weight: 700;
            font-size: 44px;
            line-height: 1.4;
            color: #007bff;
            margin-bottom: 0;
        }

        /* About Section Style end */
        /* shcedule Section Style start */
        .schedule-section {
            padding: 120px 0;
        }

        .schedule-title {
            font-weight: 700;
            font-size: 44px;
            line-height: 1.4;
            color: #007bff;
        }


        .operation-title {
            background-color: #161b2d;
            padding: 20px 0;
        }

        .operation-title h3 {
            text-align: center;
            font-weight: 700;
            font-size: 44px;
            line-height: 1.4;
            color: #ffffff;
            margin-bottom: 0;
        }

        .table td,
        .table th {
            text-align: center;
            vertical-align: middle;
        }

        /* shcedule Section Style end */



        /* Membership Section */
        .membership-section {
            background-color: #f8f9fa;
        }

        .membership-title {
            font-size: 2rem;
            font-weight: 700;
            color: #343a40;
        }

        .plan-card {
            border-radius: .75rem;
            overflow: hidden;
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .plan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .list-group-item {
            padding: .75rem 1.25rem;
        }

        .list-group-item strong {
            font-weight: 600;
        }

        /* member ship end */
        /* Our Equipment Start */

        .card-hover {
            transition: transform 0.3s ease;
        }

        .card-hover:hover {
            transform: scale(1.05);
        }

        .equipment {
            margin-top: 30px
        }



        /* Our Equipment End */



        /* Gallery start */
        /* Masonry Grid */
        .gallery {
            column-count: 3;
            column-gap: 20px;
            /* Professional gap between columns */
        }

        .gallery-item {
            margin-bottom: 20px;
            /* Gap between rows */
            padding: 5px;
            /* Internal padding for cleaner look */
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for depth */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            display: block;
            border-radius: 5px;
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
            /* Slightly larger shadow on hover */
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .gallery {
                column-count: 2;
            }
        }

        @media (max-width: 768px) {
            .gallery {
                column-count: 1;
            }
        }

        /* Gallery end */

        /* Work out process start*/
        .work-outs {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .work-out-card {
            background: #fff;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .work-out-card img {
            width: 100%;
            display: block;
            transition: transform 0.3s ease;
        }

        .work-out-card h3 {
            margin: 0.75rem 0;
            font-size: 1.125rem;
            color: #1a202c;
        }

        /* Hover “wiggle” animation */
        @keyframes wiggle {

            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(3deg);
            }

            75% {
                transform: rotate(-3deg);
            }
        }

        .work-out-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .work-out-card:hover img {
            animation: wiggle 0.5s ease-in-out infinite;
        }

        /* responsive for workouts start */
        @media (max-width: 768px) {
            .work-outs {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .work-outs {
                grid-template-columns: 1fr;
            }
        }

        /* responsive for workouts end */

        /* Work out process end */

        /* Marquee */
        .marquee-section {
            background-color: #222;
            color: #fff;
            overflow: hidden;
            padding: 120px 0 10px 0;
        }

        .marquee-wrapper {
            display: flex;
            align-items: center;
            white-space: nowrap;
            overflow: hidden;
            width: 100%;
        }

        .marquee-content {
            display: inline-flex;
            animation: scroll 15s linear infinite;
        }

        .marquee-content span {
            margin: 0 30px;
            font-size: 1.2rem;
            font-weight: bold;
        }

        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        < !-- CSS for Hover Interaction -->.position-relative {
            position: relative;
        }

        .book-now-btn {
            display: none;
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
        }

        .position-relative:hover .book-now-btn {
            display: block;
        }

        .image-blocks {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
        }

        .image-blocks .img-wrap {
            flex: 1;
            height: 400px;
            width: 400px;
            position: relative;
        }

        .image-blocks .img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .image-blocks .img-wrap:hover img {
            transform: scale(1.05);
        }

        /* Review start */
        .review-section {
            background-color: #f9f9f9;
            padding: 60px 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
        }

        /* Title Styles */
        .review-form h1,
        .review-form h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 40px;
        }

        .review-title {
            font-size: 2rem;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .highlight {
            color: palevioletred;
        }

        /* SCROLLING WRAPPER */
        .review-scroller {
            overflow: hidden;
            position: relative;
            width: 100%;
            margin-top: 20px;
        }

        /* Container that scrolls */
        .review-container {
            display: flex;
            flex-wrap: nowrap;
            /* important for horizontal scroll */
            animation: scroll-left 30s linear infinite;
            gap: 30px;
        }

        /* Animation keyframes */
        @keyframes scroll-left {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        /* Optional: pause on hover */
        .review-scroller:hover .review-container {
            animation-play-state: paused;
        }

        /* Individual Review Card */
        .review-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            flex-shrink: 0;
            /* ensures card doesn't shrink in scroll */
            text-align: center;
            transition: transform 0.3s;
        }

        .review-card:hover {
            transform: translateY(-10px);
        }

        /* Star Ratings */
        .review-stars {
            font-size: 1.2rem;
            color: palevioletred;
            margin-bottom: 15px;
        }

        .filled-star {
            color: #ffc107;
            margin-right: 5px;
        }

        .empty-star {
            color: #e0e0e0;
            margin-right: 5px;
        }

        /* Review Text */
        .review-text {
            font-size: 1rem;
            color: #666;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        /* Reviewer Info */
        .reviewer-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
            justify-content: center;
        }

        .reviewer-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid palevioletred;
        }

        .reviewer-name {
            font-weight: bold;
            font-size: 1.1rem;
            margin: 0;
            color: #333;
        }

        .reviewer-role {
            font-size: 0.9rem;
            color: #777;
            margin: 0;
        }

        /* Review end */
    </style>
    <!--  Banner Hero-->

    <section>
        {{-- ADD HERE --}}
        <div class="marquee-section">
            <div class="marquee-wrapper">
                <div class="marquee-content">
                    @foreach ($notices as $notice)
                        <span>{{ $notice->text }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- ADD HERE --}}
        <div class="hero-section">
            <div class="container">
                <div class=" text-center hero-content-wrapper gap-3">
                    <h1 class="display-5 fw-bold mb-3 text-white">Welcome To Gymnasium (JUST)</h1>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4 hero-sub-text text-white">We believe that we can achieve anything</p>
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <a class="primary-button" href="{{ route('register') }}">Get Start</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- About Us Section Start -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="about-left-content-wrapper ">
                        <div class="section-title-wrapper">
                            <h2 class="text-uppercase text-primary fw-bold mb-2 display-6"
                                style="letter-spacing: 1px; font-size: 2.2rem;">
                                About Us
                            </h2>
                            <div class="about-title-wrapper">
                                <p class="about-titlee">Department of Physical Education
                                </p>
                            </div>

                        </div>
                        <div class="about-sub-text">
                            <p style="text-align: justify">The Department of Physical Education of Jessore University of
                                Science and Technology was
                                established in 2011 with the aim of helping the students of the university to become
                                mentally entertained, healthy and physically strong as well as good citizens of the country
                                through sports and to enhance the quality and image of this university by participating in
                                various competitions at home and abroad. Initially, the activities of this department were
                                carried out on the ground floor of the Michael Madhusudan Dutta Central Library cum Academy
                                Building, but it has now been permanently shifted to Bir Shrestha Hamidur Rahman Gymnasium.
                                The building is the department's own building, which is the second largest gymnasium in
                                Bangladesh.

                                {{-- As part of keeping the memory of Sheikh Russell, the youngest son of the Father
                                of the Nation Bangabandhu Sheikh Mujibur Rahman, alive, the authorities of Jessore
                                University of Science and Technology named this state-of-the-art and international standard
                                gymnasium as Sheikh Russell Gymnasium at the initial stage.

                                Later on 28/02/2025 AD. According to the decision 105/08 of the 105th meeting of the Board
                                of Regents held, Sheikh Russell Gymnasium was renamed after Bir Shrestha Hamidur Rahman, the
                                sun son of Greater Jessore and Bangladesh, who received the highest title of the Liberation
                                War. He was born in the village of Khuddakhalishpur in Maheshpur Upazila of Jhenaidah
                                district.

                                This modern gymnasium is divided into two parts. In one part, there is a good arrangement
                                for playing table tennis, badminton, basketball, volleyball. Where students, teachers,
                                officers and employees get the opportunity to play. In the other part, there is a
                                well-equipped Strength and Conditioning Hall, where there is a good arrangement for all the
                                university family to exercise. Among the notable activities of this department are
                                organizing annual sports competitions including inter-departmental sports competitions of
                                the university. Also, participating in inter-university sports competitions and taking
                                necessary measures to organize them if necessary. At present, Dr. is an associate professor
                                of the Department of Chemical Engineering of this university. Md. Rafiul Hasan is serving as
                                the Director (Additional Responsibilities) of this department. Apart from this, there is one
                                Deputy Director, one Assistant Director, four Physical Instructors, one Section Officer (9th
                                Grade) and four employees working in this department. --}}
                            </p>
                        </div>


                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image-wrapper">
                        <img src="/images/gym1.jpg" alt="">
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
    <!-- Our Services Section Start -->
    <section class="services-section py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <!-- Top Section Title -->
            <div class="text-center mb-5">
                <p class="text-uppercase text-primary fw-bold mb-2 display-6"
                    style="letter-spacing: 1px; font-size: 2.2rem;">
                    Our Services
                </p>
                <h2 class="display-5 fw-semibold">Gym Facilities & Personalized Training</h2>
                <hr class="w-25 mx-auto text-primary opacity-75">
            </div>

            <div class="row align-items-center g-5">
                <!-- Image Section -->
                <div class="col-lg-6">
                    <div class="text-center">
                        <img class="img-fluid rounded-4 shadow-lg" src="/images/gym3.jpg" alt="Gym Facility">
                    </div>
                </div>

                <!-- Content Section -->
                <div class="col-lg-6">
                    <div class="service-right-content-wrapper">
                        <!-- Gym Facilities -->
                        <div class="mb-4">
                            <h3 class="h4 fw-bold text-dark mb-2">Gym Facilities</h3>
                            <p class="text-secondary">
                                • State-of-the-art, premium quality equipment<br>
                                • Olympic-grade free weights & strength stations<br>
                                • Full-range cardio & aerobics machines<br>
                                • Private lockers, hot showers & steam room
                            </p>
                        </div>

                        <!-- Diet & Training -->
                        <div class="mb-4">
                            <h3 class="h4 fw-bold text-dark mb-2">Diet & Training</h3>
                            <p class="text-secondary">
                                • Tailored diet, nutrition & supplement plans<br>
                                • One-on-one and group training sessions<br>
                                • Certified professional fitness trainers
                            </p>
                        </div>

                        <!-- Checklist -->
                        <div class="mb-4">
                            <div class="d-flex align-items-start mb-2">
                                <i class="fa-solid fa-check-circle text-success me-2 mt-1"></i>
                                <p class="mb-0 text-dark">Skilled and experienced coaches</p>
                            </div>
                            <div class="d-flex align-items-start">
                                <i class="fa-solid fa-check-circle text-success me-2 mt-1"></i>
                                <p class="mb-0 text-dark">35K+ reviews with 5-star rating</p>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <div>
                            <a href="#" class="btn btn-gradient px-4 py-2 rounded-pill shadow-sm">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <!-- Our Services Section End -->

    <!-- Schedule section start -->
    <section class="schedule-section">
        <div class="container">
            <h2 class="text-center mb-4 schedule-title">Gymnasium Schedule</h2>
            <div class="operation-title my-3">
                <h3>Operation of Hours</h3>
            </div>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Day </th>
                        @foreach ($schedules as $schedule)
                            @if ($schedule->usertype == 'man')
                                <th>{{ $schedule->day }}</th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <!-- Example time slots for the schedule -->
                    <tr>
                        <td class="time-row p-3">Time</td>
                        @foreach ($schedules as $schedule)
                            @if ($schedule->usertype == 'man')
                                <td class="p-3">{{ $schedule->time }}</td>
                            @endif
                        @endforeach
                    </tr>
                    <!-- Add more rows as per the gym schedule -->
                </tbody>
            </table>
            <div class="operation-title my-3">
                <h3>Ladies Only Hours</h3>
            </div>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Day </th>
                        @foreach ($schedules as $schedule)
                            @if ($schedule->usertype == 'woman')
                                <th>{{ $schedule->day }}</th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <!-- Example time slots for the schedule -->
                    <tr>
                        <td class="time-row p-3">Time</td>
                        @foreach ($schedules as $schedule)
                            @if ($schedule->usertype == 'woman')
                                <td class="p-3">{{ $schedule->time }}</td>
                            @endif
                        @endforeach
                    </tr>
                    <!-- Add more rows as per the gym schedule -->
                </tbody>
            </table>
        </div>
    </section>
    <!-- Schedule section end -->
    <!-- Schedule section start -->
    <section class="membership-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 membership-title">Membership Plans</h2>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($membershipPlans as $plan)
                    <div class="col">
                        <div class="card h-100 shadow-sm plan-card">
                            <div class="card-header text-center">
                                @switch($plan->user_category)
                                    @case('Student')
                                        Student
                                    @break

                                    @case('Teacher')
                                        Teacher / Officer / Alumni
                                    @break

                                    @case('Teacher Family')
                                        Teacher / Officer (Family)
                                    @break

                                    @case('Staff Family')
                                        Staff (Family)
                                    @break

                                    @case('Outsider')
                                        Outsider of University
                                    @break
                                @endswitch
                            </div>

                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Registration Fee (Yearly)</span>
                                        <strong>{{ $plan->registration_fee }}/-</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>ID Card</span>
                                        <strong>{{ $plan->id_card }}/-</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Monthly Fee</span>
                                        <strong>{{ $plan->monthly_fee }}/-</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Basketball Court Fee</span>
                                        <strong>{{ $plan->basketball_court_fee }}/-</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Volleyball Court Fee</span>
                                        <strong>{{ $plan->volleyball_court_fee }}/-</strong>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Badminton Court Fee</span>
                                        <strong>{{ $plan->badminton_court_fee }}/-</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Schedule section end -->

    <!-- Playground section Start-->
    <section class="playground-section border " id="booking">
        <div class="container my-5">
            <h2 class="text-center mb-4 about-title">Our Playground</h2>

            <div class="row image-blocks">
                <div class="img-wrap">
                    <img src="{{ asset('images/badminton.jpg') }}" alt="Playground Image Left "
                        class="img-fluid rounded shadow">
                </div>
                <div class="img-wrap">
                    <img class="w-100" src="{{ asset('images/volley.jpg') }}" alt="Playground Image Right "
                        class="img-fluid rounded shadow">
                </div>
            </div>

            <div class="text-center mt-4">
                @auth
                    <a href="{{ route('bookings.index') }}" class="btn btn-primary btn-lg">Book Now</a>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Book Now</a>
                @endguest
            </div>
        </div>
    </section>
    <!-- Playground section end-->

    <!-- Equipment section Start-->


    <section class="playground-section border equipment">
        <div class="container my-5">
            <h2 class="text-center mb-4 about-title">Our Equipment</h2>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                <!-- Equipment Item 1 -->
                <div class="col">
                    <div class="card card-hover shadow">
                        <img src="{{ asset('images/gym-15.png') }}" alt="Gym Equipment 1"
                            class="card-img-top img-fluid">
                        <div class="card-body text-center">
                            <h5 class="card-title">Gym Equipment 1</h5>
                        </div>
                    </div>
                </div>

                <!-- Equipment Item 2 -->
                <div class="col">
                    <div class="card card-hover shadow">
                        <img src="{{ asset('images/gym-16.jpg') }}" alt="Gym Equipment 2"
                            class="card-img-top img-fluid">
                        <div class="card-body text-center">
                            <h5 class="card-title">Gym Equipment 2</h5>
                        </div>
                    </div>
                </div>

                <!-- Equipment Item 3 -->
                <div class="col">
                    <div class="card card-hover shadow">
                        <img src="{{ asset('images/gym-17.jpg') }}" alt="Gym Equipment 3"
                            class="card-img-top img-fluid">
                        <div class="card-body text-center">
                            <h5 class="card-title">Gym Equipment 3</h5>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="text-center mt-4">
                @auth
                    <a href="{{ route('bookings.index') }}" class="btn btn-primary btn-lg">Book Now</a>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Book Now</a>
                @endguest
            </div> --}}
        </div>
    </section>




    <!-- Equipment section End-->



    <!-- gallery section -->
    <section class="gallery-section">
        <div class="container my-5">
            <h2 class="text-center mb-4 about-title ">Our Gallery</h2>

            <div class="gallery">
                <a href="https://images.pexels.com/photos/1954524/pexels-photo-1954524.jpeg?auto=compress&cs=tinysrgb&w=600"
                    class="gallery-item">
                    <img src="/images/gym2.jpg" alt="Gallery Image 1">
                </a>
                <a href="https://images.pexels.com/photos/1229356/pexels-photo-1229356.jpeg?auto=compress&cs=tinysrgb&w=600"
                    class="gallery-item">
                    <img src="https://images.pexels.com/photos/1229356/pexels-photo-1229356.jpeg?auto=compress&cs=tinysrgb&w=600"
                        alt="Gallery Image 2">
                </a>
                <a href="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg?auto=compress&cs=tinysrgb&w=600"
                    class="gallery-item">
                    <img src="https://images.pexels.com/photos/1552242/pexels-photo-1552242.jpeg?auto=compress&cs=tinysrgb&w=600"
                        alt="Gallery Image 3">
                </a>
                <a href="https://images.pexels.com/photos/841130/pexels-photo-841130.jpeg?auto=compress&cs=tinysrgb&w=600"
                    class="gallery-item">
                    <img src="/images/gym1.jpg" alt="Gallery Image 4">
                </a>
                <a href="https://images.pexels.com/photos/791763/pexels-photo-791763.jpeg?auto=compress&cs=tinysrgb&w=600"
                    class="gallery-item">
                    <img src="/images/gym3.jpg" alt="Gallery Image 5">
                </a>
                <a href="https://images.pexels.com/photos/1552106/pexels-photo-1552106.jpeg?auto=compress&cs=tinysrgb&w=600"
                    class="gallery-item">
                    <img src="https://images.pexels.com/photos/1552106/pexels-photo-1552106.jpeg?auto=compress&cs=tinysrgb&w=600"
                        alt="Gallery Image 6">
                </a>
            </div>
        </div>
    </section>
    <!-- gallery section end -->

    <!-- Work out process -->
    <section class="workout-process padd border">
        <div class="container">
            <div class="works-header">
                <h2 class="text-center mb-4 about-title">Our Workouts</h2>
                <p>Practice with our high-quality equipment.</p>
            </div>
            <div class="work-outs">
                <div class="work-out-card">
                    <img src="./images/1.jpg" alt="Burpees" />
                    <h3>Burpees</h3>
                </div>
                <div class="work-out-card">
                    <img src="./images/2.jpg" alt="Jumping Jack" />
                    <h3>Jumping Jack</h3>
                </div>
                <div class="work-out-card">
                    <img src="./images/3.jpg" alt="Front Squat" />
                    <h3>Front Squat</h3>
                </div>
                <div class="work-out-card">
                    <img src="./images/4.jpg" alt="Incline Bench Press" />
                    <h3>Incline Bench Press</h3>
                </div>
                <div class="work-out-card">
                    <img src="./images/5.jpg" alt="Push Up" />
                    <h3>Push Up</h3>
                </div>
                <div class="work-out-card">
                    <img src="./images/6.jpg" alt="Reverse Lunge" />
                    <h3>Reverse Lunge</h3>
                </div>
            </div>
        </div>
    </section>


    <!-- Work out process end -->






    <!-- Review section start -->
    <section class="review-section" id="review">
        <div class="review-form">
            <h2 class="text-center mb-4 about-title">
                Customer's Review
            </h2>
        </div>

        <div class="review-scroller">
            <div class="review-container">
                @forelse($reviews as $review)
                    <div class="review-card">
                        <div class="review-stars">
                            @for ($i = 0; $i < $review->rating; $i++)
                                <i class="fas fa-star filled-star"></i>
                            @endfor
                            @for ($i = $review->rating; $i < 5; $i++)
                                <i class="fas fa-star empty-star"></i>
                            @endfor
                        </div>
                        <p class="review-text">
                            {{ $review->review }}
                        </p>
                        <div class="reviewer-info">

                            <img src="{{ isset($review->user->profile_photo) ? asset($review->user->profile_photo) : asset('images/just.jpg') }}"
                                alt="Reviewer" class="reviewer-img">
                            <div>
                                <p class="reviewer-name">{{ $review->user->name }}</p>
                                <p class="reviewer-role">Happy Customer</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No reviews available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        // Show Toastify Notification on Success
        if (session('success'))
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                backgroundColor: "#4CAF50",
            }).showToast();
    </script>
@endsection
