<?php

    // Initialize database connection variables
    $mysql_host = "localhost";
    $mysql_user = "todouser";
    $mysql_pass = "todouserpassword";
    $mysql_db = "mydb";

    // Create connection to database
    $conn = new mysqli($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

    // Check connection to database
    if ($conn->connect_error) {
        die('ERROR: Connection failed: ');
    } else
	echo 'connect worked';

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_2'])) {
    # Parse parameters from form
    $username = $_POST['username'];
    $password = $_POST['password'];
	$password_2= $_POST['password_2'];


	 if (empty($username)) { array_push($errors, "Username is required"); }
	 if (empty($password)) { array_push($errors, "Password is required"); }
     if ($password != $password_2) {
	   array_push($errors, "The two passwords do not match");
  }
    $sql= "SELECT * FROM mydb.user WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	
	 $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO mydb.user (username, password) 
  			  VALUES('$username', '$password')";
  	mysqli_query($conn, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}
}
    