<?php

session_start();

// Initialize database connection variables
include "../db_config.php";

$stmt = $conn->prepare("INSERT INTO task (fk_user, name, due_date, description) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isss",
                  $_SESSION["user_id"],
                  $_POST["task_name"],
                  $_POST["task_due_date"],
                  $_POST["task_description"]);

$stmt->execute();

header('Location: /main.php');

$conn->close();

?>
