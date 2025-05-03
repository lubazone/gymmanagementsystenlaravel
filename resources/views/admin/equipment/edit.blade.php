@extends('layouts.adminApp')

@section('title', 'Gym Management System - Edit Equipment')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="my-4">Edit Equipment</h1>

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

                <form action="{{ route('equipment.update', $equipment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Equipment Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Equipment Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name', $equipment->name) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="vendor">Vendor</label>
                                        <input type="text" name="vendor" id="vendor" class="form-control"
                                            value="{{ old('vendor', $equipment->vendor) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" name="quantity" id="quantity" min="1"
                                            class="form-control" value="{{ old('quantity', $equipment->quantity) }}"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="number" name="amount" id="amount" class="form-control"
                                            value="{{ old('amount', $equipment->amount) }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            value="{{ old('address', $equipment->address) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Purchase Date</label>
                                        <input type="date" name="date" id="date" class="form-control"
                                            value="{{ old('date', \Carbon\Carbon::parse($equipment->date)->format('Y-m-d')) }}"
                                            required>

                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            value="{{ old('phone', $equipment->phone) }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="reminder">Reminder</label>
                                        <select id="reminder" class="form-select" name="reminder" required>
                                            <option value="">Select Months</option>
                                            <option value="2" {{ $equipment->reminder == 2 ? 'selected' : '' }}>2
                                                Months</option>
                                            <option value="6" {{ $equipment->reminder == 6 ? 'selected' : '' }}>6
                                                Months</option>
                                            <option value="12" {{ $equipment->reminder == 12 ? 'selected' : '' }}>1
                                                Year</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select id="status" class="form-select" name="status" required>
                                            <option value="">Select Usable</option>
                                            <option value="0" {{ $equipment->status == 0 ? 'selected' : '' }}>Not
                                                Usable</option>
                                            <option value="1" {{ $equipment->status == 1 ? 'selected' : '' }}>Usable
                                            </option>
                                            <option value="2" {{ $equipment->status == 2 ? 'selected' : '' }}>Backup
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('admin.manageEquipment') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Update Equipment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
