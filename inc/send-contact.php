<?php

    include 'smtp.php';

    /*  ==========================================================================
        Send Contact Action
        ==========================================================================  */

    // Config

    $smtp->host = ''; // smtp.myserver.com
    $smtp->user = ''; // myuser@myserver.com
    $smtp->pass = ''; // mypop3password


    // Message

    $msg = '<table>
                <tr>
                    <td>HTML MESSAGE</td>
                </tr>
            </table>';


    // Send

    $smtp->send('to@email.com', 'Subject', $msg);

?>