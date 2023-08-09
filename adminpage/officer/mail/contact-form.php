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
$loading = false; // Flag to indicate if loading is in progress

if (isset($_POST['send_emails'])) {
    $emails = $_POST['emails'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // SMTP configuration
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'timeastw@gmail.com'; // Replace with your Gmail email address
        $mail->Password = 'atgnujknlzaeqhyd'; // Replace with your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Sender info
        $mail->setFrom('timeastw@gmail.com', 'Simwawa'); // Replace with your name and your Gmail email address
        $mail->addReplyTo('timeastw@gmail.com', 'Timothy'); // Replace with your name and your Gmail email address

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Send emails to the entered email addresses
        $emailList = explode(',', $emails);
        foreach ($emailList as $email) {
            $mail->addAddress(trim($email));
        }
        
        $loading = true; // Start the loading mechanism

        if ($mail->send()) {
          
        } else {
            $alert = "<div class='alert-error'><span>Email Sending Failed!</span></div>";
        }
    } catch (Exception $e) {
        $alert = "<div class='alert-error'><span>" . $e->getMessage() . "</span></div>";
    }

    $loading = false; // Stop the loading mechanism after sending emails
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Sender</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .container {
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .loading-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }
        .loading-text {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">

    <?php if (!empty($alert)) echo $alert; ?>
    <form method="POST" action="">
        <div class="form-group">
            <label for="emails">Email Addresses (separated by commas):</label>
            <input type="text" id="emails" name="emails" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" class="form-control" required></textarea>
        </div>
        
        <input type="submit" name="send_emails" value="Send Emails" class="btn btn-primary">
        <a href="../admin.php" class="btn btn-secondary">Back</a>
    </form>
    
    <div class="loading-overlay">
        <div class="loading-text">
            Loading...
        </div>
    </div>
</div>

<div class="loading-overlay" <?php if ($loading) echo 'style="display: flex;"'; ?>>
    <div class="loading-text">Sending...</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(document).ready(function() {
        $('form').on('submit', function() {
            $('.loading-overlay').show();
        });
    });
</script>
</body>
</html>

