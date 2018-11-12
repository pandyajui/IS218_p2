<html>
	<head>
		<title>IS218_p1</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
	<div class="container"><div class= "main">
	<?php
		ini_set('display_errors', 1);
		error_reporting(E_ALL);
		require("functiondefinitions.php");
		$db=mysqli_connect($hostname,$username,$password,$project);
		if(mysqli_connect_errno()){
			echo("Failed to connect" . mysqli_connect_errno());
			exit;
		}
		mysqli_select_db($db,$project);
		$flag_empty=false;
		$flag_isset=true;
		session_start();
		$q_title= GET("q_title",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			echo("Question title was not entered<br/>");
			exit;
		}
		$q_body=GET("q_body",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			echo("Question was not entered<br/>");
			exit;
		}
		$q_skills=GET("q_skills",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			//do smth
			echo("Question skills not entered<br/>");
			exit;
		}
		$q_score=GET("q_score",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			//do smth
			echo("Question score was not entered<br/>");
			exit;
		}
		//session_start();
		$email=$_SESSION['email'];
		//echo($usr);
		//session_destroy();
		//echo("ALL GUCCI!");
		//authenticate
		insertIntoQuestions($email,$q_title, $q_body, $q_skills, $q_score);
		//print smth that says done
		//give option to go back
		echo(displayQ($email));
		echo(displayUser($email));
		//echo("<a href='form3.php'>Add a Question</a>");
	?>


	</div></div><a href='form3.php'>Add a Question</a>
	</body>
</html>
