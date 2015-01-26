<?php 
	mysql_connect('localhost','root','mohitdb') or die (mysql_error());
	mysql_select_db('TUTORIAL_USERS') or die (mysql_error());
	$username = mysql_real_escape_string(stripslashes($_POST['uname']));
	$pwd= mysql_real_escape_string(stripslashes($_POST['pass']));
	$query = mysql_query("select * from login_credentials where user_name='".$username."' and password='".$pwd."'") or die(mysql_error());
	$res= mysql_fetch_row($query);
	if($res) {
		session_start();
		$_SESSION['name']=$username;
		header('location: homepage.php');
	}
	else {
		echo"<h1>Wrong username/pass</h1>";
	}


?> 
