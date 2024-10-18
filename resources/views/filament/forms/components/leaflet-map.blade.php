<div id="map" style="height: 300px;"></div>

<!-- Tambahkan di dalam <head> -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const map = L.map('map').setView([-7.250445, 112.768845], 10); // Set default view

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        const marker = L.marker([-7.250445, 112.768845], { draggable: true }).addTo(map); // Default marker

        // Update latitude and longitude fields on marker drag
        marker.on('dragend', function(e) {
            const lat = marker.getLatLng().lat;
            const lng = marker.getLatLng().lng;

            // Update latitude and longitude input fields
            document.querySelector('input[name="latitude"]').value = lat;
            document.querySelector('input[name="longitude"]').value = lng;
        });

        // Update marker position and input fields on map double click
        map.on('dblclick', function(e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;

            // Update marker position
            marker.setLatLng([lat, lng]);

            // Update latitude and longitude input fields
            document.querySelector('input[name="latitude"]').value = lat;
            document.querySelector('input[name="longitude"]').value = lng;
        });
    });
</script>