<?php include 'inc/controller.php'; ?>

<!doctype html>
<html lang='pt-BR'>
<head>

    <meta charset='UTF-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <!-- <?=$metas?> -->

    <title><?=$title?></title>

    <!-- Base Link -->
    <base href='http://localhost/deltalog/'>

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

    <script>



        /*==============================================
        =            Validate Form Function            =
        ==============================================*/
        
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

        }





        /*==============================================
        =            Send Form Function            =
        ==============================================*/
        
        function send_form() {
                var request = new XMLHttpRequest(),
                    submit  = document.querySelector('form .submit');
                    name    = document.getElementById('name').value,
                    email   = document.getElementById('email').value,
                    phone   = document.getElementById('phone').value,
                    msg     = document.getElementById('msg').value,
                    data    = 'name='+name+'&email='+email+'&phone='+phone+'&msg='+msg;
                
                
                split_email = email.split('@');

                email_user      = split_email[0]
                email_provider  = split_email[1].split('.')[0]
                email_domain    = split_email[1].split('.')[1]

                // email_country   = split_email[1].split('.')[2]
                // email_country != '' ? email_country = email_country : email = 'us'

                submit.setAttribute('disabled','true');
                submit.innerHTML = '';
                submit.classList.add('hide');
                submit.classList.add('loading');
                submit.classList.remove('hide');
                 
                request.open('POST', 'inc/send-contact.php', true);
                request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
                request.send(data);

                request.onload = function() {
                    
                    if (request.status >= 200 && request.status < 400) {

                        var inputs = document.querySelectorAll('form .text, form .label')

                        inputs[0].style.display = 'none'
                        inputs[1].style.display = 'none'
                        inputs[2].style.display = 'none'
                        inputs[3].style.display = 'none'

                        submit.classList.add('hide');
                        submit.classList.add('success');
                        submit.innerHTML = 'Mesnsgem enviada com sucesso';
                        submit.classList.remove('loading');
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
        }





        /*========================================================
        =            Magnify Images On a Modal Banner            =
        ========================================================*/
        
        $('.icon-magnify').on('click', function() {
            var img     = this.getAttribute('data-image'),
                group   = this.getAttribute('data-group'),
                number  = this.getAttribute('data-number'),
                content = document.querySelector('.modal figure img'),
                modal_banner    = document.querySelector('.modal.banner'),
                modal_backgrund = document.querySelector('.modal.background');
            
            modal_banner.style.display = 'block';
            modal_backgrund.style.display = 'block';

            setTimeout(function() {
                modal_banner.classList.add('show');
                modal_backgrund.classList.add('show');
            }, 10);

            content.setAttribute('src','assets/img/'+img)
            content.setAttribute('data-group',group)
            content.setAttribute('data-number',number)
        })





        /*=======================================
        =            Show Data Table            =
        =======================================*/
        
        $('.icon-paper').on('click', function() {

            var table           = this.getAttribute('data-table'),
                table           = document.querySelector(table),
                tables          = document.querySelectorAll('.modal ul'),
                modal_table     = document.querySelector('.modal.table'),
                modal_backgrund = document.querySelector('.modal.background');

            tables[0].classList.remove('show');
            tables[1].classList.remove('show');
            tables[2].classList.remove('show');

            table.classList.add('show');
            modal_table.style.display = 'block';
            modal_backgrund.style.display = 'block';

            setTimeout(function() {
                modal_table.classList.add('show');
                modal_backgrund.classList.add('show');
            }, 10);

        })




        /*===============================================================
        =            Show Next Image Banner On Modal Window            =
        ===============================================================*/

        document.querySelector('.modal .right').addEventListener('click', function() {
            var img = document.querySelector('.modal img'),
                group = img.getAttribute('data-group'),
                next = img.getAttribute('data-number');

            next = parseInt(next) + 1;
            next > 3 ? next = 1 : next = next;

            img.classList.add('hide');

            setTimeout(function() {
                img.setAttribute('src','assets/img/'+group+'-0'+next+'.jpg');
                img.setAttribute('data-number',next);
                img.classList.remove('hide');
            }, 500);
            
        });



        /*===============================================================
        =            Show Previous Image Banner On Modal Window            =
        ===============================================================*/

        document.querySelector('.modal .left').addEventListener('click', function() {
            var img = document.querySelector('.modal img'),
                group = img.getAttribute('data-group'),
                next = img.getAttribute('data-number');

            next = parseInt(next) - 1;
            next < 1 ? next = 3 : next = next;

            img.classList.add('hide');

            setTimeout(function() {
                img.setAttribute('src','assets/img/'+group+'-0'+next+'.jpg');
                img.setAttribute('data-number',next);
                img.classList.remove('hide');
            }, 500);
        });



        /*==========================================
        =            Close Modal Window            =
        ==========================================*/

        document.querySelector('.modal.background').addEventListener('click', function() {
            
            var modal_table      = document.querySelector('.modal.table'),
                modal_banner     = document.querySelector('.modal.banner'),
                modal_background = document.querySelector('.modal.background');


            modal_table.classList.remove('show');
            modal_banner.classList.remove('show');
            modal_background.classList.remove('show');

                
            setTimeout(function() {
                modal_table.style.display = 'none';
                modal_banner.style.display = 'none';
                modal_background.style.display = 'none';
            }, 1000);


        });



    </script>
</body>
</html>