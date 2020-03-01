<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
<meta charset="UTF-8" />
<title>Sign in</title>
<script>
	function reload(){
		document.getElementById("go").click();
	}
</script>	
</head>
<body>

	<?php
		session_start();

		if(isset($_SESSION['user']))
		{	
			header("location:loggedin.php");
		}
	?>

	<div class="row">
		<ul class="main-nav">
			<li class="active"><a href="index.php">HOME</a></li>
			<li><a href="signup.php">SIGN UP</a></li>
		</ul>

	</div>	
<br>
	<div class="logo">
			<a href="index.php">
			<img src="logo.png">
			</a>
	</div>
<br><br>
	<div class="ready">

		<form action='check_login.php' method='POST'>
			<span><b>Login:</b></span> <br>
			<input type='text' name='login'><br>
			<span><b>Password:</b></span> <br>
			<input type='password' name='password'><br>

			<?php
				if(@$_GET['Message']==true){
			?>

				<span id="password_error"> <?php echo $_GET['Message']; ?> </span>

			<?php
				};
			?>

			<?php
				if(@$_GET['Invalid']==true){
			?>

				<span id="password_error"> <?php echo $_GET['Invalid']; ?> </span>

			<?php
				};
			?>

			<div>
				<input type='button' value='Sign in' onclick="reload()"><br><br>
				<input type='submit' name='signIn' class='to_hide' id='go'>			
				<a href="signup.php"><b>Sign up</b></a>		
			</div>
		</form>		

	</div>	

</body>
</html>		