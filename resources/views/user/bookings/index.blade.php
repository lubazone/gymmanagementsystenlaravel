@extends('layouts.userApp')

@section('title', 'Court Booking System')

@section('content')
    <style>
        /* Inline CSS styling */
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        header {
            background: #343a40;
            color: white;
            padding: 1rem 2rem;
            text-align: center;
        }

        main {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .booking-form,
        .schedule,
        .date-picker {
            background: white;
            padding: 2rem;
            margin: 1rem 0;
            border-radius: 12px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 0.5rem 0 0.2rem;
        }

        input,
        select,
        button {
            padding: 0.5rem;
            font-size: 1rem;
            margin-bottom: 1rem;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        button {
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background: #45a049;
        }

        .schedule-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .slot {
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .court {
            display: inline-block;
            padding: 6px 12px;
            margin: 4px;
            border-radius: 4px;
            font-weight: bold;
            color: #fff;
        }

        /* Available slot styling */
        .available {
            background-color: #28a745;
            /* green or your preferred color for available courts */
        }

        /* Pending booking - yellow */
        .pending {
            background-color: #ffc107;
            /* yellow */
        }

        /* Confirmed booking - red */
        .confirmed {
            background-color: #dc3545;
            /* red */
        }

        .message {
            text-align: center;
            padding: .5rem;
            font-size: 1.1rem;
        }

        .error {
            color: #e74c3c;
        }

        .status {
            color: #2ecc71;
        }
    </style>

    <header>
        <h1>🏸 Court Booking System</h1>
    </header>

    <main>
        <!-- Display flash messages -->
        @if (session('status'))
            <div class="message status">{{ session('status') }}</div>
        @endif
        @if (session('error'))
            <div class="message error">{{ session('error') }}</div>
        @endif

        <!-- Date Picker Section to view a schedule for any date -->
        <section class="date-picker">
            <h2>View Schedule</h2>
            <form action="{{ route('bookings.index') }}" method="GET">
                <label for="schedule_date">Select Date:</label>
                <input type="date" id="schedule_date" name="date" value="{{ $date }}" required />
                <button type="submit">Show Schedule</button>
            </form>
        </section>

        <!-- Schedule Section -->
        <section class="schedule" >
            <h2>Schedule for {{ $date }}</h2>
            <div class="schedule-grid">
                @foreach ($timeSlots as $time)
                    <div class="slot">
                        <div style="margin-bottom: 6px; font-size: 1.1rem;">
                            <strong>{{ $time }}</strong>
                        </div>
                        @for ($court = 1; $court <= 5; $court++)
                            @php
                                // By default, mark the court as available.
                                $booked = false;
                                $bookingInfo = null;
                                $statusClass = 'available';

                                // Loop through the bookings for the selected date to check for conflicts.
                                foreach ($bookings as $b) {
                                    if ($b->time === $time) {
                                        // Only consider bookings for this time slot
                                        if (
                                            ($b->type === 'badminton' || $b->type === 'basketball') &&
                                            (int) $b->court === $court
                                        ) {
                                            // A badminton booking exactly for this court.
                                            $booked = true;
                                            $bookingInfo = $b;
                                            break;
                                        }
                                        if ($b->type === 'volleyball') {
                                            // For volleyball, check the mapping:
                                            // - Volleyball booking with court 1 blocks courts 1 and 2.
                                            // - Volleyball booking with court 3 blocks courts 3 and 4.
                                            if ($b->court == 1 && in_array($court, [1, 2])) {
                                                $booked = true;
                                                $bookingInfo = $b;
                                                break;
                                            }
                                            if ($b->court == 3 && in_array($court, [3, 4])) {
                                                $booked = true;
                                                $bookingInfo = $b;
                                                break;
                                            }
                                        }
                                    }
                                }

                                if ($booked && $bookingInfo) {
                                    // Determine the CSS class based on the booking status.
                                    if ($bookingInfo->status === 'pending') {
                                        $statusClass = 'pending';
                                    } elseif ($bookingInfo->status === 'confirmed') {
                                        $statusClass = 'confirmed';
                                    }
                                }
                            @endphp

                            <span class="court {{ $booked ? $statusClass : 'available' }}"
                                title="{{ $booked ? 'Booked for ' . ucfirst($bookingInfo->type) . ' (Court ' . $bookingInfo->court . ')' : '' }}">
                                Court {{ $court }}
                            </span>
                        @endfor
                    </div>
                @endforeach
            </div>
        </section>


        <!-- Booking Form Section -->
        <section class="booking-form">
            <h2>Book a Slot</h2>
            <!-- Booking Form Section -->
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="{{ old('date', $date) }}" required />

                <label for="time">Time Slot:</label>
                <select id="time" name="time" required>
                    <option value="">--Select--</option>
                    @foreach ($timeSlots as $time)
                        <option value="{{ $time }}" {{ old('time') == $time ? 'selected' : '' }}>
                            {{ $time }}
                        </option>
                    @endforeach
                </select>

                <label for="type">Playground Type:</label>
                <select id="type" name="type" required>
                    <option value="">--Select--</option>
                    <option value="basketball" {{ old('type') == 'basketball' ? 'selected' : '' }}>Basketball</option>
                    <option value="badminton" {{ old('type') == 'badminton' ? 'selected' : '' }}>Badminton</option>
                    <option value="volleyball" {{ old('type') == 'volleyball' ? 'selected' : '' }}>Volleyball</option>
                </select>

                @php
                    $am = 0;
                    if (old('type') == 'basketball') {
                        $am = $plan->basketball_court_fee;
                    } elseif (old('type') == 'badminton') {
                        $am = $plan->badminton_court_fee;
                    } elseif (old('type') == 'volleyball') {
                        $am = $plan->volleyball_court_fee;
                    }
                    $amount = old('amount', $am);
                @endphp
                <label for="amount">Amount:</label>
                <input type="text" id="amount" name="amount" value="{{ $amount }}" readonly />

                <label for="court">Court No:</label>
                @php
                    $date = old('date', $date);
                @endphp
                <select id="court" name="court" required>
                    <option value="">--Select--</option>
                    <!-- We'll fill this based on the booking type selection using JavaScript. -->
                    @if (old('type') == 'volleyball')
                        @php
                            // Check Court 1 for volleyball
                            $available = app\Models\Booking::where('date', $date)
                                ->where('type', 'volleyball')
                                ->where('time', old('time'))
                                ->where('court', 1)
                                ->first();
                            $ch = true;
                            if ($available && $available->status == 'confirmed') {
                                $ch = false;
                            }
                        @endphp
                        @if ($ch)
                            <option value="1" {{ old('court') == '1' ? 'selected' : '' }}>Court 1</option>
                        @endif
                        @php
                            // Check Court 3 for volleyball
                            $available = app\Models\Booking::where('date', $date)
                                ->where('type', 'volleyball')
                                ->where('time', old('time'))
                                ->where('court', 3)
                                ->first();
                            $ch = true;
                            if ($available && $available->status == 'confirmed') {
                                $ch = false;
                            }
                        @endphp
                        @if ($ch)
                            <option value="3" {{ old('court') == '3' ? 'selected' : '' }}>Court 3</option>
                        @endif
                    @elseif(old('type') == 'badminton')
                        @php
                            // Check Court 1 for badminton
                            $available = app\Models\Booking::where('date', $date)
                                ->where('type', 'badminton')
                                ->where('time', old('time'))
                                ->where('court', 1)
                                ->first();
                            $ch = true;
                            if ($available && $available->status == 'confirmed') {
                                $ch = false;
                            }
                        @endphp
                        @if ($ch)
                            <option value="1" {{ old('court') == '1' ? 'selected' : '' }}>Court 1</option>
                        @endif
                        @php
                            // Check Court 2 for badminton
                            $available = app\Models\Booking::where('date', $date)
                                ->where('type', 'badminton')
                                ->where('time', old('time'))
                                ->where('court', 2)
                                ->first();
                            $ch = true;
                            if ($available && $available->status == 'confirmed') {
                                $ch = false;
                            }
                        @endphp
                        @if ($ch)
                            <option value="2" {{ old('court') == '2' ? 'selected' : '' }}>Court 2</option>
                        @endif
                        @php
                            // Check Court 3 for badminton
                            $available = app\Models\Booking::where('date', $date)
                                ->where('type', 'badminton')
                                ->where('time', old('time'))
                                ->where('court', 3)
                                ->first();
                            $ch = true;
                            if ($available && $available->status == 'confirmed') {
                                $ch = false;
                            }
                        @endphp
                        @if ($ch)
                            <option value="3" {{ old('court') == '3' ? 'selected' : '' }}>Court 3</option>
                        @endif
                        @php
                            // Check Court 4 for badminton
                            $available = app\Models\Booking::where('date', $date)
                                ->where('type', 'badminton')
                                ->where('time', old('time'))
                                ->where('court', 4)
                                ->first();
                            $ch = true;
                            if ($available && $available->status == 'confirmed') {
                                $ch = false;
                            }
                        @endphp
                        @if ($ch)
                            <option value="4" {{ old('court') == '4' ? 'selected' : '' }}>Court 4</option>
                        @endif
                    @elseif(old('type') == 'basketball')
                        @php
                            // Check Court 5 for basketball
                            $available = app\Models\Booking::where('date', $date)
                                ->where('type', 'basketball')
                                ->where('time', old('time'))
                                ->where('court', 1)
                                ->first();
                            $ch = true;
                            if ($available && $available->status == 'confirmed') {
                                $ch = false;
                            }
                        @endphp
                        @if ($ch)
                            <option value="5" {{ old('court') == '5' ? 'selected' : '' }}>Court 5</option>
                        @endif
                    @else
                        <!-- Default view: show all four court options -->
                        <option value="1" {{ old('court') == '1' ? 'selected' : '' }}>Court 1</option>
                        <option value="2" {{ old('court') == '2' ? 'selected' : '' }}>Court 2</option>
                        <option value="3" {{ old('court') == '3' ? 'selected' : '' }}>Court 3</option>
                        <option value="4" {{ old('court') == '4' ? 'selected' : '' }}>Court 4</option>
                    @endif
                </select>

                <button type="submit">Book Now</button>
            </form>
        </section>

        <!-- JavaScript to update court dropdown and amount based on booking type selection -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const typeSelect = document.getElementById('type');
                const courtSelect = document.getElementById('court');
                const amountInput = document.getElementById('amount');

                // Mapping fee values from the server-side plan object.
                const feeMapping = {
                    basketball: {{ $plan->basketball_court_fee }},
                    badminton: {{ $plan->badminton_court_fee }},
                    volleyball: {{ $plan->volleyball_court_fee }}
                };

                function updateCourtOptions(selectedType) {
                    let options = '<option value="">--Select--</option>';
                    if (selectedType === 'volleyball') {
                        // For volleyball, only Court 1 and Court 3 are allowed.
                        options += '<option value="1">Court 1</option>';
                        options += '<option value="3">Court 3</option>';
                    } else if (selectedType === 'badminton') {
                        // For badminton, all four courts are allowed.
                        options += '<option value="1">Court 1</option>';
                        options += '<option value="2">Court 2</option>';
                        options += '<option value="3">Court 3</option>';
                        options += '<option value="4">Court 4</option>';
                    } else if (selectedType === 'basketball') {
                        // For basketball, only Court 5 is allowed.
                        options += '<option value="5">Court 5</option>';
                    } else {
                        // Default behavior: show all four courts if no type is selected.
                        options += '<option value="1">Court 1</option>';
                        options += '<option value="2">Court 2</option>';
                        options += '<option value="3">Court 3</option>';
                        options += '<option value="4">Court 4</option>';
                    }
                    courtSelect.innerHTML = options;
                }

                function updateAmount(selectedType) {
                    if (feeMapping.hasOwnProperty(selectedType)) {
                        amountInput.value = feeMapping[selectedType];
                    } else {
                        amountInput.value = 0;
                    }
                }

                // Listen for changes on the booking type select.
                typeSelect.addEventListener('change', function() {
                    updateCourtOptions(this.value);
                    updateAmount(this.value);
                });

                // On page load, update the court options and amount based on the current selection.
                updateCourtOptions(typeSelect.value);
                updateAmount(typeSelect.value);
            });
        </script>

    </main>
@endsection
