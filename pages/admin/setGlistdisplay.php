<?php
include("session_check.php");
echo "Grammar list for ".$_GET['userid'];
$_SESSION['glistdisplay']= $_GET['userid'];
header('location: profile.php');

?>
