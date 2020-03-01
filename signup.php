<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
<meta charset="UTF-8" />
<title>Sign in</title>
<script type="text/javascript">
	function validation(){

		valid = true;

		var re = /^[a-z][a-zA-Z0-9_.]*(\.[a-zA-Z][a-zA-Z0-9_.]*)?@[a-z][a-zA-Z-0-9]*\.[a-z]+(\.[a-z]+)?$/;

    	if(document.getElementsByTagName("INPUT")[1].value.length < 5){
    		document.getElementById("password_error").innerHTML = "Password is too short";
    		valid = false;
    	} 
    	if(!re.test(document.getElementById('SignUpEmail').value)){
    		document.getElementById("email_error").innerHTML = "Wrong e-mail";
    		valid = false;
    		};

    	if(valid) login();


     }; 

     function login(){

     	document.getElementById("go").click();
     };


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
				<li><a href="login.php">SIGN IN</a></li>
			</ul>

		</div>
		<br>
		<div class="logo">
			<a href="index.php">
			<img src="logo.png">
			</a>
		</div>

		<div class="ready">	
			<form action='check_signup.php' method='POST'>
				<span><strong>Login:</strong></span> <br>
				<input type='text' name='login'><br>

					<?php
				if(@$_GET['Invalid']==true){
			?>

				<span id="login_error"> <?php echo $_GET['Invalid']; ?> </span>

			<?php
				};
			?>

			<?php
				if(@$_GET['Message']==true){
			?>

				<span id="login_error"> <?php echo $_GET['Message']; ?> </span>

			<?php
				};
			?>
				<span><strong>Password:</strong></span> <br>
				<input type='password' name='password'><br>
				<span id="password_error"></span>
				<span><strong>E-mail:</strong></span> <br>
				<input type='text' name='email' id='SignUpEmail'><br>
				<span id="email_error"></span>
				<div>
					<input type='button' value='Sign up' onclick="validation()"><br><br>	
					<input type='submit'name='signUp' class='to_hide' id='go'>		
					<a href="login.php"><b>Return to Logging</b></a>
				</div>		
			</form>
		</div>	
</body>
</html>	