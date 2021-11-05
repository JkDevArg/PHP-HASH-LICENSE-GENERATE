<?php
$servername = "localhost";
$username = "root";
$password = "Asd@02322!";
$dbname = "hash";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

return $conn;