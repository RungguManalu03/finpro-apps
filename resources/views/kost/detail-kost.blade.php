<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona | Template</title>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        @if (Auth::check())
        <div class="nav-right" style="position: relative;">
            <figure style="--width: 50; --height: 50; border-radius: 50%; margin: 0; cursor: pointer;" onclick="toggleDropdownM()">
                <img src="{{ asset('assets/' . (Auth::user()->gambar ?? 'images/default.jpg')) }}" width="50" height="50" loading="lazy" alt="The beginners guide to Henna Brows in Brisbane" style="object-fit: cover; border-radius: 50%;">
            </figure>
            <div id="profileDropdownM" style="display: none; position: absolute; top: 100%; right: 0; background-color: white; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); z-index: 1000;">
                <a href="{{ route('profil', ['id' => Auth::user()->id]) }}" style="display: flex; align-items: center; padding: 10px; text-decoration: none; color: black;">
                    <i class="fas fa-user" style="margin-right: 8px;"></i> Profil
                </a>
                <a href="{{ route('logout') }}" style="display: flex; align-items: center; padding: 10px; text-decoration: none; color: black;">
                    <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i> Logout
                </a>
            </div>
        </div>
        @endif
        @if (!Auth::check())
        <div class="header-configure-area">
            <a href="{{ route('login') }}" class="bk-btn">Login</a>
        </div>
        @endif
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('kost') }}">Kost</a></li>
                <li><a href="{{ route('contact') }}">Kontak Kami</a></li>
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
                        @if (Auth::check())
                            <a href="{{ route('logout') }}" class="bk-btn">Logout</a>
                        @else
                            <a href="{{ route('login') }}" class="bk-btn">Login</a>
                        @endif
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
                                    <li><a href="{{ route('contact') }}">Kontak Kami</a></li>
                                </ul>
                            </nav>
                            @if (Auth::check())
                            <div class="nav-right" style="position: relative;">
                                <figure style="--width: 50; --height: 50; border-radius: 50%; margin: 0; cursor: pointer;" onclick="toggleDropdown()">
                                    <img src="{{ asset('assets/' . (Auth::user()->gambar ?? 'images/default.jpg')) }}" width="50" height="50" loading="lazy" alt="The beginners guide to Henna Brows in Brisbane" style="object-fit: cover; border-radius: 50%;">
                                </figure>
                                <div id="profileDropdown" style="display: none; position: absolute; top: 100%; right: 0; background-color: white; border: 1px solid #ccc; border-radius: 5px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); z-index: 1000;">
                                    <a href="{{ route('profil', ['id' => Auth::user()->id]) }}" style="display: flex; align-items: center; padding: 10px; text-decoration: none; color: black;">
                                        <i class="fas fa-user" style="margin-right: 8px;"></i> Profil
                                    </a>
                                    <a href="{{ route('logout') }}" style="display: flex; align-items: center; padding: 10px; text-decoration: none; color: black;">
                                        <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i> Logout
                                    </a>
                                </div>
                            </div>
                            @endif
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
                        <h2>Detail Kost</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="room-details-item">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('storage/' . $kost->foto_kost) }}" alt="{{ $kost->nama_kost }}">
                        </div>
                        <div class="rd-text">
                            <div class="rd-title">
                                <h3>{{ $kost->nama_kost }}</h3>
                                <div class="rdt-right">
                                    <a href="#">Kirim Bukti Pembayaran</a>
                                </div>
                            </div>
                            <h2 style="font-size: 30px;">Rp.{{ number_format($kost->harga, 0, ',', '.') }}<span>/Bulan</span></h2>
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
                            <p class="f-para">{!! $kost->deskripsi !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Room Details Section End -->

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
    <script>
         function toggleDropdown() {
            var dropdown = document.getElementById('profileDropdown');
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
        }

        window.onclick = function(event) {
            if (!event.target.matches('figure, figure *')) {
                var dropdown = document.getElementById('profileDropdown');
                if (dropdown.style.display === 'block') {
                    dropdown.style.display = 'none';
                }
            }
        }

        function toggleDropdownM() {
            var dropdown = document.getElementById('profileDropdownM');
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
        }

        window.onclick = function(event) {
            if (!event.target.matches('figure, figure *')) {
                var dropdown = document.getElementById('profileDropdownM');
                if (dropdown.style.display === 'block') {
                    dropdown.style.display = 'none';
                }
            }
        }
    </script>
</body>

</html>
