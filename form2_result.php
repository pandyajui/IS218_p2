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
		require("account.php");
		$db=mysqli_connect($hostname,$username,$password,$project);
		if(mysqli_connect_errno()){
			echo("Failed to connect" . mysqli_connect_errno());
			exit;
		}
		mysqli_select_db($db,$project);		
		$flag_empty=false;
		$flag_isset=true;
		
		
		$firstname= GET("firstname",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			echo("First name was not entered<br/>");
			exit;
		}$lastname= GET("lastname",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			echo("Last name was not entered<br/>");
			exit;
		}
		$birthday= GET("birthday",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			echo("Birthday was not entered<br/>");
			exit;
		}
		
		$email= GET("email",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			echo("Email was not entered<br/>");
			exit;
		}
		
		$pwd=GET("pwd",$flag_empty,$flag_isset);
		if($flag_isset==false||$flag_empty==true){
			echo("Password was not entered<br/>");
			exit;
		}
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
			echo ("Not a valid email ID!");
			echo (" <a href='form1.html'> return to previous page.</a>");
			exit;
		}
		if (strlen($pwd)< 8)
		{
			echo ("The password must contain at least 8 characters!");
			echo (" <a href='form2.html'> return to previous page.</a>");
			exit;
		}
		
			
	?>
	<div class="container"><div class= "main">
		
	</div></div>
	</body>
</html>