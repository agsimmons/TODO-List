<?php

session_start();

// If user has an active session, redirect to the main page
if (isset($_SESSION["user_id"]) && isset($_SESSION['username'])) {
    header('Location: /main.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>// TODO: - Register</title>

	<!-- bootstrap CDN import -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- our custom stylesheet -->
	<link rel="stylesheet" href="css/main.css" type="text/css">
	<link rel="stylesheet" href="css/register.css" type="text/css">
</head>
<body class="text-center">
	<h1>// TODO:</h1>
	<form method="post" id="formRegister" action="php/register.php">
			<div class="form-group">
				<label class="sr-only" for="usernameInput">Username</label>
				<input type="text" class="form-control" placeholder="Username" id="usernameInput" name="username"/>
			</div>

			<div class="form-group">
				<label class="sr-only" for="passwordInput">Password</label>
				<input type="password" class="form-control" placeholder="Password" id="passwordInput" name="password"/>
			</div>

			<div class="form-group">
				<label class="sr-only" for="passwordInput">Confirm Password</label>
				<input type="password" class="form-control" placeholder="Confirm Password" id="confirmPasswordInput" name="confirmPassword"/>
			</div>

			<input class="btn btn-lg btn-primary btn-block" type="submit" id="register" value="Register"/>
			<br>
			<p><small>Already have an account? <a href="login.php">Login</a></small></p>
	</form>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
