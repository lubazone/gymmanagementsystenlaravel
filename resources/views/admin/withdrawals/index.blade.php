@extends('layouts.adminApp')

@section('title', 'Gym Management System - Withdrawals')

@section('content')
    <div class="container">
        <h1>Pending Withdrawals</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Purpose</th>
                    <th>Receiver</th>
                    <th>Requested By</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($withdrawals as $withdrawal)
                    <tr>
                        <td>{{ $withdrawal->amount }}</td>
                        <td>{{ $withdrawal->purpose }}</td>
                        <td>{{ $withdrawal->receiver }}</td>
                        <td>{{ $withdrawal->user->name }}</td>
                        <td>{{ ucfirst($withdrawal->status) }}</td>
                        <td>
                            @if ($withdrawal->status === 'pending')
                                <form action="{{ route('withdrawals.accept', $withdrawal->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </form>

                                <form action="{{ route('withdrawals.reject', $withdrawal->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            @else
                                <span class="text-muted">Action Disabled</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
