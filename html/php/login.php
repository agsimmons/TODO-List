<?php

session_start();

// Initialize database connection variables
$mysql_host = "localhost";
$mysql_user = "todouser";
$mysql_pass = "todouserpassword";
$mysql_db = "todo";

// Create connection to database
$conn = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

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
