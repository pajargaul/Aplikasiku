{{-- <main>
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

</main> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FishApp</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

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
   .kotak0{
    width: 650px;
    border-radius: 50px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    height: 700px;
    margin: 40px auto;
}

.kotak0 h1{
    margin-top: 5%;
    margin-left: 3%;
    font-family: poppins, sans-serif;
    font-weight: bold;
    font-size: 60px;
    color: black;
    display: inline-flex;
}

.kotak0 p{
    font-family: poppins, sans-serif;
    font-weight: regular;
    font-size: 25px;
    color: #B8B8D2;
    margin-left: 3%;
}

.kotak0 form{
    margin-top: 5px;
}

.custom-form-group0 {
    display: flex;
    flex-direction: column;
    font-family: poppins, sans-serif;
    font-weight: regular;
    color: black;
    font-size: 20px;
}

.custom-form-group0 label {
    margin-bottom: 5px; 
    margin-left: 30px;
}

.custom-form-group0 input {
    padding: 8px;
    border-radius: 20px;
    width: 90%;
    margin-left: 30px;
}


.flex-container0 {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 20px; /* Atur margin sesuai kebutuhan Anda */
}

.block0 {
    margin-right: 10px; /* Atur margin sesuai kebutuhan Anda */
}

.custom-checkbox0 {
    display: flex;
    align-items: center;
}


.custom-checkbox0 {
    border-radius: 4px;
    border: 1px solid #d2d6dc;
    padding: 6px;
}

/* Gaya hover pada checkbox */
.custom-checkbox0:hover {
    border-color: #718096;
}


/* Gaya tercentang pada checkbox */
.custom-checkbox0:checked {
    background-color: #6366f1;
    border-color: #6366f1;
}

.ms-30{
    width: 45%;
    height: 56px;
    background-color: #097ABA;
    border: none !important;
    border-radius: 20px;
    font-family: poppins, sans-serif;
    color: white;
    font-size: 20px;
    font-weight: bold;
    margin-top: 100px;
    position: absolute;
    margin-left: 3%;
}

.ms-30:hover {
    background-color: #097ABA;
    transform: scale(1.1);
}

.ms-30:active {
    background-color: #097ABA;
    transform: scale(0.9);
}

.ms-40 {
    margin-top: 50px;
    width: 91.5%;
    height: 56px;
    background-color: #097ABA;
    border: none !important;
    border-radius: 20px;
    font-family: poppins, sans-serif;
    color: white;
    font-size: 20px;
    font-weight: bold;
    position: absolute;
    margin-left: 3%;
}

.ms-40:hover {
    background-color: #097ABA;
    transform: scale(1.1);
}

.ms-40:active {
    background-color: #097ABA;
    transform: scale(0.9);
}
   </style>
</head>

<body style="background-image: url('img/bg.svg')">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light shadow sticky-top p-0" style="background-color: #097ABA;">
        <a href="{{route('index')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
          <img src="{{asset('img/logo (1).svg')}}" alt="logo" style="width:70%; margin-left:-3%">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-3 p-4 p-lg-0">
                <a href="{{route('index')}}" class="nav-item nav-link">Dashboard</a>
                <a href="{{route('about')}}" class="nav-item nav-link">About</a>
                <a href="{{route('produk')}}" class="nav-item nav-link">Produk</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lainnya</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.html" class="dropdown-item">Berita Tentang Kelautan</a>
                        <a href="testimonial.html" class="dropdown-item">Blog</a>
                    </div>
                </div>
            </div>
            <div class="klik" style="margin-left: 10%">
            <a href="{{route('login')}}">
              <button type="button" class="btn btn-outline-dark" style=" width:10rem;">Login</button>
            </a>
            <a href="{{route('register')}}">
              <button type="button" class="btn btn-dark" style="width:10rem">Register</button>
            </a>
          </div>
        </div>
    </nav>
    <!-- Navbar End -->

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

    <!-- Footer Start -->
    <footer class="py-4 mt-auto" style="background-image: url('{{asset('img/Group 240.svg')}}'); background-color: #097ABA; border-top-right-radius:40px; border-top-left-radius:40px; height:500px; background-size: cover; position: relative;">
                    <div class="container-fluid px-4">
                        <div class="align-items-center">
                            <p style=" font-size: 30px; font-family: popiins, sans-serif; font-weight: regular; color: white;line-height: 40px;word-spacing: 0.3px; margin-top: 60px; margin-left: 70px;">solusi inovatif yang dirancang <br>untuk membantu nelayan<br>meningkatkan hasil tangkapan mereka</p>
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
                        </div>
                    </div>
                </footer>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>