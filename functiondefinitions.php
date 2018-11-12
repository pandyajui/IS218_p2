<?php
	include("account.php");

	function GET($fieldname,&$flag_empty,&$flag_isset){
		$flag_empty=true;
		$flag_isset=false;
		$flag_isset=isset($_GET[$fieldname]);
		if($flag_isset==false){
			return;
		}
		$flag_isset=true;
		$v=$_GET[$fieldname];
		$v=trim($v);
		if($v==""){
		$flag_empty=true;
		return;}
		$flag_empty=false;
		return $v;
	}

	function authenticate($ucid,$password)
	{
		global $db;
		$s = "select * from accounts where email='$ucid' and password='$password'";
		($t=mysqli_query($db, $s)) or die(mysqli_error($db));
		if (mysqli_num_rows($t) ==1){
			return (true);
		}
		return (false);
	}

	function displayUser($email)
	{
		global $db;
		$s = "select * from accounts where email='$email'";
		($t=mysqli_query($db,$s)) or die(mysqli_error($db));
		if (mysqli_num_rows($t) ==  0){
			$output = "User not found! Hacker!<br/>";
			return ($output);
		}
		$user = mysqli_fetch_assoc($t);
		$first_name = $user['fname'];
		$last_name = $user['lname'];
		$output = "$first_name $last_name";
		return ($output);
	}

	function displayQ($ucid){
		global $db;
		$output = "";
		$s="select * from questions where owneremail='$ucid'";
		($t=mysqli_query($db,$s)) or die(mysqli_error($db));
		if (mysqli_num_rows($t) ==  0){
			$output .= "Questions not found! <br/>";
			return ($output);
		}
		$output .= "<table class='DisplayQuestions'>";
		$output .= "<tr><th>Created Date</th><th>Question Title</th><th>Question Body</th><th>Question Skills</th><th>Question Score</th></tr>";

		while($questions=mysqli_fetch_assoc($t)){
			$date=$questions['createddate'];
			$question_title=$questions['title'];
			$question_body=$questions['body'];
			$question_skills=$questions['skills'];
			$question_score=$questions['score'];

			$output .= "<tr><td>$date</td><td>$question_title</td><td>$question_body</td><td>$question_skills</td><td>$question_score</td></tr>";
		}
		$output .= "</table>";
		return ($output);
	}

	function ucidExists($a){
		global $db;
		$s = "select * from accounts where email='$a'";
		($t=mysqli_query($db, $s)) or die(mysqli_error($db));
		if (mysqli_num_rows($t) ==1){
			return (true);
		}
		return (false);
	}
	function insertIntoAccounts($email,$fn,$ln,$bday,$pwd){
		global $db;
		$s="insert into accounts (email, fname, lname, birthday, password) values ('$email','$fn','$ln','$bday','$pwd')";
		($t=mysqli_query($db,$s)) or die(mysqli_error($db));
		return;
	}

	function insertIntoQuestions($ucid,$question_title, $question_body, $quesiton_skills, $question_score){
		global $db;
		$owner_id="select * from accounts where email='$ucid'";
		($p=mysqli_query($db,$owner_id)) or die(mysqli_error($db));
		if (mysqli_num_rows($p) !=  1){
			$output = FALSE;
			return ($output);
		}
		$user = mysqli_fetch_assoc($p);
		$ownerid=$user['id'];
		$s="insert into questions (owneremail, ownerid, createddate, title, body, skills, score) values ('$ucid', '$ownerid', NOW(), '$question_title', '$question_body', '$quesiton_skills', '$question_score')";
		//echo($s);
		($t=mysqli_query($db,$s)) or die(mysqli_error($db));
		return(TRUE);
	}
?>
