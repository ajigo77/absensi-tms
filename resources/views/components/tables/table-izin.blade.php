@props(['formizin'])

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center position-relative">
        <h3 class="card-title mb-0">Data Pengajuan Izin</h3>
    </div> <!-- /.card-header -->


    <div class="card-body">
        <div class="mb-3 d-flex align-items-center">
            <label for="statusFilter" class="form-label me-2">Filter by Status:</label>
            <i class="bi bi-funnel-fill me-2"></i> <!-- Filter icon -->
            <select id="statusFilter" class="form-select" onchange="filterStatus()">
                <option value="">All</option>
                <option value="pending">Pending</option>
                <option value="disetujui">Disetujui</option>
                <option value="ditolak">Ditolak</option>
            </select>
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
                                <td class="text-capitalize">{{ \Carbon\Carbon::parse($izin->dari_tanggal)->translatedFormat('d F Y') }}</td>
                                <td class="text-capitalize">{{ \Carbon\Carbon::parse($izin->sampai_tanggal)->translatedFormat('d F Y') }}</td>
                                <td class="text-capitalize">{{ \Carbon\Carbon::parse($izin->jam_pulang_awal)->format('H:i') }}</td>
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
                                        <button class="btn btn-success btn-sm" onclick="approveCuti({{ $izin->id }})">✓</button>
                                        <button class="btn btn-danger btn-sm" onclick="rejectCuti({{ $izin->id }})">✗</button>
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

<script>
    function filterStatus() {
        const filterValue = document.getElementById('statusFilter').value.toLowerCase();
        const rows = Array.from(document.querySelectorAll('tbody tr'));

        // Sort rows to prioritize "Pending" status
        rows.sort((a, b) => {
            const statusA = a.getAttribute('data-status').toLowerCase();
            const statusB = b.getAttribute('data-status').toLowerCase();

            if (statusA === 'pending' && statusB !== 'pending') return -1;
            if (statusA !== 'pending' && statusB === 'pending') return 1;
            return 0; // Keep original order for other statuses
        });

        // Filter and display rows
        rows.forEach(row => {
            const status = row.getAttribute('data-status').toLowerCase();
            if (filterValue === '' || status === filterValue) {
                row.style.display = ''; // Show row
            } else {
                row.style.display = 'none'; // Hide row
            }
        });

        // Append sorted rows back to the table body
        const tbody = document.getElementById('izinTableBody');
        tbody.innerHTML = ''; // Clear existing rows
        rows.forEach(row => tbody.appendChild(row)); // Append sorted rows
    }

    function approveCuti(id) {
        $.ajax({
            type: 'POST',
            url: '/cuti/approve/' + id,
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr) {
                alert('Error approving cuti: ' + xhr.responseText);
            }
        });
    }

    function rejectCuti(id) {
        $.ajax({
            type: 'POST',
            url: '/cuti/reject/' + id,
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr) {
                alert('Error rejecting cuti: ' + xhr.responseText);
            }
        });
    }
</script>

<style>
    /* Additional CSS for better styling */
    .table th, .table td {
        vertical-align: middle; /* Center align text vertically */
    }

    .table th {
        background-color: #f8f9fa; /* Light background for header */
    }

    .badge {
        font-size: 0.9rem; /* Slightly smaller badge font */
    }

    .btn-group {
        display: flex;
        justify-content: center; /* Center the buttons */
    }

    .btn {
        min-width: 30px; /* Minimum width for buttons */
    }
</style>
