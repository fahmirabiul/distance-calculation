<!DOCTYPE html>
<html>

<head>
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;
            width: 600px;
        }
    </style>
</head>

<body>
    <!--The div elements for the map and message -->
    <div id="map"></div>
    <div id="msg"></div>
    <script>
        // Initialize and add the map
        var map;

        function haversine_distance(mk1, mk2) {
            var R = 6371.0710; // Radius of the Earth in KM
            var rlat1 = mk1.position.lat() * (Math.PI / 180); // Convert degrees to radians
            var rlat2 = mk2.position.lat() * (Math.PI / 180); // Convert degrees to radians
            var difflat = rlat2 - rlat1; // Radian difference (latitudes)
            var difflon = (mk2.position.lng() - mk1.position.lng()) * (Math.PI / 180); // Radian difference (longitudes)
            var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat / 2) * Math.sin(difflat / 2) + Math.cos(rlat1) * Math.cos(rlat2) * Math.sin(difflon / 2) * Math.sin(difflon / 2)));
            return d;
        }

        function initMap() {
            // The map, centered on Central Park
            const center = {
                lat: -6.897140,
                lng: 107.636404
            };
            const options = {
                zoom: 15,
                scaleControl: true,
                center: center
            };
            map = new google.maps.Map(
                document.getElementById('map'), options);
            // Locations of landmarks
            const dakota = {
                lat: -6.897140,
                lng: 107.636404
            };
            const frick = {
                lat: -6.897649,
                lng: 107.635019
            };
            // The markers for The Dakota and The Frick Collection
            var mk1 = new google.maps.Marker({
                position: dakota,
                map: map
            });
            var mk2 = new google.maps.Marker({
                position: frick,
                map: map
            });

            // Calculate and display the distance between markers
            var distance = haversine_distance(mk1, mk2);
            document.getElementById('msg').innerHTML = "Distance between markers: " + distance.toFixed(7) + " km.";
        }

        // Draw a line showing the straight distance between the markers
        var line = new google.maps.Polyline({
            path: [dakota, frick],
            map: map
        });
    </script>
    <!--Load the API from the specified URL -- remember to replace YOUR_API_KEY-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1X2rDJa6ThD6HYu_LIeIa61d8BzYF2V8&callback=initMap">
    </script>
</body>

</html>