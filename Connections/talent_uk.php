<?php
error_reporting(0);
$hostname_talent_uk = "160.153.89.96";
$database_talent_uk = "talent_uki";
$username_talent_uk = "jeet";
$password_talent_uk = "J@447788";
$talent_uk = mysql_pconnect($hostname_talent_uk, $username_talent_uk, $password_talent_uk) or trigger_error(mysql_error(),E_USER_ERROR); 
?>