<?php

session_start();

// If user has an active session, redirect to the main page
// If user does not have an active session, redirect to the login page
if (!isset($_SESSION["user_id"]) || !isset($_SESSION['username']) || !isset($_SESSION['hashed_password'])) {
    header('Location: /main.php');
} else {
    header('Location: /login.php');
}

?>
