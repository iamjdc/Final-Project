<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
$currency = '$';

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "JDC";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
