<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youtube";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();
session_unset();
session_destroy();
header('location:innerpage.php')

?>