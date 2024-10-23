@props(['shifts'])

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center position-relative">
        <h3 class="card-title mb-0">Data Shift TMS</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newShiftModal">New Shift</button>
    </div> <!-- /.card-header -->

    <!-- New Shift Modal -->
    <div class="modal fade" id="newShiftModal" tabindex="-1" aria-labelledby="newShiftModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newShiftModalLabel">Add New Shift</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('shifts.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="shift-name" class="form-label">Shift Name</label>
                            <input type="text" class="form-control" id="shift-name" name="shift-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="start-time" class="form-label">Start Time</label>
                            <input type="time" class="form-control" id="start-time" name="start-time" required>
                        </div>
                        <div class="mb-3">
                            <label for="end-time" class="form-label">End Time</label>
                            <input type="time" class="form-control" id="end-time" name="end-time" required>
                        </div>
                        <div class="mb-3">
                            <label for="waktu" class="form-label">Waktu</label>
                            <input type="time" class="form-control" id="waktu" name="waktu" required>
                        </div>
                        <button type="submit" class="btn btn-success">Add Shift</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Existing Modal for Filtering -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
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

    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus shift ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" action="" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Waktu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shifts as $shift)
                        <tr class="align-middle" onmouseover="this.style.backgroundColor='#f8f9fa'" onmouseout="this.style.backgroundColor='white'">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $shift->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($shift->start_time)->format('H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($shift->end_time)->format('H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($shift->waktu)->format('H:i') }}</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteConfirmModal" 
                                    onclick="setDeleteFormAction('{{ route('shifts.destroy', $shift->id) }}')">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- /.table-responsive -->
    </div> <!-- /.card-body -->
    <div class="card-footer clearfix">
        {{ $shifts->links('pagination::bootstrap-5') }}
    </div>
</div> <!-- /.card -->

<script>
    $(document).ready(function() {
        $('#newShiftModal form').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    // Optionally, update the table here
                    // For example, append the new shift to the table
                    $('#newShiftModal').modal('hide'); // Hide the modal
                    location.reload(); // Reload the page to see the new shift
                },
                error: function(xhr) {
                    // Handle errors
                    alert('Error adding shift: ' + xhr.responseText);
                }
            });
        });
    });

    function setDeleteFormAction(action) {
        document.getElementById('deleteForm').action = action;
    }
</script>
