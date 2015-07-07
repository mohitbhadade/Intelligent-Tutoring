<?php
include("session_check.php");

if(isset($_SESSION['useadminfile']))
{
	$filename = $_SESSION['useadminfile'];
$uploaddir=  '/home/mohitdb/myserver/output/admin/';

}
else {
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
mkdir("/home/mohitdb/myserver/output/".$name, 0777);


$uploaddir=  '/home/mohitdb/myserver/output/'.$name.'/';
$uploadfile = $uploaddir.$name.basename($_FILES['grammar-upload']['name']);
move_uploaded_file($_FILES['grammar-upload']['tmp_name'], $uploadfile);
//header("location:question.php");
}


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
    <script src="/scripts/jquery-1.11.2.js"> </script>
    <script src="/scripts/toastr.min.js"> </script>
    <script src="/scripts/bootstrap.min.js"> </script>

    <title>COMPILER TUTORIALS</title>

    <!-- Bootstrap core CSS -->
    <link href="/styles/bootstrap.min.css" rel="stylesheet">
    <link href="/styles/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/styles/theme.css" rel="stylesheet">    
    <link href="/styles/questionstyle.css" rel="stylesheet">
    <link href="/styles/toastr.min.css" rel="stylesheet">
    <link href="/styles/tablestyle.css" rel="stylesheet">
    <link href="/styles/statictable.css" rel="stylesheet">

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
    <script src="/scripts/questionCall.js"></script>

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
<li class="dropdown">
  <a id="dLabel" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    Account
    <span class="caret"></span>
  </a>

  <ul class="dropdown-menu" aria-labelledby="dLabel">
		    <li><a href="profile.php">Profile</a></li>
		    <li><a href="account.php">Account Manager</a></li>
		    <li><a href="updatepass.php">Security</a></li>
		    <li><a href="signout.php">Signout</a></li>

  </ul>
</li>


	  </ul>
	</div><!-- /.navbar-collapse -->
      </div>
      </nav>
<?php 
if(isset($_SESSION['useadminfile'])){
	$grammar = file_get_contents($uploaddir.$filename);
	$_SESSION['filename']= $_SESSION['useadminfile'];

}
else
{
$grammar = file_get_contents($uploadfile);
//$filename= $_FILEoS['grammar-upload']['name'];
$filename= $name.basename($_FILES['grammar-upload']['name']);
$_SESSION['filename']= $filename;
}
//file_put_contents("/home/mohitdb/myserver/output/".$filename, $grammar);
/*ob_start(); 
//passthru("ls");
passthru("/home/mohitdb/Downloads/ConsoleProblemGeneration/ConsoleApplication2/bin/Debug/ConsoleApplication2.exe ".basename($filename,".txt")); 
$que = ob_get_contents(); 
ob_end_clean();
 */?>

<!--div class="panel-group" id="accordion">
  <div class="panel panel-info">
    <div class="panel-heading">
      <h4 class="panel-title">
	<a data-toggle="collapse" data-parent="#accordion" 
	  href="#collapseOne">
	  Click me to exapand/collapse.Section 1
	</a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body" style="color:black">
      1st expanded</div>
    </div>
  </div>
</div-->

<!-- Button to trigger modal -->

<div id="tablediv">
<table class="table1" id="tablemain" >
		<tbody id="tablebody">
		</tbody>
	    </table>
</div>

<div id="statictablediv">
<table class="table-fill">
<tbody class="table-hover" id="statictablebody">

<!--tr>
<th class="statictable" class="text-left">Month</th>
<th class="statictable" class="text-left">Sales</th>
</tr>

<tr class="statictable">
<td class="statictable" class="text-left">January</td>
<td class="statictable" class="text-left">$ 50,000.00</td>
</tr>
<tr class="statictable">
<td class="statictable" class="text-left">February</td>
<td class="statictable" class="text-left">$ 10,000.00</td>
</tr>
<tr class="statictable">
<td class="statictable" class="text-left">March</td>
<td class="statictable" class="text-left">$ 85,000.00</td>
</tr-->
</tbody>
</table>
</div>

<div class='error' style="display:none"></div>
<div class= "col-md-3">
<div id="navi">

<h2><p><em>GRAMMAR</em></p></h2>

<p><pre><?php echo"".$grammar?></pre></p>
<ul>
<li id="1" onclick="changeChoice(this.id)"><a style="color:PowderBlue" href="#">Play for FIRST</a></li>      
<li id="2" onClick="changeChoice(this.id)"><a style="color:PowderBlue" href="#">Play for FOLLOW</a></li>      
<li id="3" onclick="changeChoice(this.id)"><a style="color:PowderBlue" href="#">Play for LL Parsing Tables-Level 1</a></li>      
<li id="9" onclick="changeChoice(this.id)"><a style="color:PowderBlue" href="#">Play for LL Parsing Tables-Level 2</a></li>      
<li id="4" onclick="changeChoice(this.id)"><a style="color:PowderBlue" href="#">Play for LL Parsing Moves</a></li>      
<li id="5"><a href="#">Play for SLR Canonical Set-CLOSURE</a></li>
<li id="10"><a href="#">Play for SLR Canonical Set-GOTO</a></li>

<li id="6"><a href="#">Play for SLR Parsing Table</a></li>
<li id="7"><a href="#">Play for SLR Parsing Moves</a></li>

</ul>




</div>
</div>


<div class="col-md-6">
<div id="section" style="background-color:WhiteSmoke; color:black; margin:20px; padding:20px;">



</div>
</div>
<div class= "col-md-3">
<div id="naviright">
</div>
</div>
 <div class="col-md-12">
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

