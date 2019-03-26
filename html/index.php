<!DOCTYPE html>
<html lang="en">
<head>
	<!-- meta tags required for bootstrap -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>TODO List - Home</title>

	<!-- bootstrap CDN import -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- our custom stylesheet and script -->
	<link rel="stylesheet" href="css/main.css" type="text/css">
	<script type="text/javascript" src="js/tasksmanager.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg">
		<h2 class="navbar-brand">TODO List</h2>
		<ul class="navbar-nav mr-4">
			<li class="nav-item"><a class="nav-link" href="completedtasks.html">Completed Tasks</a></li>
			<li class="nav-item"><a class="nav-link" href="login.html">Logout</a></li><!--change this to actually log out -->
		</ul>
	</nav>

	<br>

	<div class="tasks">
		<table class="table table-bordered" id="task_table">
			<thead>
				<tr>
					<th scope="col">Task</th>
					<th scope="col">Tags</th>
					<th scope="col">Due</th>
					<th scope="col">Description</th>
					<th scope="col"><button class="btn btn-primary" onclick="addTask()">+</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$mysql_host = "localhost";
					$mysql_user = "todouser";
					$mysql_pass = "todouserpassword";
					$mysql_db = "todo";

					// Create connection to database
					$conn = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

					$query = "SELECT * FROM task";
					$result = $conn->query($query);

					if ($result > 0) {
						while ($row = $result->fetch_assoc()) {
							echo '<tr>
										<td>' . $row["name"]. '</td>
										<td>Test Tag</td>
										<td>' . $row["due_date"]. '</td>
										<td>' . $row["description"]. '</td>
										<td><button class="btn btn-primary" onclick="completeTask()">Complete</button><button class="btn btn-primary" onclick="deleteTask()">Delete</button></td>
									  </tr>';
						}
					}
					mysqli_close($conn);
				?>
			</tbody>
		</table>
	</div>
	<br>
	<footer>
		<small>
			<hr>
			Created by Sara Alsowaimel, Andrew Simmons, Amanda Sossong<br>
			Web Development Spring 2019
		</small>
	</footer>
</body>
</html>
