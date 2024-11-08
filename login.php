<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'employee_management');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check login details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to the employee management page
    } else {
        echo "Incorrect username or password!";
    }
}

$conn->close();
?>
