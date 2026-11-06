<?php
session_start();   // Start the current session

session_unset();   // Remove all session variables

session_destroy(); // Destroy the session

header("Location: sessionDemo.php"); // Redirect to login page

exit(); // Stop script execution
?>