<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$emp_id=$_GET['emp_id'];
$data = array();
$data1 = array();
mysql_select_db($database_talent_uk, $talent_uk);

$query1 = "SELECT iou FROM users WHERE emp_id='$emp_id'";
$result1 = mysql_query($query1,$talent_uk);
$row1 = mysql_fetch_assoc($result1);
$iou = $row1['iou'];

$query = "SELECT emp_name,emp_id,emp_email FROM users WHERE role_inwebsite='Learning Ambassador' AND iou = '$iou' ";
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
else{
$data=array(
"null_trigger"=>"No Learning Ambassador is Assigned for you IOU."
);
echo json_encode($data);
}
mysql_close($talent_uk);
?>