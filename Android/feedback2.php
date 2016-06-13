<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$session_id = $_POST['session_id'];
$emp_id = $_POST['emp_id'];
$date = $_POST['date'];
$session_registration_id = $_POST['session_registration_id'];
$q6rating=$_POST['quest_p'];
$q7rating=$_POST['quest_q'];
$q8rating=$_POST['quest_r'];
$q9rating=$_POST['quest_s'];
$q10rating=$_POST['quest_t'];
$q11rating=$_POST['quest_u'];
$q12rating=$_POST['quest_v'];
$q13rating=$_POST['quest_w'];
$q14rating=$_POST['quest_x'];
$q15rating=$_POST['quest_y'];
$q16rating=$_POST['quest_z'];
$q17rating=$_POST['quest_aa'];
$data = array();
mysql_select_db($database_talent_uk, $talent_uk);
if(isset($session_registration_id))
{

$query1 = "INSERT INTO feedback3(session_registration_id,date,q6rating,q7rating,q8rating,q9rating,q10rating,q11rating,q12rating,q13rating,q14rating,q15rating,q16rating,q17rating) values('$session_registration_id',now(),'$q6rating','$q7rating','$q8rating','$q9rating','$q10rating','$q11rating','$q12rating','$q13rating','$q14rating','$q15rating','$q16rating','$q17rating')";
$result = mysql_query($query1,$talent_uk);

$query = "UPDATE session_attend SET is_feedback='1' WHERE `emp_id`='$emp_id' AND `session_id`='$session_id' AND registeration_id='$session_registration_id' AND date='$date'";
$result = mysql_query($query,$talent_uk);

$query2 = "SELECT * FROM `session_attend` WHERE `emp_id`='$emp_id' AND `session_id`='$session_id' AND registeration_id='$session_registration_id' AND is_feedback='1'";
$result2 = mysql_query($query2,$talent_uk);
$rows2 = mysql_num_rows($result2);

$query3 = "SELECT * FROM `session` WHERE `session_id`='$session_id'";
$result3 = mysql_query($query3,$talent_uk);
$row = mysql_fetch_assoc($result3);
$noofdays= $row['noofdays'];
if($rows2==$noofdays)
{
$query4 = "UPDATE session_registration SET is_feedback='1' WHERE registeration_id='$session_registration_id'";
$result4 = mysql_query($query4,$talent_uk);
}

echo "Feedback submitted successfully";

}
mysql_close($talent_uk);
?>