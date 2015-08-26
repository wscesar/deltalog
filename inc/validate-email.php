<?php 
	extract($_POST);

    if ( checkdnsrr($domain) ) {
    	echo 'valid-email';
    }else{
    	echo 'invalid-email';
    }
?>