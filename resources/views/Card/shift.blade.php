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

<body class="font-sans bg-gray-50">
    <div class="wrapper">
        {{-- Navbar --}}
        <x-navbar.navbar></x-navbar.navbar>

        <!-- Main Content -->
        <div class="flex items-center justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 max-w-7xl w-full p-4 mt-5">
                <!-- Responsive Grid for Shift Cards -->
                @foreach ($cards as $card)
                    <div
                        class="relative flex flex-col my-6 bg-white shadow-md border border-slate-200 rounded-lg w-full max-w-sm mx-auto">
                        <div class="p-4">
                            <h5 class="mb-2 text-slate-800 text-xl font-semibold text-capitalize">
                                absen {{ $card->name }}
                            </h5>

                            {{-- Copywriting Absen Berdasarkan Waktu --}}
                            @if ($card->name == 'pagi')
                                <p class="text-slate-600 leading-normal font-light">
                                    Mulai hari dengan produktif, Absen pagi Anda sekarang. Dari pukul
                                    {{ $card->start_time }} hingga pukul {{ $card->end_time }}.
                                </p>
                            @elseif($card->name == 'sore')
                                <p class="text-slate-600 leading-normal font-light">
                                    Akhiri hari dengan baik, Jangan lupa absen sore! Dari pukul {{ $card->start_time }}
                                    hingga pukul {{ $card->end_time }}.
                                </p>
                            @elseif($card->name == 'malam')
                                <p class="text-slate-600 leading-normal font-light">
                                    Pastikan kehadiran Anda, Absen malam sekarang! Dari pukul {{ $card->start_time }}
                                    hingga pukul {{ $card->end_time }}.
                                </p>
                            @endif

                            {{-- Kondisi Tombol Berdasarkan Status --}}
                            @if ($card->belum_absen)
                                <!-- Jika belum waktunya absen -->
                                <span
                                    class="block mt-4 rounded-md bg-gray-10 py-2 px-4 text-sm text-white-100 text-center cursor-not-allowed">
                                    Belum bisa absen
                                </span>
                            @elseif ($card->bisa_absen)
                                <!-- Jika masih dalam periode absen -->
                                <a class="block w-full text-center rounded-md bg-red-500 text-white py-2 px-4 mt-6 transition-all hover:bg-red-600 active:bg-red-700"
                                    href="{{ route('absensi.karyawan') }}">
                                    Pilih Absen {{ $card->name }}
                                </a>
                            @else
                                <!-- Jika waktu absen sudah berakhir -->
                                <span
                                    class="block mt-4 rounded-md bg-gray-10 py-2 px-4 text-sm text-white-100 text-center cursor-not-allowed">
                                    Waktu absensi telah berakhir
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!-- Employee Leave and Permit Cards Section -->
        <div class="flex items-center justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 max-w-7xl w-full p-4">
                <!-- Kartu untuk Surat Izin Karyawan -->
                <div
                    class="relative flex flex-col bg-white-100 shadow-md border border-slate-200 rounded-lg w-full max-w-sm mx-auto">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('image/src/ilustration-1.png') }}" alt="Ajukan Izin"
                            class="w-full h-full object-cover bg-center" />
                    </div>
                    <div class="p-4">
                        <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                            Ajukan Izin Kerja Anda dengan Mudah
                        </h6>
                        <p class="text-slate-600 leading-normal font-light">
                            Kelola izin kerja dengan mudah. Ajukan permohonan izin online dan dapatkan persetujuan
                            dengan cepat, mudah, efisien dan transparan.
                        </p>
                    </div>
                    <div class="px-4 pb-4 pt-0">
                        <a href="{{ route('izin.karyawan') }}"
                            class="block w-full rounded-md bg-red-500 text-white-100 py-2 px-4 text-center transition-all hover:bg-red-600 active:bg-red-700">
                            Ajukan izin sekarang
                        </a>
                    </div>
                </div>

                <!-- Kartu untuk Cuti Tahunan Karyawan -->
                <div
                    class="relative flex flex-col bg-white-100 shadow-md border border-slate-200 rounded-lg w-full max-w-sm mx-auto">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset('image/src/ilustration-2.png') }}" alt="Ajukan Cuti"
                            class="w-full h-full object-cover" />
                    </div>
                    <div class="p-4">
                        <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                            Nikmati Cutimu dengan Mudah
                        </h6>
                        <p class="text-slate-600 leading-normal font-light">
                            Ajukan cuti tahunan Anda dengan mudah. Proses yang cepat, transparan, dan nyaman untuk
                            membantu Anda menikmati waktu istirahat.
                        </p>
                    </div>
                    <div class="px-4 pb-4 pt-0">
                        <a href="{{ route('cuti.karyawan') }}"
                            class="block w-full rounded-md bg-red-500 text-white-100 py-2 px-4 text-center transition-all hover:bg-red-600 active:bg-red-700">
                            Ajukan cuti sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-12">
        {{-- Footer --}}
        <x-dashboard.footer></x-dashboard.footer>
    </div>

    @if ($success_izin_karyawan = Session::has('success'))
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
