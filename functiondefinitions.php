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
		$s = "select * from IS218_cred where ucid='$ucid' and password='$password'";
		($t=mysqli_query($db, $s)) or die(mysqli_error($db));
		if (mysqli_num_rows($t) !=1){
			return (false);
		}
		return (true);
		
	}
?>