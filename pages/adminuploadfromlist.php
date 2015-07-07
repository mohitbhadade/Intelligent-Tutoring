<?php
if(!isset($_REQUEST['selectedfile'])){
	header('location: homepage.php');

}
else
{
	session_start();
	$_SESSION['useadminfile']= $_REQUEST['selectedfile'];
	shell_exec('cp ../output/admin/'.$_REQUEST['selectedfile'].' ../output/'.$_SESSION['name']);
	header('location: upload-grammar.php');

}	
?>
