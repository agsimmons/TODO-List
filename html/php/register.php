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
$password = password_hash($_POST["password"], PASSWORD_BCRYPT);

$sql_register = "INSERT INTO user(username, password) VALUES ('" . $username . "', '" . $password . "');";

if (mysqli_query($conn, $sql_register)) {

    // Set session variables
    $_SESSION["user_id"] = mysqli_insert_id($conn);
    $_SESSION["username"] = $username;
    $_SESSION["hashed_password"] = $password;

    header('Location: /main.php');
} else {
    // TODO: Log error instead of showing it to user
    echo "ERROR: " . mysqli_error($conn);
}

$conn->close();

?>
