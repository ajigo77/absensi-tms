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
    <title>Absensi</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <x-src.link-style></x-src.link-style>
    {{-- Leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
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

        .icn:hover {
            text-decoration: underline;
        }

        .icn:hover span {
            color: #D71313;
        }

        .icn-ic:hover {
            text-decoration: underline;
            color: #00b894;
        }

        .icn-ic:hover span {
            color: #00b894;
        }

        #map {
            width: 100%;
            height: 300px;
        }

        .responsive-text {
            font-size: 16px;
            /* Ukuran default */
        }

        @media (max-width: 768px) {
            .responsive-text {
                /* Ukuran lebih kecil untuk layar kecil */
                font-size: 0.875rem;
            }
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
            <div class="d-flex justify-content-between align-items-center">
                <!-- Form Search -->
                <form action="{{ route('absen') }}" method="GET" class="d-flex px-5"
                    style="flex-grow: 1; margin-right: 15px;">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search"
                        aria-label="Search" value="{{ $request->get('search') }}">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </form>
                <!-- Navbar Toggler-->
                <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler">
                    <i class="bi bi-list fs-3 icon"></i>
                </div>
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
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="fw-bold">Daftar Kehadiran Terbaru</h6>
                <a class="btn btn-danger text-white" href="{{ route('card.shift') }}"><i class="lni lni-plus"></i> Absen
                    Sekarang</a>
            </div>
            <!-- Notifications Area-->
            <div class="notification-area pb-2">
                <div class="list-group">
                    @if ($absens->isEmpty())
                        <div class="d-flex justify-content-center align-items-center"
                            style="min-height: 400px; flex-direction: column;">
                            <img src="{{ asset('image/src/no-data.png') }}" alt="No Data Illustration"
                                class="img-fluid mb-4" style="max-width: 500px; height:auto;">
                            <p class="text-muted fs-5 text-center responsive-text">Sepertinya hari ini tidak ada data
                                absen yang masuk.
                            </p>
                        </div>
                    @else
                        @foreach ($absens as $absen)
                            <div
                                class="list-group-item d-flex flex-column flex-md-row align-items-center p-3 mb-3 rounded">
                                <img src="{{ asset('webcam/' . $absen->foto) }}" alt="Foto Karyawan"
                                    class="rounded mb-3 mb-md-0"
                                    style="width: 200px; height: auto; object-fit: cover; margin-right: 15px; background-repeat: no-repeat;">
                                <div class="noti-info flex-grow-1">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-0 fw-bold text-uppercase">
                                            {{ $absen->member->nama }}
                                        </h5>
                                        <span class="mb-2 text-secondary" style="font-size: 12px;">
                                            {{ \Carbon\Carbon::parse($absen->created_at)->translatedFormat('l, d F Y') }}
                                        </span>
                                    </div>
                                    <h6 class="mb-3">
                                        @if ($absen->status == 'terlambat')
                                            <span class="text-danger text-capitalize fw-bold"
                                                style="font-size: 15px;">
                                                <i class="lni lni-calendar-alt"></i>
                                                {{ $absen->status }}
                                            </span>
                                        @else
                                            <span class="text-success text-capitalize fw-bold"
                                                style="font-size: 15px;">
                                                <i class="lni lni-calendar-alt"></i>
                                                {{ $absen->status }}
                                            </span>
                                        @endif
                                    </h6>
                                    <div class="row row-cols-1 row-cols-md-2 g-2">
                                        <div class="col">
                                            <p class="mb-0 responsive-text">
                                                <span class="mb-2">
                                                    <i class="lni lni-alarm-clock text-primary me-1"></i>
                                                    Jam Absen:
                                                    {{ \Carbon\Carbon::parse($absen->created_at)->format('H:i A') }}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="mb-0 responsive-text">
                                                <span class="mb-2 text-capitalize">
                                                    <i class="bi bi-check-all text-warning"
                                                        style="font-size: 14px;"></i>
                                                    Jenis Absen: {{ $absen->type }}
                                                </span>
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="mb-0 responsive-text">
                                                <a href="#" class="icn" id="mdl"
                                                    data-bs-toggle="modal" data-bs-target="#locationModal"
                                                    data-lat="{{ $absen->lattitude }}"
                                                    data-lon="{{ $absen->longtitude }}">
                                                    <span class="mb-2 text-secondary">
                                                        <i class="bi bi-geo-alt text-danger me-1"></i>Lihat Lokasi
                                                    </span>
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="mb-0 responsive-text">
                                                <a href="#" class="icn-ic" data-bs-toggle="modal"
                                                    data-bs-target="#pictureModal"
                                                    data-src-img="{{ $absen->foto }}">
                                                    <span class="mb-2 text-secondary">
                                                        <i class="bi bi-person-workspace me-1" style="color:#00b894"></i>Lihat Foto
                                                    </span>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- Pagination -->
                <div>
                    {{ $absens->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>

    <!-- Modal untuk foto -->
    <div class="modal fade" id="pictureModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Image inside the modal body -->
                    <img alt="Foto Karyawan" class="img-fluid rounded w-full h-full" id="img-karyawan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk lokasi -->
    <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lokasi Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Menampilkan modal lokasi dari leaflet -->
                    <div id="map"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let map = null;
            const locationModal = document.getElementById('locationModal');
            const btnPicture = document.getElementById('pictureModal');
            document.getElementById('img-karyawan').style.display = 'none';

            locationModal.addEventListener('show.bs.modal', function(event) {
                // Ambil button yang memicu modal
                const button = event.relatedTarget;
                // Ambil data-lat dan data-lon dari button
                const lat = parseFloat(button.getAttribute('data-lat')); // Ambil lat dan konversi ke float
                const lon = parseFloat(button.getAttribute('data-lon')); // Ambil lon dan konversi ke float

                // Panggil fungsi untuk menampilkan peta
                showMap(lat, lon);
            });

            btnPicture.addEventListener('show.bs.modal', function(event) {
                const buttonShowImage = event.relatedTarget;
                const srcImage = buttonShowImage.getAttribute('data-src-img');

                // Jalankan function untuk menampilkan gambar
                showImage(srcImage);
            });

            // Hapus peta ketika modal ditutup
            locationModal.addEventListener('hide.bs.modal', function() {
                if (map !== null) {
                    map.remove(); // Hapus peta saat modal ditutup
                    map = null; // Reset variabel map
                }
            });

            function showMap(lat, lon) {
                const mapDiv = document.getElementById("map");
                mapDiv.style.display = 'block';
                mapDiv.style.borderRadius = '10px';

                // Inisialisasi peta
                map = L.map(mapDiv).setView([lat, lon], 13);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                // Titik koordinat kantor
                const latLokasiKantor = -6.9206016;
                const longLokasiKantor = 107.610112;

                const circle = L.circle([latLokasiKantor, longLokasiKantor], {
                    color: 'red',
                    fillColor: '#f03',
                    fillOpacity: 0.5,
                    radius: 400
                }).addTo(map);

                // Tambahkan marker pada lokasi karyawan
                const marker = L.marker([lat, lon]).addTo(map)
                    .bindPopup('Lokasi Anda').openPopup();

                // Perbarui ukuran peta setelah modal sepenuhnya terbuka
                setTimeout(function() {
                    map.invalidateSize();
                }, 500); // Memberi sedikit delay agar layout modal benar-benar siap
            }

            function showImage(src) {
                // Cari elemen gambar berdasarkan id
                const imgKaryawan = document.getElementById('img-karyawan');

                // Set nilai atribut src dari elemen gambar dengan nilai dari srcImage yang di tangkap src

                imgKaryawan.setAttribute('src', `webcam/${src}`);
                imgKaryawan.style.borderRadius = '10px';
                imgKaryawan.style.display = 'block';
            }
        });
    </script>
    {{-- Component link script --}}
    <x-src.link-script></x-src.link-script>
    <!-- Footer Nav-->
    <x-comp-test.footer></x-comp-test.footer>
</body>

</html>
