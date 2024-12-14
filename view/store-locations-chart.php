<!DOCTYPE html> 
<html lang="en">
<head>
     <div style="text-align: center; padding: 50px;">
       <span style="font-weight: bold; color: #006400; font-size: 50px; border-style: dashed; border-radius: 10px; border-width: 2px; display: inline-block; padding: 10px;">Tattered Cover Store Locations</span>
       <br/>
       <br/>
     </div>
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

     <style>
        body {
            background-image: url('Bookpile.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            background-color: rgba(255, 255, 255, 0.5); // half white so it looks kind of transparent
        }
    </style>
</head>

<body>
     
<div style="display: flex; flex-direction: row; gap: 20px; justify-content: center; align-content: center;">
     <div>
          <span style="width: 400px; color: #006400; font-size: 25px; border-style: dashed; border-radius: 10px; border-width: 2px; display: inline-block; padding: 10px;">
          Tattered Cover has four store locations across the Denver area, including one in downtown Historic Denver.
          </span>
     </div>
     <div id="map" style="height:400px; width: 400px;"></div>
</div>
     
<script>
var stores = <?php echo isset($stores) ? json_encode($stores) : '[]'; ?>;

var map = L.map('map').setView([39.75, -105.0020], 10);

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
