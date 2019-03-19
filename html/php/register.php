<?php

    $mysql_host = "localhost";
    $mysql_user = "todouser";
    $mysql_pass = "todouserpassword";
    $mysql_db = "todo";

    $conn = new mysqli($mysql_host, $mysql_user, $mysql_pass);

    // TODO: Implement register
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

?>
