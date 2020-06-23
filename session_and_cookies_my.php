<?php
	/*
	//сессия
	session_start();
	//сессия действует, пока у пользоват открыт браузер
	//Если привязка сессии к email уже сущест, то залогинь, если нет,то перенаправ на страницу логина
	if(!empty($_SESSION['email'])) {
		echo "You are logged in";
	} else {
		header("Location: login_task_my.php");
	}
	*/

	//оставлять пользов залог даже при закр брауз некотор время пока он не вийд из прилож- cookies

	//назначить cookie (initial)
	//setcookie('user_id', '1111', time()+60*60);

	//удалить cookie (когда пользователь вышел с прилож)
	//setcookie('user_id', '', time() -60*60);

	//назначить cookie(2nd+ times)
	setcookie('user_id', '', time() +60*60);
	$_COOKIE['user_id'] = '2222';


	echo $_COOKIE['user_id'];
?> 