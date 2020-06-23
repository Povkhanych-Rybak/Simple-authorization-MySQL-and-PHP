<?php
	include "db_connection.php";

	$email = "";
	$password = "";
	$username = "";

	if(isset($_POST["submit"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];
		$username = $_POST["username"];
		$id = $_POST["id"];
	}

	// удаление по id
	//$update_query = "DELETE FROM users WHERE id = '$id'";

	$update_query = "DELETE FROM users WHERE username = '$username'";

	//$update_query = "UPDATE users SET";
	// $update_query .= " username = '$username',";
	// $update_query .= " email = '$email',";
	// $update_query .= " password = '$password'";
	// $update_query .= " WHERE id = $id";

	//var_dump($update_query);

	$update_query_result = mysqli_query($connection, $update_query);

	if(!$update_query_result) {
		die("Query failed".mysqli_error($connection));
	}
		
	//вставка знач в табл БД
	$query = 'SELECT * from users;';

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

 	<form action="login_delete_my.php" method="post">
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
		<!-- будем выбир id записи, котор хотим отредактир. -->		   <select name="id">
			<?php
				while($row = mysqli_fetch_assoc($query_result)) {
					$id = $row["id"];
					echo "<option value='$id'>$id</option>";
				}
			?>
		   

		   </select>
	    </div>
	  	<button type="submit" class="btn btn-primary" name="submit">Delete</button>
	</form>
<!-- Form section ends
 -->
 	
 </body>
</html>

