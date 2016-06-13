<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$emp_id = $_POST['emp_id'];
$emp_email=$_POST['emp_email'];
$gcm_key=$_POST['emp_gcm'];
$role=$_POST['role'];
$data = array();
mysql_select_db($database_talent_uk, $talent_uk);
if(isset($emp_id))
{
if($role=="Trainee")
{
	$query = "SELECT * FROM `users` WHERE `emp_id`='$emp_id'";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows==1)
{
	$query1 = "UPDATE authentication SET emp_email='$emp_email',gcm_id='$gcm_key' WHERE emp_id='$emp_id'";
$result1 = mysql_query($query1,$talent_uk);
$message = "Hello ".$emp_name."";
	$params = array ('message' => $message, 'empid' => $emp_id);
	$query2 = http_build_query ($params);
	$contextData = array ( 'method' => 'POST', 'content'=> $query2 );
	$context = stream_context_create (array ( 'http' => $contextData ));
	$result2 =  file_get_contents ('http://theinspirer.in/gcm/push_notification/gcm.php?push=true', false, $context);
	if($result1)
	{
		$data2=array(
"success"=>'1'
);
	$row = mysql_fetch_assoc($result);
echo json_encode(array('data' =>$row,'data1'=>$data2));
	}
}
else{
$data2=array(
"success"=>'0'
);
echo json_encode(array('data1'=>$data2));
}
}
else if($role=="Trainer")
{
$query = "SELECT * FROM `session` WHERE `session_faculty`='$emp_id'";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows>=1)
{
	$query3 = "SELECT * FROM `users` WHERE `emp_id`='$emp_id'";
$result3 = mysql_query($query3,$talent_uk);
	$query1 = "UPDATE authentication SET emp_email='$emp_email',gcm_id='$gcm_key' WHERE emp_id='$emp_id'";
$result1 = mysql_query($query1,$talent_uk);
$message = "Hello ".$emp_name."";
	$params = array ('message' => $message, 'empid' => $emp_id);
	$query2 = http_build_query ($params);
	$contextData = array ( 'method' => 'POST', 'content'=> $query2 );
	$context = stream_context_create (array ( 'http' => $contextData ));
	$result2 =  file_get_contents ('http://theinspirer.in/gcm/push_notification/gcm.php?push=true', false, $context);
	if($result1)
	{
		$data2=array(
"success"=>'1'
);
	$row = mysql_fetch_assoc($result3);
echo json_encode(array('data' =>$row,'data1'=>$data2));
	}
}
else{
$data2=array(
"success"=>'0'
);
echo json_encode(array('data1'=>$data2));
}	
}

}
mysql_close($talent_uk);
?>