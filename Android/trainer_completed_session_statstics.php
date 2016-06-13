<?php require_once('Connections/talent_uk.php'); ?>
<?php
//error_reporting(0);
$emp_id = $_GET['emp_id'];
$session_id = $_GET['session_id'];

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
$query1 = "SELECT * FROM `session` WHERE `session_faculty`='$emp_id' AND status='1' AND session_id='$session_id'";
$result1 = mysql_query($query1,$talent_uk);
while($row1 = mysql_fetch_assoc($result1))
{
$data= $row1;
$session_id = $row1['session_id'];
$query2 = "SELECT count(*) AS registrations FROM `session_registration` WHERE `session_id`='$session_id'";
$result2 = mysql_query($query2,$talent_uk);
$row2 = mysql_fetch_assoc($result2);
$data1=$row2;
$query3 = "SELECT count(*) AS attendies FROM `session_attend` WHERE `session_id`='$session_id'";
$result3= mysql_query($query3,$talent_uk);
$row3 = mysql_fetch_assoc($result3);
$data2=$row3;

$query4 = "SELECT count(*) AS rating1 FROM `feedback_details` WHERE `session_id`='$session_id' AND q15rating='1'";
$result4= mysql_query($query4,$talent_uk);
$row4 = mysql_fetch_assoc($result4);
$rating1 = $row4['rating1'];

$query5 = "SELECT count(*) AS rating2 FROM `feedback_details` WHERE `session_id`='$session_id' AND q15rating='2'";
$result5= mysql_query($query5,$talent_uk);
$row5 = mysql_fetch_assoc($result5);
$rating2 = $row5['rating2'];

$query6 = "SELECT count(*) AS rating3 FROM `feedback_details` WHERE `session_id`='$session_id' AND q15rating='3'";
$result6= mysql_query($query6,$talent_uk);
$row6 = mysql_fetch_assoc($result6);
$rating3 = $row6['rating3'];

$query7 = "SELECT count(*) AS rating4 FROM `feedback_details` WHERE `session_id`='$session_id' AND q15rating='4'";
$result7= mysql_query($query7,$talent_uk);
$row7= mysql_fetch_assoc($result7);
$rating4 = $row7['rating4'];


$data3=array('rating1'=>$rating1,'rating2'=>$rating2,'rating3'=>$rating3,'rating4'=>$rating4);
$data4=array('data'=>$row1,'data1'=>$row2,'data2'=>$row3,'data3'=>$data3);
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