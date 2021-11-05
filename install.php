<?php

require_once 'conn.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Fallo: " . $conn->connect_error);
}
echo "Conexión Ok";
echo "<br>";

// Check connection
if($conn === false){
    die("ERROR: 404. " . mysqli_connect_error());
}

$sql = "CREATE TABLE hash(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    hash VARCHAR(100) NOT NULL,
    licencia VARCHAR(100) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    time_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    time_expire DATETIME NOT NULL,
    ip_client VARCHAR(16) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
  echo "Tabla creada OK";
} else {
  echo "Error machin: " . $conn->error;
}
