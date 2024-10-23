@props(['cutis']) <!-- Changed from 'shifts' to 'cutis' -->

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center position-relative">
        <h3 class="card-title mb-0">Data Pengajuan Izin</h3> <!-- Updated title -->
        <!-- Removed New Cuti button -->
    </div> <!-- /.card-header -->

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama Karyawan</th>
                        <th>Jenis Izin</th> <!-- Added Jenis Izin -->
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
                    @foreach ($cutis as $cuti) <!-- Changed from 'shifts' to 'cutis' -->
                        <tr class="align-middle" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor='white'">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cuti->nama_karyawan }}</td>
                            <td>{{ $cuti->jenis_izin }}</td> <!-- Added Jenis Izin -->
                            <td>{{ $cuti->divisi }}</td>
                            <td>{{ $cuti->jabatan }}</td>
                            <td>{{ \Carbon\Carbon::parse($cuti->dari_tanggal)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($cuti->sampai_tanggal)->format('Y-m-d') }}</td>
                            <td>{{ $cuti->alasan }}</td>
                            <td>{{ $cuti->approved }}</td> <!-- Assuming 'approved' is a field -->
                            <td>
                                <button class="btn btn-success btn-sm" onclick="approveCuti({{ $cuti->id }})">✔️</button> <!-- Approve button -->
                                <button class="btn btn-danger btn-sm" onclick="rejectCuti({{ $cuti->id }})">❌</button> <!-- Reject button -->
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

<script>
    function approveCuti(id) {
        // Implement AJAX call to approve the cuti
        $.ajax({
            type: 'POST',
            url: '/cuti/approve/' + id, // Update with your route
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                location.reload(); // Reload the page to see the updated status
            },
            error: function(xhr) {
                alert('Error approving cuti: ' + xhr.responseText);
            }
        });
    }

    function rejectCuti(id) {
        // Implement AJAX call to reject the cuti
        $.ajax({
            type: 'POST',
            url: '/cuti/reject/' + id, // Update with your route
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                location.reload(); // Reload the page to see the updated status
            },
            error: function(xhr) {
                alert('Error rejecting cuti: ' + xhr.responseText);
            }
        });
    }
</script>
