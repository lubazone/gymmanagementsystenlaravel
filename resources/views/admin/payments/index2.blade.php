@extends('layouts.adminApp')

@section('title', 'Gym Management System - PaymentManage')

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
                        <h6 class="m-0 font-weight-bold text-primary">Request Payment Table</h6>
                        {{-- <div class="d-flex">
                            <a href="#" class="btn btn-success btn-sm ms-5">Add New</a>
                        </div> --}}
                    </div>
                    <!-- Table -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover text-center" width="100%"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User_id</th>
                                        <th>User Name</th>
                                        <th>Amount</th>
                                        <th>Scroll Number</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        @php
                                            $user = \App\Models\User::find($payment->user_id);
                                            $userName = $user ? $user->name : 'Unknown User';
                                        @endphp
                                        <tr>
                                            <td>{{ $payment->id }}</td>
                                            <td>{{ $payment->user_id }}</td>
                                            <td>{{ $userName }}</td>
                                            <td>{{ $payment->amount }}</td>
                                            <td>{{ $payment->scroll_number }}</td>
                                            <td>{{ ucfirst($payment->status) }}</td>
                                            <td class="action-btn-wrapper">
                                                @if ($payment->status === 'pending')
                                                    <form action="{{ route('admin.approveReqPayments', $payment->id) }}"
                                                        method="POST" style="display:inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">
                                                            Approve
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="text-success">Approved</span>
                                                @endif
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
