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

    <!-- Bootstrap core CSS -->
    <link href="../styles/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../styles/theme.css" rel="stylesheet">    

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
	  <a class="navbar-brand">
<?php echo "Welcome ".$name;?>
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

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container text-center">
    <div class="page-header">
      <h2>CSXXX : COMPILER TUTORIALS <br/>
     </h2>
    </div>
  </div>
</div>
<div class="container">
  <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Instructor</h3>
      </div>
      <div class="panel-body">
        <strong>Prof. Amey Karkare</strong>
        <p>Room RM</p>
        <p><a href="mailto:karkare@cse.iitk.ac.in">karkare@cse.iitk.ac.in</a></p>      
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Lecture Schedule</h3>
      </div>
      <div class="panel-body">
        <strong></strong>
        <p>Room KD101</p>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Site Authors</h3>
      </div>
      <div class="panel-body">
        <strong>Mohit Bhadade</strong>
        <p><a href="mailto:mohitdb@cse.iitk.ac.in">mohitdb@cse.iitk.ac.in</a></p>
        <hr>
        <strong>Nimisha Agrawal</strong>
        <p><a href="mailto:nimisha@cse.iitk.ac.in">nimisha@cse.iitk.ac.in</a></p>
        <hr>
        <!--strong>All Students and Prof.</strong>
        <p><a href="mailto:cs618st@cse.iitk.ac.in">cs618st@cse.iitk.ac.in</a></p-->
      </div>    
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Course TAs</h3>
      </div>
      <div class="panel-body">
                        <strong>TA 1</strong>
        <p><a href="mailto:">ta1@cse.iitk.ac.in</a></p>
        <hr/>                <strong>TA 2</strong>
        <p><a href="mailto:">ta2@cse.iitk.ac.in</a></p>
                      </div>    
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


