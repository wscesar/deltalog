<?php include 'inc/controller.php'; ?>

<!doctype html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!-- <?=$metas?> -->

    <title><?=$title?></title>

    <!-- Base Link -->
    <base href="http://localhost/deltalog/">

    <!-- Favicon -->
    <link rel="icon" href="assets/img/favicon.ico">

    <!-- Css -->
    <link rel="stylesheet" href="assets/css/main.css">


    <!-- HTML5 Shiv -->
    <!--[if lt IE 9]><script src="assets/js/html5.js"></script><![endif]-->

</head>
<body>
    <?php
        require 'pages/home.php';
    ?>

    <!-- Js -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/app.js"></script>

    <!-- Analytics 
    <script src="assets/js/vendor/analytics.js"></script>
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
                    // $(this).next().addClass('fixed')
                    this.nextElementSibling.classList.add('fixed')
                } else {
                    content == ' ' ? $(this).val('') : $(this).val(content)
                    $(this).next().removeClass('fixed')
                }

            });

        }//end for









        function validate_form() {
            var submit = document.querySelector('form .submit');

            // submit.addEventListener('click', function(){

                var request = new XMLHttpRequest(),
                    name    = document.getElementById('name').value,
                    email   = document.getElementById('email').value,
                    phone   = document.getElementById('phone').value,
                    msg     = document.getElementById('msg').value,
                    data    = "name="+name+"&email="+email+"&phone="+phone+"&msg="+msg;

                submit.innerHTML = '';
                submit.classList.add('loading');
                
                request.open('POST', 'inc/send-contact.php', true);
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
                request.send(data);

                request.onload = function() {
                    if (request.status >= 200 && request.status < 400) {

                        submit.classList.remove('loading');
                        submit.classList.add('success');
                        submit.innerHTML = 'Mesnsgem enviada com sucesso';
                        // var response = request.responseText; //do another validation with this var
      
                    } else {
                      
                        submit.classList.remove('loading');
                        submit.classList.add("error");
                        submit.innerHTML = 'erro ao enviar mensagem';
      
                    }
                };

            // });
            
        }
    </script>
</body>
</html>