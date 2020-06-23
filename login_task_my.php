<?php
	session_start();
	include "db_connection.php";

//some element connected to session() are from the future video.
	$email = "";
	$password = "";
	$username = "";
	$duplicate = 0;


	$query = "SELECT email FROM users";

	$query_result = mysqli_query($connection, $query);
	if(!$query_result) {
		die("Query failed".mysqli_error());
	}

	if(isset($_POST["submit"])) {
		// mysqli_real_escape_string убезпечив от SQL-injection и других символов,котор могут повред SQL код.
		$email = mysqli_real_escape_string($connection, $_POST["email"]) ;
		$password = mysqli_real_escape_string($connection, $_POST["password"]);
		
		//шифрование пароля с пом PHP
		$password = password_hash($password, PASSWORD_DEFAULT);
		$username = mysqli_real_escape_string($connection, $_POST["username"]);
		// $duplicate = 0;

		if(empty($email) || empty($password)) {
			echo "You must enter an email and password.";
		} else {
			while($row = mysqli_fetch_assoc($query_result)) {
		
				if($email == $row["email"]) {
				$duplicate++;
				}
			}	
			//echo "Blia<br>". $duplicate;
			if ($duplicate == 0) {
				//если дубликата нету, встав знач в табл БД

				$insert_query = "INSERT INTO users (username, email, password) VALUES
				('$username', '$email', '$password');";

				$insert_query_result = mysqli_query($connection, 
					$insert_query);

				if(!$query_result) {
					die("Query failed".mysqli_error());
				} else {
					
					$_SESSION['email'] = $email;
					//echo $_SESSION['email'];
					//header() переадресовует
					header("Location: session_and_cookies_my.php");
					//echo "You're signed up!";
				}
			} else {
				echo "This email already exists.";
			}
			
		}
		// при создании нов пользов будет создав новая перем с ключем $_SESSION['email'] и ей будет присва знач  $email пользов. = привязка сессии по имейлу ввеед пользов
	}

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

 	<form action="login_task_my.php" method="post">
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

