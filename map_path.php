<!DOCTYPE xhtml PUBLIC "-//W3C//DTD XHTML 4.01//EN">
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Map Path</title>
    <script type="text/javascript"
        src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="geometa.js"></script>
    <style type="text/css">
        *, html
        {
            margin: 0;
            padding: 0;
        }

        div#map_canvas
        {
            width: 100%;
            height: 100%;
        }

        div#info
        {
            width: 100%;
            position: absolute;
            overflow: hidden;
            text-align: center;
            top: 0;
            left: 0;
        }

        .lightBox
        {
            filter: alpha(opacity=60);
            -moz-opacity: 0.6;
            -khtml-opacity: 0.6;
            opacity: 0.6;
            background-color: white;
            padding: 2px;
        }
    </style>
    <script type="text/javascript">
        var map;
        var myInterval = 0;
        var iFrequency = 5000;
        var coordinates = [];
        function initialise() {
            var latlng = new google.maps.LatLng(-25.363882, 131.044922);
            var myOptions = {
                zoom: 4,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.TERRAIN,
                disableDefaultUI: true
            }
            prepareGeolocation();
            doGeolocation();
            startLoop();
        }
        function startLoop() {
            if (myInterval > 0) clearInterval(myInterval);  // stop
            myInterval = setInterval("doGeolocation()", iFrequency);  // run
        }
        function doGeolocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(positionSuccess, positionError);
            } else {
                positionError(-1);
            }
        }
        function positionError(err) {
            var msg;
            switch (err.code) {
                case err.UNKNOWN_ERROR:
                    msg = "Unable to find your location";
                    break;
                case err.PERMISSION_DENINED:
                    msg = "Permission denied in finding your location";
                    break;
                case err.POSITION_UNAVAILABLE:
                    msg = "Your location is currently unknown";
                    break;
                case err.BREAK:
                    msg = "Attempt to find location took too long";
                    break;
                default:
                    msg = "Location detection not supported in browser";
            }
            document.getElementById('info').innerHTML = msg;
        }
        function positionSuccess(position) {
            var coords = position.coords || position.coordinate || position;
            var latLng = new google.maps.LatLng(coords.latitude, coords.longitude);
            if(coordinates.length != 0){
                var coordinate = a[a.length - 1];
                if((coordinate[0] != coords.latitude) || (coordinate[1] != coords.longtitude)){
                    coordinates.push([coords.latitude, coords.longitude]);
                }
            }
            else
                coordinates.push([coords.latitude, coords.longitude]);

            document.getElementById('info').innerHTML = 'Looking for <b>' +
            coords.latitude + ', ' + coords.longitude + '</b>...' + myInterval;
        }
        function contains(array, item) {
            for (var i = 0, I = array.length; i < I; ++i) {
                if (array[i] == item) return true;
            }
            return false;
        }
    </script>
</head>
<body onload="initialise()">
    <div id="map_canvas"></div>
    <div id="info" class="lightbox">Detecting your location...</div>
</body>
</html>
