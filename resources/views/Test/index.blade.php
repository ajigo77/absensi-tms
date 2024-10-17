<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#100DD1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Beranda</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap">
    {{-- Component link style --}}
    <x-src.link-style></x-src.link-style>
    <style>
        body.shimeji-pinned iframe {
            pointer-events: none;
        }

        body.shimeji-select-ie {
            cursor: cell !important;
        }

        #shimeji-contextMenu::-webkit-scrollbar {
            width: 6px;
        }

        #shimeji-contextMenu::-webkit-scrollbar-thumb {
            background-color: rgba(30, 30, 30, 0.6);
            border-radius: 3px;
        }

        #shimeji-contextMenu::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
        .flex-wrap .icon {
            transition: .3s;
        }
        .flex-wrap .icon:hover {
            color:rgba(0, 0, 0, 0.6);
        }
    </style>
    <meta name="shimejiBrowserExtensionId" content="gohjpllcolmccldfdggmamodembldgpc" data-version="2.0.5">
    {{-- @vite('resources/css/app.css') --}}
</head>

<body>
    <!-- Preloader-->

    <!-- Header Area-->
    <div class="header-area" id="headerArea">
        <div class="container h-100 d-flex align-items-center justify-content-between">
            <!-- Logo Wrapper-->
            <div class="logo-wrapper">
                <a href="{{ route('hero') }}" class="text-decoration-none text-dark fw-bold">
                    <img src="{{ asset('logo-company/tms.png') }}" alt="" width="40" height="40">
                    <span class="fs-6 fw-semibold">PT. Tecnology Multi System</span>
                </a>
            </div>


            <!-- Search Form-->
            {{-- <div class="top-search-form">
          <form action="" method="">
            <input class="form-control" type="search" placeholder="Enter your keyword">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div> --}}

            <!-- Navbar Toggler-->
            <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler">
                <i class="bi bi-list fs-3 icon"></i>
            </div>
        </div>
    </div>
    {{-- Component sidebar --}}
    <x-comp-test.sidebar></x-comp-test.sidebar>

    <!-- PWA Install Alert-->
    {{-- <div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true"
        data-bs-delay="5000" data-bs-autohide="true">
        <div class="toast-body">
            <div class="content d-flex align-items-center mb-2"><img
                    src="https://sixghakreasi.com/demos/attd_mobile/assets/mobile/img/icons/icon-72x72.png"
                    alt="">
                <h6 class="mb-0">Selamat Datang Kembali...</h6>
                <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
            </div><span class="mb-0 d-block">Silahkan pilih menu tersedia untuk melihat dan mengelola konten</span>
        </div>
    </div> --}}
    <div class="page-content-wrapper">
        <div class="container">
            <div class="pt-3">
                <!-- Hero Slides-->
                <div class="hero-slides owl-carousel owl-loaded owl-drag">
                    <!-- Single Hero Slide-->

                    <!-- Single Hero Slide-->

                    <!-- Single Hero Slide-->

                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transition: all; width: 2982px; transform: translate3d(-1278px, 0px, 0px);">
                            <div class="owl-item cloned" style="width: 426px;">
                                <div class="single-hero-slide"
                                    style="background-image: url('https://sixghakreasi.com/demos/attd_mobile/assets/mobile/img/bg-img/2.jpg')">
                                    <div class="slide-content h-100 d-flex align-items-center">
                                        <div class="slide-text">
                                            <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                                data-duration="1000ms"
                                                style="animation-delay: 100ms; animation-duration: 1000ms; opacity: 0;">
                                                “Don’t Let Yesterday Take Up Too Much of Today.” </h4>
                                            <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                                data-duration="1000ms"
                                                style="animation-delay: 400ms; animation-duration: 1000ms; opacity: 0;">
                                                – Will Rogers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 426px;">
                                <div class="single-hero-slide"
                                    style="background-image: url('https://sixghakreasi.com/demos/attd_mobile/assets/mobile/img/bg-img/3.jpg')">
                                    <div class="slide-content h-100 d-flex align-items-center">
                                        <div class="slide-text">
                                            <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                                data-duration="1000ms"
                                                style="animation-delay: 100ms; animation-duration: 1000ms; opacity: 0;">
                                                “Do or do not. There is no try.”</h4>
                                            <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                                data-duration="1000ms"
                                                style="animation-delay: 400ms; animation-duration: 1000ms; opacity: 0;">
                                                ~ Yoda</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 426px;">
                                <div class="single-hero-slide"
                                    style="background-image: url('https://sixghakreasi.com/demos/attd_mobile/assets/mobile/img/bg-img/1.jpg')">
                                    <div class="slide-content h-100 d-flex align-items-center">
                                        <div class="slide-text">
                                            <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                                data-duration="1000ms"
                                                style="animation-delay: 100ms; animation-duration: 1000ms; opacity: 0;">
                                                “Attend today, and achieve tomorrow.”</h4>
                                            <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                                data-duration="1000ms"
                                                style="animation-delay: 400ms; animation-duration: 1000ms; opacity: 0;">
                                                ~ Sigit</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item active center" style="width: 426px;">
                                <div class="single-hero-slide"
                                    style="background-image: url('https://sixghakreasi.com/demos/attd_mobile/assets/mobile/img/bg-img/2.jpg')">
                                    <div class="slide-content h-100 d-flex align-items-center">
                                        <div class="slide-text">
                                            <h4 class="text-white mb-0 animated fadeInUp" data-animation="fadeInUp"
                                                data-delay="100ms" data-duration="1000ms"
                                                style="animation-delay: 100ms; animation-duration: 1000ms; opacity: 1;">
                                                “Don’t Let Yesterday Take Up Too Much of Today.” </h4>
                                            <p class="text-white animated fadeInUp" data-animation="fadeInUp"
                                                data-delay="400ms" data-duration="1000ms"
                                                style="animation-delay: 400ms; animation-duration: 1000ms; opacity: 1;">
                                                – Will Rogers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item" style="width: 426px;">
                                <div class="single-hero-slide"
                                    style="background-image: url('https://sixghakreasi.com/demos/attd_mobile/assets/mobile/img/bg-img/3.jpg')">
                                    <div class="slide-content h-100 d-flex align-items-center">
                                        <div class="slide-text">
                                            <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                                data-duration="1000ms"
                                                style="animation-delay: 100ms; animation-duration: 1000ms; opacity: 0;">
                                                “Do or do not. There is no try.”</h4>
                                            <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                                data-duration="1000ms"
                                                style="animation-delay: 400ms; animation-duration: 1000ms; opacity: 0;">
                                                ~ Yoda</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 426px;">
                                <div class="single-hero-slide"
                                    style="background-image: url('https://sixghakreasi.com/demos/attd_mobile/assets/mobile/img/bg-img/1.jpg')">
                                    <div class="slide-content h-100 d-flex align-items-center">
                                        <div class="slide-text">
                                            <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                                data-duration="1000ms"
                                                style="animation-delay: 100ms; animation-duration: 1000ms; opacity: 0;">
                                                “Attend today, and achieve tomorrow.”</h4>
                                            <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                                data-duration="1000ms"
                                                style="animation-delay: 400ms; animation-duration: 1000ms; opacity: 0;">
                                                ~ Sigit</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 426px;">
                                <div class="single-hero-slide"
                                    style="background-image: url('https://sixghakreasi.com/demos/attd_mobile/assets/mobile/img/bg-img/2.jpg')">
                                    <div class="slide-content h-100 d-flex align-items-center">
                                        <div class="slide-text">
                                            <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms"
                                                data-duration="1000ms"
                                                style="animation-delay: 100ms; animation-duration: 1000ms; opacity: 0;">
                                                “Don’t Let Yesterday Take Up Too Much of Today.” </h4>
                                            <p class="text-white" data-animation="fadeInUp" data-delay="400ms"
                                                data-duration="1000ms"
                                                style="animation-delay: 400ms; animation-duration: 1000ms; opacity: 0;">
                                                – Will Rogers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-nav disabled">
                        <div class="owl-prev">prev</div>
                        <div class="owl-next">next</div>
                    </div>
                    <div class="owl-dots">
                        <div class="owl-dot"><span></span></div>
                        <div class="owl-dot active"><span></span></div>
                        <div class="owl-dot"><span></span></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Catagories-->
        <div class="product-catagories-wrapper py-3">
            <div class="container">
                <div class="section-heading">
                    <h6>Menu</h6>
                </div>
                <div class="product-catagory-wrap">
                    <div class="row g-3">
                        <!-- Single Catagory Card-->
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body">
                                    <a class="text-danger" href="{{ route('absen') }}">
                                        <i class="bi bi-calendar-check text-primary"></i>
                                        <span>Absensi</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Catagory Card-->
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body">
                                    <a href="{{ route('notif.cuti') }}">
                                        <i class="bi bi-file-earmark-check"></i>
                                        <span>Cuti</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Catagory Card-->
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body">
                                    <a class="text-warning" href="{{ route('notif.izin') }}">
                                        <i class="bi bi-file-earmark-check-fill text-success"></i>
                                        <span>Izin</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Catagory Card-->
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body">
                                    <a class="text-success" href="http://127.0.0.1:8000/admin">
                                        <i class="bi bi-speedometer text-warning"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Component link script --}}
    <x-src.link-script></x-src.link-script>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
        <div class="container h-100 px-0">
            <div class="suha-footer-nav h-100">
                <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                    <li class="active"><a href="https://sixghakreasi.com/demos/attd_mobile/"><i
                                class="lni lni-home"></i>Beranda</a></li>
                    <li><a href="https://sixghakreasi.com/demos/attd_mobile/setting/get_help"><i
                                class="lni lni-life-ring"></i>Dukungan</a></li>
                    <li><a href="https://sixghakreasi.com/demos/attd_mobile/setting"><i
                                class="lni lni-cog"></i>Pengaturan</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- All JavaScript Files-->
    <div id="shimeji-workArea"
        style="position: fixed; background: transparent; z-index: 2147483643; width: 100vw; height: 100vh; left: 0px; top: 0px; transform: translate(0px, 0px); pointer-events: none;">
    </div>
</body>

</html>
