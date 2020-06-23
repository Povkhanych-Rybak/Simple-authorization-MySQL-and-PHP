<?php

	$connection = mysqli_connect("localhost","root", "root", "test_database");

		
	if(!$connection) {
		die('Connection failed');	
	}

?>