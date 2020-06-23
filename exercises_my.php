<?php
	include "db_connection.php";
	//выбрать все записи с БД (все rows) , где username = 'smth'
	//LIKE выдаст тот же результ что и = 
	//$query = "SELECT * FROM users WHERE email LIKE 'masha@gmail.com';";

	//будет искать запись, в конце котор есть запись ('%строка')
	//$query = "SELECT * FROM users WHERE email LIKE '%@gmail.com';";
	//$query = "SELECT * FROM users WHERE email = 'masha@gmail.com';";

	//будет искать запись, внут контр строке котор есть знач '%an%'
	//$query = "SELECT * FROM users WHERE email LIKE '%smth%';";

	//выбрать конкт столбци для row, в котор УСЛОВ1 и УСЛОВ2
	$query = "SELECT username,email FROM users WHERE id < 23 AND 
	email LIKE '%@gmail.com' ";

	$query_result = mysqli_query($connection, $query);
	if(!$query_result) {
		die("Query failed".mysqli_error());
	}

	while($row = mysqli_fetch_assoc($query_result)) {
		?>
		<pre>
			<?php
			print_r($row);
		?>
		</pre>
		<?php
	}

?>