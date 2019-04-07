<?php

session_start();

// Initialize database connection variables
include "../db_config.php";

// TODO: Make this not vulnerable to SQL injection
$query = "INSERT INTO task (fk_user, name, due_date, description) VALUES (" . $_SESSION["user_id"] . ", '" . $_POST["task_name"] . "', '" . $_POST["task_due_date"] . "', '" . $_POST["task_description"] . "');";
$result = mysqli_query($conn, $query);

header('Location: /main.php');

mysqli_close($conn);

?>
