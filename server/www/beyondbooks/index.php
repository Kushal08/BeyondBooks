<?php

include ('db_conn.php');
connect_db();
echo $dbconn;

sql_query("SELECT * FROM user_profile;");


?>
