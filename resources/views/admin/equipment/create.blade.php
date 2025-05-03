@extends('layouts.adminApp')

@section('title', 'Gym Management System - Add Equipment')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="my-4">Add New Equipment</h1>

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

                <!-- Success message after adding the equipment -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Equipment Creation Form -->
                <form action="{{ route('admin.createEquipment') }}" method="POST">
                    @csrf
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Equipment Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Equipment Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor">Vendor</label>
                                        <input type="text" name="vendor" id="vendor" class="form-control"
                                            value="{{ old('vendor') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount">Quantity</label>
                                        <input type="number" name="quantity" id="quantity" min="1"
                                            class="form-control" value="{{ old('amount') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="number" name="amount" id="amount" class="form-control"
                                            value="{{ old('amount') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            value="{{ old('address') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Purchase Date</label>
                                        <input type="date" name="date" id="date" class="form-control"
                                            value="{{ old('date') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState" class="form-label">Reminder</label>
                                        <select id="inputState" class="form-select" name="reminder">
                                            <option selected>Select Months</option>
                                            <option value="2">2 Months</option>
                                            <option value="6">6 Months</option>
                                            <option value="12">1 Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">

                                    <div class="form-group">
                                        <label for="inputState" class="form-label">Reminder</label>
                                        <select id="inputState" class="form-select" name="status">
                                            <option selected>Select Usable</option>
                                            <option value="0">Not Usable</option>
                                            <option value="1">Usable</option>
                                            <option value="2">Backup</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('admin.manageEquipment') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Save Equipment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
