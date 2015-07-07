<?php
include("session_check.php");


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
    <script src="../../scripts/jquery-1.11.2.js"> </script>
    <script src="../../scripts/bootstrap.min.js"> </script>

    <title>COMPILER TUTORIALS</title>

    <!-- Bootstrap core CSS -->
    <link href="../../styles/bootstrap.min.css" rel="stylesheet">
    <link href="../../styles/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../../styles/theme.css" rel="stylesheet">    
    <link href="../../styles/questionstyle.css" rel="stylesheet">
    <link href="../../styles/toastr.min.css" rel="stylesheet">
    <link href="../../styles/tablestyle.css" rel="stylesheet">
    <link href="../../styles/statictable.css" rel="stylesheet">

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
	    <li><a href="index.php">Home</a></li>      
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
<div class="container">
  <div class="container">
    <div class="col-md-4 col-sm-offset-4 well">

      <form id="add-student" action="addstudent.php" method="POST" class="form-horizontal">
	<div class="form-group">
	  <label for="username" class="col-md-4 control-label">Username &nbsp</label>
	  <div class="col-md-8">
	<input type="text" name="add-username" class="form-control" form="add-student" placeholder="Username"></input>
	</div>
	  <label for="password" class="col-md-4 control-label">Password &nbsp</label>
	  <div class="col-md-8">
	<input type="text" name="add-password" class="form-control" form="add-student" placeholder="Password"></input>
	</div>
	</div>
	<div class="text-center">
	  <button type="submit" class="btn btn-primary">Add Student</button>
	</div>
      </form>
<div class="col-md-12">
<hr/>
</div>
      <form id="remove-student" action="removestudent.php" method="POST" class="form-horizontal">
	<div class="form-group">
	  <label for="username" class="col-md-4 control-label">Remove User &nbsp</label>
	  <div class="col-md-8">
	<input type="text" name="rem-username" class="form-control" form="remove-student" placeholder="Enter username to be removed"></input>
	</div>
	</div>
	<div class="text-center">
	  <button type="submit" class="btn btn-primary">Remove Student</button>
	</div>
      </form>


</div>
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


