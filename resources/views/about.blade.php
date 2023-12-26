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
                <a href="{{route('about')}}" class="nav-item nav-link active">About</a>
                <a href="{{route('produk')}}" class="nav-item nav-link">Produk</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lainnya</a>
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
                    <h1 class="display-3 text-white animated slideInDown">About</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Lainnya</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3" style="border-radius:20px">
                        <div class="p-4">
                            <img src="{{asset('img/lokasi.png')}}" alt="">
                            <h5 class="mb-3">Lokasi Ikan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3" style="border-radius:20px">
                        <div class="p-4">
                          <img src="{{asset('img/swaa alat.png')}}" alt="">
                            <h5 class="mb-3">Sewa Alat</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3" style="border-radius:20px">
                        <div class="p-4">
                          <img src="{{asset('img/iwak_wader-removebg-preview 1.png')}}" alt="" style="width: 99%">
                            <h5 class="mb-3">Pasar Ikan</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3" style="border-radius:20px">
                        <div class="p-4">
                          <img src="{{asset('img/🦆 icon _history_.png')}}" alt="" style="width: 99%">
                            <h5 class="mb-3">History</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/Ikan-Tuna-Sirip-Kuning.jpg" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start pe-3" style="color: #097ABA">About Us</h6>
                    <h1 class="mb-4">Welcome to FishApp</h1>
                    <p class="mb-4" style="color: black">Kami bukan hanya sekadar aplikasi. Kami adalah mitra setia bagi para nelayan dan pengusaha perikanan yang ingin mengoptimalkan hasil tangkapan mereka. FishApp hadir dengan visi memberdayakan nelayan melalui penyediaan akses yang mudah dan efisien terhadap kapal dan peralatan penangkapan ikan berkualitas.</p>
                    <p class="mb-4" style="color: black">Dengan jaringan penyewaan kapal dan alat penangkapan ikan yang luas, FishApp memastikan Anda selalu memiliki akses ke peralatan terbaik di berbagai lokasi.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0" style="color: black"><i class="fa fa-arrow-right text-primary me-2"></i>Pilihan Kapal Berkualitas</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0" style="color: black"><i class="fa fa-arrow-right text-primary me-2"></i>Penangkapan Ikan yang Efisien</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0" style="color: black"><i class="fa fa-arrow-right text-primary me-2"></i>Ketersediaan Alat Penangkapan Terbaik</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0" style="color: black"><i class="fa fa-arrow-right text-primary me-2"></i>Tim Ahli Pelayanan</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0" style="color: black"><i class="fa fa-arrow-right text-primary me-2"></i>Pemesanan Online yang Mudah</p>
                        </div>
                    </div>
                    <a class="btn btn-warning py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Tim</h6>
                <h1 class="mb-5">Anggota FishApp</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/WhatsApp Image 2023-12-24 at 16.39.06_a9f8a9d6.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href="https://github.com/pajargaul"><i class="bi bi-github"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=fajarrosyidi80@gmail.com"><i class="bi bi-google"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="https://www.instagram.com/jarwis_24/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Mohammad Fajar Rosyidi</h5>
                            <small style="color: black">Web Developer</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/WhatsApp Image 2023-12-26 at 11.25.58_ce004b7d.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href="https://github.com/anzaayyy"><i class="bi bi-github"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=rizkidwi1140@gmail.com"><i class="bi bi-google"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="https://www.instagram.com/heirammm_?igsh=MTNiYzNiMzkwZA=="><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Mohamad Rizki Ramadhan</h5>
                            <small style="color: black">Mobile Developer</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/WhatsApp Image 2023-12-26 at 11.29.20_2332fe6a.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href="https://github.com/PratamaZidan1"><i class="bi bi-github"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="bi bi-google"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="https://www.instagram.com/ahmdfdzdn388?igsh=MTNiYzNiMzkwZA=="><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Mohammad Zidan Caesar Pratama</h5>
                            <small style="color: black">UI/UX Designer</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/WhatsApp Image 2023-12-26 at 11.21.41_39fb63ca.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href="https://github.com/MuhamadRois07"><i class="bi bi-github"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=muhamadrois0703@gmail.com"><i class="bi bi-google"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="https://www.instagram.com/utit.666?utm_source=ig_web_button_share_sheet&igsh=OGQ5ZDc2ODk2ZA=="><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Muhamad Rois</h5>
                            <small style="color: black">Database Engginer</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

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