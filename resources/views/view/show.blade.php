@extends('layouts.app') <!-- Adjust this based on your layout -->

@section('content')
    <div class="container">
        <h1>View Details for ID: {{ $view->id_absen }}</h1> <!-- Correct variable name -->
        
        <div>
            <h2>Image</h2>
            <img src="{{ asset($view->foto) }}" alt="User Image" style="max-width: 100%; height: auto;" />
        </div>

        <div>
            <h2>Location</h2>
            <p>Latitude: {{ $view->latitude }}</p>
            <p>Longitude: {{ $view->longitude }}</p>
        </div>

        <div id="map" style="height: 400px;"></div>

        <script>
            var map = L.map('map').setView([{{ $view->latitude }}, {{ $view->longitude }}], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);
            L.marker([{{ $view->latitude }}, {{ $view->longitude }}]).addTo(map);
        </script>
    </div>
@endsection
