<?php
session_start();
if(isset($_SESSION['useadminfile']))
	echo 'admin';
else
	echo $_SESSION['name'];
?>

