<?php 
function sendMail($rcpt,$subj,$msg){
	$to = $rcpt;
	$subject = $subj;

	$headers = "From: Herzing College <me@herzing.com> \r\n";
	$headers .= "Reply-to Chad <sarroufchad@gmail.com> \r\n";
	$headers .= "MIME-Version: 1.0 \r\n";
	//$headers .= "MIME-Version: " . phpversion() . "\r\n";
	$headers .= "Content-type: text/html; charset=utf-8 \r\n";
	$headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
	$message = date("l jS \of F Y h:i:s A")."\n\n";
	$message .= $msg;	
	mail($to, $subject, $message, $headers);	
}
?>