<?php

session_start();

// Initialize database connection variables
include "../db_config.php";

$query = "SELECT * FROM task WHERE fk_user = " . $_SESSION["user_id"] . " AND completed = 0";
$result = mysqli_query($conn, $query);

$result_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $result_array[] = $row;
}

header("Content-Type: application/json");
echo json_encode($result_array);

mysqli_close($conn);

?>
