<?php

	include 'connection.php';
	session_start();
	
	if (isset($_POST['login']))
	{

		if(empty($_POST['login']) OR empty($_POST['password'])){

			header("location:login.php?Message= Please fill the blanks");

		}
		else
		{
			
			$login = htmlspecialchars(trim($_POST['login']));
			$password = htmlspecialchars(trim($_POST['password']));

			$sq1 = "SELECT login, password FROM user WHERE login = '$login' AND password = '$password'";

			$result = $link -> query($sq1);	
			if($result -> num_rows == 1) 
			{
				$_SESSION['user'] = $login;
				header('Location: loggedin.php');
			}
			else
			{
				header("location:login.php?Invalid= Please Enter correct data");
			}
		};
	};	
	$link -> close();
	?>