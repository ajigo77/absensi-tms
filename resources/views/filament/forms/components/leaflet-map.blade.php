<div x-data="{ lat: $wire.entangle('data.latitude'), lng: $wire.entangle('data.longitude') }" x-init="
    $nextTick(() => {
        var map = L.map($refs.map).setView([lat || 0, lng || 0], 2);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        var marker = L.marker([lat || 0, lng || 0], {draggable: true}).addTo(map);

        function updateLatLng(latlng) {
            lat = latlng.lat.toFixed(8);
            lng = latlng.lng.toFixed(8);
            $wire.set('data.latitude', lat);
            $wire.set('data.longitude', lng);
        }

        marker.on('dragend', function(e) {
            updateLatLng(marker.getLatLng());
        });

        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            updateLatLng(e.latlng);
        });

        // Update map if lat/lng are changed externally
        $watch('lat', value => {
            if (value) {
                marker.setLatLng([lat, lng]);
                map.setView([lat, lng]);
            }
        });
        $watch('lng', value => {
            if (value) {
                marker.setLatLng([lat, lng]);
                map.setView([lat, lng]);
            }
        });
    });
">
    <div x-ref="map" style="height: 400px;"></div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>