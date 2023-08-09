<?php
$message = ""; 
if(isset($_POST['submit'])){
	$to = "simwawatimothy111@gmail.com"; // Your email address
	$name = $_POST['name'];
	$from = $_POST['email'];
	$phone = $_POST['mobile'];
	$message = "<!DOCTYPE html>
	<html>
	<head>
	</head>
	<body>
	<table rules='all' border='1' style='border-color: #666;' cellpadding='10'>
    <tr style='background: #eee;'><td colspan='2'><strong>Contact Form Details</strong> </td></tr>
    <tr>
        <td><strong>Name:</strong></td>
        <td>".$_POST['name']."</td>
    </tr>
    <tr>
        <td><strong>Mobile:</strong></td>
        <td>".$_POST['mobile']."</td>
    </tr>
    <tr>
        <td><strong>Email:</strong></td>
        <td>".$_POST['email']."</td>
    </tr>
    <tr>
        <td><strong>Message:</strong></td>
        <td>".$_POST['message']."</td>
    </tr>
	</table>
	</body>
	</html>";
	
	$subject = "Contact Form Details";
	
	// Set content-type header for sending HTML email 
	$headers = "MIME-Version: 1.0" . "\r\n"; 
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	
	$headers .= "From:" . $from . "\r\n";
	
	$result = mail($to,$subject,$message,$headers);
	if ($result) {
		// $message = "Your Message was sent Successfully!";
		echo '<script type="text/javascript">alert("Your Message was sent Successfully!");</script>';
		echo '<script type="text/javascript">window.location.href = window.location.href;</script>';

	}else{
		// $message = "Sorry! Message was not sent, Try again Later.";
		echo '<script type="text/javascript">alert("Sorry! Message was not sent, Try again Later.");</script>';
		echo '<script type="text/javascript">window.location.href = window.location.href;</script>';
	}
	// header('Location: contact.php');
}
?>
Now the above code is ready to run.