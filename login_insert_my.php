<?php
	include "db_connection.php";

	$email = "";
	$password = "";
	$username = "";

	if(isset($_POST["submit"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];
		$username = $_POST["username"];
	}

	// echo $email;
	// echo $password;

		
	//вставка знач в табл БД
	$query = "INSERT INTO users (username, email, password) VALUES
	('$username', '$email', '$password');";

	$query_result = mysqli_query($connection, $query);

	if(!$query_result) {
		die("Query failed".mysqli_error());
	}

	//соединение с БД с пом MySQL i_connect
	//1st par - server name (сервер)
	//2nd - username (in PHPMyAdmin)
	//3rd - password
	//4th - DB name

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<!-- form section starts-->

 	<form action="login_insert_my.php" method="post">
		<div class="form-group">
	   		<label for="inputUsername1">Username</label>
		    <input type="text" class="form-control" id="inputUsername1" name="username" placeholder="Enter your name">
	   </div>

	  	<div class="form-group">
	   		<label for="inputEmail1">Email address</label>
		    <input type="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp" name="email">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	   </div>
	   <div class="form-group">
		    <label for="inputPassword1">Password</label>
		    <input type="password" class="form-control" id="inputPassword1" name="password">
	    </div>
	    <div class="form-group form-check">
		    <input type="checkbox" class="form-check-input" id="check1">
		    <label class="form-check-label" for="check1">Check me out</label>
	    </div>
	  	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</form>
<!-- Form section ends
 -->
 	
 </body>
</html>

