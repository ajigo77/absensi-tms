<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center h-screen bg-gray-900">

    <div class="bg-gray-700 p-6 rounded-lg shadow-lg">

        <!-- Video stream dari webcam -->
        <div id="camera-container" class="w-full mb-4">
            <video id="webcam" autoplay playsinline class="w-full border rounded-lg"></video>
        </div>

        <!-- Canvas untuk menampilkan hasil foto -->
        <div id="photo-container" class="w-full mb-4 hidden">
            <canvas id="photo" class="w-full border rounded-lg"></canvas>
        </div>

        <!-- Tombol ambil foto -->
        <button id="capture-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Ambil Foto
        </button>
    </div>

    <div class="">

    </div>

    <script>
        const video = document.getElementById('webcam');
        const canvas = document.getElementById('photo');
        const captureBtn = document.getElementById('capture-btn');
        const cameraContainer = document.getElementById('camera-container');
        const photoContainer = document.getElementById('photo-container');
        const context = canvas.getContext('2d');

        // Mengakses webcam
        let stream = null;
        if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(mediaStream => {
                    stream = mediaStream;
                    video.srcObject = stream;
                })
                .catch(error => {
                    console.error("Webcam access denied or not supported.", error);
                });
        }

        // Ketika tombol ambil foto ditekan
        captureBtn.addEventListener('click', () => {
            // Mengambil lebar dan tinggi video untuk ukuran canvas
            const width = video.videoWidth;
            const height = video.videoHeight;
            canvas.width = width;
            canvas.height = height;

            // Menggambar gambar video ke dalam canvas
            context.drawImage(video, 0, 0, width, height);

            // Matikan stream webcam
            if (stream) {
                const tracks = stream.getTracks();
                tracks.forEach(track => track.stop());
            }

            // Sembunyikan video stream dan tampilkan foto (canvas)
            cameraContainer.classList.add('hidden');
            photoContainer.classList.remove('hidden');
        });
    </script>

</body>

</html>
