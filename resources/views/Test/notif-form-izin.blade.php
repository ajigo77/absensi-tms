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
    <title>Notification Form Karyawan</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap">

    <!-- Component style -->
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
    </style>
    <meta name="shimejiBrowserExtensionId" content="gohjpllcolmccldfdggmamodembldgpc" data-version="2.0.5">
</head>

<body>
    <!-- Preloader-->

    <!-- Header Area-->
    <div class="header-area" id="headerArea">
        <div class="container h-100 d-flex align-items-center justify-content-between">
            <!-- Logo Wrapper-->
            <div class="back-button"><a href="{{ route('index') }}">
                    <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z">
                        </path>
                    </svg></a></div>

            <!-- Search Form-->
            <!--<div class="top-search-form">
          <form action="" method="">
            <input class="form-control" type="search" placeholder="Enter your keyword">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>-->

            <!-- Navbar Toggler-->
            <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler">
                <i class="bi bi-list fs-3 icon"></i>
            </div>
        </div>
    </div>
    {{-- Component sidebar --}}
    <x-comp-test.sidebar></x-comp-test.sidebar>
    
    <!-- PWA Install Alert-->
    <!--<div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
      <div class="toast-body">
        <div class="content d-flex align-items-center mb-2"><img src="https://sixghakreasi.com/demos/attd_mobile/assets/mobile/img/icons/icon-72x72.png" alt="">
          <h6 class="mb-0">Selamat Datang Kembali...</h6>
          <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
        </div><span class="mb-0 d-block">Silahkan pilih menu tersedia untuk melihat dan mengelola konten</span>
      </div>
    </div>-->
    <div class="page-content-wrapper">
        <div class="container">
            <!-- Section Heading-->
            <div class="section-heading d-flex align-items-center pt-3 justify-content-between">
                <h6>Daftar pengajuan izin karyawan</h6>
                <a class="btn btn-success" href="{{ route('izin.karyawan') }}"><i class="lni lni-plus"></i> Buat Baru</a>
            </div>
            <!-- Notifications Area-->
            <div class="notification-area pb-2">
                <div class="list-group">
                    <a class="list-group-item d-flex align-items-center"
                        href="https://www.sixghakreasi.com/demos/attd_mobile/leave/detail/5">
                        <span class="noti-icon"><i class="lni lni-alarm"></i></span>
                        <div class="noti-info"
                            style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                            <div>
                                <h6 class="mb-0">CTI/2/20241015082406</h6>
                                <span class="text-primary">Anak khitan / Babtis</span>
                                <span>15 October 2024 - 15 October 2024</span>
                            </div>
                            <span class="btn btn-sm btn-danger text-white" style="margin-left: auto;">Lihat
                                Detail</span>
                        </div>
                    </a>
                </div>
                <div class="pagination-container">
                </div>
            </div>
        </div>
    </div>
    {{-- Components Script --}}
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
