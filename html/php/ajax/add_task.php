<?php

session_start();

// Initialize database connection variables
include "../db_config.php";

// Create connection to database
$conn = new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["db"]);

// Check connection to database
// TODO: Log error instead of showing it to user
if ($conn->connect_error) {
    die("ERROR: Connection failed: " . $conn->connect_error);
}

// TODO: Make this not vulnerable to SQL injection
$query = "INSERT INTO task (fk_user, name, due_date, description) VALUES (" . $_SESSION["user_id"] . ", '" . $_POST["task_name"] . "', '" . $_POST["task_due_date"] . "', '" . $_POST["task_description"] . "');";
echo $query;
$result = mysqli_query($conn, $query);

mysqli_close($conn);

?>
