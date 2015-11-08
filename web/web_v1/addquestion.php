<!doctype html>
<html>
<head>
<title>
Add Your Question
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


<!-- <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
-->

<script type="text/javascript">
$(document).ready(function(){
	$(".dropdown, .btn-group").hover(function(){
		var dropdownMenu = $(this).children(".dropdown-menu");
		if(dropdownMenu.is(":visible")){
			dropdownMenu.parent().toggleClass("open");
		}
	});
});		
</script>
</head>

  <body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	  <div class="container-fluid">

	    <!-- Brand and toggle get grouped for better mobile display -->

	    <div class="navbar-header">

	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
	        <span class="sr-only">Toggle navigation</span>

	        <span class="icon-bar"></span>

	        <span class="icon-bar"></span>

	        <span class="icon-bar"></span>
	      </button>

	      <a class="navbar-brand" href="#">Beyond Books</a>

	    </div>

	 

	    <div class="collapse navbar-collapse" id="navbar-collapse-main">

	      <ul class="nav navbar-nav navbar-right">
		
		<li><form action="" class="search-form">
                <div class="form-group has-feedback" id="search">
            		
            		<input type="text" class="form-control" name="search" id="search1" placeholder="search">
              		<span class="glyphicon glyphicon-search form-control-feedback"></span>
            	</div>
            </form></li>

	        <li><a href="#home">Home</a></li>

	        <li><a href="#about">About</a></li>
		<li><a href="logout-script.php">Log Out <span class="glyphicon glyphicon-log-out"></span></li>
		<li class="dropdown"><a href="#" data-toggle="dropdown"  class="dropdown-toggle"><img src="/var/www/html/BeyondBooks/web/images/user.png" class="img-circle" style="width: 50px"></a>

<ul class="dropdown-menu">
<li><a herf="#">My profile</a></li>
<li><a href="#">My uploads</a></li>
</ul></li>

	      </ul>

	    </div><!-- /.navbar-collapse -->

	  </div><!-- /.container-fluid -->

	</nav>



<br/><br/><br/><br/><br/>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
 <div id="header">
         <center> <h1> <a href="#">Add Your Question Here!</br>  </a></h1> </center> <br/>
      </div>
<hr>
			<form class="form-horizontal" role="form" method = "post" action = "questionadd.php">
				<div class="form-group">
					 
					<label for="inputEmail3" class="col-sm-4 control-label">
						Enter the title :
					</label>
					<div class="col-sm-5">
						<input class="form-control" id="inputEmail3" name = "course" type="text">
					</div>
				</div>
				<div class="form-group">
					 
					<label for="inputPassword3" class="col-sm-4 control-label">
						Enter the Content of the Question :
					</label>
					<div class="col-sm-5">
						<textarea class="form-control" id="inputPassword3" name = "body" rows = "4" type="text"> </textarea>
					</div>
				</div>

				<div class="form-group">
					 
					<label for="inputPassword3" class="col-sm-4 control-label">
						Enter the Name of the Hash Tag :
					</label>
					<div class="col-sm-5">
						<input class="form-control" name = "title" id="inputPassword3" type="text">
					</div>
				</div>
				
			

				<center>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-9">
						 				<br/>						 				<br/>						 				<br/>
						<button type="submit" size = "6" class="btn btn-default">
							Create Discussion
						</button>
					</div>
				</div>
				</center>
			</form>
		</div>
	</div>
</div>

<footer>

<div class="container">
<hr>Beyond Books Everywhere</hr>
</br>
<p class="text-left"><button type="button" class="btn btn-primary">Click here to Download our android app</button></p>
<p class="text-right">Copyright &copy; <img class="img-thumbnail" alt="Bootstrap Image Preview" src="images/hackstreetboys.png" height="42" width="42"> The Hackstreet Boys </p>
</div>
</footer>



  </body>
</html>