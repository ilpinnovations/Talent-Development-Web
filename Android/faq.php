<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$data = array();
$data1 = array();
mysql_select_db($database_talent_uk, $talent_uk);
$query = "SELECT * FROM faq";
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
"null_trigger"=>"No FAQ Available"
);
echo json_encode($data);
}
mysql_close($talent_uk);
?>