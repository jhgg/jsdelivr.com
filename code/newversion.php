<?php
error_reporting(E_ERROR);
	$message = $_POST['project'];
	$from  =   $_POST['email'];
	$subject = "jsDelivr Submit";
	$mailD	  =	  "submit@jsdelivr.com";
	
	$emailTo = 'dakulovgr@gmail.com'; //Put your own email address here

	    $headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n"; 
		$headers .= 'From: jsDelivr.com Submit <'.$mailD.'>' . "\r\n" . 'Reply-To: ' . $from;
		$body = "Update plugin:$message <br/> Link: http://www.jsdelivr.com/#!$message <br/> From: $from";
    
    if(mail($emailTo, $subject, $body, $headers)){
	header('location: http://www.jsdelivr.com/index.php');    
    }else{
        echo "Error";
    }
?>