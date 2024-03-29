<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
    <style>
       body {
    background-size: cover;
    background-repeat: no-repeat;
    margin: 0;
    color: white;
    background-attachment: fixed; /* Menetapkan background agar tetap pada posisinya */
}
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-image: url('{{asset('img/bg.svg')}}')">
      <div class="kotak">
        <h1>Lupa Kata Sandi</h1>
        <p>Masukkan email</p>
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Lupa kata sandi? Tidak masalah. Beri tahu kami alamat email Anda, dan kami akan mengirimkan tautan reset kata sandi melalui email yang memungkinkan Anda memilih yang baru.') }}
        </div>
        <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('admin.password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="custom-form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                            @error('email')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="btn btn-danger">
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </div>
                    </form>
      </div>
</body>
</html>