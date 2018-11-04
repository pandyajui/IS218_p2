<html>
	<head>
		<title>IS218_p1</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
	<?php
		ini_set('display_errors', 1);
		error_reporting(E_ALL);
		require("functiondefinitions.php");
		$flag_empty=false;
		$flag_isset=true;
		
		$question_name= GET("Q1",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			echo("Question was not entered<br/>");
			exit;
		}
		$question_body= GET("QB",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			echo("Question body was not entered<br/>");
			exit;
		}
		$question_skills= GET("QS",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			echo("Question skills was not entered<br/>");
			exit;
		}
		if (strlen($question_name)< 3)
		{
			echo ("The question name must contain at least 3 characters!");
			echo (" <a href='form3.html'> return to previous page.</a>");
			exit;
		}
		if (strlen($question_body)>500)
		{
			echo ("The question body is too long!");
			echo (" <a href='form3.html'> return to previous page.</a>");
			exit;
		}
		
		$skills= explode(",",$question_skills);
		if (count($skills)<2){
			echo("Not enough skills!");
			echo (" <a href='form3.html'> return to previous page.</a>");
			exit;
		}
		echo("ALL GUCCI!");
			
	?>
	<div class="container"><div class= "main">
		
	</div></div>
	</body>
</html>