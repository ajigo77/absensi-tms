<script>
    const video = document.querySelector("#video");
    const btnCapture = document.querySelector("#capture");
    const canvas = document.getElementById('canvas');
    const coverMap = document.getElementById("map");
    const tombolSubmit = document.getElementById("submit");
    const latitudeInput = document.getElementById("latitude");
    const longitudeInput = document.getElementById("longitude");
    let capturedBlob = null;

    // Siapkan FormData untuk pengiriman file gambar
    const formData = new FormData();

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

    function stop() {
        const stream = video.srcObject;
        if (stream) {
            const tracks = stream.getTracks();
            tracks.forEach(track => track.stop());
            video.srcObject = null;
        }
    }

    // Fungsi untuk mengambil gambar
    function captureImage() {
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        canvas.style.display = 'block';
        document.querySelector('#video').style.display = 'none';

        Swal.fire({
            title: "Sukses",
            text: "Gambar berhasil diambil, siap untuk di submit!",
            icon: "success"
        });

        // Ini untuk mendapatkan titik koordinat lokasi user
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const latitudeValue = position.coords.latitude; // Mengambil latitude dari geolocation
                const longitudeValue = position.coords.longitude; // Mengambil longitude dari geolocation

                // Set nilai ke input tersembunyi
                latitudeInput.value = latitudeValue;
                longitudeInput.value = longitudeValue;

                // Debugging
                // console.log(latitudeInput.value);
                // console.log(longitudeInput.value);

                // Set nilai latitude dan longitude dari input hidden ke FormData
                formData.append('latitude', latitudeInput.value);
                formData.append('longitude', longitudeInput.value);


            }, function(error) {
                // Tangani error saat tidak bisa mendapatkan posisi
                console.error("Tidak bisa mendapatkan lokasi: ", error);
            });
        } else {
            console.error("Geolocation tidak didukung oleh browser ini.");
        }

        // Ambil gambar dari canvas dan ubah menjadi Blob
        canvas.toBlob(function(blob) {
            if (blob) {
                // Buat file dari Blob yang sudah diambil
                const file = new File([blob], 'my_photo.jpg', {
                    type: 'image/jpeg'
                });

                // Tambahkan file ke FormData
                // formData.append('image', file);

                // Debugging: cek apakah file sudah terbentuk

                console.log(file); // Periksa file yang terbentuk
            } else {
                console.log("Blob gagal dibuat dari canvas.");
            }
        }, 'image/jpeg');

        stop(); // Hentikan video setelah gambar diambil
    }

    function uploadImageAndLocation() {
        // Kirim data gambar dan koordinat lokasi ke server menggunakan fetch API
        fetch('/upload', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch(error => {
                console.error('Error:', error);
            }
        );
    }


    // Matikan tombol Ambil Gambar saat pertama kali dimuat
    btnCapture.disabled = true;
    tombolSubmit.disabled = true;

    // Event listener untuk membuka popup
    $('#open-cam').on('click', function() {
        // menjalankan fungsi
        initializeWebcam();
        btnCapture.disabled = false;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                showMap(latitude, longitude);
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

        // Menghapus class dan style dari tombol Capture dan Submit setelah kamera dibuka
        btnCapture.disabled = false;
        btnCapture.classList.remove('bg-red-50');
        btnCapture.style.cursor = 'pointer'; // Mengembalikan ke kursor pointer

        tombolSubmit.disabled = false;
        tombolSubmit.classList.remove('bg-red-50');
        tombolSubmit.style.cursor = 'pointer'; // Mengembalikan ke kursor pointer

    });

    // style ketika tombol buka camera belum di klik
    if (btnCapture.disabled && tombolSubmit.disabled) {
        btnCapture.classList.add('bg-red-50');
        btnCapture.style.cursor = 'not-allowed';
        tombolSubmit.classList.add('bg-red-50');
        tombolSubmit.style.cursor = 'not-allowed';
    }

    // Fungsi untuk mengambil gambar
    btnCapture.addEventListener('click', function() {
        if (!btnCapture.disabled) {
            captureImage(); // Panggil fungsi untuk mengambil gambar
        }
    });

    tombolSubmit.addEventListener('click', function() {
        if (!tombolSubmit.disabled) {
            uploadImageAndLocation(); // Panggil fungsi untuk mengirimkan data
        }
    });

    // Fungsi untuk menampilkan peta dengan Leaflet
    function showMap(lat, lon) {
        // hide cover map
        coverMap.style.display = 'none';
        // Hilangkan style display:none dari div dengan id map
        const mapDiv = document.getElementById('map');
        mapDiv.style.display = 'block';

        // Inisialisasi peta
        const map = L.map('map').setView([lat, lon], 15);

        // Titik koordinat kantor
        const latLokasiKantor = -6.9206016;
        const longLokasiKantor = 107.610112;

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const circle = L.circle([latLokasiKantor, longLokasiKantor], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 400
        }).addTo(map);

        // Tambahkan marker pada koordinat pengguna
        const marker = L.marker([lat, lon]).addTo(map)
            .bindPopup('Lokasi Anda').openPopup();
    }
</script>
