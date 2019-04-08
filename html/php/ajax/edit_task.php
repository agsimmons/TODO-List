<?php

session_start();

// Initialize database connection variables
include "../db_config.php";

$stmt = $conn->prepare("UPDATE task SET name = ?, due_date = ?, description = ? WHERE fk_user = ? AND id = ?;");
$stmt->bind_param("sssii",
                  $_POST["task_name"],
                  $_POST["task_due_date"],
                  $_POST["task_description"],
                  $_SESSION["user_id"],
                  $_POST["task_id"]);

$stmt->execute();

header('Location: /main.php');

$conn->close();

?>
