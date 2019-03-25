<?php

    // Initialize database connection variables
    $mysql_host = "localhost";
    $mysql_user = "todouser";
    $mysql_pass = "todouserpassword";
    $mysql_db = "todo";

    // Create connection to database
    $conn = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

    // TODO: Implement login
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    # Parse parameters from form
    $username = $_POST["username"];
    $password = $_POST["password"];

    # Get username and hashed password from database
    $db_password_query = "SELECT password FROM user WHERE username = '".$username."';";
    $result = mysqli_query($conn, $db_password_query);
    $db_password = mysqli_fetch_assoc($result)["password"];

    if (password_verify($password, $db_password)) {
        echo "Credentials valid!";
    } else {
        echo "Credentials invalid!";
    }
?>
