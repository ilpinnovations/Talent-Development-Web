<?php require_once('Connections/talent_uk.php'); ?>
<?php
//error_reporting(0);
$emp_id = $_GET['emp_id'];
$session_id = $_GET['session_id'];
$data = array();

mysql_select_db($database_talent_uk, $talent_uk);
if(isset($emp_id))
{
$query = "SELECT * FROM `session` WHERE `session_faculty`='$emp_id'";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows>=1)
{
$query1 = "SELECT * FROM `session` WHERE `session_faculty`='$emp_id' AND session_id='$session_id'";
$result1 = mysql_query($query1,$talent_uk);
while($row1 = mysql_fetch_assoc($result1))
{
$session_id = $row1['session_id'];
$query2 = "SELECT * FROM `registered_sessions` WHERE `session_id`='$session_id' AND session_faculty='$emp_id'";
$result2 = mysql_query($query2,$talent_uk);
while($row2 = mysql_fetch_assoc($result2))
{
$data4[]=$row2;
}
}
echo json_encode($data4);

}
else{
$data2=array(
"status"=>'No Registrations.'
);
echo json_encode(array('data'=>$data2));
}	
}
mysql_close($talent_uk);
?>