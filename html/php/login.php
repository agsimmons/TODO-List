<?php

session_start();

// Initialize database connection variables
include "db_config.php";

// Create connection to database
$conn = new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["db"]);

// Check connection to database
// TODO: Log error instead of showing it to user
if ($conn->connect_error) {
    die("ERROR: Connection failed: " . $conn->connect_error);
}

# Parse parameters from form
$username = $_POST["username"];
$password = $_POST["password"];

# Get username and hashed password from database
$db_password_query = "SELECT id, password FROM user WHERE username = '" . $username . "';";
$response = mysqli_query($conn, $db_password_query);
$response_assoc = mysqli_fetch_assoc($response);

$db_id = $response_assoc["id"];
$db_password = $response_assoc["password"];

if (password_verify($password, $db_password)) {

    // Set session variables
    $_SESSION["user_id"] = $db_id;
    $_SESSION["username"] = $username;
    $_SESSION["hashed_password"] = $db_password;

    header('Location: /main.php');
} else {
    echo "Credentials invalid!";
}

$conn->close();

?>
