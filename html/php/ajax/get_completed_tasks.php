<?php

session_start();

// Initialize database connection variables
include "../db_config.php";

$result = $conn->query("SELECT * FROM task WHERE fk_user = " . $_SESSION["user_id"] . " AND completed = 1");

$result_array = array();
while ($row = $result->fetch_assoc()) {
    $result_array[] = $row;
}

header("Content-Type: application/json");
echo json_encode($result_array);

$conn->close();

?>
