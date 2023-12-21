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
<body style="background-image: url('img/bg.svg')">
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
              <img src="img/logo (1).svg" alt="logo" style="width:70%; margin-left:-3%">
            </a>
              <div class="collapse navbar-collapse py-3" id="navbarCollapse">
                  <div class="navbar-nav mx-auto border-top" style="background-color: #097ABA; ">
                      <a href="{{route('index')}}" class="nav-item nav-link active">Dashboard</a>
                      <a href="{{route('produk')}}" class="nav-item nav-link">Produk</a>
                      <div class="nav-item dropdown">
                          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lainnya</a>
                          <div class="dropdown-menu m-0 bg-secondary rounded-0">
                              <a href="#" class="dropdown-item">Berita</a>
                              <a href="#" class="dropdown-item">Blog</a>
                          </div>
                      </div>
                      <div class="d-flex flex-nowrap border-top pt-3 pt-xl-0">
                        <div class="d-flex" style="margin-left: 5rem">
                            <img src="img/weather-icon.png" class="img-fluid w-100 me-2" alt="">
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
  <div class="slide-judul">
        <div id="overflow">
            <div class="inner">
                <div class="slide-content slide_1">
                    <h1>
                        Selamat Datang di FishApp <br> Teman Terbaik <br> para Nelayan!
                    </h1>
                    <p>FishApp adalah solusi revolusioner untuk nelayan berbasis data, yang membantu Anda <br>
                        meningkatkan hasil tangkapan dan memaksimalkan waktu di laut. Bagi nelayan <br>
                        dengan perahu sedang-kecil yang tidak memiliki alat pendeteksi ikan, <br>
                        FishApp adalah jawaban atas kebutuhan Anda.</p>
                </div>
                <div class="slide-content slide_2">
                    <h1>
                        Menyediakan Informasi <br>Mengenai Data Cuaca <br>dan Data Suhu
                    </h1>
                    <p>Memantau Cuaca dan Suhu Air Real-Time: Kami menyediakan informasi <br>
                        cuaca dan suhu air yang akurat dan up-to-date, sehingga Anda bisa merencanakan <br>
                        penangkapan ikan Anda dengan lebih baik.</p>
                </div>
                <div class="slide-content slide_3">
                    <h1>
                        Maksimalkan Hasil <br> Tangkapan Ikan <br>di Laut
                    </h1>
                    <p>FishApp membantu Anda meningkatkan efisiensi penangkapan ikan Anda, <br>
                        sehingga Anda bisa membawa pulang hasil yang lebih besar..</p>
                </div>

                <div id="controls">
                    <label for="slide_1"></label>
                    <label for="slide_2"></label>
                    <label for="slide_3"></label>
                </div>
                <div id="bullets">
                    <label for="slide_1"></label>
                    <label for="slide_2"></label>
                    <label for="slide_3"></label>
                </div>
            </div>
            <button type="button" class="btn btn-outline-primary" style="margin-left:auto; margin-right:auto">telusuri Lebih lanjut</button>
        </div>
    </div>
    <div class="tombol_geser">
      <img src="img/Expand_left.png" alt="geser kiri" id="geser_kiri" style="margin-top: -30%">
      <img src="img/Expand_right.png" alt="geser kanan" id="geser_kanan" style="margin-top: -30%; margin-left:92%">
    </div>

  <div class="fitur">
  <div class="card" style="width: 18rem; margin:auto auto; width:300px; height:467px; border-radius: 20px; background-color: #097ABA;  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);">
    <div class="card-body" style="text-align: center">
      <img src="img/lokasi.png" alt="lokasi" style="margin-top: 20px;">
      <h3 style=" font-family: 'Rancho', sans-serif; font-size: 300%; color:white; margin-top:2%">Lokasi Ikan</h3>
      <button>Selengkapnya</button>
    </div>
  </div>

  <div class="card" style="width: 18rem; margin:auto auto; width:300px; height:467px; border-radius: 20px; background-color: #097ABA;  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);">
    <div class="card-body" style="text-align: center">
      <img src="img/swaa alat.png" alt="sewa" style="margin-top: 20px;">
      <h3 style=" font-family: 'Rancho', sans-serif; font-size: 300%; color:white; margin-top:2%">Sewa Alat</h3>
      <button>Selengkapnya</button>
    </div>
  </div>

  
  <div class="card" style="width: 18rem; margin:auto auto; width:300px; height:467px; border-radius: 20px; background-color: #097ABA;  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);">
    <div class="card-body" style="text-align: center">
      <img src="img/iwak_wader-removebg-preview 1.png" alt="iwak" style="margin-top: -7%">
      <h3 style=" font-family: 'Rancho', sans-serif; font-size: 300%; color:white; margin-top:2%">Pasar Ikan</h3>
      <button>Selengkapnya</button>
    </div>
  </div>

  
  <div class="card" style="width: 18rem; margin:auto auto; width:300px; height:467px; border-radius: 20px; background-color: #097ABA;  box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);">
    <div class="card-body" style="text-align: center">
      <img src="img/🦆 icon _history_.png" alt="_history_" style="margin-top: 26px;">
      <h3 style=" font-family: 'Rancho', sans-serif; font-size: 300%; color:white; margin-top:2%">History</h3>
      <button>Selengkapnya</button>
    </div>
  </div>
