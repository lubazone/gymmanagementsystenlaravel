@extends('layouts.adminApp')

@section('title', 'Gym Management System - Add Time')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="my-4">Create Time</h1>

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

                <!-- Success message after updating equipment -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.storeTime') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="text" name="time" id="time" class="form-control" value="{{ old('time') }}"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
