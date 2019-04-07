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

$query = "DELETE FROM task WHERE fk_user = " . $_SESSION["user_id"] . " AND id = " . $_POST["task_id"] . ";";
$result = mysqli_query($conn, $query);

mysqli_close($conn);

?>
