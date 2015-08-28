<?php include 'inc/controller.php'; ?>

<!doctype html>
<html lang='pt-BR'>
<head>

    <meta charset='UTF-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <!-- <?=$metas?> -->

    <title><?=$title?></title>

    <!-- Base Link -->
    <base href='http://192.168.1.105/deltalog/'>

    <!-- Favicon -->
    <link rel='icon' href='assets/img/favicon.ico'>

    <!-- Css -->
    <link rel='stylesheet' href='assets/css/main.css'>


    <!-- HTML5 Shiv -->
    <!--[if lt IE 9]><script src='assets/js/html5.js'></script><![endif]-->

</head>
<body>
    <?php require 'pages/home.php'; ?>

    <!-- Js -->
    <script src='assets/js/jquery.js'></script>
    <script src='assets/js/app.js'></script>

    <!-- Analytics 
    <script src='assets/js/vendor/analytics.js'></script>
    -->

<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<script>

    var map_center = new google.maps.LatLng(-23.1751372,-47.2839073,1623);
    var map_icon_position = new google.maps.LatLng(-23.1751372,-47.2839073,1623);

    function initialize() {

       var mapOptions = {
           center: map_center,
           disableDefaultUI: true,
           zoomControl: true,
           streetViewControl: true,
           zoom: 16,
           scrollwheel: false,
           navigationControl: false,
           mapTypeControl: false,
           scaleControl: false,
           mapTypeId: google.maps.MapTypeId.HYBRID

       };

       var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
      
       // opções do marcador
       var marker = new google.maps.Marker({
          position: map_icon_position,
          map: map,
          title:"Deltalog",
          icon: 'assets/img/location.png',
          animation: google.maps.Animation.DROP
      });

    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<script>

</script>
</body>
</html>