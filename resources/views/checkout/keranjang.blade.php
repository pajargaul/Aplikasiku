<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>FishApp</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            color: white;
            background-attachment: fixed;
            /* Menetapkan background agar tetap pada posisinya */
        }
    </style>

<style>
.card img {
    height: 200px; /* Sesuaikan tinggi yang diinginkan */
    object-fit: cover;
    width: 100%;
}
</style>

</head>

<body style="background-image: url('img/bg.svg')">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light shadow sticky-top p-0" style="background-color: #097ABA;">
        <a href="{{ route('dashboard') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="{{ asset('img/logo (1).svg') }}" alt="logo" style="width:70%; margin-left:-3%">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-3 p-4 p-lg-0">
                <a href="{{ route('dashboard') }}" class="nav-item nav-link ">Dashboard</a>
                <a href="{{ route('userabout') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('userproduk') }}" class="nav-item nav-link">Produk</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lainnya</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{ route('usernews') }}" class="dropdown-item">Berita Tentang Kelautan</a>
                        <a href="testimonial.html" class="dropdown-item">Blog</a>
                    </div>
                </div>
                <a href="{{route('keranjang')}}" class="nav-item nav-link active">
                    @php
                    $jumlahTabel = \App\Models\Penyewaan::where('user_id', Auth::user()->id)
                                    ->whereNull('status_pengembalian')
                                    ->whereNull('jam_sewa')
                                    ->whereNull('jam_pengembalian')
                                    ->count();
                @endphp
                
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-cart4" viewBox="0 0 16 16">
                        <path
                            d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0" />
                    </svg>
                    <span class="badge badge-pill badge-danger"
                        style="color: red; margin-left:-20%;">{{ $jumlahTabel }}</span>
                </a>
            </div>
            <div class="navbar-nav ms-3 p-4 p-lg-0">
                <div class="nav-item dropdown">
                    @if (Auth::user()->foto)
                        <a href="#" style="margin-left: 20%" class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown">
                            <img class="border rounded-circle p-2"
                                src="{{ asset('storage/fotouser/' . Auth::user()->foto) }}"
                                style="width: 40px; height: 40px;">
                            {{ Auth::user()->name }}
                        </a>
                    @else
                        <a href="#" style="margin-left: 20%" class="nav-link dropdown-toggle"
                            data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            {{ Auth::user()->name }}
                        </a>
                    @endif
                    <div class="dropdown-menu fade-down m-0" style="position: absolute; left: 50%;">
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">
                            <form action="{{ route('logout') }}" method="post">
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

    <div class="vontainer-fluid px-4">
        <div class="card mb-2 mt-4">
            <h5 class="card-header">
                <a href="{{route('keranjang')}}" style=" text-decoration: none">Keranjang/</a>
                <a href="{{route('nelayan.viewbaranguser')}}" style=" text-decoration: none">barang yang sedang saya sewa/</a>
                <a href="{{route('user.barangkembali')}}" style=" text-decoration: none">barang yang telah Dikembalikan</a>
            </h5>
        </div>
    </div>

    <div class="container mt-3">
    <div class="row">
        @forelse ($pesanan as $item)
        @if ($item->jam_sewa === null && $item->jam_pengembalian === null)
        <div class="col-sm-3 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $item->barangSewa->nama_barang }}</h5>
              <img src="{{ asset('storage/fotobarang/' . $item->barangSewa->foto_barang) }}" class="mr-3" alt="Product Image">
              <p class="card-text">Jumlah Sewa :{{ $item->jumlah_sewa }}</p>
              <a href="{{ route('hubungi.pemilik', ['id' => $item->barangSewa->nelayan_id]) }}" class="btn btn-primary" class="btn btn-primary">Hubungi Pemilik</a>
              <a href="#" class="btn btn-warning" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#productModal{{ $item->kode_sewa}}">Detail</a>
            </div>
          </div>
        </div>
        @endif
        @empty
        <div class="card-body">
            <p>Belum ada barang di keranjang belanja.</p>
        </div>
    @endforelse
      </div>
    </div>

    @foreach($pesanan as $item)
    <!-- Existing product card code -->

    <!-- Modal -->
    <div class="modal fade" id="productModal{{ $item->kode_sewa }}" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel" style="color: black">{{ $item->barangSewa->nama_barang }} - Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('storage/fotobarang/' . $item->barangSewa->foto_barang) }}" class="card-img-top" alt="{{ $item->barangSewa->nama_barang }}">
                    <p style="color: black">Kode Barang : {{ $item->barangSewa->kode_barang }}</p>
                    <p style="color: black">Kode Sewa : {{ $item->kode_sewa }}</p>
                    <p style="color: black">Nama Pemilik : {{ $item->barangSewa->nelayan->nama }}</p>
                    <p style="color: black">Nomer telepon pemilik : {{ $item->barangSewa->nelayan->nomer_telepon }}</p>
                    <p style="color: black">Jumlah Sewa : {{ $item->jumlah_sewa }} Barang</p>
                    <p style="color: black">waktu barang yang akan disewa Sewa : {{ $item->jumlah_waktu }} Jam</p>
                    <p style="color: black">total harga : Rp. {{ number_format($item->total_harga, 0, ',', '.') }},-</p>
                    <!-- Add other product details here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('hubungi.pemilik', ['id' => $item->barangSewa->nelayan_id]) }}" class="btn btn-primary">Hubungi Pemilik</a>
                    <a href="{{ route('cancel', ['kode_barang' => $item->barangSewa->kode_barang, 'jumlah'=> $item->barangSewa->jumlah, 'jumlah2'=> $item->jumlah_sewa, 'kode_sewa' => $item->kode_sewa]) }}" class="btn btn-danger">cancel</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
@if(session('st'))
<div class="alert alert-danger">
    {{ session('st') }}
</div>
@endif

    <!-- Footer Start -->
    <footer class="py-4 mt-auto"
        style="background-image: url('{{ asset('img/Group 240.svg') }}'); background-color: #097ABA; border-top-right-radius:40px; border-top-left-radius:40px; height:500px; background-size: cover; position: relative;">
        <div class="container-fluid px-4">
            <div class="align-items-center">
                <p
                    style=" font-size: 30px; font-family: popiins, sans-serif; font-weight: regular; color: white;line-height: 40px;word-spacing: 0.3px; margin-top: 60px; margin-left: 70px;">
                    solusi inovatif yang dirancang <br>untuk membantu nelayan<br>meningkatkan hasil tangkapan mereka</p>
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
                        <li><a href="#"><img src="{{ asset('img/Vector.png') }}" alt="instagram"></a></li>
                        <li><a href="#"><img src="{{ asset('img/Vector (1).png') }}" alt="instagram"></a></li>
                        <li><a href="#"><img src="{{ asset('img/Vector (2).png') }}" alt="instagram"></a></li>
                        <li><a href="#"><img src="{{ asset('img/Vector (3).png') }}" alt="instagram"></a></li>
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
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
