<!--Pulling Awesome Font -->
	    <?php if(isset($_POST['wrong_login'])){echo "<div> <p>Wrong Username</p></div>"; unset($_POST['wrong_login']);}?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="../styles/login.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">


<script src="../scripts/loginscript.js"> </script>

<div class="container">
    <div class="row">
	<div class="col-md-offset-5 col-md-3">
	    <div class="form-login">
	    <form id="form_login" method="POST" action="login.php" onsubmit="return sendLoginParameters()" >
	    <h4>Compiler Tutorials.</h4>
	    <input type="text" id="userName" name="uname" class="form-control input-sm chat-input" placeholder="username" />
	    </br>
	    <input type="password" id="userPassword" name="pass" class="form-control input-sm chat-input" placeholder="password" />
	    </br>
<?php 
if(isset($_GET['wrong_login'])){
		echo '<p style="color:red">'.$_GET['wrong_login'].'</p>'; 
		unset($_GET['wrong_login']);
	}
	?>
	    <div class="wrapper">
	    <span class="group-btn">     
		<a href="#" onclick="sendLoginParameters()" class="btn btn-primary btn-md" >login <i class="fa fa-sign-in"></i></a>
		</br>
		<input type="submit" style="display: none">

	    </span>
	    </div>
	    </form>
	    </div>

	</div>
    </div>
</div>
