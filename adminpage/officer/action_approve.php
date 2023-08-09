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

    // Update the status to 'approve' in the database
    $sql = "UPDATE Person SET Status = 'approve' WHERE username = '$username'";
    if (mysqli_query($link, $sql)) {
        // Debugging: Output success message
        echo "Status updated successfully.<br>";

        // Calculate expiry date based on the age of the applicant
        $expiryDate = date('Y-m-d', strtotime('+10 years'));

        // Generate a unique passport number starting with the current year
        $currentYear = date('Y');
        $passportNumber = generatePassportNumber($currentYear);

        // Insert data into Passport table
        $passportQuery = "INSERT INTO Passport (username, passport_number, expiry_date) VALUES ('$username', '$passportNumber', '$expiryDate')";
        if (mysqli_query($link, $passportQuery)) {
            echo "<script>
            var style = document.createElement('style');
            style.innerHTML = '.popup { background-color: #f5f5f5; color: #333333; padding: 20px; border-radius: 5px; box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1); font-family: Arial, sans-serif; font-size: 18px; }';
            document.head.appendChild(style);
            alert('Passport details inserted successfully.');
          </script>";
        } else {
            echo "Error inserting passport details: " . mysqli_error($link);
        }
    } else {
        echo "Error updating status: " . mysqli_error($link);
    }

    // Close connection
    mysqli_close($link);
}

// Function to generate a unique passport number starting with the current year
function generatePassportNumber($currentYear) {
    $passportNumber = $currentYear . mt_rand(100000, 999999);
    // Check if the generated passport number already exists in the database
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $checkQuery = "SELECT COUNT(*) AS count FROM Passport WHERE passport_number = '$passportNumber'";
    $result = mysqli_query($link, $checkQuery);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    mysqli_free_result($result);
    mysqli_close($link);

    if ($count > 0) {
        // If the passport number already exists, generate a new one recursively
        return generatePassportNumber($currentYear);
    } else {
        // Return the unique passport number
        return $passportNumber;
    }
}
?>
