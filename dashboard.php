<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: sessionDemo.php");
    exit;
} 
?>

<h1>Dashboard</h1>

<h1>
    <?= $_SESSION['username']; ?>
</h1>

<a href="logout.php">Logout</a>