</div>

<div class="rec1">
  <h3>Kepuasan Pengguna</h3>
  <p>Start From 7-14 Nov 2022</p>
  <img src="img/titik 3.png" alt="titik3">
  <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
      <div class="progress-bar" style="width: 75%">75%</div>
    </div>
</div>

<div class="rec2">
  <h3>Konsep Aplikasi FishApp</h3>
  <img src="img/Group 221.png" alt="bendera">
  <h2>Due Nov 24</h2>
 <p>FishApp dapat menyimpan riwayat <br>
  penangkapan ikan pengguna, termasuk <br> 
  data lokasi, cuaca, suhu air, dan hasil <br>
  tangkapan. Fitur analisis dapat <br>
  memberikan wawasan yang berharga <br>
  tentang pola penangkapan ikan dari <br>
  waktu ke waktu, membantu nelayan <br> 
  membuat keputusan yang lebih cerdas </p>
  <h4>Akurasi Prediksi</h4>
  <div class="progres" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
      <div class="progres-bar bg-warning text-dark" style="width: 75%">75%</div>
    </div>
  <div class="imgplus">
      <img src="img/Rectangle 2 Copy 7.png" alt="tambah">
  </div>
  <h5>+15 People</h5>
  <div class="imguser">
      <img src="img/Group 125.png" alt="user">
  </div>
</div>

<div class="rec3"></div>
<img src="img/Titik-titik.svg" alt="Titik-titik" class="dot-image">

