@props(['absens'])

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center position-relative">
        <h3 class="card-title mb-0">Data Absensi TMS</h3>
        <!-- Menggunakan position-absolute untuk menempatkan icon di pojok kanan -->
        <i class="bi bi-funnel-fill text-secondary position-absolute"
            style="right: 15px; top: 50%; transform: translateY(-50%); font-size: 1.5rem; cursor: pointer;"
            data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
    </div> <!-- /.card-header -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="from-date" class="form-label">Dari Tanggal</label>
                            <input type="date" class="form-control" id="from-date" name="from-date">
                        </div>
                        <div class="mb-3">
                            <label for="to-date" class="form-label">Sampai Tanggal</label>
                            <input type="date" class="form-control" id="to-date" name="to-date">
                        </div>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Terapkan</button>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-between align-items-center">
                    <span class="text-capitalize text-danger me-auto" style="cursor: pointer;">Atur ulang filter</span>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk lokasi -->
    <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lokasi Karyawan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Menampilkan modal lokasi dari leaflet -->
                    <div id="map" style="width: 100%; height:300px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <!-- Tambahkan class table-responsive untuk membuat tabel menjadi responsif -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-capitalize">No.</th>
                        <th class="text-capitalize">Nama</th>
                        <th class="text-capitalize">Tipe Absen</th>
                        <th class="text-capitalize">Shift</th>
                        <th class="text-capitalize">Foto</th>
                        <th class="text-capitalize">Lihat Lokasi</th>
                        <th class="text-capitalize">Status</th>
                        <th class="text-capitalize">Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($absens->isEmpty())
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <!-- Menambahkan img-fluid untuk gambar yang responsif -->
                                <img src="{{ asset('image/src/not-data-ilustration.png') }}" alt="Tidak ada data"
                                    class="img-fluid" style="max-width: 100%; height: auto;" width="180">
                                <p class="mt-3 text-muted">Tidak ada data dalam database</p>
                            </td>
                        </tr>
                    @else
                        @foreach ($absens as $absen)
                            <tr class="align-middle">
                                <td class="text-capitalize">{{ $loop->iteration }}</td>
                                <td class="text-capitalize">{{ $absen->user->member->nama }}</td>
                                <td class="text-capitalize">
                                    @if ($absen->type == 'masuk')
                                        <span class="badge bg-success">
                                            {{ $absen->type }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            {{ $absen->type }}
                                        </span>
                                    @endif
                                </td>
                                <td class="text-capitalize">{{ $absen->shift->name }}</td>
                                <td class="text-capitalize">
                                    <span class="badge bg-dark">
                                        <a href="{{ asset('webcam/' . $absen->foto) }}" class="text-white">Lihat
                                            foto</a>
                                    </span>
                                </td>
                                <td class="text-capitalize">
                                    <a href="#" class="icn badge bg-dark" id="mdl" data-bs-toggle="modal"
                                        data-bs-target="#locationModal" data-lat="{{ $absen->lattitude }}"
                                        data-lon="{{ $absen->longtitude }}">
                                        <span class="mb-2 text-white">
                                            Lihat Lokasi
                                        </span>
                                    </a>
                                </td>
                                <td class="text-capitalize">
                                    @if ($absen->type == 'masuk')
                                        @if ($absen->status == 'terlambat')
                                            <span class="badge bg-danger">
                                                {{ $absen->status }}
                                            </span>
                                        @else
                                            <span class="badge bg-success">
                                                {{ $absen->status }}
                                            </span>
                                        @endif
                                    @else
                                        <span class="badge bg-warning text-dark">
                                            Hati hati di jalan
                                        </span>
                                    @endif
                                </td>
                                <td class="text-capitalize">
                                    {{ \Carbon\Carbon::parse($absen->created_at)->translatedFormat('l, d F Y') }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div> <!-- /.table-responsive -->
    </div> <!-- /.card-body -->
    <div class="card-footer clearfix">
        {{ $absens->links('pagination::bootstrap-5') }}
    </div>
</div> <!-- /.card -->

<!-- Update the filter form to handle date filtering -->
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();
        const fromDate = document.getElementById('from-date').value;
        const toDate = document.getElementById('to-date').value;

        // Redirect to the same page with query parameters for filtering
        window.location.href = `?from=${fromDate}&to=${toDate}`;
    });
</script>
<script>
    let map = null;
    const locationModal = document.getElementById('locationModal');

    locationModal.addEventListener('show.bs.modal', function(event) {
        // Ambil button yang memicu modal
        const button = event.relatedTarget;
        // Ambil data-lat dan data-lon dari button
        const lat = parseFloat(button.getAttribute('data-lat')); // Ambil lat dan konversi ke float
        const lon = parseFloat(button.getAttribute('data-lon')); // Ambil lon dan konversi ke float

        // Panggil fungsi untuk menampilkan peta
        showMap(lat, lon);
    });

    // Hapus peta ketika modal ditutup
    locationModal.addEventListener('hide.bs.modal', function() {
        if (map !== null) {
            map.remove(); // Hapus peta saat modal ditutup
            map = null; // Reset variabel map
        }
    });

    function showMap(lat, lon) {
        const mapDiv = document.getElementById("map");
        mapDiv.style.display = 'block';
        mapDiv.style.borderRadius = '10px';

        // Inisialisasi peta
        map = L.map(mapDiv).setView([lat, lon], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Titik koordinat kantor
        const latLokasiKantor = -6.9206016;
        const longLokasiKantor = 107.610112;

        const circle = L.circle([latLokasiKantor, longLokasiKantor], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 400
        }).addTo(map);

        // Tambahkan marker pada lokasi karyawan
        const marker = L.marker([lat, lon]).addTo(map)
            .bindPopup('Lokasi Anda').openPopup();

        // Perbarui ukuran peta setelah modal sepenuhnya terbuka
        setTimeout(function() {
            map.invalidateSize();
        }, 500); // Memberi sedikit delay agar layout modal benar-benar siap
    }

    const photoModal = document.getElementById('photoModal');
    photoModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget; // Button that triggered the modal
        const photoUrl = button.getAttribute('data-photo'); // Extract info from data-* attributes
        const modalPhoto = document.getElementById('modalPhoto'); // Get the image element
        modalPhoto.src = photoUrl; // Update the modal's image source
    });
</script>
