<?php

session_start();

// Initialize database connection variables
include "db_config.php";

# Parse parameters from form
$username = $_POST["username"];
$password = $_POST["password"];

# Get username and hashed password from database
$response = $conn->query("SELECT id, password FROM user WHERE username = '" . $username . "';");
$response_assoc = $response->fetch_assoc();

$db_id = $response_assoc["id"];
$db_password = $response_assoc["password"];

if (password_verify($password, $db_password)) {

    // Set session variables
    $_SESSION["user_id"] = $db_id;
    $_SESSION["username"] = $username;

    header('Location: /main.php');
} else {
    echo "Credentials invalid!";
}

$conn->close();

?>
