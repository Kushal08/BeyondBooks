<!doctype html>
<?php
include_once 'db_conn.php';
session_start();
if(!isset($_SESSION["user_id"]))
{
	header('Location: index.php');
}
?>
<html>
<head>
<title>
Main Page of Book
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

<link href='css/rating.css' rel='stylesheet' type='text/css'/>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/rating.js"></script>



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

<script type="text/javascript">
$("document").ready(function(){
	var isbn=$('#isbn').val();
	var userid=$('#userid').val();
	jQuery.ajax({
		type: "POST",
		url: "checkbookshelf-script.php",
		data: "isbn="+isbn+"&userid="+userid,
		cache: false,
		success: function(response)
		{
			if(response==1)
			{
				document.getElementById("bookshelfbtn").value="Added to Bookshelf";
				document.getElementById("bookshelfbtn").class="btn-success";
			}
		}
	})
});

function insertbookshelf()
{
	var isbn=$('#isbn').val();
	var userid=$('#userid').val();
	jQuery.ajax({
		type: "POST",
		url: "insertbookshelf-script.php",
		data: "isbn="+isbn+"&userid="+userid,
		cache: false,
		success: function(response)
		{
			if(response==1)
			{
				document.getElementById("bookshelfbtn").value="Added to Bookshelf";
				document.getElementById("bookshelfbtn").class="btn-success";
			}
			else
			{
				alert("An error occurred while adding book to your bookshelf.");
			}
		}
	})
}
</script>

</head>







<body>
<!--                                                                                -->
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

	      <a class="navbar-brand" href="homepage.php">Beyond Books</a>

	    </div>



	    <div class="collapse navbar-collapse" id="navbar-collapse-main">

	      <ul class="nav navbar-nav navbar-right">

			<li>
<?php
$content ='
<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search").keyup(function()
{
var searchid = $(this).val();
var dataString = \'search=\'+ searchid;
if(searchid!=\'\')
{
    $.ajax({
    type: "POST",
    url: "search.php",
    data: dataString,
    cache: false,
    success: function(html)
    {
    $("#result").html(html).show();
    }
    });
}return false;
});

jQuery("#result").live("click",function(e){
    var $clicked = $(e.target);
    var $name = $clicked.find(\'.name\').html();
    var decoded = $("<div/>").html($name).text();
    $(\'#searchid\').val(decoded);
});
jQuery(document).live("click", function(e) {
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search")){
    jQuery("#result").fadeOut();
    }
});
$(\'#searchid\').click(function(){
    jQuery("#result").fadeIn();
});
});
</script>

<style type="text/css">
    #searchid
    {
        width:190px;
        padding:8px;
        font-size:12px;
	margin-top:-1cm;

     margin-left:1cm;
       }
    #result
    {
        position:absolute;
        width:190px;
        padding:10px;
        display:none;
     margin-left:1cm;

        margin-top:-1px;
        border-top: 0px;
        overflow:hidden;
        border:1px #CCC solid;
        background-color: white;
    }
    .show
    {
        padding:10px;
        border-bottom:0px #999 ;
        font-size:12px;

        height:10px;


    }
    .show:hover
    {

        cursor:pointer;
    }
</style>
<div class="content">
<input type="text" class="form-control search" id="searchid" placeholder="Search for Books" />
	<span class="glyphicon glyphicon-search form-control-feedback" style="padding-top: 17%; color: #3596e0;"></span>
<div id="result"> </div>
</div>
';


$pre = 1;
include("html.inc");
?>
</li>

<li><br/><a href="homapage.php">Home</a></li>

<li><br/><a href="buy_sell.php">Buy/Sell</a></li>
<li><br/><a href="forum.php">Forum</a></li>
<li><br/><a href="logout-script.php">Log Out <span class="glyphicon glyphicon-log-out"></span></a></li>
<li class="dropdown"><a href="#" data-toggle="dropdown"  class="dropdown-toggle">
<?php
$filename=$_SESSION["user_id"].'_dp';
$filename="pictures/".$filename."*";
$result1=glob($filename);
if (!empty($result1))
echo '<img src="'.$result1[0].'"class="img-circle" style="width: 50px">';
else
echo '<img src="images/user.png"class="img-circle" style="width: 50px">';
?>
</a>
<ul class="dropdown-menu">
<li><a href="yourprofile.php">My Profile</a></li>
<li><a href="bookshelf.php">My Bookshelf</a></li>
<li><a href="my_sold_books.php">My Sold Books</a></li>
</ul></li>

</ul>


	    </div><!-- /.navbar-collapse -->

	  </div><!-- /.container-fluid -->

	</nav>

