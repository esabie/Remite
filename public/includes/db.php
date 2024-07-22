<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost:8889";
$username = "root";
$password = "root";
$dbname = "remite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$mobile = $_POST['phone'];
$password = $_POST['psw'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO userdata (firstname, lastname, email, mobile, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $firstname, $lastname, $email, $mobile, $hashed_password);

// Execute statement
if ($stmt->execute()) {
    echo "User created successfully";
    // Redirect to login page
    header("Location: ../views/login.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();

?>