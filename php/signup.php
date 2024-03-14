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

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    echo "MYSQL DATABASE";
    $code = $_POST["code"];
    $name = $_POST["student"];
    $Reg = $_POST["RegNo"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $conf = $_POST["confirmation"];
    $currentDateTime = date('Y-m-d H:i:s');

    if (!empty($code) && !empty($name) && !empty($Reg) && !empty($email) && !empty($pass) && !empty($conf) && ($pass == $conf)) {
        $sql = "INSERT INTO signup (codeno, student, RegNo, Email, password, confirmation, date) VALUES ('$code', '$name', '$Reg', '$email', '$pass', '$conf', '$currentDateTime')";
        $stmt = $conn->prepare("INSERT INTO signup (codeno, student, RegNo, Email, password, confirmation, date) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $code, $name, $Reg, $email, $pass, $conf, $currentDateTime);

        if ($stmt->execute()) {
            echo "Records inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $stmt->close();
    }
}

// Close connection
$conn->close();
?>