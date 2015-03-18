<?php
require_once("functions.php");
include_once('settings.php')
?>
<!doctype html>
<html lang="en">
<head>
    <title>Messages</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="css/style-menu.css" media="screen" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="script.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

</head>
<body>

<div class="main-card">
    <div class="right"><a href="logout.php" style="color: #2c31e8;">Logout</a></div>
    <div class='right'> <?php print $_SESSION['user']; ?></div></br></br>

    <div id='cssmenu'>
        <ul>
            <li><a href='index.php'>Profile</a></li>
            <li><a href='#'>Friends</a></li>
            <li class='active has-sub'><a href='messages.php'>Messages</a></li>
            <li><a href='search.php'>Search</a>
                <ul>
                    <li class='has-sub'><a href='#'>JS Search</a></li>
                    <li class='has-sub'><a href='#'>jQuery Search</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <h1>Map</h1>
    <section id="wrapper">
        <h3>Click the allow button to let the browser find your location.</h3>

        <article>

        </article>
        <script>
            function success(position) {
                var mapcanvas = document.createElement('div');
                mapcanvas.id = 'mapcontainer';
                mapcanvas.style.height = '400px';
                mapcanvas.style.width = '500px';

                document.querySelector('article').appendChild(mapcanvas);

                var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

                var options = {
                    zoom: 15,
                    center: coords,
                    mapTypeControl: false,
                    navigationControlOptions: {
                        style: google.maps.NavigationControlStyle.SMALL
                    },
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("mapcontainer"), options);

//                var marker = new google.maps.Marker({
//                    position: coords,
//                    map: map,
//                    title:"You are here!"
//                });

                var infowindow = new google.maps.InfoWindow({
                    map: map,
                    position: coords,
                    content:
                    '<p>you are here:</p></br>' +
                    '<li>Latitude: ' + position.coords.latitude + '</li>' +
                    '<li>Longitude: ' + position.coords.longitude + '</li>'
                });

            }

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(success);
            } else {
                error('Geo Location is not supported');
            }

        </script>
    </section>



</div>
</body>
</html>