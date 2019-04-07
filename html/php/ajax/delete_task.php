<?php

session_start();

// Initialize database connection variables
include "../db_config.php";

$conn->query("DELETE FROM task WHERE fk_user = " . $_SESSION["user_id"] . " AND id = " . $_POST["task_id"] . ";");

$conn->close();

?>
