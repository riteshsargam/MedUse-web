<?php
$servername = "localhost";
$database = "medicineone";
$username = "username";
$password = " ";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

echo "connected successfully";

mysqli_close($conn);

?>
