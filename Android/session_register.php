<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$session_id = $_GET['session_id'];
$emp_id = $_GET['emp_id'];

$data = array();
mysql_select_db($database_talent_uk, $talent_uk);
if(isset($emp_id))
{
	$query = "SELECT * FROM `session_registration` WHERE `emp_id`='$emp_id' AND `session_id`='$session_id'";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows==1)
{
echo "fail";
}
else
{
$query1 = "SELECT * FROM `session` WHERE `session_id`='$session_id'";
$result1 = mysql_query($query1,$talent_uk);
$row1 = mysql_fetch_assoc($result1);
$category = $row1['session_category'];
if($category=="workshop")
{
	$query2 = "INSERT INTO session_registration(emp_id,session_id,is_confirmed) values('$emp_id','$session_id','0')";
$result = mysql_query($query2,$talent_uk);
echo "success";
}
else
{
$query2 = "INSERT INTO session_registration(emp_id,session_id) values('$emp_id','$session_id')";
$result = mysql_query($query2,$talent_uk);
echo "success";
	}
	}
}
mysql_close($talent_uk);
?>