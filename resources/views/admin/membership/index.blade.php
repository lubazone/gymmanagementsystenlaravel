@extends('layouts.adminApp')

@section('title', 'Gym Management System - MembershipPlanManage')

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
                        <h6 class="m-0 font-weight-bold text-primary">MembershipPlanManage Table</h6>
                        <div class="d-flex">
                            <a href="{{ route('admin.createMem') }}" class="btn btn-success btn-sm ms-5">Add New</a>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover text-center" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Type</th>
                                        <th>Registration Fee</th>
                                        <th>ID Card</th>
                                        <th>Monthly Fee</th>
                                        <th>Basketball Court Fee</th>
                                        <th>Badminton Court Fee</th>
                                        <th>Volleyball Court Fee</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($membershipPlans as $membershipPlan)
                                        <tr>
                                            <td>{{ $membershipPlan->id }}</td>
                                            <td>{{ $membershipPlan->user_category }}</td>
                                            <td>{{ $membershipPlan->registration_fee }}</td>
                                            <td>{{ $membershipPlan->id_card }}</td>
                                            <td>{{ $membershipPlan->monthly_fee }}</td>
                                            <td>{{ $membershipPlan->basketball_court_fee }}</td>
                                            <td>{{ $membershipPlan->badminton_court_fee }}</td>
                                            <td>{{ $membershipPlan->volleyball_court_fee }}</td>
                                            <td>
                                                <a href="{{ route('admin.editMembership', $membershipPlan->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                                <!-- <form action="#" method="POST" style="display:inline-block;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> -->
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
