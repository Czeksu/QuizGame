<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href ="style.css" type="text/css" />
<meta charset="UTF-8" />
<title>Quiz</title>
</head>
<body>

		<?php

			if(!isset($_SESSION['user'])){

				header("location: login.php");

			}

		?>
		
		<div class="row">
			<ul class="main-nav">
				<li class="active"><a href="index.php">HOME</a></li>
				<li><a href="quiz.php">QUIZ</a></li>
				<li><a href="scoreboard.php">SCOREBOARD</a></li>
				<li><a href="settings.php">ACCOUNT SETTINGS</a></li>
				<li><a href="logout.php?logout">LOG OUT</a></li>
			</ul>
		</div>	
		<br>
		
		<div class="logo">
			<a href="loggedin.php">
			<img src="logo.png">
			</a>
		</div>

		<div class="ready">
			<h1>WITAJ <?php echo $_SESSION['user']; ?>!<br> Zaczynamy?</h1>
 
				<a href="quiz.php" class="button_to_log">START</a>

		</div>
</body>
</html>	