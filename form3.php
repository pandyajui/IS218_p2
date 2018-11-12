<html>
	<head>
		<title>IS218_p1</title>
		<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body><div class="container"><div class= "main">
		<?php
			ini_set('display_errors', 1);
			error_reporting(E_ALL);
			//require("functiondefinitions.php");
			//require("account.php");
			//$usr=$_GET["user"];
			session_start();
			//echo($_SESSION['email']);
		?>
		<form id="form3" name="form3" action="form3_result.php">

			<label>Question name</label><input type="text" name="q_title"><br/>
			<label>QB</label><textarea form="form3" name="q_body"></textarea><br/>
			<label>Question Skills</label><textarea form="form3" name="q_skills"></textarea><br/>
			<label>Question Score</label><input type="number" step="1" name="q_score"><br/>
			<input type="submit" value="Add" required/>
		</form>
		</div></div>
	</body>
</html>
