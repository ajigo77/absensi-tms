@props(['formizin'])

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center position-relative">
        <h3 class="card-title mb-0">Data Pengajuan Izin</h3>
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
                            <label for="from-date" class="form-label">Status</label>
                            <select class="form-select" id="inputGroupSelect03"
                                aria-label="Example select with button addon">
                                <option selected>Pilih status</option>
                                <option value="disetujui">Disetujui</option>
                                <option value="ditolak">Ditolak</option>
                                <option value="pending">Pending</option>
                            </select>
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
                        <th class="text-capitalize">Jenis izin</th>
                        <th class="text-capitalize">divisi</th>
                        <th class="text-capitalize">jabatan</th>
                        <th class="text-capitalize">dari tanggal</th>
                        <th class="text-capitalize">sampai tanggal</th>
                        <th class="text-capitalize">Waktu pulang</th>
                        <th class="text-capitalize">Alasan</th>
                        <th class="text-capitalize">Status</th>
                        <th class="text-capitalize">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($formizin->isEmpty())
                        <tr>
                            <td colspan="12" class="text-center py-4">
                                <!-- Menambahkan img-fluid untuk gambar yang responsif -->
                                <img src="{{ asset('image/src/not-data-ilustration.png') }}" alt="Tidak ada data"
                                    class="img-fluid" style="max-width: 100%; height: auto;" width="180">
                                <p class="mt-3 text-muted">Tidak ada data dalam database</p>
                            </td>
                        </tr>
                    @else
                        @foreach ($formizin as $izin)
                            <tr class="align-middle">
                                <td class="text-capitalize">{{ $loop->iteration }}</td>
                                <td class="text-capitalize">{{ $izin->nama_karyawan }}</td>
                                <td class="text-capitalize">{{ $izin->jenis_izin }}</td>
                                <td class="text-capitalize">{{ $izin->divisi }}</td>
                                <td class="text-capitalize">{{ $izin->jabatan }}</td>
                                <td class="text-capitalize">
                                    {{ \Carbon\Carbon::parse($izin->dari_tanggal)->translatedFormat('d F Y') }}</td>
                                <td class="text-capitalize">
                                    {{ \Carbon\Carbon::parse($izin->sampai_tanggal)->translatedFormat('d F Y') }}
                                </td>
                                <td class="text-capitalize">
                                    {{ \Carbon\Carbon::parse($izin->jam_pulang_awal)->format('H:i') }}</td>
                                <td class="text-capitalize">{{ $izin->alasan }}</td>
                                <td class="text-capitalize">
                                    @if ($izin->approved == 'disetujui')
                                        <span class="badge bg-success">
                                            {{ $izin->approved }}
                                        </span>
                                    @elseif ($izin->approved == 'ditolak')
                                        <span class="badge bg-danger">
                                            {{ $izin->approved }}
                                        </span>
                                    @else
                                        <span class="badge bg-warning text-dark">
                                            {{ $izin->approved }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <form action="" class="d-flex justify-content-center align-items-center">
                                        <!-- Tombol untuk aksi batal -->
                                        <button type="submit" class="btn p-0 me-3"
                                            style="border: none; background: none;">
                                            <i class="bi bi-x-square text-danger fs-5" style="cursor: pointer;"></i>
                                        </button>

                                        <!-- Tombol untuk aksi terima -->
                                        <button type="submit" class="btn p-0" style="border: none; background: none;">
                                            <i class="bi bi-check2-square text-success fs-5"
                                                style="cursor: pointer;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div> <!-- /.table-responsive -->
    </div> <!-- /.card-body -->
    <div class="card-footer clearfix">
        {{ $formizin->links('pagination::bootstrap-5') }}
    </div>
</div> <!-- /.card -->
