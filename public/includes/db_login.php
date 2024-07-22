<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection settings
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mobile = $_POST['phone'];
    $password = $_POST['psw'];

    // Prepare and execute query
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE psw = ?");
    $stmt->bind_param("s", $mobile);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            // Start session and set user ID
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $email;
            
            // Redirect to dashboard
            header("Location: ../views/transaction.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that Phone number.";
    }
    $stmt->close();
}

$conn->close();
?>