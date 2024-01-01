{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
    <h1>Detail Barang</h1>

    @if(isset($barang))
        <div>
            <img src="{{ asset('storage/fotobarang/' . $barang->foto_barang) }}" alt="{{ $barang->nama_barang }}">
        </div>
        <h2>{{ $barang->nama_barang }}</h2>
        <!-- Tambahkan informasi barang lainnya sesuai kebutuhan -->
    @else
        <p>Barang tidak ditemukan</p>
    @endif
</body>
</html> --}}

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
          <img src="{{asset('img/logo (1).svg')}}" alt="logo" style="width:70%; margin-left:-3%">
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

    {{-- <h1>Detail Barang</h1>

    @if(isset($barang))
        <div>
            <img src="{{ asset('storage/fotobarang/' . $barang->foto_barang) }}" alt="{{ $barang->nama_barang }}">
        </div>
        <h2>{{ $barang->nama_barang }}</h2>
        <!-- Tambahkan informasi barang lainnya sesuai kebutuhan -->
    @else
        <p>Barang tidak ditemukan</p>
    @endif --}}

     <!-- About Start -->
     <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                @if(isset($barang))
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('storage/fotobarang/' . $barang->foto_barang) }}" alt="{{ $barang->nama_barang }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                   <h6 class="section-title bg-white text-start pe-3" style="color: #097ABA">Checkout</h6>
                     <h1 class="mb-4" style="color: black">Checkout</h1>
                    <h6 class="mb-4" style="color: black">{{ $barang->nama_barang }}</h6>
                   

                      <form action="{{route('storecheckout')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_barang" class="form-label" style="color: black">Kode Barang</label>
                            <input type="text"  class="form-control" name="kode_barang" id="kode_barang" value="{{ $barang->kode_barang }}" readonly>
                          </div>
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label" style="color: black">Nama Barang</label>
                            <input type="text"  class="form-control" name="nama_barang" id="nama_barang" value="{{ $barang->nama_barang }}" readonly>
                          </div>
                          <div class="mb-3">
                            <label for="kondisi" class="form-label" style="color: black">Kondisi Barang</label>
                            <input type="text"  class="form-control" name="kondisi" id="kondisi" value="{{ $barang->kondisi }}" readonly>
                          </div>
                          <div class="mb-3">
                            <label for="nama" class="form-label" style="color: black">Pemilik</label>
                            <input type="text"  class="form-control" name="nama" id="nama" value="{{ $barang->nelayan->nama}}" readonly>
                          </div>
                          <div class="mb-3">
                            <label for="lokasi" class="form-label" style="color: black">Lokasi Penyewaan</label>
                            <input type="text"  class="form-control" name="lokasi" id="lokasi" value="{{ $barang->nelayan->alamat}}" readonly>
                          </div>
                          <div class="mb-3">
                            <label for="nomer_telepon" class="form-label" style="color: black">Nomor Telepon Pemilik</label>
                            <input type="text"  class="form-control" name="nomer_telepon" id="nomer_telepon" value="{{ $barang->nelayan->nomer_telepon}}" readonly>
                          </div>
                          <div class="mb-3">
                            <label for="harga" class="form-label" style="color: black">Harga Sewa</label>
                            <input type="text"  class="form-control" name="harga" id="harga" value="Rp. {{ $barang->harga}} /Hari" readonly>
                          </div>
                          <div class="mb-3">
                            <label for="jumlah" class="form-label" style="color: black">Jumlah Barang Tersedia</label>
                            <input type="text"  class="form-control" name="jumlah" id="jumlah" value="{{ $barang->jumlah}}" readonly>
                          </div>
                          <div class="mb-3">
                            <label for="jumlahsewa" class="form-label" style="color: black">Masukan Jumlah Barang yang ingin kamu sewa</label>
                            <input type="number"  class="form-control" name="jumlahsewa" id="jumlahsewa">
                          </div>
                          <div class="mb-3">
                            <label for="waktu" class="form-label" style="color: black">Berapa Jam Kamu Akan Menyewa Barang Ini</label>
                            <input type="number"  class="form-control" name="waktu" id="waktu">
                          </div>
                          <button type="submit" class="btn btn-danger py-3 px-5 mt-2" href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                          </svg>  Pesan Sekarang</button>
                          @if(session('st'))
                          <div class="alert alert-danger">
                              {{ session('st') }}
                          </div>
                      @endif
                  
                      @if($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      </form>
                </div>
                @else
                <p style="color: black">Barang tidak ditemukan</p>
                @endif
            </div>
        </div>
    </div>
    <br>
    <br>
    <!-- About End -->


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
