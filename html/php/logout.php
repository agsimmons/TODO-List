<?php

session_start();

// Clear session variables and destroy session
session_unset();
session_destroy();

header('Location: /login.php');

?>
