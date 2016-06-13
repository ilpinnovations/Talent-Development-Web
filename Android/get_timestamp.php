<?php require_once('Connections/talent_uk.php'); ?>
<?php 
mysql_select_db($database_talent_uk, $talent_uk);


$sql = "SELECT timestamp FROM  `session` ORDER BY session_id DESC LIMIT 1";
$result=mysql_query($sql,$talent_uk);
$row = mysql_fetch_assoc($result);
if($result)
{
echo json_encode(array('data' =>$row));
}
mysql_close($con);

?>