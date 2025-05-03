@extends('layouts.adminApp')

@section('title', 'Gym Management System - Edit Time')

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
                <h1 class="my-4 text-center">Edit Time</h1>

                <!-- Display validation errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Success message after updating schedule -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.updateTime', $time->id) }}" method="POST" class="form-block">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" name="time" id="time" class="form-control"
                            value="{{ old('time', $time->time) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Time</button>
                </form>

            </div>
        </div>
    </div>
@endsection
