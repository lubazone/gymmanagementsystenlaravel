@extends('layouts.adminApp')

@section('title', 'Gym Management System - Edit Membership Plan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="my-4">Edit Membership Plan</h1>

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

                <form action="{{ route('admin.updateMembership', $membership->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="user_category">User Category</label>
                        <select name="user_category" id="user_category" class="form-control" required>
                            <option value="" disabled>Select a category</option>
                            @foreach (['Student', 'Teacher', 'Teacher Family', 'Staff Family', 'Outsider'] as $cat)
                                <option value="{{ $cat }}"
                                    {{ old('user_category', $membership->user_category) == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="registration_fee">Registration Fee</label>
                        <input type="number" step="0.01" name="registration_fee" id="registration_fee"
                            class="form-control" value="{{ old('registration_fee', $membership->registration_fee) }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="id_card">ID Card</label>
                        <input type="number" name="id_card" id="id_card" class="form-control"
                            value="{{ old('id_card', $membership->id_card) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="monthly_fee">Monthly Fee</label>
                        <input type="number" step="0.01" name="monthly_fee" id="monthly_fee" class="form-control"
                            value="{{ old('monthly_fee', $membership->monthly_fee) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="basketball_court_fee">Basketball Court Fee</label>
                        <input type="number" step="0.01" name="basketball_court_fee" id="basketball_court_fee"
                            class="form-control"
                            value="{{ old('basketball_court_fee', $membership->basketball_court_fee) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="badminton_court_fee">Badminton Court Fee</label>
                        <input type="number" step="0.01" name="badminton_court_fee" id="badminton_court_fee"
                            class="form-control" value="{{ old('badminton_court_fee', $membership->badminton_court_fee) }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="volleyball_court_fee">Volleyball Court Fee</label>
                        <input type="number" step="0.01" name="volleyball_court_fee" id="volleyball_court_fee"
                            class="form-control"
                            value="{{ old('volleyball_court_fee', $membership->volleyball_court_fee) }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Update Membership Plan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
