<?php

$dbconn=null;
global $dbconn;
$dbconn=pg_connect("host=localhost dbname=BeyondBooks user=postgres password=password") or die("could not connect!!!");



if (isset($_POST['rate']) && !empty($_POST['rate'])) {
    $uid = "201351022";
    $rate = real_escape_string($_POST['rate']);
// check if user has already rated
    $sql = "SELECT uid FROM rating WHERE uid = '$uid'";
    $result = pg_query($sql);
    $row = pg_fetch_array($result);

    if (pg_num_rows($row)> 0) {
        echo $row['uid'];
    } else {

        $sql = "INSERT INTO rating (uid, rating) VALUES ('$uid', '$rate'); ";
        if (pg_query($sql)) 
		{
            echo "0".pg_last_error();
        }
    }
}

?>
