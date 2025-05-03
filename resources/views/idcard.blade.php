<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gym Membership ID Card - {{ $user->member_id }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f0f0;
            padding: 20px;
        }

        .id-card {
            width: 350px;
            height: 220px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            display: block;
        }

        .header {
            background-color: #004080;
            color: white;
            padding: 8px 12px;
            text-align: left;
        }

        .header img {
            width: 40px;
            height: 40px;
            object-fit: cover;
            vertical-align: middle;
        }

        .header h1 {
            display: inline-block;
            font-size: 16px;
            font-weight: bold;
            margin-left: 10px;
            vertical-align: middle;
        }

        .content {
            padding: 10px 12px;
        }

        .content-table {
            width: 100%;
        }

        .photo {
            width: 90px;
        }

        .photo img {
            width: 90px;
            height: 110px;
            object-fit: cover;
            border: 1px solid #ccc;
        }

        .details {
            padding-left: 10px;
            vertical-align: top;
            font-size: 13px;
            color: #333;
        }

        .details h2 {
            font-size: 16px;
            margin-bottom: 5px;
            color: #004080;
        }

        .details p {
            margin: 3px 0;
        }

        .footer {
            background-color: #004080;
            color: white;
            font-size: 12px;
            text-align: center;
            padding: 5px;
            position: relative;
            bottom: 0;
        }
    </style>
</head>

<body>
    @php
        $start = \Carbon\Carbon::parse($user->created_at);
        $end = $start->copy()->addYear();
    @endphp

    <div class="id-card">
        <div class="header">
            <img src="{{ public_path('images/just.jpg') }}" alt="Gym Logo">
            <h1>Just Gymnasium</h1>
        </div>

        <div class="content">
            <table class="content-table">
                <tr>
                    <td class="photo">
                        @if ($user->id_card_photo)
                            <img src="{{ public_path($user->id_card_photo) }}" alt="Member Photo">
                        @else
                            <img src="{{ public_path('images/just.jpg') }}" alt="Default Photo">
                        @endif
                    </td>
                    <td class="details">
                        <h2>{{ $user->name }}</h2>
                        <p><strong>ID:</strong> {{ $user->member_id }}</p>
                        <p><strong>Activation:</strong> {{ $start->format('M Y') }}</p>
                        <p><strong>Type:</strong> {{ ucfirst($user->user_type) }}</p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="footer">
            Valid Until: {{ $end->format('M Y') }}
        </div>
    </div>
</body>

</html>
