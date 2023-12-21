<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>FishApp</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@100;600;800&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style>
      body {
   background-size: cover;
   background-repeat: no-repeat;
   margin: 0;
   color: white;
   background-attachment: fixed; /* Menetapkan background agar tetap pada posisinya */
}
   </style>
</head>
<body style="background-image: url('{{asset('img/bg.svg')}}')">
   <!-- Spinner Start -->
   <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Navbar start -->
<div class="container-fluid sticky-top px-0" style="width: 98%; border-radius:40px; margin-top:1%">
  <div class="container-fluid" style="background-color: #097ABA; border-radius:40px">
      <div class="container px-0" style="background-color: #097ABA; width:90% ">
          <nav class="navbar navbar-light navbar-expand-xl" style="background-color: #097ABA; ">
              <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                  <span class="fa fa-bars text-primary"></span>
              </button>
              <a href="{{route('index')}}">
              <img src="{{asset('img/logo (1).svg')}}" alt="logo" style="width:70%; margin-left:-3%">
            </a>
              <div class="collapse navbar-collapse py-3" id="navbarCollapse">
                  <div class="navbar-nav mx-auto border-top" style="background-color: #097ABA; ">
                      <a href="{{route('index')}}" class="nav-item nav-link">Dashboard</a>
                      <a href="{{route('produk')}}" class="nav-item nav-link">Produk</a>
                      <div class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Dropdown</a>
                          <div class="dropdown-menu m-0 bg-secondary rounded-0">
                              <a href="#" class="dropdown-item">Dropdown 1</a>
                              <a href="#" class="dropdown-item">Dropdown 2</a>
                              <a href="#" class="dropdown-item">Dropdown 3</a>
                              <a href="#" class="dropdown-item">Dropdown 4</a>
                          </div>
                      </div>
                      <div class="d-flex flex-nowrap border-top pt-3 pt-xl-0">
                        <div class="d-flex" style="margin-left: 5rem">
                            <img src="{{asset('img/weather-icon.png')}}" class="img-fluid w-100 me-2" alt="">
                            <div class="d-flex align-items-center">
                                <strong class="fs-4 text-secondary">31°C</strong>
                                <div class="d-flex flex-column ms-2" style="width: 150px;">
                                    <span class="text-body">NEW YORK,</span>
                                    <small>Mon. 10 jun 2024</small>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('login')}}">
                        <button type="button" class="btn btn-outline-dark" style=" width:10rem">Login</button>
                      </a>
                      <a href="{{route('register')}}">
                        <button type="button" class="btn btn-dark" style="margin-left: 5%; width:10rem">Register</button>
                      </a>
                    </div>
                  </div>
              </div>
          </nav>
      </div>
  </div>
</div>

<main>
    <div class="kotak0">
    <h1>Login Nelayan</h1>
    <p>Masukkan email dan password</p>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('nelayan.login') }}">
            @csrf
            <!-- Email Address -->
            <div class="custom-form-group0">
                <x-input-label for="email" :value="__('Masukan Email')" />
                <x-text-input id="email" class="cmt-4" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            
            <!-- Password -->
            <div class="mt-4 custom-form-group0">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="cmt-4" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            
    
            <!-- Remember Me -->
            <div class="flex-container0 mt-4">
                <div class="block">
                    <label for="remember_me" class="inline-flex items-center custom-checkbox" style="color: black">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>
                @if (Route::has('admin.password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('nelayan.password.request') }}">
                    {{ __('lupa kata sandi?') }}
                </a>
            @endif
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href='/admin/login'>
                    Login Sebagai Admin
                </a>
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href='#'>
                    Menjadi Nelayan
                </a>
            </div>                    
                <button class="ms-30">
                    {{ __('Login') }}
                </button>
            </form> 
        </div> 

</main>

<footer>
  <div class="kotakfooter">
      <img src="{{asset('img/Group 240.svg')}}" alt="elemen">
  </div>
  <div class="contentfooter">
      <p>solusi inovatif yang dirancang <br>untuk membantu nelayan<br>meningkatkan hasil tangkapan mereka</p>
  </div>
  <div class="buton1">
      <button id="registersekarang">Register Sekarang</button>
      <a href="#">Pelajari Selengkapnya</a>
  </div>
  <div class="ul1">
      <ul class="menufooter">
          <li><a href="#">About</a></li>
          <li><a href="#">Solution</a></li>
          <li><a href="#">Pricing</a></li>
          <li><a href="#">Resources</a></li>
      </ul>
  </div>

  <div class="ul2">
      <ul class="menufooter">
          <li><a href="#">Jobs</a></li>
          <li><a href="#">Case Studies</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Out Team</a></li>
          <li><a href="#">Press Realese</a></li>
      </ul>
  </div>
  <div class="ul3">
      <ul class="menufooter">
          <li><a href="#">Term Ofuse</a></li>
          <li><a href="#">Cookies Use</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Login</a></li>
      </ul>
  </div>
  <div class="ul4">
      <ul class="menufooter">
          <li><a href="#">fajarrosyidi80@gmail.com</a></li>
      </ul>
  </div>
  <div class="ul5">
      <ul class="menufooter">
          <li><a href="#"><img src="{{asset('img/Vector.png')}}" alt="instagram"></a></li>
          <li><a href="#"><img src="{{asset('img/Vector (1).png')}}" alt="instagram"></a></li>
          <li><a href="#"><img src="{{asset('img/Vector (2).png')}}" alt="instagram"></a></li>
          <li><a href="#"><img src="{{asset('img/Vector (3).png')}}" alt="instagram"></a></li>
      </ul>
  </div>
</footer>

  <!-- JavaScript Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/slider.js')}}"></script>


  <!-- Template Javascript -->
  <script src="{{asset('js/main.js')}}"></script>
</body>
</html>