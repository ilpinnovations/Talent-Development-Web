<?php require_once('Connections/talent_uk.php'); ?>
<?php
//error_reporting(0);
$emp_id = $_GET['emp_id'];

$data = array();
$data1 = array();
$data2 = array();
$data3 = array();
$data4 = array();
mysql_select_db($database_talent_uk, $talent_uk);
if(isset($emp_id))
{
$query = "SELECT * FROM `session` WHERE `session_faculty`='$emp_id'";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows>=1)
{
$query1 = "SELECT * FROM `session` WHERE `session_faculty`='$emp_id' AND status='1'";
$result1 = mysql_query($query1,$talent_uk);
while($row1 = mysql_fetch_assoc($result1))
{
$data4[]=array('data'=>$row1);
}
echo json_encode($data4);

}
else{
$data2=array(
"status"=>'No completed sessions.'
);
echo json_encode(array('data1'=>$data2));
}	
}
mysql_close($talent_uk);
?>