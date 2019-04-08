<?php

session_start();

// Initialize database connection variables
include "db_config.php";

# Parse parameters from form
$username = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);

$stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?);");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

if (!$stmt->error) {

    // Set session variables
    $_SESSION["user_id"] = $conn->insert_id;
    $_SESSION["username"] = $username;

    header('Location: /main.php');
} else {
    // TODO: Log error instead of showing it to user
    echo "ERROR: " . $stmt->error;
}

$conn->close();

?>
