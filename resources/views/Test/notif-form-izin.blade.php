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
    <title>Form Izin Karyawan</title>
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
                <a class="btn btn-success text-white" href="{{ route('izin.karyawan') }}">
                    <i class="lni lni-plus"></i>
                    Buat Baru
                </a>
            </div>
            <!-- Notifications Area-->
            <div class="pb-2">
                <div class="list-group">
                    @if ($notificationIzin->isEmpty())
                        <div class="d-flex justify-content-center align-items-center"
                            style="min-height: 400px; flex-direction: column;">
                            <img src="{{ asset('image/src/no-data.png') }}" alt="No Data Illustration"
                                class="img-fluid mb-4" style="max-width: 500px; height:auto;">
                            <p class="text-muted fs-5 text-center responsive-text">Sepertinya tidak ada data
                                pengajuan izin untuk saat ini.
                            </p>
                        </div>
                    @else
                        @foreach ($notificationIzin as $data_izin)
                            <div class="list-group-item d-flex py-4 mb-2"
                                style="border: 2px solid rgb(76, 75, 75); border-radius:8px;">
                                <!-- Icon Notifikasi -->
                                <span class="noti-icon me-3 p-3">
                                    <img src="{{ asset('image/src/icon-notif.png') }}" alt="Icon Nofif" width="80"
                                        height="auto">
                                </span>
                                <!-- Informasi -->
                                <div class="noti-info d-flex justify-content-between align-items-center w-100">
                                    <div class="text-info">
                                        <h6 class="mb-1 text-secondary text-capitalize fw-bold fs-5">
                                            {{ $data_izin->nama_karyawan }}</h6>
                                        <p class="mb-1">
                                            <span>
                                                <i class="bi bi-people-fill me-2 text-secondary"
                                                    style="font-size: 10px;"></i>
                                                Divisi : {{ $data_izin->divisi }}
                                            </span><br>
                                            <span>
                                                <i class="bi bi-briefcase-fill me-2 text-warning"
                                                    style="font-size: 10px;"></i>
                                                Jabatan : {{ $data_izin->jabatan }}
                                            </span><br>
                                            <span>
                                                <i class="bi bi-door-closed-fill me-2 text-danger"
                                                    style="font-size: 10px;"></i>
                                                Jenis : {{ $data_izin->jenis_izin }}
                                            </span><br>
                                            <span>
                                                <i class="bi bi-calendar-date-fill me-2 text-success"
                                                    style="font-size: 10px;"></i>
                                                Tanggal :
                                                {{ \Carbon\Carbon::parse($data_izin->dari_tanggal)->translatedFormat('d F Y') }}
                                            </span> -
                                            <span>
                                                {{ \Carbon\Carbon::parse($data_izin->sampai_tanggal)->translatedFormat('d F Y') }}
                                            </span>
                                        </p>
                                    </div>
                                    @if ($data_izin->approved == 'disetujui')
                                        <span class="btn btn-sm btn-success text-white text-capitalize"
                                            style="margin-left: auto;">
                                            {{ $data_izin->approved }}
                                        </span>
                                    @elseif($data_izin->approved == 'ditolak')
                                        <span class="btn btn-sm btn-danger text-white text-capitalize"
                                            style="margin-left: auto;">
                                            {{ $data_izin->approved }}
                                        </span>
                                    @else
                                        <span class="btn btn-sm btn-warning text-white text-capitalize"
                                            style="margin-left: auto;">
                                            {{ $data_izin->approved }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- Pagination -->
                <div>
                    {{ $notificationIzin->links('pagination::bootstrap-5') }}
                </div>
            </div>

            {{-- Filter Data --}}
            <div class="mt-5">
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-funnel-fill"></i>
                        Filter
                    </div>
                    <div class="card-body">
                        <form action="{{ route('post.search.izin') }}" method="POST">
                            @csrf
                            {{-- <div class="row">
                                <!-- Filter by Type -->
                                <div class="col-md-4 mb-3">
                                    <label for="filterType" class="form-label">Type</label>
                                    <select class="form-select" id="filterType" name="type">
                                        <option value="">Pilih</option>
                                        @foreach ($jenis_izin_karyawan as $data)
                                        <option value="{{ $data->nama }}">
                                            {{ $data->nama }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Filter by Name -->
                                <div class="col-md-4 mb-3">
                                    <label for="filterName" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="filterName"
                                        placeholder="Cari nama" name="nama_karyawan">
                                </div>
                            </div> --}}

                            <div class="row">
                                <!-- Filter by Status -->
                                <div class="col-md-6 mb-3">
                                    <label for="filterStatus" class="form-label">Status</label>
                                    <select class="form-select" id="filterStatus" name="approved">
                                        <option value="">Pilih</option>
                                        <option value="disetujui" class="text-capitalize">setujui</option>
                                        <option value="ditolak" class="text-capitalize">tolak</option>
                                        <option value="pending" class="text-capitalize">pending</option>
                                    </select>
                                </div>
                                <!-- Filter by to day -->
                                <div class="col-md-6 mb-3">
                                    <label for="filterStatus" class="form-label">Hari ini</label>
                                    <input type="date" class="form-control" id="filterName" name="created_at">
                                </div>
                                <!-- Filter by Date Range -->
                                <div class="col-md-6 mb-3">
                                    <label for="filterDateRange" class="form-label">Rentang tanggal</label>
                                    <div class="d-flex align-items-center">
                                        <input type="date" class="form-control" id="startDate"
                                            name="dari_tanggal">
                                        <span class="mx-3 text-secondary fw-bold">-</span>
                                        <input type="date" class="form-control" id="endDate"
                                            name="sampai_tanggal">
                                    </div>
                                </div>
                                {{-- <!-- Filter by Time -->
                                <div class="col-md-6 mb-3">
                                    <label for="filterTime" class="form-label">Waktu pulang</label>
                                    <input type="time" class="form-control" id="filterTime"
                                        name="jam_pulang_awal">
                                </div> --}}
                            </div>
                            <!-- Filter Button -->
                            <div class="d-grid gap-2 d-md-block text-end">
                                <button type="submit"
                                    class="btn btn-success text-white outline-none border-none">Terapkan</button>
                                <button type="reset"
                                    class="btn btn-primary text-white outline-none border-none">Reset</button>
                            </div>
                        </form>
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
