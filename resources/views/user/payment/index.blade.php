@extends('layouts.userApp')

@section('content')
    <style>
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }

        .bank-account-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 700px;
        }

        .label {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 10px;
        }


        .balance {



            padding: 10px 20px;
            border-bottom: 1px solid #eee;

            background-color: #e5e0e0;
        }

        .input-group {
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .input-group label {
            margin-bottom: 5px;
            color: #333;
            font-size: 0.9em;
        }

        .input-group input[type="number"],
        .input-group input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: calc(100% - 18px);
            /* Adjust for padding and border */
            box-sizing: border-box;
            font-size: 1em;
        }

        .actions button {
            padding: 10px 15px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            background-color: #007bff;
            /* Blue for deposit */
            color: white;
            width: 100%;
            box-sizing: border-box;
        }

        .balance.negative {
            color: #dc3545;
            /* Red for negative balance */
        }
    </style>
    <div class="bank-account-card">
        <div class="label">Account Balance</div>
        <div class="balance" id="accountBalance">{{ $user->amount }}</div>

        <form action="{{ route('payment.deposit') }}" method="POST">
            @csrf
            <div class="input-group" style="margin-bottom:10px;">
                <label for="depositAmount">Deposit Amount:</label>
                <input type="number" id="depositAmount" name="amount" placeholder="Enter amount" required
                    style="padding:8px; border:1px solid #ccc; border-radius:4px; width: 100%;">
            </div>

            <div class="input-group" style="margin-bottom:10px;">
                <label for="scrollNumber">Scroll Number:</label>
                <input type="text" id="scrollNumber" name="scroll_number" placeholder="Enter scroll number" required
                    style="padding:8px; border:1px solid #ccc; border-radius:4px; width: 100%;">
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-success btn-sm"
                    style="padding:10px 20px; border:none; border-radius:5px; background:#28a745; color:#fff; cursor:pointer;">
                    Deposit
                </button>
            </div>
        </form>

    </div>
    <!-- Payment History Table -->
    @if ($payments)
        <div style="margin-top:30px;">
            <h3 class="text-center">Payment History</h3>
            <table border="1" width="100%" cellpadding="8">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Scroll Number</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="paymentsTable">
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->scroll_number }}</td>
                            <td>{{ $payment->status }}</td>
                            <td>{{ $payment->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div style="margin-top:30px;">
            <h3>No Payment History Available</h3>
        </div>
    @endif
@endsection
