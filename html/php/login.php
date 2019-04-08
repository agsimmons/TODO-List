<?php

session_start();

// Initialize database connection variables
include "db_config.php";

# Parse parameters from form
$username = $_POST["username"];
$password = $_POST["password"];

# Get username and hashed password from database
$stmt = $conn->prepare("SELECT id, password FROM user WHERE username = ?;");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($db_id, $db_password);
$stmt->fetch();

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
