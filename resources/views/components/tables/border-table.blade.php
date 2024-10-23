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
                                    <a href="{{ asset('webcam/' . $absen->foto) }}" class="text-white">Lihat foto</a>
                                </span>
                            </td>
                            <td class="text-capitalize">lihat lokasi</td>
                            <td class="text-capitalize">
                                @if ($absen->status == 'terlambat')
                                    <span class="badge bg-danger">
                                        {{ $absen->status }}
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        {{ $absen->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="text-capitalize">
                                {{ \Carbon\Carbon::parse($absen->created_at)->translatedFormat('l, d F Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- /.table-responsive -->
    </div> <!-- /.card-body -->
    <div class="card-footer clearfix">
        {{ $absens->links('pagination::bootstrap-5') }}
    </div>
</div> <!-- /.card -->
