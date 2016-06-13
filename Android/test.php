<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$emp_id = $_GET['emp_id'];
$data = array();
mysql_select_db($database_talent_uk, $talent_uk);
$query = "SELECT * FROM registered_sessions WHERE emp_id='$emp_id' ORDER BY start_date DESC";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows>=1)
{
while($row = mysql_fetch_assoc($result))
{
$start_date=  $row['start_date'];
$end_date=$row['end_date'];
$diff = abs(strtotime($end_date) - strtotime($start_date)); 
$years  = floor($diff / (365*60*60*24)); 
$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
if($days>=1)
{
$data[]= array ('data'=>$row,'is_multipledays'=>true);
}
else
{
$data[]= array ('data'=>$row,'is_multipledays'=>false);
}
}
echo json_encode(array('data'=>$data));
}
else{
$data=array(
"null_trigger"=>"Not registered for any session"
);
echo json_encode($data);
}
mysql_close($talent_uk);
?>