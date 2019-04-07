<?php

session_start();

// Initialize database connection variables
include "../db_config.php";

$query = "UPDATE task SET completed = 1 WHERE fk_user = " . $_SESSION["user_id"] . " AND id = " . $_POST["task_id"] . ";";
$result = mysqli_query($conn, $query);

mysqli_close($conn);

?>
