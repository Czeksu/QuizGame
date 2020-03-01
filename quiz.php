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
				<li class="active"><a href="quiz.php">QUIZ</a></li>
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
		<div class="questions_page">

      <form action="checked.php" method="post">

                  <?php

                     header('Content-Type: text/html; charset=utf-8');



                     $used_questions = array();  
                     $i=1;

                     while($i<6){
                        $n = mt_rand(1, 20);
                        

                        if(!in_array($n,$used_questions)){
                        array_push($used_questions,$n);
                     
                        $ans_id = $n;

                        $sql1 = "SELECT * FROM questions WHERE `q_id` = $n ";
                        	$result1 = $link -> query($sql1);
                        		if ($result1 -> num_rows > 0) {
                        						while($row1 = $result1 ->fetch_assoc()) {
                        	?>			

                        <br>
                        <div class='question_answer'>
                        <div class='question_block'>  <?php echo $i ." : ". $row1['question']; ?> </div>
                       
                        <?php
                           $sql = "SELECT * FROM answers WHERE ans_id = $n ORDER BY RAND() LIMIT 3" ;
                           	$result = $link -> query($sql);
                           		if ($result -> num_rows > 0) {
                           		while($row = $result ->fetch_assoc()) {
                           	?>	
                              
                        <label class='answer_block'>
                           <input type="radio" name="quizcheck[<?php echo $ans_id; ?>]" id="<?php echo $ans_id; ?>" value="<?php echo $row['a_id']; ?>" > <?php echo $row['answer']; ?> 
                           
                        </label>
                        <?php
                        
                        } ?>
                     </div>
                     <?php
                     } 
                        
                        } }}else{
                           continue;
                        }
                        $i++;
                     }
                  $link -> close();
                  ?>

                  <br>
                  <p style='text-align: center'>
                  <input class="button_to_log" type="submit" name="submit" Value="Submit"/> </p><br>
               </form>
            </div>
       






</body>
</html>	