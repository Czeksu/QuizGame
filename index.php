<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="UTF-8" />
<title>Quiz</title>
</head>
<body>	
	<div class="logo">
			<a href="index.php">
			<img src="logo.png">
			</a>
		</div>
		<br><br>
		<div class="ready">
			<h1>Ready?</h1>
			<a href="login.php" class="button_to_log">LOG IN!</a>
			<a href="signup.php" class="button_to_log">SIGN UP!</a>
		</div>
		<br>

</body>
</html>	

<?php

       
	session_start();
	

	if(isset($_SESSION['user']))
	{	
		header("location:loggedin.php");
	};
	
	?>	