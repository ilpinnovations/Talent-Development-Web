
<?php
require_once('gok.php');
//error_reporting(0);
$service_id = $_GET['service_id'];
$data = array();
mysql_select_db($database_gok, $gok);
$query = "SELECT * FROM documents";
$result = mysql_query($query,$gok);
$rows = mysql_num_rows($result);
if($rows>=1)
{
while($row = mysql_fetch_assoc($result))
{
$data[]= $row;
}
echo json_encode(array('data' =>$data));
}
else{
$data=array(
"message"=>"No Documents"
);
echo json_encode($data);
}
mysql_close($gok);
?>