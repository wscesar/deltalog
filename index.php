<?php include 'inc/controller.php'; ?>

<!doctype html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!-- <?=$metas?> -->

    <title><?=$title?></title>

    <!-- Base Link -->
    <base href="http://192.168.1.104/deltalog/">

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

        $('nav a').on('click', function() {

            page = $(this).attr('data-page')

            goTo = $(page).position();

            $('html, body').stop().animate({
                scrollTop: goTo.top
            },1000)

        })


        window.onscroll = function() {
            var window_top_position = window.pageYOffset,
                parallax_banner     = document.querySelector('.bgParallax'),
                header_height       = document.querySelector('header').offsetHeight,
                nav                 = document.querySelector('nav');
                
                // img                 = document.querySelector('h1');
                // speed = (30 - window_top_position) * 0.1;
                // img.style.textShadow = '0 '+ speed + 'px 10px #0f0';

            // change parallax banner position
            parallax_banner.style.backgroundPosition = '50% '+ window_top_position + 'px';
            

            // set nav position to fixed if window top position pass the banner height
            if(window_top_position > header_height) {
                nav.classList.add('fixed')
            }else {
                nav.classList.remove('fixed')
            }
        };

        var banner_thumbs = document.querySelectorAll('.ctrl > button');

        function changeBanner(elem){
            var banner      = document.querySelector('#prime-logistics > .banner'),
                next_image  = elem.getAttribute('data-banner');

            //pass trough banner_thumbs removing 'active' class
            for (i = 0; i < banner_thumbs.length; i++) {
                banner_thumbs[i].classList.remove('active')
            }

            //add 'active' class on clicked button
            elem.classList.add('active');

            // hide banner
            banner.style.opacity = "0"
            
            // change image
            banner.setAttribute('data-banner', next_image)

            // show banner
            banner.style.opacity = "1"
            
        }

        // apply changeBanner() on all banner_thumbs 
        for (i = 0; i < banner_thumbs.length; i++) {
            banner_thumbs[i].addEventListener('click', function(){
                changeBanner(this)
            }, false)
        }




        // shows hidden nav on responsive mode
        document.querySelector('nav .button').addEventListener('click', function() {
            document.querySelector('nav').classList.add('active')

        })

        // hide nav on responsive mode on touch some 'nav > a' element
        var nav_a = document.querySelectorAll('nav a')

        for (i = 0; i < nav_a.length; i++) {
            nav_a[i].addEventListener('click', function() {
                document.querySelector('nav').classList.remove('active')
            }, false)
        }


    </script>

    <script>//swipe.js
        document.addEventListener('touchstart', handleTouchStart, false);        
        document.addEventListener('touchmove', handleTouchMove, false);

        var xDown = null;                                                        
        var yDown = null;                                                        

        function handleTouchStart(evt) {        
            xDown = evt.touches[0].clientX;                                      
            yDown = evt.touches[0].clientY;                                      
        };                                                

        function handleTouchMove(evt) {
            if ( ! xDown || ! yDown ) {
                return;
            }

            var xUp = evt.touches[0].clientX;                                    
            var yUp = evt.touches[0].clientY;

            var xDiff = xDown - xUp;
            var yDiff = yDown - yUp;

            if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
                if ( xDiff > 0 ) {
                    /* left swipe */ 
                    document.querySelector('nav').classList.remove('active')
                    return false

                } else {
                    /* right swipe */
                }                       
            } else {
                if ( yDiff > 0 ) {
                    /* up swipe */ 
                } else { 
                    /* down swipe */
                }                                                                 
            }
            /* reset values */
            xDown = null;
            yDown = null;                                             
        };
    </script>



</body>
</html>
