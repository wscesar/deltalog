<?php include 'inc/controller.php'; ?>

<!doctype html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!-- <?=$metas?> -->

    <title><?=$title?></title>

    <!-- Base Link -->
    <base href="http://192.168.1.105/deltalog/">

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

    <!-- Analytics 
    <script src="assets/js/lib/app.js"></script>
    <script src="assets/js/vendor/analytics.js"></script>
    -->

    <script>

        $("nav a").on("click", function() {

            page = $(this).attr("data-page")

            goTo = $(page).position();

            $("html, body").stop().animate({

                scrollTop: goTo.top

            },1000)

        })

        

        var $obj = $('.bgParallax');

        $(window).scroll(function() {

            var y = $("header").height()

            var t = $(window).scrollTop()

            if(t > y) {

                $("nav, header").addClass("fixed")

            }else {

                $("nav, header").removeClass("fixed")

            }

            var yPos = ($(window).scrollTop() / $obj.data('speed')); 

            var bgpos = '50% '+ yPos + 'px';

            $obj.css('background-position', bgpos );

        });

    </script>

    <script>
            // $( "nav" ).on( "swipeleft", function(){
            //     $("nav").removeClass("active")
            // })

            $( "nav button" ).on( "click", function(){
                $("nav").addClass("active")
            })
    </script>



</body>
</html>
