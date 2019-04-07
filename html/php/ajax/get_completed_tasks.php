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

$query = "SELECT * FROM task WHERE fk_user = " . $_SESSION["user_id"] . " AND completed = 1";
$result = mysqli_query($conn, $query);

$result_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $result_array[] = $row;
}

header("Content-Type: application/json");
echo json_encode($result_array);

mysqli_close($conn);

?>
