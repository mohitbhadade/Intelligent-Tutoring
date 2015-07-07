<?php
session_start();
if(isset($_SESSION['useadminfile'])){	
	unset($_SESSION['useadminfile']);
	echo 'admin';
	
}
else
	echo $_SESSION['name'];
?>

