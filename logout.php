<?php
session_start(); // Starting the session

// Unset all of the session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page after logout
header("Location: ../front/login.php"); // Adjust the path to match the location of your login page
exit();
?>