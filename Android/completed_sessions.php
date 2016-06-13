
<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$emp_id=$_GET['emp_id'];
$data = array();
$data1 = array();
mysql_select_db($database_talent_uk, $talent_uk);
$query = "SELECT * FROM registered_sessions WHERE emp_id='$emp_id' AND is_attended='1' AND is_feedback='1'";
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
"status"=>"No sessions are completed"
);	
echo json_encode(array('data'=>$data1));
}
mysql_close($talent_uk);
?>