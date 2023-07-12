<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>
    <style>
        #map {
            height: 400px;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var app = {{ Js::from($customers) }};
            var mylatlng = {
                lat: 23.819107560342403,
                lng: 90.48129855392969
            }
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 6,
                center: mylatlng,
            });
            for (var i = 0; i < app.length; i++) {
                new google.maps.Marker({
                    position: new google.maps.LatLng(app[i].latitude, app[i].longitude),
                    map: map
                });
            }
        });
    </script>
</body>

</html>
