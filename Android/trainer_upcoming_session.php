
<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$emp_id=$_GET['emp_id'];
$data = array();
$data1 = array();
mysql_select_db($database_talent_uk, $talent_uk);
if(isset($emp_id))
{
$query = "SELECT * FROM `session` WHERE `session_faculty`='$emp_id'";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows>=1)
{
$query = "SELECT * FROM session WHERE session_faculty='$emp_id' AND status='0'";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows>=1)
{
while($row = mysql_fetch_assoc($result))
{
$data[]= $row;
}
echo json_encode(array('data'=>$data));
}
else
{
$data1=array(
"status"=>"No Sessions for you"
);	
echo json_encode(array('data'=>$data1));
}
}
else
{
$data1=array(
"status"=>"You are not faculty"
);	
echo json_encode(array('data'=>$data1));
}
}
mysql_close($talent_uk);
?>