@extends('layouts.adminApp')

@section('title', 'Gym Management System - Add Membership Plan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="my-4">Create Membership Plan</h1>

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

                <!-- Success message -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.createMembership') }}", method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="user_category">User Category</label>
                        <select name="user_category" id="user_category" class="form-control" required>
                            <option value="" disabled selected>Select a category</option>
                            <option value="Student" {{ old('user_category') == 'Student' ? 'selected' : '' }}>Student
                            </option>
                            <option value="Teacher" {{ old('user_category') == 'Teacher' ? 'selected' : '' }}>
                                Teacher/Officer/alumni</option>
                            <option value="Teacher Family" {{ old('user_category') == 'Teacher Family' ? 'selected' : '' }}>
                                Teacher/Officer(Family)</option>
                            <option value="Staff Family" {{ old('user_category') == 'Staff Family' ? 'selected' : '' }}>
                                Staff(Family)</option>
                            <option value="Outsider" {{ old('user_category') == 'Outsider' ? 'selected' : '' }}>Outsider of
                                University</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="registration_fee">Registration Fee</label>
                        <input type="number" step="0.01" name="registration_fee" id="registration_fee"
                            class="form-control" value="{{ old('registration_fee') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="id_card">ID Card</label>
                        <input type="number" name="id_card" id="id_card" class="form-control"
                            value="{{ old('id_card') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="monthly_fee">Monthly Fee</label>
                        <input type="number" step="0.01" name="monthly_fee" id="monthly_fee" class="form-control"
                            value="{{ old('monthly_fee') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="basketball_court_fee">Basketball Court Fee</label>
                        <input type="number" step="0.01" name="basketball_court_fee" id="basketball_court_fee"
                            class="form-control" value="{{ old('basketball_court_fee') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="badminton_court_fee">Badminton Court Fee</label>
                        <input type="number" step="0.01" name="badminton_court_fee" id="badminton_court_fee"
                            class="form-control" value="{{ old('badminton_court_fee') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="volleyball_court_fee">Volleyball Court Fee</label>
                        <input type="number" step="0.01" name="volleyball_court_fee" id="volleyball_court_fee"
                            class="form-control" value="{{ old('volleyball_court_fee') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Membership Plan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
