@props(['cutis']) <!-- Changed from 'shifts' to 'cutis' -->

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center position-relative">
        <h3 class="card-title mb-0">Data Pengajuan Izin</h3>
    </div> <!-- /.card-header -->

    <div class="card-body">
        <!-- Filter Section -->
        <div class="mb-4"> <!-- Diberi margin bawah agar tidak terlalu menempel dengan tabel -->
            <form action="{{ route('filter.cuti') }}" method="POST" class="row g-3">
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

        <!-- Table Section -->
        <div class="table-responsive">
            <table class="table table-bordered" id="cutiTable">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama Karyawan</th>
                        <th>Divisi</th>
                        <th>Jabatan</th>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th>Alasan</th>
                        <th>Status</th>
                        <th>Action</th> <!-- Added Action column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cutis as $cuti)
                        <tr class="align-middle" onmouseover="this.style.backgroundColor='#f8f9fa'"
                            onmouseout="this.style.backgroundColor='white'" data-status="{{ $cuti->approved }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cuti->nama_karyawan }}</td>
                            <td>{{ $cuti->divisi }}</td>
                            <td>{{ $cuti->jabatan }}</td>
                            <td>{{ \Carbon\Carbon::parse($cuti->dari_tanggal)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($cuti->sampai_tanggal)->format('Y-m-d') }}</td>
                            <td>{{ $cuti->alasan }}</td>
                            <td>
                                <span class="badge
                                @if ($cuti->approved == 'ditolak') bg-danger
                                @elseif($cuti->approved == 'disetujui') bg-success
                                @elseif($cuti->approved == 'pending') bg-warning text-dark @endif">
                                    {{ $cuti->approved }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <!-- Form tunggal untuk approve/reject -->
                                    <form action="{{ route('update.cuti', $cuti->id) }}" method="POST">
                                        @csrf
                                        <!-- Input tersembunyi untuk mengirim status -->
                                        <input type="hidden" name="status" id="status-input-{{ $cuti->id }}">

                                        <!-- Tombol approve -->
                                        <button type="submit"
                                            onclick="document.getElementById('status-input-{{ $cuti->id }}').value = 'disetujui'"
                                            style="background: transparent; outline:none; border:none">✅</button>

                                        <!-- Tombol reject -->
                                        <button type="submit"
                                            onclick="document.getElementById('status-input-{{ $cuti->id }}').value = 'ditolak'"
                                            style="background: transparent; outline:none; border:none">❌</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- /.table-responsive -->
    </div> <!-- /.card-body -->

    <div class="card-footer clearfix">
        {{ $cutis->links('pagination::bootstrap-5') }} <!-- Changed from 'shifts' to 'cutis' -->
    </div>
</div> <!-- /.card -->

