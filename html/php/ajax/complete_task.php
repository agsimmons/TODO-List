<?php

session_start();

// Initialize database connection variables
include "../db_config.php";

// TODO: Make this not vulnerable to SQL injection
$conn->query("UPDATE task SET completed = 1 WHERE fk_user = " . $_SESSION["user_id"] . " AND id = " . $_POST["task_id"] . ";");

$conn->close();

?>
