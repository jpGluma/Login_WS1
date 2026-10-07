<?php
$host     = "localhost";
$user     = "root";
$password = "";         
$database = "myproject1";
$port     = 3306;   

$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
?>
