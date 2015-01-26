<?php
include("session_check.php");
$tempFileName= $_FILES['grammar-upload']['tmp_name'];
echo "File uploaded : ".$_FILES['grammar-upload']['name'];

$allowed = array('inode/x-empty', 'text/plain');
//check file information/type
$finfo = finfo_open(FILEINFO_MIME_TYPE); // return mime type ala mimetype extension
if(!in_array(finfo_file($finfo, $tempFileName), $allowed)){
	$_POST['Err']= "\n Ohh !! Just TEXT.. Plain text allowed";
	finfo_close($finfo);
	header('location: tutorial.php');
	exit();
}


$uploaddir=  '/home/mohitdb/myserver/output/';
$uploadfile = $uploaddir. basename($_FILES['grammar-upload']['name']);
if(move_uploaded_file($_FILES['grammar-upload']['tmp_name'], $uploadfile)){
	echo "\n Successful upload";
}
?>
