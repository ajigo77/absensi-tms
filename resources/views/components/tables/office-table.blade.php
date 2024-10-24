@props(['offices'])

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center position-relative">
        <h3 class="card-title mb-0">Data Offices</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newOfficeModal">New Office</button>
    </div> <!-- /.card-header -->

    <!-- New Office Modal -->
    <div class="modal fade" id="newOfficeModal" tabindex="-1" aria-labelledby="newOfficeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newOfficeModalLabel">Add New Office</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('offices.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="office-name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="office-name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="radius" class="form-label">Radius</label>
                            <input type="number" class="form-control" id="radius" name="radius" required>
                        </div>
                        <div class="mb-3">
                            <label for="latitude" class="form-label">Latitude</label>
                            <input type="text" class="form-control" id="latitude" name="latitude" required>
                        </div>
                        <div class="mb-3">
                            <label for="longitude" class="form-label">Longitude</label>
                            <input type="text" class="form-control" id="longitude" name="longitude" required>
                        </div>
                        <button type="submit" class="btn btn-success">Add Office</button>
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
                        <th>Name</th>
                        <th>Radius</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offices as $office)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $office->name }}</td>
                            <td>{{ $office->radius }}</td>
                            <td>{{ $office->latitude }}</td>
                            <td>{{ $office->longitude }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- /.table-responsive -->
    </div> <!-- /.card-body -->
    <div class="card-footer clearfix">
        {{ $offices->links('pagination::bootstrap-5') }}
    </div>
</div> <!-- /.card -->

<script>
    $(document).ready(function() {
        $('#newOfficeModal form').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    $('#newOfficeModal').modal('hide'); // Hide the modal
                    location.reload(); // Reload the page to see the new office
                },
                error: function(xhr) {
                    alert('Error adding office: ' + xhr.responseText);
                }
            });
        });
    });
</script>
