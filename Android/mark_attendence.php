<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$session_id = $_GET['session_id'];
$emp_id = $_GET['emp_id'];
$registration_id = $_GET['registration_id'];
$date = $_GET['date'];
$date1 = str_replace('/', '-', $date);
$date1= date('Y-m-d', strtotime($date1));

$data = array();
mysql_select_db($database_talent_uk, $talent_uk);
if(isset($emp_id))
{
	$query = "SELECT * FROM `session_attend` WHERE `emp_id`='$emp_id' AND `session_id`='$session_id' AND date='$date1' AND registeration_id='$registration_id'";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows==1)
{
echo "You have already marked attendence for this session";
}
else
{
$query2 = "SELECT * FROM `attended_sessions` WHERE `emp_id`='$emp_id' AND `session_id`='$session_id' AND registeration_id='$registration_id'";
$result2 = mysql_query($query2,$talent_uk);
$rows2 = mysql_num_rows($result2);

$query3 = "SELECT * FROM `session` WHERE `session_id`='$session_id'";
$result3 = mysql_query($query3,$talent_uk);
$row = mysql_fetch_assoc($result3);
$noofdays= $row['noofdays'];
$rows2 = $rows2+1;
if($rows2==$noofdays)
{
$query3 = "UPDATE session_registration SET is_attended='1' WHERE registeration_id='$registration_id'";
$result3 = mysql_query($query3,$talent_uk);
}
$query1 = "INSERT INTO session_attend(emp_id,session_id,date,registeration_id,is_attend) values('$emp_id','$session_id','$date1','$registration_id','1')";
$result1 = mysql_query($query1,$talent_uk);
if($result1)
{
echo "true";
}
}
}
mysql_close($talent_uk);
?>