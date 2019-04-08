<?php

session_start();

// If user does not have an active session, redirect to the main page
if (!isset($_SESSION["user_id"]) || !isset($_SESSION['username'])) {
    header('Location: /login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>TODO List - Completed Tasks</title>

    <!-- bootstrap CDN import -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- our custom stylesheet -->
    <link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>
  <nav class="navbar navbar-expand-lg">
		<h2 class="navbar-brand">TODO List</h2>
		<ul class="navbar-nav mr-4">
			<li class="nav-item"><a class="nav-link" href="main.php">In-Progress Tasks</a></li>
			<li class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>
		</ul>
	</nav>

	<br>

	<section class="tasks">
		<table class="table table-bordered" id="complete_table">
			<thead>
				<tr>
					<th scope="col">Task</th>
                    <th scope="col">Tag</th>
					<th scope="col">Due</th>
					<th scope="col">Description</th>
          <th scope="col">Completed</th>
				</tr>
			</thead>
			<tbody id="tasks"></tbody>
		</table>
	</section>
	<br>
	<footer>
		<small>
			<hr>
			Created by Sara Alsowaimel, Andrew Simmons, Amanda Sossong<br>
			Web Development Spring 2019
		</small>
	</footer>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/completedtasks.js"></script>

</body>
</html>
