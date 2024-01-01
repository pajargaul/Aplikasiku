<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FishApp</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

<style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 20px; /* Tambahkan padding untuk memberi jarak antar kartu */
    }

    .card {
        width: 18rem;
        box-sizing: border-box;
        margin-bottom: 20px; /* Jarak antar kartu */
    }

    .card img {
        height: 200px; /* Sesuaikan tinggi yang diinginkan */
        object-fit: cover;
        width: 100%;
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
                <a href="{{route('dashboard')}}" class="nav-item nav-link ">Dashboard</a>
                <a href="{{route('userabout')}}" class="nav-item nav-link">About</a>
                <a href="{{route('userproduk')}}" class="nav-item nav-link active">Produk</a>
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

     <!-- Header Start -->
     <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Produk</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Lainnya</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Produk</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Kategori</h6>
                <h1 class="mb-5" style="color: black">Kategori Produk</h1>
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

    <div class="container card-container">
        @foreach($barangSewa as $barang)
            <div class="card">
                <img src="{{ asset('storage/fotobarang/' . $barang->foto_barang) }}" class="card-img-top" alt="{{ $barang->nama_barang }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                    <p class="card-text" style="color: black">Rp {{ number_format($barang->harga, 0, ',', '.') }},-</p>
                    <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#productModal{{ $barang->kode_barang }}">Detail</a>
                    <a href="{{ route('checkout', ['kode_barang' => $barang->kode_barang]) }}" class="btn btn-danger">Sewa</a>
                </div>
            </div>
        @endforeach
    </div>

    @foreach($barangSewa as $barang)
    <!-- Existing product card code -->

    <!-- Modal -->
    <div class="modal fade" id="productModal{{ $barang->kode_barang }}" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel" style="color: black">{{ $barang->nama_barang }} - Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/fotobarang/' . $barang->foto_barang) }}" class="card-img-top" alt="{{ $barang->nama_barang }}">
                    <p style="color: black">Kode Barang : {{ $barang->kode_barang }}</p>
                    <p style="color: black">Kondisi : {{ $barang->kondisi }}</p>
                    <p style="color: black">Jumlah Barang ini Tersedia : {{ $barang->jumlah }}</p>
                    <p style="color: black">Pemilik : {{ $barang->nelayan->nama}}</p>
                    <p style="color: black">Lokasi : {{ $barang->nelayan->alamat}}</p>
                    <p style="color: black">Nomor Telepon Penyewa : {{ $barang->nelayan->nomer_telepon}}</p>
                    <h6 style="color: red">Harga: Rp {{ number_format($barang->harga, 0, ',', '.') }},-</h6>
                    <!-- Add other product details here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('checkout', ['kode_barang' => $barang->kode_barang]) }}" class="btn btn-danger">Sewa</a>
                </div>
            </div>
        </div>
    </div>
@endforeach

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5" style="color: black">Para Pengguna FishApp</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0" style="color: black">Client Name</h5>
                    <p style="color: black">Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0" style="color: black">Client Name</h5>
                    <p style="color: black">Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0" style="color: black">Client Name</h5>
                    <p style="color: black">Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0" style="color: black">Client Name</h5>
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
    <!-- Add this to your HTML file -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>