<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Absensi</title>
    <x-link-cdn></x-link-cdn>
    @vite('resources/css/app.css')
</head>

<body class="font-sans">
    <div class="wrapper">
        {{-- Navbar --}}
        <x-navbar.navbar></x-navbar.navbar>

        <!-- Main Content -->
        <div class="flex items-center justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl w-full p-4 mt-16">
                <!-- Responsive Grid for Shift Cards -->
                @foreach ($cards as $card)
                    <div
                        class="relative flex flex-col bg-white-100 shadow-md border border-slate-200 rounded-lg p-4 hover:border-2 hover:border-red-200 transition-all hover:cursor-pointer">
                        <!-- Card content -->
                        <h5 class="mb-2 text-slate-800 text-lg lg:text-xl font-semibold text-capitalize">
                            {{ $card->name }}
                        </h5>
                        <p class="text-slate-600 leading-normal font-light text-sm lg:text-base">
                            Dari pukul {{ $card->start_time }} hingga pukul {{ $card->end_time }}.
                        </p>
                        <a class="block mt-4 rounded-md bg-red-500 py-2 px-4 text-sm text-white hover:bg-red-600 transition-all text-center"
                            href="{{ route('absensi.karyawan') }}">
                            Pilih {{ $card->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Employee Leave and Permit Cards Section -->
        <div class="flex items-center justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-7xl w-full p-4">
                <!-- Kartu untuk Surat Izin Karyawan -->
                <div class="relative flex flex-col bg-white-100 shadow-md border border-slate-200 rounded-lg p-4 hover:border-2 hover:border-red-200 transition-all">
                    <div class="border-b border-slate-200 pb-2 mb-3">
                        <span class="text-sm text-red-500 font-medium">
                            Surat Izin Karyawan
                        </span>
                    </div>
                    <div class="p-2">
                        <h5 class="mb-2 text-slate-800 text-lg lg:text-xl font-semibold">
                            Ajukan Izin Kerja Anda dengan Cepat dan Mudah
                        </h5>
                        <p class="text-slate-600 leading-normal font-light text-sm lg:text-base">
                            Kelola kebutuhan izin kerja Anda tanpa repot. Ajukan permohonan secara online dan dapatkan persetujuan dari atasan dengan proses yang efisien dan transparan.
                        </p>
                        <a href="{{ route('izin.karyawan') }}"
                            class="text-slate-800 font-semibold text-sm hover:underline hover:text-red-500 flex items-center mt-2">
                            Ajukan izin sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Kartu untuk Cuti Tahunan Karyawan -->
                <div class="relative flex flex-col bg-white shadow-md border border-slate-200 rounded-lg p-4 hover:border-2 hover:border-red-200 transition-all">
                    <div class="border-b border-slate-200 pb-2 mb-3">
                        <span class="text-sm text-red-500 font-medium">
                            Cuti Tahunan Karyawan
                        </span>
                    </div>
                    <div class="p-2">
                        <h5 class="mb-2 text-slate-800 text-lg lg:text-xl font-semibold">
                            Nikmati Waktu Istirahat Anda, Urus Cuti dengan Mudah
                        </h5>
                        <p class="text-slate-600 leading-normal font-light text-sm lg:text-base">
                            Ajukan cuti tahunan Anda secara online. Proses cepat, transparan, dan mudah untuk membantu Anda menikmati waktu bersama keluarga atau sekedar rehat sejenak.
                        </p>
                        <a href="{{ route('cuti.karyawan') }}"
                            class="text-slate-800 font-semibold text-sm hover:underline hover:text-red-500 flex items-center mt-2">
                            Ajukan cuti sekarang
                            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Footer --}}
    <x-dashboard.footer></x-dashboard.footer>
    @if ($success_izin_karyawan = Session::get('success'))
        <script>
            Swal.fire({
                title: "Sukses",
                text: "{{ $success_izin_karyawan }}",
                icon: "success"
            });
        </script>
    @endif
</body>

</html>
