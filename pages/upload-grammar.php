<?php
include("session_check.php");

$tempFileName= $_FILES['grammar-upload']['tmp_name'];

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
move_uploaded_file($_FILES['grammar-upload']['tmp_name'], $uploadfile);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/logo_black.png">

    <title>COMPILER TUTORIALS</title>

    <!-- Bootstrap core CSS -->
    <link href="../styles/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../styles/theme.css" rel="stylesheet">    
    <link href="../styles/questionstyle.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--link href="css/jumbotron.css" rel="stylesheet"-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="../../assets/js/ie-emulation-modes-warning.js"></script-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
	  </button>
	  <!--a class="navbar-brand" href="tutorial.html">Welcome</a-->
<a class="navbar-brand"><?php
echo "Welcome ".$name;?>
</a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  <ul class="nav navbar-nav navbar-right">
            <li><a href="homepage.php">Home</a></li>      
            <li><a href="tutorial.php">Tutorial</a></li>
            <li><a href="signout.php">Signout</a></li>

	  </ul>
	</div><!-- /.navbar-collapse -->
      </div>
      </nav>
<?php $grammar = file_get_contents($uploadfile);
$filename= $_FILES['grammar-upload']['name'];
ob_start(); 
//passthru("ls");
passthru("/home/mohitdb/Downloads/ConsoleProblemGeneration/ConsoleApplication2/bin/Debug/ConsoleApplication2.exe ".basename($filename,".txt")); 
$que = ob_get_contents(); 
ob_end_clean();
?>
<div id="navi">

<h2><p>GRAMMAR</p></h2>

<p><?php echo"".$grammar?></p>
<li><a href="#">Play for FIRST</a></li>      
</div>
<div id="section" style="background-color:WhiteSmoke; color:black; margin:20px; padding:20px;">
<h2>Lets Play !</h2>
<p><?php echo "".$que;?></p>
</div>
 <div class="container">
      <hr/>
      <footer class="text-center">
	<p>Department of Computer Science and Engineering, IIT Kanpur</p>
      </footer>
    </div>
    
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--script src="js/jquery.min.js"></script-->
    <!--script src="js/bootstrap.min.js"></script-->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--script src="../../assets/js/ie10-viewport-bug-workaround.js"></script-->
  </body>
</html>

