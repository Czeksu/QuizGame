<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
<meta charset="UTF-8" />
<title>Account settings</title>
<script type="text/javascript">


	function validation(){

		valid = true;

	   	if(document.getElementsByTagName("INPUT")[0].value.length < 5){
    		document.getElementById("change_error").innerHTML = "Password is too short";
    		valid = false;
    	}

    	if(valid) password_change();
    };

     function password_change(){

     	document.getElementById("go").click();
     };

     function reset_stats(){

     	document.getElementById("reset").click();
     };

</script>
</head>
<body>

	<?php

                session_start();
		if(!isset($_SESSION['user'])){

			header("location: login.php");

		}

	?>


<?php
	
	$login = $_SESSION['user'];

		if(isset($_POST['password_change'])){

			$new_password = htmlspecialchars(trim($_POST['new_password']));
			
			$sq1 = "UPDATE user SET password = '$new_password' WHERE login = '$login'";

			$link -> query($sq1);
			}
?>

<?php

	if(isset($_POST['reset_stats'])){

		$who = "SELECT user_id FROM user WHERE login = '".$login."'";
		$res = $link->query($who);
		$who = $res ->fetch_assoc();
        $user = $who['user_id']; 
        $sq2 = "DELETE FROM score WHERE user_id = '".$user."'";

		$link -> query($sq2);
		}
	$link -> close();
?>

		<div class="row">
			<ul class="main-nav">
				<li><a href="loggedin.php">HOME</a></li>
				<li><a href="quiz.php">QUIZ</a></li>
				<li><a href="scoreboard.php">SCOREBOARD</a></li>
				<li class="active"><a href="settings.php">ACCOUNT SETTINGS</a></li>
				<li><a href="logout.php?logout">LOG OUT</a></li>
			</ul>
		</div>
		<br>
		<div class="logo">
			<a href="loggedin.php">
			<img src="logo.png">
			</a>
		</div>
<div>	
		<div class="ready">	
			<form method='POST'>
				<span><h1><strong>Wpisz nowe haslo uzytkownika <?php echo $_SESSION['user']; ?>:</strong></h1></span><br>
				<input type='password' name='new_password'>
				<span id="change_error"></span>
				<input type='button' onclick="validation()" value='Zmień hasło'>
				<input type='submit'name='password_change' class='to_hide' id='go'>	
			
			</form>
		</div>	
 
		<div class="ready">	
			<form method='POST'>
				<span><h1><strong>Wyczyść wyniki uzytkownika <?php echo $_SESSION['user']; ?>:</strong></h1></span>
				<input type='submit' name='reset_stats' value="Wyczyść" class='button_to_log' id='reset'>	
			
			</form>
		</div>
</div>
</body>
</html>				