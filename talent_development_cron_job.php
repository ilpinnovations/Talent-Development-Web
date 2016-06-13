<?php require_once('Connections/talent_uk.php'); ?>
<?php

mysql_select_db($database_talent_uk, $talent_uk);
date_default_timezone_set('Europe/London'); 
$date1= date("Y-m-d");
$result9 = mysql_query("SELECT * FROM session", $talent_uk);
if($result9)
{
while($row9=mysql_fetch_assoc($result9))
{
$date2 = $row9['end_date'];
$session_id=$row9['session_id'];
if(strtotime($date1) < strtotime($date2)){
    
}elseif(strtotime($date1) == strtotime($date2))
{}
else{
    $result10 = mysql_query("UPDATE session SET status='1' WHERE session_id='$session_id'", $talent_uk);
 }
}
}
?>