<br/><br/><br/><br/>
<hr/>
  <div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6"><br/>
	<?php

			$isbn = $_GET['isbn'];
			$_SESSION['isbn'] = $isbn;

	$result = pg_query("SELECT * FROM books JOIN author ON books.isbn = author.isbn WHERE books.isbn = '$isbn'");

	$url = "http://www.librarything.com/devkey/KEY/medium/isbn/".$isbn;
	$img = 'books_pics/'.$isbn.'.png';
	$result1=glob($img);
	if (!empty($result1))
	echo '<img src="'.$result1[0].'" class="img-responsive" style="width:100px; height:150px">';
	else
	{
		file_put_contents($img, file_get_contents($url));
		if(file_exists($img))
			echo '<img src="'.$img.'" class="img-responsive" style="width:100px; height:150px">';
		else {
			echo '<img src="books_pics/nan.jpg" class="img-responsive" style="width:100px; height:150px">';
		}
	}

					while($row = pg_fetch_array($result))
				{
					echo '<b>'.$row['title'].'</b></br>';
					echo "<b> By :".$row['author']."</b>";

			     }
	?>
</br></br>

<?php

	$result = pg_query("SELECT COUNT(uid) AS total FROM rating WHERE isbn = '$isbn'");
	$result1 = pg_query("SELECT sum(rating) AS totalrating FROM rating WHERE isbn = '$isbn'");
	$row = pg_fetch_array($result);
	$row1 = pg_fetch_array($result1);

$starNumber = $row1['totalrating']/$row['total'];
echo "Rating :";
    for($x=1;$x<=$starNumber;$x++) {
        echo '<img src="full.png" />';
    }
    if (strpos($starNumber,'.')) {
        echo '<img src="half.png" />';
        $x++;
    }
    while ($x<=5) {
        echo '<img src="zero.png" />';
        $x++;
    }
?>

<br/><br/>
Your Rating:
<div id="rating_panel" data-pollid="1" data-rated="0">
					<img src="zero.png" /> <img src="zero.png" /> <img src="zero.png" /> <img src="zero.png" /> <img src="zero.png" /><div id="starloader"></div>
				</div>

				<br/><br/>
				<input type="hidden" id="isbn" value="<?php echo $isbn; ?> ">
				<input type="hidden" id="userid" value='<?php echo $_SESSION["user_id"]; ?> '>
				<input type="button" id="bookshelfbtn" class="btn btn-default btn-primary" value="+Add to my Bookshelf" onclick="insertbookshelf()">
					</input>
				</div>
				<div class="col-md-6">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<h3>
				Rating and Reviews
			</h3>


<?php

$uid = $_SESSION["user_id"];
$review = pg_escape_string($_POST['content']);
$isbn = $_GET['isbn'];

  //$result = mysql_safe_query('SELECT * FROM teachers WHERE username = %s ', $username);
   // $row = mysql_fetch_assoc($result);

if (!empty($review))
{
$result = pg_query("SELECT * FROM review WHERE uid='$uid' AND isbn = '$isbn'");
if(pg_num_rows($result)!=0 )
{
 $query = pg_query("UPDATE review SET review = '$review' WHERE uid = '$uid' AND isbn = '$isbn'" );
}
else
{
 $query1 = pg_query("INSERT INTO review (uid, review, isbn) VALUES ('$uid', '$review', '$isbn') " );
}

}

?>

	<?php
		$num_rec_per_page=2;

if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $num_rec_per_page;

	$result = pg_query("SELECT * FROM review WHERE isbn = '$isbn' LIMIT $num_rec_per_page OFFSET $start_from");

			if(!pg_num_rows($result)) {
							echo '<p>No forums is Created Yet.</p>';
						     }
			else {

					echo "<br/><b>Reviews of the Users:</b><br/><br/>";

					while($row = pg_fetch_array($result))
				{
					echo '<b>'.$row['uid'].'</b><br/>';
					$body = $row['review'];

					echo "".nl2br($body).'<br><br/>';


$sql = "SELECT * FROM review WHERE isbn = '$isbn'";
$rs_result = pg_query($sql); //run the query
$total_records = pg_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page);




			     }
echo "<a href='book_main_page.php?isbn=$isbn&page=1'>".'Prev-'."</a> "; // Goto 1st page

for ($i=1; $i<=$total_pages; $i++) {
            echo "<a href='book_main_page.php?isbn=$isbn&page=".$i."'>".$i."</a> ";
};
echo "<a href='book_main_page.php?isbn=$isbn&page=$total_pages'>".'-Next'."</a> "; // Goto last page

					}

				echo '<hr style="height:1px; border:none; color:rgb(60,90,180); background-color:rgb(60,90,180);">';
		echo <<<HTML

 <form class="form-horizontal" role="form" method="post" action="">
								<div class="form-group">


									<div class="col-sm-10">

				<textarea class="form-control" name = "content" rows = "1" id="inputEmail3" type="text"> Add Your Review</textarea>

									</div>
								</div>

