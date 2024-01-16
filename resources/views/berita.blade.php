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
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
    body {
      background-size: cover;
      background-repeat: no-repeat;
      margin: 0;
      color: white;
      background-attachment: fixed; /* Menetapkan background agar tetap pada posisinya */
   }

   .container {
            max-width: 800px;
            margin: 20px auto;
        }

        .news-box {
            background-color: #fff;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .news-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .news-content {
            font-size: 16px;
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
          <img src="img/logo (1).svg" alt="logo" style="width:70%; margin-left:-3%">
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
                    <a href="#" class="nav-link active dropdown-toggle" data-bs-toggle="dropdown">Lainnya</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{route('berita')}}" class="dropdown-item">Berita Tentang Kelautan</a>
                        <a href="testimonial.html" class="dropdown-item">Blog</a>
                    </div>
                </div>
            </div>
            <div class="klik" style="margin-left: 10%">
            <a href="{{route('login')}}">
              <button type="button" class="btn btn-outline-dark" style=" width:10rem">Login</button>
            </a>
            <a href="{{route('register')}}">
              <button type="button" class="btn btn-dark" style="width:10rem">Register</button>
            </a>
          </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Berita</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Dashboard</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Berita</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    <div class="container">
        <ul class="news-list">
            @foreach ($articles['articles'] as $article)
                {{-- Check if the title contains keywords related to sea, fish, port, or ship --}}
                @if (stripos($article['title'], 'laut') !== false || stripos($article['title'], 'ikan') !== false || stripos($article['title'], 'pelabuhan') !== false || stripos($article['title'], 'kapal') !== false)
                    <li>
                        <div class="news-box wow fadeInUp" data-wow-delay="0.1s">
                            <h2>{{ $article['title'] }}</h2>
                            <p style="color: black">{{ $article['description'] }}</p>
                            <p style="color: black">Author: {{ $article['author'] }}</p>
                            <p style="color: black">Published At: {{ $article['publishedAt'] }}</p>
                            @if ($article['urlToImage'] != null)
                                <img src="{{ $article['urlToImage'] }}" alt="Image">
                            @endif
                            <p style="color: black">{{ $article['content'] }}</p>
                            <a href="{{ $article['url'] }}" target="_blank">Read More</a>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
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
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>
</html>