@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Office</h1>
    <form action="{{ route('offices.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name *</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location">
        </div>
        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude *</label>
            <input type="text" class="form-control" id="latitude" name="latitude" required>
        </div>
        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude *</label>
            <input type="text" class="form-control" id="longitude" name="longitude" required>
        </div>
        <div class="mb-3">
            <label for="radius" class="form-label">Radius *</label>
            <input type="text" class="form-control" id="radius" name="radius" required>
        </div>
        <div id="map" style="height: 400px;"></div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</div>

<script>
    // Inisialisasi peta
    var map = L.map('map').setView([-7.250445, 112.768845], 13); // Ganti dengan koordinat default Anda

    // Tambahkan layer peta
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    // Marker untuk lokasi
    var marker = L.marker([-7.250445, 112.768845]).addTo(map);
    
    // Update latitude dan longitude saat marker dipindahkan
    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        document.getElementById('latitude').value = position.lat;
        document.getElementById('longitude').value = position.lng;
    });

    // Set marker draggable
    marker.dragging.enable();
</script>
@endsection
