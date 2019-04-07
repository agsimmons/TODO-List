<?php

session_start();

// Initialize database connection variables
include "db_config.php";

# Parse parameters from form
$username = $_POST["username"];
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);

$sql_register = "INSERT INTO user(username, password) VALUES ('" . $username . "', '" . $password . "');";

if (mysqli_query($conn, $sql_register)) {

    // Set session variables
    $_SESSION["user_id"] = mysqli_insert_id($conn);
    $_SESSION["username"] = $username;

    header('Location: /main.php');
} else {
    // TODO: Log error instead of showing it to user
    echo "ERROR: " . mysqli_error($conn);
}

$conn->close();

?>
