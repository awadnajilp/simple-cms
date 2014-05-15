<?php 
require_once('mail/class.phpmailer.php');
$name = $_POST['name'];
$product = $_POST['product'];
$enquiry = $_POST['message'];
$from_email = $_POST['email'];
$to_email = "awad@delinetechnologies.com";


/*$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
	$mail->IsSendmail(); // telling the class to use SendMail transport
	$mail->AddAddress($to_email,'CBG Tyres');//"to"
	$mail->AddReplyTo($from_email, $name);//from
	$mail->SetFrom($from_email, $name);//from
	$mail->Subject = "New Enquiry Submitted | CBG Tyres";
	$mail->AltBody = "Please find Invoice below"; // optional - MsgHTML will create an alternate automatically
	$mail->MsgHTML($enquiry);
	$mail->send();
*/

mail($to_email, "New Enquiry Submitted | CBG Tyres", $enquiry);
header("Location: contact.php?send");
?>