<?php

session_start();

// Initialize database connection variables
include "../db_config.php";

//$result = $conn->query("SELECT * FROM task WHERE fk_user = " . $_SESSION["user_id"] . " AND completed = 1");

$stmt = $conn->prepare("SELECT id, name, due_date, description FROM task WHERE fk_user = ? AND completed = 1");
$stmt->bind_param("i", $_SESSION["user_id"]);
$stmt->execute();
$stmt->bind_result($db_id, $db_name, $db_due_date, $db_description);

$result_array = array();
while ($stmt->fetch()) {
    $result_array[] = array("id" => $db_id,
                            "name" => $db_name,
                            "due_date" => $db_due_date,
                            "description" => $db_description);
}

header("Content-Type: application/json");
echo json_encode($result_array);

$conn->close();

?>
