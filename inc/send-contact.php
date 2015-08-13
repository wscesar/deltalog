<?php
    extract($_POST);
    include 'smtp.php';

    /*  ==========================================================================
        Send Contact Action
        ==========================================================================  */

    // Config

    $smtp->host = 'mail.ituinformatica.com'; // smtp.myserver.com
    $smtp->user = 'william@ituinformatica.com'; // myuser@myserver.com
    $smtp->pass = ''; // mypop3password


    // Message

    $msg = '<table>
                <tr>
                    <td>HTML MESSAGE</td>
                </tr>
            </table>';


    // Send

    $smtp->send('wscesar@gmail.com', 'testando envio', $msg);

?>