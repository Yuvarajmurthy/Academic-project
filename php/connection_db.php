<?php
$host = "localhost";
$username = "root";
$password = "Yuvaraj@5";
$dbname = "e_placement";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "connection successfuly with mysqli database";
}

return $conn;
?>
