<?php
include_once('connection.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    
    // Make sure the $conn variable is defined
    if (isset($conn)) {
        $stmt = $conn->prepare("SELECT * FROM AdminUsers");
        $stmt->execute();
        $users = $stmt->fetchAll();

        foreach($users as $user) {
            if(($user['username'] == $username) && ($user['password'] == $password)) {
                header("location: admin.php");
            } else {
                echo "<script language='javascript'>";
                echo "alert('WRONG INFORMATION')";
                echo "</script>";
                die();
            }
        }
    } else {
        echo "Database connection not established.";
        die();
    }
}
?>
