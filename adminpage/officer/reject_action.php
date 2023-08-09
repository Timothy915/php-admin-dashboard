<?php
// Include config file
require_once "config.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if ID parameter is provided in the URL
if (isset($_GET['id'])) {
    // Establish a database connection
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Check if the connection was successful
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize the ID parameter to prevent SQL injection
    $username = mysqli_real_escape_string($link, $_GET['id']);

    // Update the status to 'reject' in the database
    $sql = "UPDATE Person SET Status = 'reject' WHERE username = '$username'";
    if (mysqli_query($link, $sql)) {
        // Success message with enhanced features
        echo '<div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 4px; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2); text-align: center; font-size: 18px;">Status updated successfully.</div>';
    } else {
        echo "Error updating status: " . mysqli_error($link);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Add your CSS styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <!-- Add your HTML content here -->
</body>
</html>
