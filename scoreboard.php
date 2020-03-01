<?php
session_start();
include 'connection.php';
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
				<li><a href="index.php">HOME</a></li>
				<li><a href="quiz.php">QUIZ</a></li>
				<li class="active"><a href="scoreboard.php">SCOREBOARD</a></li>
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
			<h1>Tablica wyników.</h1>
		<table>
			<tr>
    			<th>DATA</th>
   				<th>LOGIN</th> 
   				<th>SCORE</th>
 			</tr>
 
			<?php

				
                $sql = "SELECT * FROM score";
                $result = $link -> query($sql);
                if ($result -> num_rows > 0) {
                while($row = $result ->fetch_assoc()) {

                		$who = "SELECT login FROM user WHERE user_id='".$row['user_id']."'";
              			$res = $link->query($who);
              			$who = $res ->fetch_assoc();
              			$user = $who['login']; 

            			echo "<tr><td class='x1'>".$row['scoredate']."</td><td class='x2'>".$user."</td><td class='x3'>".$row['score']."</td></tr>"; 


                    }
               }

                ?>
        </table>        
		</div>
</body>
</html>		