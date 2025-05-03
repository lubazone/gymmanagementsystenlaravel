@extends('layouts.adminApp')

@section('title', 'Gym Management System - Edit Schedule')

@section('content')
    <div class="container-fluid">
        <style>
            .form-block {
                background-color: white;
                max-width: 600px;
                padding: 40px;
                margin: 0 auto;
                box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }
        </style>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="my-4 text-center">Edit Schedule</h1>

                <!-- Display validation errors -->
                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Success Message --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                <form action="{{ route('schedules.update', $schedule->id) }}" method="POST" class="form-block">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="day">Day</label>
                        <input type="text" name="day" id="day" class="form-control"
                            value="{{ old('day', $schedule->day) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" name="time" id="time" class="form-control"
                            value="{{ old('time', $schedule->time) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="usertype">User Type</label>
                        <select name="usertype" id="usertype" class="form-control" required>
                            <option value="man" {{ old('usertype', $schedule->usertype) == 'man' ? 'selected' : '' }}>Man
                            </option>
                            <option value="woman" {{ old('usertype', $schedule->usertype) == 'woman' ? 'selected' : '' }}>
                                Woman</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Schedule</button>
                </form>
            </div>
        </div>
    </div>
@endsection
