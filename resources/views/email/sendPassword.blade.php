<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Credentials</title>
</head>

<body style="margin:0; padding:0; font-family:Arial, sans-serif; background-color:#f4f4f4;">
    <div
        style="max-width:600px; margin:30px auto; background:#ffffff; padding:20px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.1);">
        <h2 style="text-align:center; color:#333;">{{ $mailData['title'] }}</h2>

        <p style="font-size:16px; color:#555;">Dear {{ $mailData['name'] }},</p>

        {{-- <p style="font-size:15px; color:#555; line-height:1.6;">
            {{ $mailData['body'] }}
        </p> --}}

        <div style="background-color:#f9f9f9; border:1px solid #ddd; padding:15px; margin:20px 0; border-radius:6px;">
            <p style="font-size:15px; color:#333;"><strong>Email:</strong> {{ $mailData['email'] }}</p>
            <p style="font-size:15px; color:#333;"><strong>Password:</strong> {{ $mailData['password'] }}</p>
        </div>

        <p style="font-size:14px; color:#555;">You can now log in using the credentials above. Please make sure to change
            your password after logging in for the first time.</p>

        <p style="font-size:14px; color:#555;">If you have any questions or need assistance, feel free to contact us.
        </p>

        <p style="font-size:14px; color:#333; margin-top:30px;">Thank you,<br><strong>The Team</strong></p>
    </div>
</body>

</html>
