<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <style>
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
        }

        .asolole {
            width: calc(25% - 20px);
            /* 25% untuk empat kolom, dan dikurangi margin antar kartu */
            margin-bottom: 20px;
            /* Jarak antar kartu */
            box-sizing: border-box;
        }

        .card img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        @media (max-width: 1200px) {
            .asolole {
                width: calc(33.33% - 20px);
                /* Tiga kolom pada layar berukuran lebih kecil */
            }
        }

        @media (max-width: 992px) {
            .asolole {
                width: calc(50% - 20px);
                /* Dua kolom pada layar berukuran lebih kecil */
            }
        }

        @media (max-width: 768px) {
            .asolole {
                width: 100%;
                /* Satu kolom pada layar sangat kecil */
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="sb-nav-fixed" style="{{ asset('img/bg.svg') }}">
    {{-- nav-start --}}
    <nav class="sb-topnav navbar navbar-expand navbar-light "
        style="background-color: #097ABA; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);  ">
        <!-- Navbar Brand-->
        <a href="{{ route('nelayan.dashboard') }}">
            <img src="{{ asset('img/logo (1).svg') }}" alt="logo" style="width: 45%; margin-left:10%">
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    @if (Auth::guard('nelayan')->user()->foto)
                        <img class="border rounded-circle p-2"
                            src="{{ asset('storage/fotonelayan/' . Auth::guard('nelayan')->user()->foto) }}"
                            style="width: 40px; height: 40px;">
                        {{ Auth::guard('nelayan')->user()->nama }}
                    @else
                        <i class="fas fa-user fa-fw"></i>
                        {{ Auth::guard('nelayan')->user()->nama }}
                    @endif
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('nelayan.profile') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('nelayan.pengaturan') }}">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('nelayan.logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu" style="background-color: #097ABA">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ route('nelayan.dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z" />
                                </svg>
                            </div>
                            Produk Saya
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('nelayan.sewakan-alat') }}">Sewakan Alat</a>
                                <a class="nav-link" href="{{ route('nelayan.viewproduk') }}">Barang yang Saya
                                    Sewakan</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            @php
                                $barangSewa = \App\Models\Tb_Barangsewa::where('nelayan_id', Auth::guard('nelayan')->user()->id)->get();
                                $kodeBarangArray = $barangSewa->pluck('kode_barang')->toArray();

                                $jumlahTabel = \App\Models\Penyewaan::whereIn('kode_barang_id', $kodeBarangArray)
                                    ->whereNull('status_pengembalian')
                                    ->whereNull('jam_sewa')
                                    ->whereNull('jam_pengembalian')
                                    ->count();
                            @endphp
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Notifikasi
                            @if ($jumlahTabel === 0)
                            @else
                                <span class="badge badge-pill badge-danger">{{ $jumlahTabel }}</span>
                            @endif
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="{{ route('nelayan.pesanan') }}">Pesanan
                                    @if ($jumlahTabel === 0)
                                    @else
                                        <span class="badge badge-pill badge-danger">{{ $jumlahTabel }}</span>
                                    @endif
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages02" aria-expanded="false" aria-controls="collapsePages02">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2" />
                                </svg></div>
                            @php
                                $barangSewa2 = \App\Models\Tb_Barangsewa::where('nelayan_id', Auth::guard('nelayan')->user()->id)->get();
                                $kodeBarangArray2 = $barangSewa2->pluck('kode_barang')->toArray();

                                $jumlahTabel2 = \App\Models\Penyewaan::whereIn('kode_barang_id', $kodeBarangArray2)
                                    ->whereNull('status_pengembalian')
                                    ->whereNotNull('jam_sewa')
                                    ->whereNotNull('jam_pengembalian')
                                    ->count();
                            @endphp
                            Detail Pesanan
                            @if ($jumlahTabel2 === 0)
                            @else
                                <span class="badge badge-pill badge-danger">{{ $jumlahTabel2 }}</span>
                            @endif
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages02" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="{{ route('nelayan.detailpesanan') }}">Pesanan yang sedang
                                    di sewa
                                    @if ($jumlahTabel2 === 0)
                                    @else
                                        <span class="badge badge-pill badge-danger">{{ $jumlahTabel2 }}</span>
                                    @endif
                                </a>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{ route('nelayan.historypesanan') }}">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-clock-history"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z" />
                                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z" />
                                    <path
                                        d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5" />
                                </svg></i></div>
                            History Pesanan
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    {{ Auth::guard('nelayan')->user()->nama }}
                </div>
            </nav>
        </div>
        {{-- nav-end --}}
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Sewakan Alat</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Sewakan Alat</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="container card-container">
                            @foreach ($barangSewa as $barang)
                                <div class="card asolole">
                                    <img src="{{ asset('storage/fotobarang/' . $barang->foto_barang) }}"
                                        class="card-img-top" alt="{{ $barang->nama_barang }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                                        <p class="card-text">Rp {{ number_format($barang->harga, 0, ',', '.') }},-</p>
                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#productModal{{ $barang->kode_barang }}">Detail</a>
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#productModal2{{ $barang->kode_barang }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                            </svg></a>
                                        <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#productModal3{{ $barang->kode_barang }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @foreach ($barangSewa as $barang)
                        <!-- Existing product card code -->

                        <!-- Modal -->
                        <div class="modal fade" id="productModal{{ $barang->kode_barang }}" tabindex="-1"
                            aria-labelledby="productModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="productModalLabel" style="color: black">
                                            {{ $barang->nama_barang }} - Detail</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('storage/fotobarang/' . $barang->foto_barang) }}"
                                            class="card-img-top" alt="{{ $barang->nama_barang }}">
                                        <p style="color: black">Kode Barang : {{ $barang->kode_barang }}</p>
                                        <p style="color: black">Nama Pemilik : {{ $barang->nelayan->nama }}</p>
                                        <p style="color: black">Nomer telepon pemilik :
                                            {{ $barang->nelayan->nomer_telepon }}</p>
                                            <p class="card-text">Harga : Rp {{ number_format($barang->harga, 0, ',', '.') }},-</p>
                                            <p style="color: black">Kondisi : {{ $barang->kondisi }}</p>
                                            <p style="color: black">Jumlah Barang : {{ $barang->jumlah }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#productModal2{{ $barang->kode_barang }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                            </svg></a>
                                        <a href="#" class="btn btn-danger"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg></a>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($barangSewa as $barang)
                        <!-- Existing product card code -->

                        <!-- Modal -->
                        <div class="modal fade" id="productModal2{{ $barang->kode_barang }}" tabindex="-1"
                            aria-labelledby="productModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="productModalLabel" style="color: black">
                                            {{ $barang->nama_barang }} - Update</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('nealayan.updateBarangSewa', ['kode_barang' => $barang->kode_barang])}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                        <div class="mb-3 row">
                            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_barang" value="{{$barang->nama_barang}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="harga" class="col-sm-2 col-form-label">Harga :</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="harga" name="harga" step="0.01" min="0.01" placeholder="jangan gunakan tanda titik , example:15000" value="{{$barang->harga}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Kondisi" name="kondisi">
                                    <option value="Baik" @if($barang->kondisi == 'Baik') selected @endif>Baik</option>
                                    <option value="Kurang_baik" @if($barang->kondisi == 'Kurang_baik') selected @endif>Kurang Baik</option>
                                    <option value="Rusak" @if($barang->kondisi == 'Rusak') selected @endif>Rusak</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Barang</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="jumlah" value="{{$barang->jumlah}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="formFile" class="col-sm-2 col-form-label">Upload Foto Barang</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="formFile" name="foto_barang">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <button type="submit" class="btn btn-success">update</button>
                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($barangSewa as $barang)
                        <!-- Existing product card code -->

                        <!-- Modal -->
                        <div class="modal fade" id="productModal3{{ $barang->kode_barang }}" tabindex="-1"
                            aria-labelledby="productModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="productModalLabel" style="color: black">
                                            {{ $barang->nama_barang }} - Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('nealayan.deleteBarangSewa', ['kode_barang' => $barang->kode_barang])}}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <p>apakah anda akan menghapus barang ini?</p>
                        <button type="submit" class="btn btn-danger">iya</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </form>
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
            
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </div>
            </main>
            <footer class="py-4 mt-auto"
                style="background-image: url('{{ asset('img/Group 240.svg') }}'); background-color: #097ABA; border-top-right-radius:40px; border-top-left-radius:40px; height:500px; background-size: cover; position: relative;">
                <div class="container-fluid px-4">
                    <div class="align-items-center">
                        <p
                            style=" font-size: 30px; font-family: popiins, sans-serif; font-weight: regular; color: white;line-height: 40px;word-spacing: 0.3px; margin-top: 60px; margin-left: 70px;">
                            solusi inovatif yang dirancang <br>untuk membantu nelayan<br>meningkatkan hasil tangkapan
                            mereka</p>
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
                                <li><a href="#"><img src="{{ asset('img/Vector.png') }}" alt="instagram"></a>
                                </li>
                                <li><a href="#"><img src="{{ asset('img/Vector (1).png') }}"
                                            alt="instagram"></a></li>
                                <li><a href="#"><img src="{{ asset('img/Vector (2).png') }}"
                                            alt="instagram"></a></li>
                                <li><a href="#"><img src="{{ asset('img/Vector (3).png') }}"
                                            alt="instagram"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>

</html>
