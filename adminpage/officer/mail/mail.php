<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library files
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

// Create an instance of PHPMailer class
$mail = new PHPMailer(true);

$alert = '';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // SMTP configuration
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'timeastw@gmail.com';
        $mail->Password = 'atgnujknlzaeqhyd'; // Replace with your actual password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender info
        $mail->setFrom('timeastw@gmail.com', 'timeastw');
        $mail->addReplyTo('timeastw@gmail.com', 'timeastw');

        // Recipient info
        $mail->addAddress('simwawatimothy111@gmail.com'); // Replace with the actual recipient's email address

        $mail->isHTML(true);
        $mail->Subject = 'Message received from contact: ' . $name;
        $mail->Body = "Name: $name <br>Phone: $phone<br>Email: $email<br>Message: $message";

        $mail->send();
        $alert = "<div class='alert-success'><span>Message Sent! Thanks for contacting us.</span></div>";
    } catch (Exception $e) {
        $alert = "<div class='alert-error'><span>" . $e->getMessage() . "</span></div>";
    }
}

echo $alert;
?>
