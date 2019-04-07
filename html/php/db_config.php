<?php

$db_config = array(
    "host" => "localhost",
    "user" => "todouser",
    "pass" => "todouserpassword",
    "db" => "todo"
);

// Create connection to database
$conn = new mysqli($db_config["host"], $db_config["user"], $db_config["pass"], $db_config["db"]);

// Check connection to database
// TODO: Log error instead of showing it to user
if ($conn->connect_error) {
    die("ERROR: Connection failed: " . $conn->connect_error);
}

?>
