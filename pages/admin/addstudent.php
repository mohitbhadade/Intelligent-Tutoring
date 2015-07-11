<?php
include("session_check.php");
	mysql_connect('localhost','root','mohitdb') or die (mysql_error());
	mysql_select_db('TUTORIAL_USERS') or die (mysql_error());

	$username = mysql_real_escape_string(stripslashes($_SESSION['name']));
	echo $username;
	header('location: index.php');
	if(!strcmp($username,"admin")){
		$query = mysql_query("insert into login_credentials values('".$_POST['add-username']."','".$_POST['add-password']."')") or die(mysql_error());
	$_SESSION['addsuccess']="Added Successfully";	
	}
	header('location: account.php');
?>
