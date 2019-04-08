<?php

session_start();

// Initialize database connection variables
include "../db_config.php";

$stmt = $conn->prepare("UPDATE task SET completed = 1 WHERE fk_user = ? AND id = ?;");
$stmt->bind_param("ii",
                  $_SESSION["user_id"],
                  $_POST["task_id"]);

$stmt->execute();

$conn->close();

?>
