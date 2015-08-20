<?php include 'inc/controller.php'; ?>

<!doctype html>
<html lang='pt-BR'>
<head>

    <meta charset='UTF-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <!-- <?=$metas?> -->

    <title><?=$title?></title>

    <!-- Base Link -->
    <base href='http://192.168.1.104/deltalog/'>

    <!-- Favicon -->
    <link rel='icon' href='assets/img/favicon.ico'>

    <!-- Css -->
    <link rel='stylesheet' href='assets/css/main.css'>


    <!-- HTML5 Shiv -->
    <!--[if lt IE 9]><script src='assets/js/html5.js'></script><![endif]-->

</head>
<body>
    <?php
        require 'pages/home.php';
    ?>
    <style>
        .modal{
            position: fixed;
            display: none;
            opacity: 0;
            z-index: 3;
            transition: 1s;
        }

        .modal.close{
            height: 100%;
            width: 100%;
            background: rgba(0,0,0,0.5);
        }

        .modal.show{
            opacity: 1;
        }

        .modal.banner{
            width: 800px;
            left: 50%;
            top: 50%;
            transform: translateY(-50%) translateX(-50%);
        }

        .modal figure img{
            width: 100%;
            transition: 1s;

        }


        .modal .ctrl{
            width: 50px;
            display: block;
            height: 50px;
            background: #0f0;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 3;
        }

        .modal .ctrl.left{left:10px;}
        .modal .ctrl.right{right:10px;}



    </style>
    <div class="modal close"></div>
    <div class='modal banner'>
        <figure>
            <span class='ctrl left'></span>
            <span class='ctrl right'></span>
            <img src='' alt=''>
            <figcaption></figcaption>
        </figure>

    </div>

    <!-- Js -->
    <script src='assets/js/jquery.js'></script>
    <script src='assets/js/app.js'></script>

    <!-- Analytics 
    <script src='assets/js/vendor/analytics.js'></script>
    -->

    <script>

        var text_input = document.querySelectorAll('form .text');

        for( var i = 0; i < text_input.length; i++ ) {

            text_input[i].addEventListener('blur', function() {
                
                var content = this.value;
                
                content = content.replace(/    /g,' '), //trim four blank spaces
                content = content.replace(/   /g,' '),  //trim three blank spaces
                content = content.replace(/  /g,' ');   //trim two blank spaces

                this.value = content;

                if ( content != '' ) {
                    
                    this.nextElementSibling.classList.add('fixed')

                } else {

                    content == ' ' ? this.value = '' : this.value = content;
                    this.nextElementSibling.classList.remove('fixed');

                }

            });

        }//end for









        function validate_form() {
            var submit = document.querySelector('form .submit');

            // submit.addEventListener('click', function() {

                var request = new XMLHttpRequest(),
                    name    = document.getElementById('name').value,
                    email   = document.getElementById('email').value,
                    phone   = document.getElementById('phone').value,
                    msg     = document.getElementById('msg').value,
                    data    = 'name='+name+'&email='+email+'&phone='+phone+'&msg='+msg;

                submit.innerHTML = '';

                submit.classList.add('hide');
                submit.classList.add('loading');
                submit.classList.remove('hide');
                
                request.open('POST', 'inc/send-contact.php', true);
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
                request.send(data);

                request.onload = function() {
                    if (request.status >= 200 && request.status < 400) {

                        submit.classList.add('hide');
                        submit.classList.remove('loading');
                        submit.classList.add('success');
                        submit.innerHTML = 'Mesnsgem enviada com sucesso';
                        submit.classList.remove('hide');
                        var response = request.responseText; //do another validation with this var
      
                    } else {
                      
                        submit.classList.add('hide');
                        submit.classList.remove('loading');
                        submit.classList.add('error');
                        submit.innerHTML = 'erro ao enviar mensagem';
                        submit.classList.remove('hide');
      
                    }
                };

            // });
        }





        $('figure .magnify').on('click', function(){
            var img     = this.getAttribute('data-image'),
                group   = this.getAttribute('data-group'),
                number  = this.getAttribute('data-number'),
                content = document.querySelector('.modal figure img'),
                modal   = document.querySelectorAll('.modal');
            
            modal[0].style.display = 'block';
            modal[1].style.display = 'block';

            setTimeout(function(){
                modal[0].classList.add('show');
                modal[1].classList.add('show');
            }, 10);

            content.setAttribute('src','assets/img/'+img)
            content.setAttribute('data-group',group)
            content.setAttribute('data-number',number)
            // $('.modal img').attr('src','assets/img/'+img).attr('data-group',group).attr('data-number',number)
            // $('.modal figcaption').html('sdasdasdasd')
        })







        document.querySelector('.modal .right').addEventListener('click', function(){
            var img = document.querySelector('.modal img'),
                group = img.getAttribute('data-group'),
                next = img.getAttribute('data-number');

            next = parseInt(next) + 1
            next > 3 ? next = 1 : next = next

            img.setAttribute('src','assets/img/'+group+'-0'+next+'.jpg')
            img.setAttribute('data-number',next)
        });






        document.querySelector('.modal .left').addEventListener('click', function(){
            var img = document.querySelector('.modal img'),
                group = img.getAttribute('data-group'),
                next = img.getAttribute('data-number');

            next = parseInt(next) - 1
            next < 1 ? next = 3 : next = next

            img.setAttribute('src','assets/img/'+group+'-0'+next+'.jpg')
            img.setAttribute('data-number',next)
        });





        document.querySelector('.modal.close').addEventListener('click', function(){
            
            var modal   = document.querySelectorAll('.modal');

            modal[0].classList.remove('show');
            modal[1].classList.remove('show');

            setTimeout(function(){
                modal[0].style.display = 'none';
                modal[1].style.display = 'none';
            }, 1000);
        });



    </script>
</body>
</html>