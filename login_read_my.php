<?php 

include "db_connection.php";

		$query = 'SELECT * FROM users;';

		$query_result = mysqli_query($connection, $query);
		if(!$query_result){
			die("Query failed".mysqli_error());
		}

		if($connection) {
			$query_result = mysqli_query($connection, $query);
			if($query_result) {
			//помещаем $query_result (резуль исп функ mysqli_query) в массив
			$data_array = mysqli_fetch_array($query_result);

			print_r($data_array);

			echo "<br>";

			echo "Hello ".$data_array["username"]."<br>";
			echo "Your email is: ".$data_array["email"]."<br>";
			echo "Your password is: ".$data_array["password"]."<br>";
			// echo '<pre>';
			// var_dump($data_array);
			// echo '</pre>';
		
			} else {
				die('Connection failed ');
			}
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

	<div class="container">
		<div class="row">
			
		<div class="col-md-6">
			<?php 
				while ($row = mysqli_fetch_assoc($query_result)) {
					?>
				<pre>
					<?php 
						print_r($row);
					?>
				</pre>
				<?php
			}

			/*
			//извлекает построчно из результата запроса информациюв нумерированный массив
			while ($row = mysqli_fetch_row($query_result)) {
				print_r($row);
			}
			*/

			?>
			</div>
		</div>
	</div>
 	
 </body>
</html>