<!doctype html>
<?php
include_once 'db_conn.php';
session_start();
if (isset($_SESSION["user_id"]))
{
	$user_id=$_SESSION["user_id"];
	$result1=pg_query("SELECT f_name from user_profile where user_id='$user_id'");
	$num1=pg_num_rows($result1);
	if($num1!=0)
	{
			header('Location: homepage.php');
	}
}
?>
<html>
<head>
<title>
Forgot Password
</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Philosopher' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/font-awesome.min.css"/>
<script src="js/modernizr-2.6.2.min.js"></script>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</script>
</head>


<body>
<!--                                                                                -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	  <div class="container-fluid">

	    <!-- Brand and toggle get grouped for better mobile display -->

	    <div class="navbar-header">
	<b>Forgot Password</b><hr/>
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
	        <span class="sr-only">Toggle navigation</span>

	        <span class="icon-bar"></span>

	        <span class="icon-bar"></span>

	        <span class="icon-bar"></span>
	      </button>

	      <a class="navbar-brand" href="index.php">Beyond Books</a>

	    </div>

	  </div><!-- /.container-fluid -->

	</nav>

<div class="container" id="forgot_pd">
<form action="forgotpassword-script.php" method="POST" class="form-forgotpass">
<div class="form-group">
<label for="email">Email</label>
<i class="glyphicon glyphicon-user form-control-feedback" style="position: absolute; padding-top: 4.5%;"></i>
<input type="email" id="email" name="email"  class="form-control login-field" required="required" placeholder="Enter your Email ID">

</div>
<button type="submit" class="btn btn-primary" onclick="sendpassword()">Submit</button>
</div>
</form>

<footer class="generalfooter">
<hr />
<div class="container">
<hr>Beyond Books Everywhere</hr>
</br>
<p class="text-left"><button type="button" class="btn btn-primary">Click here to Download our android app</button></p>
<p class="text-right">Copyright &copy; BeyondBooks</p>
</div>
</footer>


</body>
</html>


<script>
function sendpassword()
		{
			var email=$('#email').val();
			jQuery.ajax({
				type: "POST",
				url: "forgotpassword-script.php",
				data: 'email='+email,
				cache: false,
				success: function(response)
				{
					if(response==1)
					{
						$("#email").val("");
						alert("An email has been sent to your registered email.");
					}
					else
					{
						$("#email").val("");
						alert("Whoa whoa whoa! You are trying to change password for an account that doesn't exist.");
					}
				}
			})
		}
</script>
