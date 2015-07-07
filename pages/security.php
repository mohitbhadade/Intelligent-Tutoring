<?php
include("session_check.php");
mysql_connect('localhost','root','mohitdb') or die (mysql_error());
mysql_select_db('TUTORIAL_USERS') or die (mysql_error());
$username = mysql_real_escape_string(stripslashes($_SESSION['name']));
$query= mysql_query("select password from login_credentials where user_name='".$username."'") or die(mysql_error());

$pass = mysql_fetch_row($query);

if(!strcmp($pass[0], $_POST['old-pass']))
	if(!strcmp($_POST['new-pass'],$_POST['re-new-pass']))
		$query = mysql_query("update login_credentials set password='".$_POST['new-pass']."' where user_name='".$username."'") or die(mysql_error());
	else
		$_SESSION['no_match']= "New and re entered pass should match";
else 
	$_SESSION['old_wrong']="Update Failed";

header('location: updatepass.php');

?>

