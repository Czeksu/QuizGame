<?php

	
include 'connection.php';
	if (isset($_POST['login']))
	{

			
			$login = htmlspecialchars(trim($_POST['login']));
			$password = htmlspecialchars(trim($_POST['password']));
			$email = htmlspecialchars(trim($_POST['email']));

			if(empty($_POST['login'])){

			header("location:signup.php?Message= Please fill the blanks");

			}else{

			$sq1 = "SELECT login FROM user WHERE login = '$login'";

			$result = $link -> query($sq1);	

			if($result -> num_rows == 1) 
			{
				header("location:signup.php?Invalid= Username exists");
			}
			else
			{

				$sq2 = "SELECT login, email FROM user WHERE login = '$login' OR email = '$email'";
				$result = $link -> query($sq2);

				if ($result -> num_rows == 0) {

					$sq1 = "INSERT INTO user(login,password, email) VALUES ('$login','$password','$email')";
					$link -> query($sq1);
				
				}

				header('Location: login.php');
			}
			};	
		};	
	?>



	<?php


		if(isset($_POST['signUp'])){

			$login = htmlspecialchars(trim($_POST['login']));
			$password = htmlspecialchars(trim($_POST['password']));
			$email = htmlspecialchars(trim($_POST['email']));

			$sq2 = "SELECT login, email FROM user WHERE login = '$login' OR email = '$email'";
			$result = $link -> query($sq2);

			if ($result -> num_rows == 0) {

				$sq1 = "INSERT INTO user(login,password, email) VALUES ('$login','$password','$email')";
				$link -> query($sq1);
				
			}
		}
$link -> close();
?>