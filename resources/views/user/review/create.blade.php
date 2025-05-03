@extends('layouts.userApp')

@section('title', 'Gym Management System - Add Review')

@section('content')
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #eef2f7;
            color: #444;
            margin: 0;
            padding: 0;
        }

        main {
            padding: 3rem 1rem;
            display: flex;
            justify-content: center;
        }

        .review-card {
            width: 100%;
            max-width: 960px; /* similar to container-lg */
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            padding: 2rem;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #222;
        }

        .review-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .review-form textarea,
        .review-form select {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 15px;
            transition: border 0.2s ease;
            width: 100%;
        }

        .review-form textarea:focus,
        .review-form select:focus {
            border-color: #007b5e;
            outline: none;
        }

        .review-form button {
            padding: 12px 20px;
            background-color: #007b5e;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .review-form button:hover {
            background-color: #00624b;
            transform: translateY(-1px);
        }

        .alert {
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 4px;
        }

        .alert-danger {
            background-color: #ffe6e6;
            color: #a94442;
            border: 1px solid #f5c2c2;
        }

        .alert-success {
            background-color: #e6ffed;
            color: #31708f;
            border: 1px solid #b2e2d4;
        }

        @media (max-width: 768px) {
            .review-card {
                padding: 1.5rem;
            }
        }
    </style>

    <main>
        <div class="review-card">
            <h1>Create Review</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form class="review-form" action="{{ route('review.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="review" placeholder="Your review..." required id="review" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <select name="rating" required id="rating">
                        <option value="">Rating</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="1">⭐</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </main>
@endsection
