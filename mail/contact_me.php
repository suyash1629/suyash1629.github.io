<?php
// Check for empty fields
header('Access-Control-Allow-Origin: *');
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
// Create the email and send the message
$to = 'csciclub@stcloudstate.edu'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "HackSCSU contact form: $name";
$email_body = "Name: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: csciclub@csci.club\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>
