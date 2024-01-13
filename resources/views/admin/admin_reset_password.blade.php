<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Admin</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #3498db;
        }

        p {
            margin-bottom: 15px;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .footer {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Halo!</h2>
        <p>Anda menerima email ini karena kami menerima permintaan reset password untuk akun Anda.</p>

        <p><a href="{{ $resetUrl }}" style="background-color: #3498db; color: #fff; padding: 10px 15px; border-radius: 3px; text-decoration: none; display: inline-block;">Reset Password</a></p>

        <p>Link reset password ini akan kedaluwarsa dalam 60 menit.</p>

        <p>Jika Anda tidak melakukan permintaan reset password, tidak perlu melakukan tindakan lebih lanjut.</p>
    </div>
</body>
</html>

