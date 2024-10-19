<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
    <meta name="description" content="Suha - Multipurpose Ecommerce Mobile HTML Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#e1f0ff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>Form Cuti Karyawan</title>
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

        .notification-area {
            background-color: #f5faff;
            padding: 20px;
            border-radius: 8px;
        }

        .noti-icon i {
            font-size: 24px;
            color: #e74c3c;
        }

        .noti-info {
            flex-wrap: wrap;
        }

        .noti-info .text-info {
            flex-grow: 1;
            min-width: 0;
            max-width: 100%;
        }

        @media (max-width: 768px) {
            .noti-info .text-info h6 {
                font-size: 16px;
            }

            .noti-info .text-info p {
                font-size: 14px;
            }

            .btn-sm {
                font-size: 12px;
                padding: 0.4rem 0.6rem;
            }
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
                <h6>Daftar pengajuan cuti karyawan</h6>
                <a class="btn btn-success text-white border-none outline-none" href="{{ route('cuti.karyawan') }}">
                    <i class="lni lni-plus"></i>
                    Buat Baru
                </a>
            </div>
            <!-- Notifications Area-->
            <div class="pb-2">
                <div class="list-group">
                    <div class="list-group-item d-flex align-items-center py-4" style="border: 2px solid rgb(76, 75, 75); border-radius:8px;">
                        <!-- Icon Notifikasi -->
                        <span class="noti-icon me-3 p-3">
                            <i class="bi bi-bell-fill" style="font-size: 30px;"></i>
                        </span>
                        <!-- Informasi -->
                        <div class="noti-info d-flex justify-content-between align-items-center w-100">
                            <div class="text-info">
                                <h6 class="mb-1">CTI/2/20241015082406</h6>
                                <p class="mb-1">
                                    <span class="text-primary">Nama: Budi Santoso</span><br>
                                    <span>Divisi: Teknologi Informasi</span><br>
                                    <span>Jabatan: Manager</span><br>
                                    <span>Jenis Izin: Anak Khitan / Babtis</span><br>
                                    <span>Awal Izin: 15 October 2024</span> -
                                    <span>Akhir Izin: 15 October 2024</span>
                                </p>
                            </div>
                            <span class="btn btn-sm btn-warning text-white" style="margin-left: auto;">
                                Pending
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Components Script --}}
    <x-src.link-script></x-src.link-script>

    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <x-comp-test.footer></x-comp-test.footer>
    @if ($pesan_success = Session::get('success'))
        <script>
            Swal.fire({
                title: "Berhasil",
                text: "{{ $pesan_success }}",
                icon: "success"
            });
        </script>
    @endif
</body>

</html>
