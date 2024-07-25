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

$conn->set_charset("utf8mb4");
$conn->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
$conn->query("SET SESSION sql_mode = 'STRICT_ALL_TABLES'");

try {
    
      // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO userdata (firstname, lastname, email, mobile, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $mobile, $hashed_password);

    // Get form data
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['phone'];
    $password = $_POST['psw'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Execute statement
    $stmt->execute();
    $error_message = "New record created successfully";
    header("Location: ../views/login.php");
    exit();
   
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) { // Duplicate entry error code
        $error_message = "Customer Already exists";
    } elseif ($e->getCode() == 2002) { // No Connection
        $error_message = "Issue connecting to Database";
    } else {
        $error_message = "Error: " . $e->getMessage();
    }
    echo "<p style='color: red;'>$error_message</p>";
}

// Close connection
$stmt->close();
$conn->close();

?>