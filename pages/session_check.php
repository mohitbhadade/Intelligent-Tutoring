<?php
session_start();
if(!isset($_SESSION['name'])){
header("location: index.html");
}
$name= $_SESSION['name'];
?>