<div class="container2">
  <h1>Dengan FishApp <br>
      Anda Bisa Menangkap <br>
      Ikan di Laut Kapan Saja</h1>  
  <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            01            Pemantauan Real-Time
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
          <div class="accordion-body">
             FishApp memberikan akses kepada Anda untuk memantau <br>
              cuaca dan suhu air secara real-time. Ini adalah informasi <br>
              kunci yang dapat membantu Anda merencanakan perjalanan <br>
              penangkapan ikan dengan lebih baik. Dengan mengetahui <br>
              kondisi cuaca dan suhu air saat ini, Anda dapat memilih waktu <br> 
              yang tepat untuk berlayar, menghindari cuaca buruk, dan <br>
              memaksimalkan hasil tangkapan Anda. <br>
              <button type="button" class="btn btn-primary">Pelajari Lebih lanjut</button>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            02            Memprediksi Lokasi ikan
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
          <div class="accordion-body">
              FishApp memberikan akses kepada Anda untuk memantau <br>
              cuaca dan suhu air secara real-time. Ini adalah informasi <br>
              kunci yang dapat membantu Anda merencanakan perjalanan <br>
              penangkapan ikan dengan lebih baik. Dengan mengetahui <br>
              kondisi cuaca dan suhu air saat ini, Anda dapat memilih waktu <br> 
              yang tepat untuk berlayar, menghindari cuaca buruk, dan <br>
              memaksimalkan hasil tangkapan Anda. <br>
              <button type="button" class="btn btn-primary">Pelajari Lebih lanjut</button>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            03            Riwayat dan Analisis Penangkapan
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
          <div class="accordion-body">
              FishApp memberikan akses kepada Anda untuk memantau <br>
              cuaca dan suhu air secara real-time. Ini adalah informasi <br>
              kunci yang dapat membantu Anda merencanakan perjalanan <br>
              penangkapan ikan dengan lebih baik. Dengan mengetahui <br>
              kondisi cuaca dan suhu air saat ini, Anda dapat memilih waktu <br> 
              yang tepat untuk berlayar, menghindari cuaca buruk, dan <br>
              memaksimalkan hasil tangkapan Anda. <br>
              <button type="button" class="btn btn-primary">Pelajari Lebih lanjut</button>
          </div>
        </div>
      </div>
      <div class="accordion-item">
          <h2 class="accordion-header" id="headingfour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
              04            informasi mengeni penyewaan
            </button>
          </h2>
          <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                FishApp memberikan akses kepada Anda untuk memantau <br>
                cuaca dan suhu air secara real-time. Ini adalah informasi <br>
                kunci yang dapat membantu Anda merencanakan perjalanan <br>
                penangkapan ikan dengan lebih baik. Dengan mengetahui <br>
                kondisi cuaca dan suhu air saat ini, Anda dapat memilih waktu <br> 
                yang tepat untuk berlayar, menghindari cuaca buruk, dan <br>
                memaksimalkan hasil tangkapan Anda. <br>
                <button type="button" class="btn btn-primary">Pelajari Lebih lanjut</button>
            </div>
          </div>
        </div>
    </div>                   
</div>

<div class="kotak">
  <h1>Apakah Anda memiliki <br>
      pertanyaan, masukan, atau saran untuk kami? Jangan ragu untuk menghubungi tim FishApp. <br>
      Kami siap membantu Anda.</h1>
      <button type="button" class="btn btn-primary">Hubungi Kami</button>
</div>

<div class="kotak1">
  <p style="color: black">“Kerja sama antar tim membangun <br>
    sebuah fitur menjadi lebih <br>
    cepat karena kami mengetahui progess <br>
    satu sama lain secara real-time”</p>
</div>

<div class="dokumentasi">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/pajar.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/pajar.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/pajar.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
</div>

</main>

<footer>
  <div class="kotakfooter">
      <img src="img/Group 240.svg" alt="elemen">
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
          <li><a href="#"><img src="img/Vector.png" alt="instagram"></a></li>
          <li><a href="#"><img src="img/Vector (1).png" alt="instagram"></a></li>
          <li><a href="#"><img src="img/Vector (2).png" alt="instagram"></a></li>
          <li><a href="#"><img src="img/Vector (3).png" alt="instagram"></a></li>
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

{{-- 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
    <body class="sb-nav-fixed" style="background-image: url('img/bg.svg')">
      <nav class="sb-topnav navbar navbar-expand navbar-light " style="background-color: #097ABA; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05); height:17%;
      border-radius:40px; width:98%; margin-top:1%; margin-left:auto; margin-right:auto">
        <!-- Navbar Brand-->
        <a href="{{route('index')}}">
          <img src="img/logo (1).svg" alt="logo" style="width:70%; margin-left:10%">
        </a>
        <nav class="navbar navbar-expand-lg" style="background-color: #097ABA;">
          <div class="container-fluid" style="background-color: #097ABA;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: #097ABA;">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="background-color: #097ABA;">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        </nav>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
       <script src="{{asset('js/slider.js')}}"></script>
    </body>
</html> --}}