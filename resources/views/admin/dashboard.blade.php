@extends('layouts.adminApp')

@section('title', 'Gym Management System - Admin Dashboard')

@section('content')

    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <style>
        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        /* Individual Stat Card */
        .stat-card {
            position: relative;
            padding: 1.5rem;
            border-radius: 1rem;
            color: #fff;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform .2s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        /* Gradient Variants */
        .stat-card.users {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .stat-card.amount {
            background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
        }

        .stat-card.equipment {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        /* Stat Content */
        .stat-label {
            font-size: .9rem;
            text-transform: uppercase;
            opacity: .85;
            margin-bottom: .25rem;
            letter-spacing: .05em;
        }

        .stat-value {
            font-size: 2.25rem;
            font-weight: 700;
            line-height: 1;
        }

        .stat-icon {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 2.5rem;
            opacity: .15;
        }
    </style>

    <div class="content">
        <div class="header">
            <h1>Gym Management System - Admin Dashboard</h1>
        </div>

        <!-- Stats Overview -->
        <div class="dashboard-section card" id="dashboard-section">
            <h3>Stats Overview</h3>
            <div class="stats-grid">
                <!-- Total Users -->
                <div class="stat-card users">
                    <div class="stat-icon">
                        <!-- you can swap in a user SVG or font‑icon here -->
                        👤
                    </div>
                    <div class="stat-label">Total Active Users</div>
                    <div class="stat-value">{{ $totalUsers }}</div>
                </div>
                <!-- Total Amount -->
                <div class="stat-card amount">
                    <div class="stat-icon">
                        💰
                    </div>
                    <div class="stat-label">Total Amount</div>
                    <div class="stat-value">{{ number_format($totalAmounts, 2) }}</div>
                </div>
                <!-- Total Equipment -->
                <div class="stat-card equipment">
                    <div class="stat-icon">
                        🏋️‍♀️
                    </div>
                    <div class="stat-label">Total Equipment</div>
                    <div class="stat-value">{{ $totalEquipments }}</div>
                </div>
            </div>
        </div>

    </div>
@endsection
