<!DOCTYPE html>
<?php include("session_check.php");?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/logo_black.png">

    <title>COMPILER TUTORIALS</title>
    <script src="/scripts/jquery-1.11.2.js"> </script>
    <script src="/scripts/bootstrap.min.js"> </script>

    <!-- Bootstrap core CSS -->
    <link href="/styles/bootstrap.min.css" rel="stylesheet">
    <link href="/styles/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/styles/theme.css" rel="stylesheet">    

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
      <!--form id="grammar-input-form" action="question.php" method="POST" class="form-horizontal">
        <div class="form-group">
          <label for="grammar" class="col-md-4 control-label">Grammar&nbsp</label>
          <div class="col-md-8">
	<textarea name="input-grammar" class="form-control" form="grammar-input-form" placeholder="Enter Grammar here.."></textarea>
	</div>
	</div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
	<h2><center>OR</center></h2-->
      
	<form enctype="multipart/form-data" action="adminuploadgrammar.php" method="POST" class="form-horizontal">
	<div class="form-group">
	  <label for="upload" class="col-md-4 control-label">Upload File&nbsp</label>
	  <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
          <input type="file"  name="grammar-upload" class="col-md-8">
	  <p class="help-block col-md-8 col-md-offset-4">Allowed file types: <strong>.txt</strong></p>
<?php  if(isset($_POST['Err'])){echo 'Check <br>'.$_POST['Err'];unset($_POST['Err']);} ?>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>


      <!--form id="admin-grammar-input-form" action="adminuploadfromlist.php" method="POST" class="form-horizontal">
        <div class="form-group">
          <label for="selectgrammar" class="col-md-4 control-label">Select Grammar &nbsp</label>
          <div class="col-md-8">
<select name="selectedfile">
  <option value="volvo">Volvo</option>
  <option value="admingrammar1.txt">admin</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
</select>

	</div>
	</div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Use</button>
        </div>
      </form-->


    </div>
  </div>
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

