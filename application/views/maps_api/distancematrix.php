<!DOCTYPE html>
<html>

<head>
    <title>Distance Matrix Service</title>
    <style>
        #right-panel {
            font-family: 'Roboto', 'sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }

        #right-panel select,
        #right-panel input {
            font-size: 15px;
        }

        #right-panel select {
            width: 100%;
        }

        #right-panel i {
            font-size: 12px;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 100%;
            width: 50%;
        }

        #right-panel {
            float: right;
            width: 48%;
            padding-left: 2%;
        }

        #output {
            font-size: 11px;
        }
    </style>
</head>

<body>
    <div id="right-panel">
        <div id="inputs">
            <pre>
var origin1 = {lat: 55.930, lng: -3.118};
var origin2 = 'Greenwich, England';
var destinationA = 'Stockholm, Sweden';
var destinationB = {lat: 50.087, lng: 14.421};
        </pre>
        </div>
        <div>
            <strong>Results</strong>
        </div>
        <div id="output"></div>
    </div>
    <div id="map"></div>
    <script>
        function initMap() {
            var bounds = new google.maps.LatLngBounds;
            var markersArray = [];

            var origin1 = {
                lat: 55.93,
                lng: -3.118
            };
            var origin2 = 'Greenwich, England';
            var destinationA = 'Stockholm, Sweden';
            var destinationB = {
                lat: 50.087,
                lng: 14.421
            };

            var destinationIcon = 'https://chart.googleapis.com/chart?' +
                'chst=d_map_pin_letter&chld=D|FF0000|000000';
            var originIcon = 'https://chart.googleapis.com/chart?' +
                'chst=d_map_pin_letter&chld=O|FFFF00|000000';
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 55.53,
                    lng: 9.4
                },
                zoom: 10
            });
            var geocoder = new google.maps.Geocoder;

            var service = new google.maps.DistanceMatrixService;
            service.getDistanceMatrix({
                origins: [origin1, origin2],
                destinations: [destinationA, destinationB],
                travelMode: 'DRIVING',
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function(response, status) {
                if (status !== 'OK') {
                    alert('Error was: ' + status);
                } else {
                    var originList = response.originAddresses;
                    var destinationList = response.destinationAddresses;
                    var outputDiv = document.getElementById('output');
                    outputDiv.innerHTML = '';
                    deleteMarkers(markersArray);

                    var showGeocodedAddressOnMap = function(asDestination) {
                        var icon = asDestination ? destinationIcon : originIcon;
                        return function(results, status) {
                            if (status === 'OK') {
                                map.fitBounds(bounds.extend(results[0].geometry.location));
                                markersArray.push(new google.maps.Marker({
                                    map: map,
                                    position: results[0].geometry.location,
                                    icon: icon
                                }));
                            } else {
                                alert('Geocode was not successful due to: ' + status);
                            }
                        };
                    };

                    for (var i = 0; i < originList.length; i++) {
                        var results = response.rows[i].elements;
                        geocoder.geocode({
                                'address': originList[i]
                            },
                            showGeocodedAddressOnMap(false));
                        for (var j = 0; j < results.length; j++) {
                            geocoder.geocode({
                                    'address': destinationList[j]
                                },
                                showGeocodedAddressOnMap(true));
                            outputDiv.innerHTML += originList[i] + ' to ' + destinationList[j] +
                                ': ' + results[j].distance.text + ' in ' +
                                results[j].duration.text + '<br>';
                        }
                    }
                }
            });
        }

        function deleteMarkers(markersArray) {
            for (var i = 0; i < markersArray.length; i++) {
                markersArray[i].setMap(null);
            }
            markersArray = [];
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1X2rDJa6ThD6HYu_LIeIa61d8BzYF2V8&callback=initMap">
    </script>
</body>

</html>