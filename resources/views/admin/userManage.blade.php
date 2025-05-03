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
                        <h6 class="m-0 font-weight-bold text-primary">Member Table</h6>
                        <div class="d-flex">
                            <!-- Status Filter Dropdown -->
                            <select id="status-filter" class="form-control mr-2" style="width: 150px;">
                                <option value="">All Statuses</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <a href="{{ route('admin.createNewUsers') }}" class="btn btn-success btn-sm ms-5">Add New</a>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover text-center" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Membership ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Department</th>
                                        <th>User Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->member_id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->mobile }}</td>
                                            <td>{{ $user->department }}</td>
                                            <td>{{ $user->user_type }}</td>
                                            <td>{{ ucfirst($user->status) }}</td>
                                            <td class="text-center action-btn-wrapper">
                                                <a href="{{ route('admin.user_view', $user->id) }}"
                                                    class="btn btn-info btn-sm btn-inner"><i class="fa fa-eye"></i> View</a>
                                                @if ($user->status == 'pending')
                                                    <a href="{{ route('admin.approve', $user->id) }}"
                                                        class="btn btn-primary btn-sm btn-inner"><i class="fa fa-check"></i>
                                                        Approve</a>
                                                @elseif($user->status == 'approved')
                                                    <a href="{{ route('admin.approve', $user->id) }}"
                                                        class="btn btn-warning btn-sm btn-inner"><i class="fa fa-pause"></i>
                                                        Active</a>
                                                @elseif($user->status == 'active')
                                                    <a href="{{ route('admin.approve', $user->id) }}"
                                                        class="btn btn-secondary btn-sm btn-inner"><i
                                                            class="fa fa-times"></i> Inactive</a>
                                                @else
                                                    <a href="{{ route('admin.approve', $user->id) }}"
                                                        class="btn btn-primary btn-sm btn-inner"><i class="fa fa-check"></i>
                                                        Active</a>
                                                @endif
                                                <a onclick="return confirm('Are you sure?')"
                                                    href="{{ route('admin.delete', $user->id) }}"
                                                    class="btn btn-danger btn-sm btn-inner"><i class="fa fa-trash"></i>
                                                    Reject</a>
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
