<?php
include("session_check.php");
	mysql_connect('localhost','root','mohitdb') or die (mysql_error());
	mysql_select_db('TUTORIAL_USERS') or die (mysql_error());
	$username = mysql_real_escape_string(stripslashes($_SESSION['name']));
	if(!strcmp($username,"admin"))
		mysql_query("delete from login_credentials where user_name='".$_POST['rem-username']."'") or die(mysql_error());
	
	header('location: account.php');

?>	

