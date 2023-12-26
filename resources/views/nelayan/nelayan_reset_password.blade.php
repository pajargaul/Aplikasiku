<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reset Password</title>
</head>
<body>
    <p>Hello!</p>
    <p>You are receiving this email because we received a password reset request for your account.</p>

    <p><a href="{{ $resetUrl }}">Reset Password</a></p>

    <p>This password reset link will expire in 60 minutes.</p>

    <p>If you did not request a password reset, no further action is required.</p>

    <p>Regards,<br>Laravel</p>
</body>
</html>
