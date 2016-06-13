<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$emp_id=$_GET['emp_id'];
$data = array();
$data1 = array();
mysql_select_db($database_talent_uk, $talent_uk);
$query = "SELECT * FROM session WHERE status='0' ORDER BY start_date DESC LIMIT 5";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows>=1)
{
while($row = mysql_fetch_assoc($result))
{
$session_id=$row['session_id'];
$session_name=$row['session_name'];
$session_date=$row['start_date'];
$query1 = "SELECT * FROM session_registration WHERE emp_id='$emp_id' AND session_id='$session_id'";
$result1 = mysql_query($query1,$talent_uk);
$row1 = mysql_fetch_assoc($result1);
$isconfirmed = $row1['is_confirmed'];
$count = mysql_num_rows($result1);
if($count==1)
{
	
$data1=array(
"is_registered"=>"True",
"notification"=>$session_name." session on ".$session_date." Click to register.",
"is_confirmed"=>$isconfirmed
);
$data[]= array ('data1'=>$row,'data2'=>$data1);
}
else
{
$data1=array(
"is_registered"=>"False",
"notification"=>$session_name." session on ".$session_date." Click to register.",
"is_confirmed"=>$isconfirmed
);	
$data[]= array ('data1'=>$row,'data2'=>$data1);
}

}
echo json_encode(array('data'=>$data));
}
else{
$data=array(
"null_trigger"=>"session do not exist"
);
echo json_encode($data);
}
mysql_close($talent_uk);
?>