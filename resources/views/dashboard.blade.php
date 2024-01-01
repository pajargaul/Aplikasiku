{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

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
        <a href="{{route('dashboard')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
          <img src="img/logo (1).svg" alt="logo" style="width:70%; margin-left:-3%">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-3 p-4 p-lg-0">
                <a href="{{route('dashboard')}}" class="nav-item nav-link active ">Dashboard</a>
                <a href="{{route('userabout')}}" class="nav-item nav-link">About</a>
                <a href="{{route('userproduk')}}" class="nav-item nav-link">Produk</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lainnya</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{route('usernews')}}" class="dropdown-item">Berita Tentang Kelautan</a>
                        <a href="testimonial.html" class="dropdown-item">Blog</a>
                    </div>
                </div>
            </div>
            <div class="navbar-nav ms-3 p-4 p-lg-0">
                <div class="nav-item dropdown">
                    @if(Auth::user()->foto)
                        <a href="#" style="margin-left: 20%" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="border rounded-circle p-2" src="{{asset('storage/fotouser/'.Auth::user()->foto)}}" style="width: 40px; height: 40px;">
                            {{Auth::user()->name}}
                        </a>
                    @else
                        <a href="#" style="margin-left: 20%" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                            </svg>
                            {{Auth::user()->name}}
                        </a>
                    @endif
                    <div class="dropdown-menu fade-down m-0" style="position: absolute; left: 50%;">
                        <a href="{{route('profile.edit')}}" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button class="btn-danger" :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                                </button>
                            </form>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/pantai-muncar-banyuwangi.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Selamat Datang di FishApp</h5>
                                <h1 class="display-3 text-white animated slideInDown">Teman Terbaik para Nelayan!</h1>
                                <p class="fs-5 text-white mb-4 pb-2">FishApp adalah solusi revolusioner untuk nelayan berbasis data, yang membantu Anda
                                  meningkatkan hasil tangkapan dan memaksimalkan waktu di laut. Bagi nelayan
                                  dengan perahu sedang-kecil yang tidak memiliki alat pendeteksi ikan
                                  FishApp adalah jawaban atas kebutuhan Anda.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" style="background-color: #097ABA">Read More</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/rete-a-circuizione_740.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Selamat Datang di FishApp</h5>
                                <h1 class="display-3 text-white animated slideInDown">Menyediakan Informasi Mengenai Penyewaan Kapal dan Alat Penangkapan Ikan</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Memantau Cuaca dan Suhu Air Real-Time: Kami menyediakan informasi
                                  cuaca dan suhu air yang akurat dan up-to-date, sehingga Anda bisa merencanakan
                                  penangkapan ikan Anda dengan lebih baik.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" style="background-color: #097ABA">Read More</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
              <img class="img-fluid" src="img/kenapa-ikan-marlin-jadi-ikon-pangandaran-simak-penjelasannya-iw5zFU2TCB.jpeg" alt="">
              <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                  <div class="container">
                      <div class="row justify-content-start">
                          <div class="col-sm-10 col-lg-8">
                              <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Selamat Datang di FishApp</h5>
                              <h1 class="display-3 text-white animated slideInDown">Maksimalkan Hasil Tangkapan Ikan di Laut</h1>
                              <p class="fs-5 text-white mb-4 pb-2">FishApp membantu Anda meningkatkan efisiensi penangkapan ikan Anda,
                                sehingga Anda bisa membawa pulang hasil yang lebih besar..</p>
                              <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft" style="background-color: #097ABA">Read More</a>
                              <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
    <!-- Carousel End -->


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


    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Kategori</h6>
                <h1 class="mb-5">Kategori Produk</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/kkp-kembali-tangkap-kapal-nelayan-asing-berbendera-malaysia-kQIOFAL2zs.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Kapal Penangkapan</h5>
                                    <small class="text-primary">Banyak Kapal Tersedia</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/C5bwsTjOsv.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Alat Tangkap Modern</h5>
                                    <small class="text-primary">Jenis Alat Tersedia</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="img/Peralatan-Pancing.jpg" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Perlengkapan Penangkapan</h5>
                                    <small class="text-primary">Berbagai Pilihan</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="img/Nelayan-harus-mendapat-perlindungan-dari-negara.jpg" alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                            <h5 class="m-0">Peralatan Nelayan</h5>
                            <small class="text-primary">Lengkap dan Berkualitas</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->

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
                                <a class="btn btn-sm-square btn-primary mx-1" href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=argentu10@gmail.com"><i class="bi bi-google"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="https://www.instagram.com/pratamaziidan/"><i class="fab fa-instagram"></i></a>
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


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Para Pengguna FishApp</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p style="color: black">Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p style="color: black">Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p style="color: black">Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p style="color: black">Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
        

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
