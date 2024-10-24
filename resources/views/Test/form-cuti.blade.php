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
    <title>Form Cuti Karyawan</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap">

    {{-- Component Style --}}
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
            <div class="back-button"><a href="{{ route('notif.cuti') }}">
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
        <div class="container py-5">
            <div class="text-center">
                <div class="d-flex justify-content-center align-items-center mb-2">
                    <h2 class="h2 fw-bold text-dark">Form Pengajuan Cuti Tahunan</h2>
                </div>
                <p class="text-muted">Silakan isi form di bawah ini untuk mengambil hari cutimu!</p>
            </div>

            <form action="{{ route('post.cuti') }}" method="POST" class="mx-auto mt-5" style="max-width: 600px;">
                @csrf
                <div class="row g-2">
                    <!-- Informasi Karyawan -->
                    <input type="text" hidden name="user_id" value="{{ Auth::user()->id_user }}">
                    <div class="col-sm-6">
                        <label for="nama" class="form-label fw-semibold">Nama Karyawan <span
                                class="text-danger">*</span></label>
                        <input type="text" id="nama" name="nama_karyawan" value="{{ Auth::user()->Member->nama }}"
                            class="form-control" readonly>
                        {{-- @error('nama_karyawan')
                            <small class="text-danger" style="font-style: italic">{{ $message }}</small>
                        @enderror --}}
                    </div>

                    <div class="col-sm-6">
                        <label for="divisi" class="form-label fw-semibold">
                            Divisi <span class="text-danger">*</span>
                        </label>
                        <input type="text" id="divisi" name="divisi" value="{{ Auth::user()->Devisi->nama }}"
                            class="form-control" readonly>
                        {{-- @error('divisi')
                            <small class="text-danger" style="font-style: italic">{{ $message }}</small>
                        @enderror --}}
                    </div>

                    <div class="col-sm-12">
                        <label for="jabatan" class="form-label fw-semibold">Jabatan <span
                                class="text-danger">*</span></label>
                        <input type="text" id="jabatan" name="jabatan" value="{{ Auth::user()->Jabatan->nama }}"
                            class="form-control" readonly>
                        {{-- @error('jabatan')
                            <small class="text-danger" style="font-style: italic">{{ $message }}</small>
                        @enderror --}}
                    </div>

                    <!-- Detail Izin -->
                    <div class="col-sm-12">
                        <label for="tanggal_cuti" class="form-label fw-semibold">Dari tanggal <span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tanggal_cuti" name="dari_tanggal"
                            value="{{ old('dari_tanggal') }}">
                        @error('dari_tanggal')
                            <small class="text-danger" style="font-style: italic">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-12">
                        <label for="tanggal_cuti" class="form-label fw-semibold">Sampai tanggal <span
                                class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tanggal_cuti" name="sampai_tanggal"
                            value="{{ old('sampai_tanggal') }}">
                        @error('sampai_tanggal')
                            <small class="text-danger" style="font-style: italic">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Alasan -->
                    <div class="col-sm-12">
                        <label for="alasan" class="form-label fw-semibold">Alasan <span
                                class="text-danger">*</span></label>
                        <textarea id="alasan" name="alasan" rows="5" class="form-control"
                            placeholder="Masukkan alasan atau izin">{{ old('alasan') }}</textarea>
                        @error('alasan')
                            <small class="text-danger" style="font-style: italic">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-danger w-100 p-3">Kirim</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Component Script --}}
    <x-src.link-script></x-src.link-script>

    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Footer Nav-->
    <x-comp-test.footer></x-comp-test.footer>

    @if ($pesan_error = Session::get('error'))
        <script>
            Swal.fire({
                title: "Oops!",
                text: "{{ $pesan_error }}",
                icon: "error"
            });
        </script>
    @endif
</body>

</html>
