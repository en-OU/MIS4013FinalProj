<!DOCTYPE html> 
<html lang="en">
<head>
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
</head>

<body>
<div id="map" style="height:300px;"></div>
<script>
var stores = <?php echo isset($stores) ? json_encode($stores) : '[]'; ?>;

var map = L.map('map').setView([39.5501, -105.7821], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

     // Loop through each store 
         stores.forEach(function(store) {
         L.marker([store.Latitude, store.Longitude]) 
             .addTo(map)
             .bindPopup(store.StoreID);  
     });
     
</script>
</body>
</html>
