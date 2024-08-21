<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cari Kost Apps</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('assets/design/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/design/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/design/css/elegant-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/design/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/design/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/design/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/design/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/design/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/design/css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/design/css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<style>
    .room-pagination svg {
    display: none !important;
}

.select2-selection select2-selection--single {
    display: none !important;
}

/* Styling container utama form */
.search-section {
    /* background-color: #f9f9f9; */
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 30px;
}

/* Styling untuk row */
.search-section .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

/* Styling kolom input */
.search-section input[type="text"],
.search-section input[type="number"],
.search-section select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 14px;
}

/* Styling tombol submit */
.search-section .primary-btn {
    background-color: #ff6f61;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.search-section .primary-btn:hover {
    background-color: #e65c50;
}

/* Responsif untuk layar lebih kecil */
@media (max-width: 768px) {
    .search-section .row {
        flex-direction: column;
    }

    .search-section .col-lg-3,
    .search-section .col-lg-4,
    .search-section .col-lg-2 {
        width: 100%;
        margin-bottom: 15px;
    }

    .search-section .primary-btn {
        width: 100%;
        text-align: center;
    }
}
</style>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <a href="#" class="bk-btn">Cari Sekarang Juga!</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('kost') }}">Kost</a></li>
                <li><a href="./contact.html">Kontak Kami</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> 08123456778</li>
            <li><i class="fa fa-envelope"></i> carikost@gmail.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section header-normal">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i> 08123456778</li>
                            <li><i class="fa fa-envelope"></i> carikost@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tn-right">
                            <a href="#" class="bk-btn">Cari Sekarang Juga!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="./index.html">
                                <!-- <img src="img/logo.png" alt=""> -->
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li class="active"><a href="{{ route('kost') }}">Kost</a></li>
                                    <li><a href="./contact.html">Kontak Kami</a></li>
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Cari Kost</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <div class="search-section d-flex justify-content-center">
        <form action="{{ route('kost') }}" method="GET">
            <div class="row">
                <div class="col-lg-2">
                    <input type="text" name="nama_kost" placeholder="Nama Kost">
                </div>
                <div class="col-lg-2">
                    <input type="text" name="lokasi" placeholder="Lokasi">
                </div>
                <div class="col-lg-2">
                    <input type="text" name="services" placeholder="Services (pisahkan dengan koma)">
                </div>
                <div class="col-lg-2">
                    <input type="number" name="harga_min" placeholder="Harga Min">
                </div>
                <div class="col-lg-2">
                    <input type="number" name="harga_max" placeholder="Harga Max">
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="primary-btn">Cari</button>
                </div>
            </div>
        </form>
    </div>


    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @foreach ($data as $kost)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('storage/' . $kost->foto_kost) }}" alt="{{ $kost->nama_kost }}">
                        <div class="ri-text">
                            <h4>{{ $kost->nama_kost }}</h4>
                            <h3 style="font-size: 20px;">Rp.{{ number_format($kost->harga, 0, ',', '.') }}<span>/Bulan</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Lokasi:</td>
                                        <td>{{ $kost->lokasi }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Pemilik:</td>
                                        <td>{{ $kost->pemilik }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Kontak:</td>
                                        <td>{{ $kost->kontak_wa }}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>{{ $kost->services }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ route('detail-kost', ['id' => $kost->id]) }}" class="primary-btn">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="room-pagination">
                        {{ $data->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rooms Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src=" {{ asset('assets/design/img/footer-logo.png') }} " alt="">
                                </a>
                            </div>
                            <p>Kami bermitra dengan banyak pemilik kost<br />Memudahkan anda mencari kost terbaik untuk anda</p>
                            <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Kontak Kami</h6>
                            <ul>
                                <li081375126253</li>
                                <li>infokost@gmail.com</li>
                                <li>0867625362</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>Alamat</h6>
                            <p>Tanggerang Selatan, Banten</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <ul>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <div class="co-text"><p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Info Kost</p></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{asset('assets/design/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/design/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/design/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/design/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/design/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/design/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('assets/design/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/design/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                minimumResultsForSearch: Infinity // Menonaktifkan kotak pencarian
            });
            $('#services_detail').select2({
                dropdownParent: $('#detailUserModal')
            });
        });
    </script>
</body>

</html>
