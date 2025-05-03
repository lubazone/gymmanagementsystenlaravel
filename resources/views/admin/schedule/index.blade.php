@extends('layouts.adminApp')

@section('title', 'Gym Management System - ScheduleManage')

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

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 dashboard-section" id="members-section">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Schedule Table</h6>
                        <div class="d-flex">
                            <a href="#" class="btn btn-success btn-sm ms-5">Add New</a>
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
                                        <th>Day</th>
                                        <th>Time</th>
                                        <th>User Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedules as $schedule)
                                        <tr>
                                            <td>{{ $schedule->id }}</td>
                                            <td>{{ $schedule->day }}</td>
                                            <td>{{ $schedule->time }}</td>
                                            <td>{{ $schedule->usertype }}</td>
                                            <td>
                                                <a href="{{ route('schedules.edit', $schedule->id) }}"
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
