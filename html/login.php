<?php

session_start();

// If user has an active session, redirect to the main page
if (isset($_SESSION["user_id"]) && isset($_SESSION['username']) && isset($_SESSION['hashed_password'])) {
    header('Location: /main.php');
} else {
    // TODO: Remove debugging information
    echo "=== DEBUG SESSION INFO ===" . "<br>";
    echo "User ID: " . $_SESSION["user_id"] . "<br>";
    echo "Username: " . $_SESSION["username"] . "<br>";
    echo "Hashed Password: " . $_SESSION["hashed_password"] . "<br>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>// TODO: - Login</title>

	<!-- bootstrap CDN import -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- our custom stylesheets -->
	<link rel="stylesheet" href="css/main.css" type="text/css">
	<link rel="stylesheet" href="css/login.css" type="text/css">
</head>
<body class="text-center">
	<h1>// TODO:</h1>
	<form method="post" id="formLogin" action="php/login.php">
		<div class="form-group">
			<label class="sr-only" for="usernameInput">Username</label>
			<input type="text" class="form-control" placeholder="Username" id="usernameInput" name="username"/>
		</div>

		<div class="form-group">
			<label class="sr-only" for="passwordInput">Password</label>
			<input type="password" class="form-control" placeholder="Password" id="passwordInput" name="password"/>
		</div>

		<input class="btn btn-lg btn-primary btn-block" type="submit" id="login" value="Login"/>
		<br>
		<p><small>Need an account? <a href="register.php">Register</a></small></p>
	</form>
</body>
</html>