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
$query = "SELECT * FROM `registered_sessions` WHERE `is_attended`='0' AND `session_id`='$session_id' AND emp_id='$emp_id'";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows==1)
{
$query1 = "INSERT INTO session_attend(emp_id,session_id,date,registeration_id,is_attend) values('$emp_id','$session_id','$date1','$registration_id','1')";
$result1 = mysql_query($query1,$talent_uk);

$query = "UPDATE session_registration SET is_attended='1' WHERE `session_id`='$session_id' AND emp_id='$emp_id'";
$result = mysql_query($query,$talent_uk);
echo "true";

}
else
{

echo "false";
	}
}
mysql_close($talent_uk);
?>