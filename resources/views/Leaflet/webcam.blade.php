<!DOCTYPE html>
<html>

<head>
    <title>Absensi Karyawan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('components.link-cdn')
</head>
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
</head>

<body>
    <x-dashboard.nav></x-dashboard.nav>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="container mx-auto p-4">
            <!-- Layout 2 kolom -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Kolom Webcam -->
                <div
                    class="bg-white rounded-lg shadow-lg border-4 border-gray-10 border-dashed relative flex flex-col justify-center items-center h-96">
                    <video id="video" playsinline autoplay class="w-full h-full object-cover"></video>
                    <canvas id="canvas" class="w-full h-full object-cover"></canvas>
                    <div class="absolute inset-0 flex flex-col justify-center items-center z-10 pointer-events-none"
                        id="place">
                        <i class="bi bi-camera text-6xl text-gray-10"></i>
                        <span class="mt-2 text-gray-10">Ambil Gambar</span>
                    </div>
                </div>
                <!-- Kolom Maps -->
                <div class="bg-white rounded-lg shadow-lg h-96 border-4 border-gray-10 border-dashed relative">
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
                <button id="capture"
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
                    <input type="hidden" name="image" id="image-data"> <!-- Input tersembunyi untuk gambar -->
                    <input type="hidden" name="latitude" id="latitude"> <!-- Input tersembunyi untuk gambar -->
                    <input type="hidden" name="longitude" id="longitude"> <!-- Input tersembunyi untuk gambar -->
                    <button id="submit"
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
</body>
<script>
    const video = document.querySelector("#video");
    const lokasiInput = document.querySelector("#serlok");
    const btnCapture = document.querySelector("#capture");
    const canvas = document.getElementById('canvas');
    // const ktp = document.getElementById('ktp');
    // const btnRepeat = document.getElementById("btnRepeat");
    const coverMap = document.getElementById("map");

    document.getElementById('canvas').style.display = 'none';

    function initializeWebcam() {
        const constraints = {
            audio: false,
            video: {
                facingMode: "user"
            }
        };

        if (navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia(constraints)
                .then(function(mediaStream) {
                    window.stream = mediaStream;
                    video.srcObject = mediaStream;
                    video.onloadedmetadata = function(e) {
                        video.play();

                        const classVideo = document.querySelector('.border-4.border-gray-10.border-dashed');

                        if (video.play()) {
                            document.getElementById('place').style.display = 'none';
                            classVideo.classList.remove('border-4', 'border-gray-10', 'border-dashed');
                        }
                    };
                })
                .catch(function(error) {
                    console.log("Webcam Tidak terbaca");
                });
        }
    }

    function captureImage() {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        canvas.style.display = 'block';
        document.querySelector('#video').style.display = 'none';

        // Konversi canvas menjadi Blob (file gambar)
        canvas.toBlob(function(blob) {
            const file = new File([blob], 'captured_image.jpg', {
                type: 'image/jpeg'
            });

            // Siapkan FormData untuk pengiriman file gambar ke Laravel
            const formData = new FormData();
            formData.append('image', file);

            // Kirimkan file ke route Laravel menggunakan fetch (AJAX)
            fetch('/upload', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    console.error(error);
                });
        }, 'image/jpeg');

        stop(); // Hentikan video setelah gambar diambil
    }


    function uploadImage(file) {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // Set nilai ke input tersembunyi
                document.getElementById('latitude').value = latitude;
                document.getElementById('longitude').value = longitude;
            });
        }

        // Siapkan FormData untuk pengiriman file gambar
        const formData = new FormData();
        formData.append('image', file);
        formData.append('latitude', latitude);
        formData.append('latitude', longitude);

        // Kirim file gambar ke server menggunakan AJAX atau form submit
        fetch('/upload', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                Swal.fire({
                    title: "Sukses",
                    text: "Data berhasil di upload! ${data}",
                    icon: "success"
                });
            })
            .catch(error => {
                Swal.fire({
                    title: "Upss Kesalahan",
                    text: "Data gagal di upload! ${error}",
                    icon: "error"
                });
            });
    }

    function stop() {
        const stream = video.srcObject;
        if (stream) {
            const tracks = stream.getTracks();
            tracks.forEach(track => track.stop());
            video.srcObject = null;
        }
    }

    // Event listener untuk membuka popup
    $('#open-cam').on('click', function() {
        initializeWebcam();

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // Set nilai ke input tersembunyi
                document.getElementById('latitude').value = latitude;
                document.getElementById('longitude').value = longitude;

                // const googleMapsLink = `${latitude},${longitude}`;
                // lokasiInput.value = googleMapsLink;
                showMap(latitude, longitude);

                if (showMap) {
                    document.getElementById('location').style.display = 'none';
                    document.querySelector('border-4.border-gray-10.border-dashed').classList.remove(
                        'border-4', 'border-gray-10', 'border-dashed');
                }
            }, function(error) {
                console.log(": ", error);
                Swal.fire({
                    title: "Upss",
                    text: "Lokasi tidak bisa diakses",
                    icon: "error"
                });
            });
        } else {
            Swal.fire({
                title: "Upss",
                text: "Lokasi tidak bisa bisa di akses oleh browser!",
                icon: "error"
            });
        }
    });

    // Event listener untuk capture gambar
    btnCapture.addEventListener('click', captureImage);

    // Fungsi untuk menampilkan peta dengan Leaflet
    function showMap(lat, lon) {
        // hide cover map
        coverMap.style.display = 'none';
        // Hilangkan style display:none dari div dengan id map
        const mapDiv = document.getElementById('map');
        mapDiv.style.display = 'block';

        // Inisialisasi peta
        const map = L.map('map').setView([lat, lon], 15);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const circle = L.circle([lat, lon], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 400
        }).addTo(map);

        // Tambahkan marker pada koordinat pengguna
        const marker = L.marker([lat, lon]).addTo(map)
            .bindPopup('Lokasi Anda').openPopup();


        // Kirim file gambar ke server menggunakan AJAX atau form submit
        // fetch('/upload', {
        //         method: 'POST',
        //         body: formData,
        //     })
        //     .then(response => response.json())
        //     .then(data => {
        //         Swal.fire({
        //             title: "Sukses",
        //             text: "Lokasi berhasil di upload! ${data}",
        //             icon: "success"
        //         });
        //     })
        //     .catch(error => {
        //         Swal.fire({
        //             title: "Upss Kesalahan",
        //             text: "Lokasi gagal di upload! ${error}",
        //             icon: "error"
        //         });
        //     });
    }
</script>

</html>
