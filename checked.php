<?php
session_start();
include 'connection.php';
error_reporting(0);

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

    <div class="ready">
      <h1>WYNIKI:</h1>
    <br>
    
      <?php


            header('Content-Type: text/html; charset=utf-8');


            $result_counter = 0;
            if(isset($_POST['submit'])){
            // Sprawdzanie czy conajmniej jedna odpowiedz zozstala zaznaczona
            if(!empty($_POST['quizcheck'])) {
            // Liczenie zaznaczonych pol
            $checked_counter = count($_POST['quizcheck']);
            // print_r($_POST);
        ?>

        
        <?php

            echo "Z 5 pytan, odpowiedziałeś na ".$checked_counter."."; 

        ?>
        <br>
        
          	
        <?php

            $selected = $_POST['quizcheck'];
            //print_r($_POST['quizcheck']);
                  
            $sql = "SELECT * FROM questions";

            $answer_results = $link ->query($sql);

            $i = 1;

            while($rows = $answer_results ->fetch_assoc()) {


            	$checked = $rows['ans_id'] == $selected[$i];
            	
            	if($checked){		
            		  $result_counter++;
            	}				
            	$i++;		
            }
        ?>
            	
    		
    		<?php 
	            echo " Twój wynik to: ". $result_counter.".";
	            }
	            else{
	            echo "<b>Zaznacz conajmniej jedną odpowiedź</b>";
	            }
	            } 
	      ?>
	      </div>

        <?php
                
              $who = "SELECT user_id FROM user WHERE login='".$_SESSION['user']."'";
              $result = $link->query($who);
              $who = $result ->fetch_assoc();
              $user_id = $who['user_id'];
              $date = date('Y-m-d H:i:s');

              $score = "INSERT INTO score(user_id, score, scoredate) VALUES ('$user_id','$result_counter', '$date')";

              $link->query($score);

        ?>



      
   </body>
</html>



	