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
    <!-- The above tags *must* come first in the head, any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Halaman Absen</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap">

    {{-- Component style --}}
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
            <div class="back-button">
                <a href="{{ route('absen') }}">
                    <svg class="bi bi-arrow-left" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z">
                        </path>
                    </svg>
                </a>
            </div>

            <!-- Navbar Toggler-->
            <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler">
                <i class="bi bi-list fs-3 icon"></i>
            </div>
        </div>
    </div>
    {{-- Component sidebar --}}
    <x-comp-test.sidebar></x-comp-test.sidebar>

    <div class="page-content-wrapper">
        <div class="container">
            <div class="product-catagories-wrapper py-3">
                <div class="container">
                    <div class="row">
                        @foreach ($cards as $card)
                            <div class="col-lg-3 col-md-6 mb-4">
                                <!-- 4 kolom di layar besar, 2 kolom di layar sedang dan kecil -->
                                <div class="card shadow-sm border rounded-lg">
                                    <div class="card-body">
                                        <h5 class="card-title mb-2 text-capitalize">
                                            <i class="bi bi-activity fw-bold fs-5 text-success"></i>
                                            Shift {{ $card->name }}
                                        </h5>

                                        {{-- Copywriting Absen Berdasarkan Waktu --}}
                                        @if ($card->name == 'pagi')
                                            <p class="card-text text-muted">
                                                Jangan lupa absen pagi! Dari pukul
                                                {{ \Carbon\Carbon::parse($card->start_time)->format('H:i') }} hingga
                                                pukul {{ \Carbon\Carbon::parse($card->end_time)->format('H:i') }}.
                                            </p>
                                        @elseif($card->name == 'sore')
                                            <p class="card-text text-muted">
                                                Jangan lupa absen sore! Dari pukul
                                                {{ \Carbon\Carbon::parse($card->start_time)->format('H:i') }} hingga
                                                pukul {{ \Carbon\Carbon::parse($card->end_time)->format('H:i') }}.
                                            </p>
                                        @endif

                                        {{-- Kondisi Tombol Berdasarkan Status --}}
                                        @if ($card->belum_absen)
                                            <!-- Jika belum waktunya absen -->
                                            <span class="d-block mt-4 btn btn-secondary disabled text-center">
                                                Belum bisa absen
                                            </span>
                                        @elseif ($card->bisa_absen)
                                            <!-- Jika masih dalam periode absen -->
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-danger d-block w-100 text-center text-white mt-4 button-link dropdown-toggle"
                                                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Pilih Jenis Absen
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('webcamp.absen', [$card->id, 'masuk']) }}">
                                                            <i class="bi bi-box-arrow-right text-success me-2"></i>Masuk
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item"
                                                            href="{{ route('webcamp.absen', [$card->id, 'keluar']) }}">
                                                            <i class="bi bi-box-arrow-left text-danger me-2"></i>Keluar
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            {{-- <a class="btn btn-danger d-block w-100 text-center mt-4 button-link"
                                                href="{{ route('webcamp.absen') }}">
                                            </a> --}}
                                        @else
                                            <!-- Jika waktu absen sudah berakhir -->
                                            <span class="d-block mt-4 btn btn-secondary disabled text-center">
                                                Waktu absensi telah berakhir
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($pesan_info = Session::get('info'))
        <div class="toast pwa-install-alert shadow bg-white" role="alert" aria-live="assertive" aria-atomic="true"
            data-bs-delay="5000" data-bs-autohide="true">
            <div class="toast-body">
                <div class="content d-flex align-items-center mb-2 justify-content-center">
                    <i class="bi bi-info-circle-fill text-primary fs-5 me-2"></i>
                    <h6 class="mb-0">Oopss!</h6>
                    <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div><span class="mb-0 d-block">{{ $pesan_info }}</span>
            </div>
        </div>
    @endif
    {{-- Component Script --}}
    <x-src.link-script></x-src.link-script>

    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <x-comp-test.footer></x-comp-test.footer>
</body>

</html>
