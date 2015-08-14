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

        $('nav a').on('click', function() {

            page = $(this).attr('data-page')

            goTo = $(page).position();

            $('html, body').stop().animate({
                scrollTop: goTo.top
            },1000)

        })

        

        var $obj = $('.bgParallax');

        $(window).scroll(function() {

            var y = $('header').height()

            var t = $(window).scrollTop()

            if(t > y) {
                $('nav, header').addClass('fixed')
            }else {
                $('nav, header').removeClass('fixed')
            }

            var yPos = ($(window).scrollTop() / $obj.data('speed')); 

            var bgpos = '50% '+ yPos + 'px';

            $obj.css('background-position', bgpos );

        });



        var banner_thumbs = document.querySelectorAll('.ctrl > button');

        function changeBanner(elem){
            var banner      = document.querySelector('#prime-logistics > .banner');
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
            banner_thumbs[i].addEventListener("click", function(){
                changeBanner(this)
            }, false)
        }




        // shows hidden nav on responsive mode
        document.querySelector('nav .button').addEventListener("click", function() {
            document.querySelector('nav').classList.add('active')

        })

        // hide nav on responsive mode on touch some 'nav > a' element
        var nav_a = document.querySelectorAll('nav a')

        for (i = 0; i < nav_a.length; i++) {
            nav_a[i].addEventListener("click", function() {
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
