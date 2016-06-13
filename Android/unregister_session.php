<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$session_id = $_GET['session_id'];
$emp_id = $_GET['emp_id'];

$data = array();
mysql_select_db($database_talent_uk, $talent_uk);
if(isset($emp_id))
{
	$query = "SELECT * FROM `session_registration` WHERE `emp_id`='$emp_id' AND `session_id`='$session_id' AND is_attended='1'";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows==1)
{
echo "You have already attended this session";
}
else
{
$query = "DELETE FROM session_registration WHERE `emp_id`='$emp_id' AND `session_id`='$session_id' ";
$result = mysql_query($query,$talent_uk);
echo "Session unregistered successfully";
	}
}
mysql_close($talent_uk);
?>