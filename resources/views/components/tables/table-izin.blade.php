@props(['formizin'])

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center position-relative">
        <h3 class="card-title mb-0">Data Pengajuan Izin</h3>
    </div> <!-- /.card-header -->


    <div class="card-body">
        <div class="mb-4"> <!-- Diberi margin bawah agar tidak terlalu menempel dengan tabel -->
            <form action="{{ route('filter.izin') }}" method="POST" class="row g-3">
                @csrf
                <!-- Filter by Status -->
                <div class="col-md-6">
                    <label for="filterStatus" class="form-label">Status</label>
                    <select class="form-select" id="filterStatus" name="approved">
                        <option value="">Pilih</option>
                        <option value="disetujui" class="text-capitalize">Setujui</option>
                        <option value="ditolak" class="text-capitalize">Tolak</option>
                        <option value="pending" class="text-capitalize">Pending</option>
                    </select>
                </div>
                <!-- Filter buttons -->
                <div class="col-md-6 d-flex align-items-end">
                    <button type="submit" class="btn btn-success me-2">Terapkan</button>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-capitalize">No.</th>
                        <th class="text-capitalize">Nama</th>
                        <th class="text-capitalize">Jenis izin</th>
                        <th class="text-capitalize">Divisi</th>
                        <th class="text-capitalize">Jabatan</th>
                        <th class="text-capitalize">Dari Tanggal</th>
                        <th class="text-capitalize">Sampai Tanggal</th>
                        <th class="text-capitalize">Waktu Pulang</th>
                        <th class="text-capitalize">Alasan</th>
                        <th class="text-capitalize">Status</th>
                        <th class="text-capitalize">Action</th>
                    </tr>
                </thead>
                <tbody id="izinTableBody">
                    @if ($formizin->isEmpty())
                        <tr>
                            <td colspan="11" class="text-center py-4">
                                <img src="{{ asset('image/src/not-data-ilustration.png') }}" alt="Tidak ada data"
                                    class="img-fluid" style="max-width: 100%; height: auto;" width="180">
                                <p class="mt-3 text-muted">Tidak ada data dalam database</p>
                            </td>
                        </tr>
                    @else
                        @foreach ($formizin as $izin)
                            <tr class="align-middle" data-status="{{ $izin->approved }}">
                                <td class="text-capitalize">{{ $loop->iteration }}</td>
                                <td class="text-capitalize">{{ $izin->nama_karyawan }}</td>
                                <td class="text-capitalize">{{ $izin->jenis_izin }}</td>
                                <td class="text-capitalize">{{ $izin->divisi }}</td>
                                <td class="text-capitalize">{{ $izin->jabatan }}</td>
                                <td class="text-capitalize">
                                    {{ \Carbon\Carbon::parse($izin->dari_tanggal)->translatedFormat('d F Y') }}</td>
                                <td class="text-capitalize">
                                    {{ \Carbon\Carbon::parse($izin->sampai_tanggal)->translatedFormat('d F Y') }}</td>
                                <td class="text-capitalize">
                                    {{ \Carbon\Carbon::parse($izin->jam_pulang_awal)->format('H:i') }}</td>
                                <td class="text-capitalize">{{ $izin->alasan }}</td>
                                <td class="text-capitalize">
                                    @if ($izin->approved == 'disetujui')
                                        <span class="badge bg-success">{{ $izin->approved }}</span>
                                    @elseif ($izin->approved == 'ditolak')
                                        <span class="badge bg-danger">{{ $izin->approved }}</span>
                                    @else
                                        <span class="badge bg-warning text-dark">{{ $izin->approved }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <!-- Form tunggal untuk approve/reject -->
                                        <form action="{{ route('update.izin', $izin->id) }}" method="POST">
                                            @csrf
                                            <!-- Input tersembunyi untuk mengirim status -->
                                            <input type="hidden" name="status"
                                                id="status-input-{{ $izin->id }}">

                                            <!-- Tombol approve -->
                                            <button type="submit"
                                                onclick="document.getElementById('status-input-{{ $izin->id }}').value = 'disetujui'"
                                                style="background: transparent; outline:none; border:none">✅</button>

                                            <!-- Tombol reject -->
                                            <button type="submit"
                                                onclick="document.getElementById('status-input-{{ $izin->id }}').value = 'ditolak'"
                                                style="background: transparent; outline:none; border:none">❌</button>
                                        </form>
                                    </div>
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

<style>
    /* Additional CSS for better styling */
    .table th,
    .table td {
        vertical-align: middle;
        /* Center align text vertically */
    }

    .table th {
        background-color: #f8f9fa;
        /* Light background for header */
    }

    .badge {
        font-size: 0.9rem;
        /* Slightly smaller badge font */
    }

    .btn-group {
        display: flex;
        justify-content: center;
        /* Center the buttons */
    }

    .btn {
        min-width: 30px;
        /* Minimum width for buttons */
    }
</style>
