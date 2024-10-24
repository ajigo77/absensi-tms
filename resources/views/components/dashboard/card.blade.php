<div class="row">
    <!-- Total Karyawan yang Masuk Card -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-lightblue"> <!-- Updated background color -->
            <span class="info-box-icon"><i class="bi bi-check-circle-fill"></i></span> <!-- Updated icon -->
            <div class="info-box-content">
                <span class="info-box-text">Total Karyawan yang Masuk</span>
                <span class="info-box-number" id="totalMasuk">12</span> <!-- Updated ID -->
            </div> <!-- /.info-box-content -->
        </div> <!-- /.info-box -->
    </div> <!-- /.col -->

    <!-- Total Karyawan yang Pulang Card -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-yellow"> <!-- Updated background color -->
            <span class="info-box-icon"><i class="bi bi-door-open"></i></span> <!-- Updated icon -->
            <div class="info-box-content">
                <span class="info-box-text">Total Karyawan yang Pulang</span>
                <span class="info-box-number" id="totalPulang">5</span> <!-- Updated ID -->
            </div> <!-- /.info-box-content -->
        </div> <!-- /.info-box -->
    </div> <!-- /.col -->

    <!-- Masuk Tepat Waktu Card -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-green"> <!-- Updated background color -->
            <span class="info-box-icon"><i class="bi bi-clock-fill"></i></span> <!-- Updated icon -->
            <div class="info-box-content">
                <span class="info-box-text">Masuk Tepat Waktu</span>
                <span class="info-box-number" id="masukTepatWaktu">15</span> <!-- Updated ID -->
            </div> <!-- /.info-box-content -->
        </div> <!-- /.info-box -->
    </div> <!-- /.col -->

    <!-- Terlambat Masuk Card -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-red"> <!-- Updated background color -->
            <span class="info-box-icon"><i class="bi bi-clock-history"></i></span> <!-- Updated icon -->
            <div class="info-box-content">
                <span class="info-box-text">Terlambat Masuk</span>
                <span class="info-box-number" id="terlambatMasuk">3</span> <!-- Updated ID -->
            </div> <!-- /.info-box-content -->
        </div> <!-- /.info-box -->
    </div> <!-- /.col -->
</div> <!-- /.row -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function fetchDailyStats() {
        $.ajax({
            url: '{{ route("daily.stats") }}', // Update with your route
            method: 'GET',
            success: function(data) {
                // Update your card content with the fetched data
                $('#totalMasuk').text(data.masuk);
                $('#totalPulang').text(data.tidak_masuk);
                $('#masukTepatWaktu').text(data.on_time); // Pastikan data.on_time hanya untuk hari ini
                $('#terlambatMasuk').text(data.terlambat);
                // Add other updates as needed
            }
        });
    }

    // Fetch stats every minute
    setInterval(fetchDailyStats, 60000);
    $(document).ready(function() {
        fetchDailyStats(); // Initial fetch
    });
</script>
