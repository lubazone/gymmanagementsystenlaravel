@extends('layouts.adminApp')

@section('title', 'Gym Management System - UserManage')

@section('content')
    <style>
        .action-btn-wrapper {

            display: flex;
            gap: 10px;
            justify-content: center;

        }

        .btn-inner {
            display: flex;
            gap: 4px;
            align-items: center;
            /* flex-wrap: nowrap; */
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 dashboard-section" id="members-section">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Equipment Table</h6>
                        <div class="d-flex">
                            <a href="{{ route('admin.createEquip') }}" class="btn btn-success btn-sm ms-5">Add New</a>
                        </div>
                    </div>


                    <!-- Table -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover text-center" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Vendor</th>
                                        <th>Quantity</th>
                                        <th>Phone</th>
                                        <th>Usable</th>
                                        <th>Address</th>
                                        <th width="15%">Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($equipments as $equipment)
                                        <tr class="table-row">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $equipment->name }}</td>
                                            <td>{{ $equipment->vendor }}</td>
                                            <td>{{ $equipment->quantity }}pcs.</td>
                                            <td>{{ $equipment->phone }}</td>
                                            <td>
                                                @php
                                                    $dateAdded = Carbon\Carbon::parse($equipment->date); // original date
                                                    $reminderMonths = $equipment->reminder; // number of months
                                                    $reminderDate = $dateAdded->copy()->addMonths($reminderMonths);
                                                    $equipmentt = App\Models\Equipment::find($equipment->id);
                                                    $date = Carbon\Carbon::today();
                                                    if (
                                                        $date->isSameDay($reminderDate) ||
                                                        $date->isAfter($reminderDate)
                                                    ) {
                                                        $equipmentt->status = 0;
                                                        $equipmentt->save();
                                                    }
                                                @endphp
                                                @if ($equipment->status == 1)
                                                    {{-- <span class="badge badge-success">Usable</span>  --}}
                                                    Usable
                                                @elseif ($equipment->status == 2)
                                                    {{-- <span class="badge badge-primary">Backup</span> --}}
                                                    Backup
                                                @else
                                                    {{-- <span class="badge badge-danger">Not Usable</span> --}}
                                                    Not Usable
                                                @endif
                                            </td>
                                            <td>{{ $equipment->address }}</td>
                                            <td>{{ old('date', \Carbon\Carbon::parse($equipment->date)->format('Y-m-d')) }}
                                            </td>
                                            <td class="text-center action-btn-wrapper">
                                                @php

                                                    $dateAdded = Carbon\Carbon::parse($equipment->date); // original date
                                                    $reminderMonths = $equipment->reminder; // number of months
                                                    $reminderDate = $dateAdded->copy()->addMonths($reminderMonths);
                                                    //dd($reminderDate);
                                                    $now = Carbon\Carbon::today();
                                                    //dd($now);
                                                @endphp
                                                <!-- Reminder Button -->
                                                @if ($now->isSameDay($reminderDate) || $now->isAfter($reminderDate))
                                                    <form action="{{ route('equipment.rupdate', $equipment->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="reminder" id="reminder"
                                                            class="form-control" value="{{ $equipment->reminderfirst }}"
                                                            required>
                                                        <button type="submit" class="btn btn-warning btn-sm btn-inner">
                                                            <i class="fa fa-bell"></i> Need Repair
                                                        </button>
                        </div>
                    </div>
                    </form>
                @else
                    <button type="button" onclick="alert('Up To Date')" class="btn btn-success btn-sm btn-inner">
                        <i class="fa fa-check"></i> Ok
                    </button>
                    @endif

                    <!-- Edit Button -->
                    <a href="{{ route('equipment.edit', $equipment->id) }}" class="btn btn-primary btn-sm btn-inner">
                        <i class="fa fa-edit"></i> Edit
                    </a>

                    <!-- Delete Button as a form -->
                    <form action="{{ route('equipment.destroy', $equipment->id) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Are you sure you want to delete this equipment?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-inner">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </form>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
