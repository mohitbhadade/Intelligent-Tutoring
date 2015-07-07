<?php     
	session_start();
	if(isset($_SESSION['name'])){
		unset($_SESSION['name']);
	}
	echo '<h1> You have logged out sucessfully</h1>';
	session_destroy();
	header('location:index.php');
?>
