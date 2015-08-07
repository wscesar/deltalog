<?php

    /* --- SMTP Simple class created by Renan Veroneze © 2013 --- */

    /*  ==========================================================================
        SMTP => Send mail
        ==========================================================================  */

    class SMTP {

        var $host;
        var $user;
        var $pass;
        var $debug = false;

        var $port = 587;

        public function put($value) {
            $fputs = fputs($this->smtp, $value."\n");
            if($debug) { print fgets($this->smtp, 4096).'<br>'; }
            return $fputs;
        }

        public function send($to, $subject, $message, $from = false) {

            if(!$from) $from = $this->user;

            $headers  = "Content-type: text/html; charset=utf-8\n";
            $headers .= "To: <".$to.">\n";
            $headers .= "From: <".$from.">\n";
            $headers .= "Subject: ".$subject."\n\n";

            $headers .= "<html><body>".$message."</body></html>\n.\n";

            $this->smtp = fsockopen($this->host, $this->port);

            $this->put("EHLO localhost");
            $this->put("AUTH LOGIN");
            $this->put(base64_encode($this->user));
            $this->put(base64_encode($this->pass));
            $this->put("MAIL FROM: <".$this->user.">");
            $this->put("RCPT TO: <".$to.">");
            $this->put("DATA");
            $this->put($headers);
            $this->put("QUIT");

            fclose($this->smtp);
        }

    }

    $smtp = new SMTP();

?>
