<?php
session_start();

// Destroy the session
$_SESSION = array();
session_destroy();

// Redirect to the login page
header("Location: index.php");
exit();
?>