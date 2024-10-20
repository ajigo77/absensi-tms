<script>
    const video = document.querySelector("#video");
    const imageIlustrator = document.querySelector("#img-ilustrator");
    const infoLocation = document.querySelector("#info-location");
    const cardLocation = document.querySelector("#card-location");
    const btnCapture = document.querySelector("#capture");
    const canvas = document.getElementById('canvas');
    const coverMap = document.getElementById("map");
    const tombolSubmit = document.getElementById("submit");
    const latitudeInput = document.getElementById("lattitude");
    const longitudeInput = document.getElementById("longtitude");

    canvas.style.display = 'none';
    video.style.display = 'none';

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
                        if (video.play()) {
                            imageIlustrator.style.display = 'none';
                            video.style.display = 'block';
                            video.style.borderRadius = '8px';
                            video.style.border = 'none';
                            video.style.outline = 'none';
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

        imageIlustrator.style.display = 'none';
        canvas.style.display = 'block';
        canvas.style.borderRadius = '8px';
        video.style.display = 'none';

        Swal.fire({
            title: "Sukses",
            text: "Gambar berhasil diambil",
            icon: "success"
        });

        stop(); // Hentikan video setelah gambar diambil

        // Ini untuk mendapatkan titik koordinat lokasi user
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const latitudeValue = position.coords.latitude; // Mengambil latitude dari geolocation
                const longitudeValue = position.coords.longitude; // Mengambil longitude dari geolocation

                // Set nilai ke input tersembunyi
                latitudeInput.value = latitudeValue;
                longitudeInput.value = longitudeValue;

            }, function(error) {
                // Tangani error saat tidak bisa mendapatkan posisi
                console.error("Tidak bisa mendapatkan lokasi: ", error);
            });
        } else {
            console.error("Geolocation tidak didukung oleh browser ini.");
        }

        tombolSubmit.disabled = false;
        tombolSubmit.style.cursor = 'pointer';
        tombolSubmit.classList.remove('bg-red-50');
    }

    // Matikan tombol Ambil Gambar saat pertama kali dimuat
    btnCapture.disabled = true;
    tombolSubmit.disabled = true;

    // Event listener untuk membuka popup
    $('#open-cam').on('click', function() {
        // menjalankan fungsi
        initializeWebcam();
        video.classList.add('rounded-bottom');
        cardLocation.style.height = '400px';
        cardLocation.style.padding = '10px';

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

        // Menghapus class dan style dari tombol Capture
        btnCapture.disabled = false;
        btnCapture.classList.remove('bg-red-50');
        btnCapture.style.cursor = 'pointer'; // Mengembalikan ke kursor pointer

    });

    // // style ketika tombol buka camera belum di klik
    // if (btnCapture.disabled && tombolSubmit.disabled) {
    //     // Untuk tombol ambil gambar
    //     btnCapture.classList.add('not-allowed');
    //     btnCapture.style.cursor = 'not-allowed';

    //     // Untuk tombol submit
    //     tombolSubmit.classList.add('not-allowed');
    //     tombolSubmit.style.cursor = 'not-allowed';
    // }

    // Fungsi untuk mengambil gambar
    btnCapture.addEventListener('click', function() {
        if (!btnCapture.disabled) {
            captureImage(); // Panggil fungsi untuk mengambil gambar
        }
    });

    // Fungsi untuk menampilkan peta dengan Leaflet
    function showMap(lat, lon) {
        // hide cover map
        coverMap.style.display = 'none';
        // Hilangkan style display:none dari div dengan id map
        const mapDiv = document.getElementById('map');
        mapDiv.style.display = 'block';
        mapDiv.style.borderRadius = '8px';

        // hide teks lokasi anda
        infoLocation.style.display = 'none';

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
            color: '#fff',
            fillColor: '#d71313',
            fillOpacity: 0.5,
            radius: 400
        }).addTo(map);

        // Tambahkan marker pada koordinat pengguna
        const marker = L.marker([lat, lon]).addTo(map)
            .bindPopup('Lokasi Anda').openPopup();
    }

    $(document).ready(function() {
        $('#submit').click(function(event) {
            let lat = $('#lattitude').val();
            let lon = $('#longtitude').val();
            let type = document.getElementById('type').value;
            let shiftId = document.getElementById('shift_id').value;

            // Jika validasi sukses, siapkan FormData untuk submit
            let formData = new FormData();

            formData.append('_token', '{{ csrf_token() }}');
            formData.append('lattitude', lat);
            formData.append('longtitude', lon);
            formData.append('type', type);
            formData.append('shift', shiftId);
            // Tambahkan token CSRF
            // Ambil gambar dari canvas sebagai bukti selfie
            if (canvas) {
                var webcamDataURL = canvas.toDataURL('image/png'); // Mengonversi gambar dari canvas ke format data URL
                formData.append('webcam', webcamDataURL); // Tambahkan ke FormData

                // Fungsi untuk submit form menggunakan AJAX
                $.ajax({
                    url: $('#absenForm').attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false, // Agar tidak memproses data secara otomatis
                    contentType: false, // Agar tidak mengubah tipe konten
                    success: function(response) {
                        if (response.success) {
                            console.log('Data berhasil disimpan');
                        }
                    },
                    error: function(xhr) {
                        // Cek apakah respons memiliki pesan kesalahan
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            console.log(xhr.responseJSON.message);
                        } else {
                            console.log('Terjadi kesalahan saat mengirim data.');
                        }
                    }
                });
            } else {
                console.log('Canvas tidak ditemukan');
            }
        });
    });
</script>
