<?php


$dbconn=null;
global $dbconn;
$dbconn=pg_connect("host=localhost dbname=BeyondBooks user=postgres password=password") or die("could not connect!!!");


$isbn = $_POST['isbn'];
$age = $_POST['age'];
$ts = time();

$price = $_POST['price'];
$description = $_POST['description'];
$seller = "201351022";

$query1 = pg_query("INSERT INTO pbase(ts, price, sellerid) VALUES ('$ts', '$price', '$seller')");

if($query1)
{	
}


$query2 = pg_query("INSERT INTO single_sell(isbn, age, description, price) VALUES ('$isbn', '$age','$description', '$price')");

if($query2)
{	
}




?>
