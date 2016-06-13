<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$session_id = $_GET['session_id'];
$emp_id = $_GET['emp_id'];
$registration_id= $_GET['registration_id'];
$data = array();
mysql_select_db($database_talent_uk, $talent_uk);
if(isset($emp_id))
{
$query = "SELECT * FROM `session` WHERE `session_id`='$session_id'";
$result = mysql_query($query,$talent_uk);
while($row=mysql_fetch_assoc($result))
{
$noofdays = $row['noofdays'];
$start_date = $row['start_date'];
$query1 = "SELECT * FROM `feedback_details` WHERE `session_id`='$session_id' AND emp_id='$emp_id' ";
$result1 = mysql_query($query1,$talent_uk);
$row1=mysql_num_rows($result1);
for ($x = 0; $x < $noofdays; $x++) {
	$data1=array(
"start_date"=>$start_date
);

$query2 = "SELECT * FROM `attended_sessions` WHERE `session_id`='$session_id' AND emp_id='$emp_id' AND registeration_id='$registration_id' AND date LIKE '%$start_date%'";
$result2 = mysql_query($query2,$talent_uk);
$row2=mysql_fetch_assoc($result2);
$rows2= mysql_num_rows($result2);
if($rows2==0)
{
$data2=array(
"is_attend"=>'0'
);
}
else
{
$data2=$row2;
}

$data[]= array ('data1'=>$row,'data2'=>$data1,'data3'=>$data2);
$start_date = date('Y-m-d', strtotime($start_date . ' +1 day'));
}
}
echo json_encode(array('data' =>$data));
}
mysql_close($talent_uk);
?>
