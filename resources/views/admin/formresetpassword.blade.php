{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="#">
        @csrf

        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $email }}" readonly>

        <label for="password">New Password:</label>
        <input type="password" name="password" required>

        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" name="password_confirmation" required>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html> --}}

<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Kata Sandi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            color: white;
            background-attachment: fixed;
            /* Menetapkan background agar tetap pada posisinya */
            font-family: 'Arial', sans-serif;
        }

        .kotak {
            background: rgba(0, 0, 0, 0.7);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 100px auto;
        }

        h1 {
            text-align: center;
            color: #3498db;
        }

        p {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        .mt-2 {
            color: #e74c3c;
        }

        .flex {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .mt-4 {
            margin-top: 16px;
        }

        .block {
            display: block;
        }

        .w-full {
            width: 100%;
        }

        .text-center {
            text-align: center;
        }

        .text-white {
            color: white;
        }

        .bg-primary {
            background-color: #3498db;
        }

        .bg-primary:hover {
            background-color: #2980b9;
        }

        .border-none {
            border: none;
        }

        .border-radius {
            border-radius: 4px;
        }

        .text-input {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        .primary-button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .primary-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body style="background-image: url('{{ asset('img/bg.svg') }}')">
    <div class="kotak">
        <h1>Reset Kata Sandi</h1>
        <p>Masukkan email dan password</p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('admin.password.update', ['token' => $token, 'email' => $email]) }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="text-input" type="email" name="email" value="{{ $email }}" readonly />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="text-input" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="text-input"
                    type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <button type="submit" class="primary-button">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>





