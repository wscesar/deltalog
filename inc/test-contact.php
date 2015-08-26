<?php
    extract($_GET);
    include 'smtp.php';
    date_default_timezone_set('Brazil/East');

    if (checkdnsrr('megainfoitu.cm.br')){
        
        $smtp->host = 'mail.ituinformatica.com'; // smtp.myserver.com
        $smtp->user = 'william@ituinformatica.com'; // myuser@myserver.com
        $smtp->pass = 'wsk8c0r3'; // mypop3password

        $msg = '<table>
                    <tr>
                        <td>Olá, <b>'.strtoupper($name).'</b>, enviou uma mensagem pelo site.</td>
                    </tr>

                    <tr>
                        <td><b>Dados Pessoais</b></td>
                    </tr>

                    <tr>
                        <td><b>Contato:</b> '.$email.'</td>
                    </tr>

                    <tr>
                        <td><b>Mensagem:</b> "'.$msg.'"</td>
                    </tr>

                    <tr>
                        <td><font face="Arial" color="#505050">'.date('d/m/Y - H:i').'</font></td>
                    </tr>
                </table>';

        // Send
        $success = $smtp->send('wscesar@gmail.com', 'Mensagem Enviada Por: '.strtoupper($name), $msg);

        if( !$success ) {
            echo 'ok';
        }else{
            echo 'error';
        }
    }else{
        echo 'invalid-email-domain';
    }
?>