<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Info Kost</title>

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
</head>

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
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <a href="#" class="bk-btn">Booking Now</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('kost') }}l">Kost</a></li>
                <li><a href="./contact.html">Kontak Kami</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i>081375126253</li>
            <li><i class="fa fa-envelope"></i> infokost@gmail.com</li>
        </ul>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i>081375126253</li>
                            <li><i class="fa fa-envelope"></i> infokost@gmail.com</li>
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
                                <img src="{{ asset('assets/design/img/logo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="{{ route('kost') }}">Kost</a></li>
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

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1 style="color: #FFFFFF; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">INFO KOST</h1>
                        <p style="color: #FFFFFF; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">Info kost adalah platform web pencarian kamar kost terbaik bagi anda kami bekerja sama dengan banyak pemilik kost guna memudahkan anda dalam mencari kamar kost terbaik.</p>
                        <a href="#" class="primary-btn" style="color: #FFFFFF; text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);">CARI SEKARANG JUGA!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{ asset('assets/design/img/hero/kost4.jpg') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('assets/design/img/hero/kost5.webp') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('assets/design/img/hero/kost3.jpg') }}"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>Tentang Kami</span>
                            <h2>Solusi Terbaik<br />INFO KOST</h2>
                        </div>
                        <p class="f-para">Visi kami adalah menjadi solusi terbaik bagi siapa saja yang mencari tempat tinggal yang nyaman dan terjangkau. Misi kami adalah menghubungkan penyedia kost dengan pencari kost secara efektif dan efisien.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src=" {{ asset('assets/design/img/about/kost6.jpg') }} " alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src=" {{ asset('assets/design/img/about/kost7.jpg') }} " alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

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
</body>

</html>
