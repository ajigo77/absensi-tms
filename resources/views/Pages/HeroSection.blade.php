<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Utama</title>
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('./logo-company/favicon-tms.png') }}" type="image/x-icon">
    {{-- Icons Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite('resources/css/app.css')
</head>

<body class="overflow-hidden">
    <div class="bg-white-100">
        <header class="absolute inset-x-0 top-0 z-50 border-b-2 border-gray-50 bg-white-100">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="flex items-center text-center">
                        <img class="w-12 h-auto" src="{{ asset('./logo-company/tms.png') }}" alt="Logo Company">
                        <span class="ml-3 font-bold text-sm sm:text-base lg:text-lg text-dark-10">PT. Tecnology
                            Multi System
                        </span>
                    </a>
                </div>

                <!-- Burger Menu for Mobile -->
                <div class="flex lg:hidden">
                    <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-dark-10"
                        id="mobile-menu-button">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 5.25h16.5M3.75 12h16.5m-16.5 6.75h16.5" />
                        </svg>
                    </button>
                </div>

                <!-- Menu Items for Desktop -->
                <div class="hidden lg:flex lg:flex-1 lg:justify-end gap-x-5">
                    <a href="{{ route('auth.register') }}"
                        class="text-sm font-semibold leading-6 text-white-100 px-5 py-2 rounded-full text-center align-middle flex justify-center transition bg-red-100 hover:bg-red-50 items-center">
                        Daftar
                    </a>
                    <a href="{{ route('auth.login') }}"
                        class="text-sm font-semibold leading-6 text-red-10 px-5 py-2 border-2 border-red-10 hover:border-red-50 rounded-full text-center items-center flex justify-center transition hover:text-red-50">
                        Masuk
                    </a>
                </div>
            </nav>

            <!-- Mobile Menu (Hidden by Default) -->
            <div class="hidden lg:hidden fixed inset-0 z-50 bg-white-100" id="mobile-menu">
                <div class="flex flex-col px-6 py-6 h-screen space-y-4">
                    <!-- Close Button -->
                    <div class="flex justify-end">
                        <button type="button" id="close-menu-button"
                            class="text-dark-10 p-2.5 rounded-md focus:outline-none focus:ring-2 focus:ring-inset focus:ring-dark-10">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- Mobile Menu Links -->
                    <div class="flex flex-col space-y-5">
                        <a href="{{ route('auth.register') }}"
                            class="flex justify-between items-center text-base font-semibold leading-6 text-white-100 px-5 py-3 rounded-md bg-red-50 hover:bg-red-100 transition">
                            Daftar <span class="ml-2 text-white-100 text-md">&rarr;</span>
                        </a>
                        <a href="{{ route('auth.login') }}"
                            class="flex justify-between items-center text-base font-semibold leading-6 text-red-50 px-5 py-3 rounded-md border-2 border-red-50 transition">
                            Masuk <i class="bi bi-box-arrow-right text-md"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <div class="relative isolate px-6 pt-5 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#FFE5E1] to-red-soft sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="mx-auto max-w-3xl mt-40 sm:py-10 lg:mt-36">
                <div class="text-center px-4 sm:px-6 lg:px-8">
                    <h1 class="text-balance text-3xl font-bold text-dark-10 sm:text-4xl lg:text-5xl">
                        Kelola Absensi Karyawan dengan Mudah
                    </h1>
                    <p class="mt-6 text-base sm:text-lg lg:text-xl leading-7 sm:leading-8 text-dark-50">
                        Selamat datang di PT. Tecnology Multi System, hadir untuk membantu perusahaan dalam mengelola
                        absensi karyawan secara cepat, akurat, dan efisien. Tidak perlu lagi repot dengan proses manual,
                        dengan sistem absensi digital ini, dapat memantau kehadiran, keterlambatan, dan waktu kerja
                        secara real-time di mana pun berada.
                    </p>
                    <div class="mt-10 flex items-center justify-center">
                        <a href="#"
                            class="rounded-md bg-red-100 px-3.5 py-2.5 text-sm font-semibold text-white-100 shadow-sm hover:bg-red-50">
                            Mulailah
                        </a>
                    </div>
                </div>
            </div>

            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-red-soft to-[#FFE5E1] sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </div>
    {{-- Footer --}}
    <x-dashboard.footer></x-dashboard.footer>
    <script>
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const closeMenuButton = document.getElementById('close-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        // Toggle mobile menu visibility
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.remove('hidden');
        });

        closeMenuButton.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    </script>
</body>

</html>
