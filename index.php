<?php include 'inc/controller.php'; ?>

<!doctype html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=1280">
    <!-- <?=$metas?> -->

    <title><?=$title?></title>

    <!-- Base Link -->
    <base href="http://localhost/deltalog/">

    <!-- Favicon -->
    <link rel="icon" href="assets/img/favicon.ico">

    <!-- Css -->
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- HTML5 Shiv -->
    <!--[if lt IE 9]><script src="assets/js/vendor/html5.js"></script><![endif]-->

</head>
<body>

    <?php

        require 'pages/home.php';

    ?>

    <!-- Js -->
    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/lib/app.js"></script>

    <!-- Analytics -->
    <script src="assets/js/vendor/analytics.js"></script>

</body>
</html>
