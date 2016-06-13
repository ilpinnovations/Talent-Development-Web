<?php
$db_username = "root";
$db_password = "";
$db_host = "localhost";
$db_name = "talent_uk";
$connection = mysql_connect($db_host,$db_username,$db_password) or die('Cannot connect to Database');
mysql_select_db($db_name,$connection) or die('Error selecting Database');

?>