<div class="form-group">


									<div class="col-sm-4">

				<input class="form-control" type ="hidden" value = "$isbn" name = "isbn" id="inputEmail3" type="text"/>

									</div>
								</div>



	<div class="form-group">


									<div class="col-sm-4">

				<input class="form-control" type ="submit" name = "Submit" value =" Add Review" id="inputEmail3" type="text"/>

									</div>
								</div>



							</form>
HTML;

				echo '<hr style="height:1px; border:none; color:rgb(60,90,180); background-color:rgb(60,90,180);">';



					?>







			<p>

			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h3>
				About the Book
			</h3>
			<p>
				<?php
				echo '<hr style="height:1px; border:none; color:rgb(60,90,180); background-color:rgb(60,90,180);">';
			$isbn = $_GET['isbn'];
			$_SESSION['isbn'] = $isbn;

	$result = pg_query("SELECT * FROM books JOIN author ON books.isbn = author.isbn WHERE books.isbn = '$isbn'");



			if(!pg_num_rows($result)) {
							echo '<p>No Book is available.</p>';
						     }
			else {

					while($row = pg_fetch_array($result))
				{
					echo '<b> Title :</b> '.$row['title'].'<br/>';
					echo "<b> Authors :</b><em>".$row['author']."</em><br/>";
			    echo '<b> Publication: </b><em>'.$row['publisher'].'</em><br/>';
					echo '<b> Description: </b><em>'.$row['description'].'</em><br/>';
					echo '<hr style="height:1px; border:none; color:rgb(60,90,180); background-color:rgb(60,90,180);">';
			     }
					}

					?>

			</p>
		</div>
		<div class="col-md-6">
			<h3>
				Any User Selling Book
			</h3>
			<?php

		$num_rec_per_page=1;

if (isset($_GET["page1"])) { $page  = $_GET["page1"]; } else { $page=1; };
$start_from = ($page-1) * $num_rec_per_page;

	$result = pg_query("SELECT * FROM pbase JOIN single_sell ON single_sell.prodid = pbase.prodid WHERE single_sell.isbn = '$isbn' AND pbase.prodid = single_sell.prodid LIMIT $num_rec_per_page OFFSET $start_from");

			if(!pg_num_rows($result)) {
							echo '<p> No Seller is available.</p>';
						     }
			else {

					echo "<br/><b>Available Seller:</b><br/>";

					echo '<hr style="height:1px; border:none; color:rgb(60,90,180); background-color:rgb(60,90,180);">';

					while($row = pg_fetch_array($result))
				{
					echo '<b>Seller:&nbsp;'.$row['sellerid'].'</b><br/>';
					echo 'Price:&nbsp;'.$row['price'].'<br/>';
					echo 'Age:&nbsp;'.$row['age'].'<br/>';
					$body = $row['description'];
					echo "Description:&nbsp;".nl2br($body).'';
					$user_id = $_SESSION["user_id"];
					echo " <form method = 'POST' action= 'mailproceed.php'>

  						<input type='hidden' name = 'isbn' value =".$row['isbn'].">
  						<input type='hidden' name = 'sellerid' value =".$row['sellerid'].">
  						<input type='hidden' name = 'user_id' value =".$user_id.">

  						<input type='submit' value = 'Show Interest'>
						</form><br/> ";

$sql = "SELECT * FROM pbase JOIN single_sell ON single_sell.prodid = pbase.prodid WHERE single_sell.isbn = '$isbn' AND pbase.prodid = single_sell.prodid";
$rs_result = pg_query($sql); //run the query
$total_records = pg_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page);


			     }


echo "<a href='book_main_page.php?isbn=$isbn&page1=1'>".'Prev-'."</a> "; // Goto 1st page

for ($i=1; $i<=$total_pages; $i++) {
            echo "<a href='book_main_page.php?isbn=$isbn&page1=".$i."'>".$i."</a> ";
};
echo "<a href='book_main_page.php?isbn=$isbn&page1=$total_pages'>".'-Next'."</a> "; // Goto last page


}

				echo '<hr style="height:1px; border:none; color:rgb(60,90,180); background-color:rgb(60,90,180);">';
					?>


		</div>
	</div>
</div>


<footer>
<hr />
<div class="container">
<hr>Beyond Books Everywhere</hr>
</br>
<p class="text-left"><button type="button" class="btn btn-primary">Click here to Download our android app</button></p>
<p class="text-right">Copyright &copy; <img class="img-thumbnail" alt="Bootstrap Image Preview" src="images/hackstreetboys.png" height="42" width="42"> The Hackstreet Boys </p>
</div>
</footer>