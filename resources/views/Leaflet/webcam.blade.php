<!DOCTYPE html>
<html>

<head>
    <title>Absensi Karyawan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Alpine Js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @include('components.link-cdn')
    <style>
        #canvas {
            width: 100%;
            height: 100%;
            transform: scaleX(-1);
        }

        #video {
            width: 100%;
            height: 100%;
            transform: scaleX(-1);
        }

        #map {
            width: 100%;
        }
    </style>
    @vite('resources/css/app.css')
    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('./logo-company/favicon-tms.png') }}" type="image/x-icon">
</head>

<body>
    <x-navbar.navbar></x-navbar.navbar>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="container mx-auto p-4">
            <!-- Layout 2 kolom -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Kolom Webcam -->
                <div
                    class="bg-white rounded-lg shadow-lg border-4 border-gray-10 border-dashed relative flex flex-col justify-center items-center h-96">
                    <video id="video" playsinline autoplay class="w-full h-full object-cover"></video>
                    <canvas id="canvas" class="w-full h-full object-cover"></canvas>
                    <button class="absolute inset-0 flex flex-col justify-center items-center z-10 pointer-events-none"
                        id="place">
                        <i class="bi bi-camera text-6xl text-gray-10"></i>
                        <span class="mt-2 text-gray-10">Ambil Gambar</span>
                    </button>
                </div>
                <!-- Kolom Maps -->
                <div class="bg-white rounded-lg shadow-lg h-96 relative">
                    <div class="absolute inset-0 flex flex-col justify-center items-center z-10 pointer-events-none"
                        id="location">
                        <i class="bi bi-geo-alt-fill text-6xl text-gray-10"></i>
                        <span class="mt-2 text-gray-10">Lokasi Anda</span>
                    </div>
                    <div id="map" class="w-full h-full"></div>
                </div>
            </div>

            <!-- Tombol di bawah kolom -->
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Tombol Buka camera -->
                <button id="open-cam"
                    class="w-full bg-red-100 text-white-100 font-bold py-3 rounded-lg shadow-lg hover:bg-red-50 transition col-span-1 flex items-center justify-center">
                    <i class="bi bi-camera-fill text-2xl text-white-100 mr-2"></i>
                    Buka Camera
                </button>

                <!-- Tombol Capture -->
                <button id="capture" disabled
                    class="w-full bg-red-100 flex items-center justify-center text-white-100 font-bold py-3 rounded-lg shadow-lg hover:bg-red-50 transition col-span-1">
                    <i class="bi bi-image text-2xl text-white-100 mr-2"></i>
                    Ambil Gambar
                </button>

                <!-- Tombol Submit -->
                <form action="{{ route('image.upload') }}" method="POST" enctype="multipart/form-data"
                    id="upload-form">
                    @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                    {{-- @error('image')
                        <span class="text-red-50">{{ $message }}</span>
                    @enderror --}}
                    <input type="file" name="image" id="image-data" hidden value=""> <!-- Input tersembunyi untuk gambar -->
                    <input type="hidden" name="latitude" id="latitude"> <!-- Input tersembunyi untuk gambar -->
                    <input type="hidden" name="longitude" id="longitude"> <!-- Input tersembunyi untuk gambar -->
                    <button id="submit" disabled
                        class="w-full bg-red-100 flex items-center justify-center text-white-100 font-bold py-3 rounded-lg shadow-lg sm:col-span-1 hover:bg-red-50 transition"
                        type="submit">
                        <i class="bi bi-send-fill text-2xl text-white-100 mr-2"></i>
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
    {{-- <input type="text" id="serlok" name="serlok" readonly hidden> --}}
    <x-dashboard.footer></x-dashboard.footer>
    {{-- Javascript --}}
    <x-src.scriptjs></x-src.scriptjs>
</body>
</html>
