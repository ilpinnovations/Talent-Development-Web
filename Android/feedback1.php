<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$q1before=$_POST['f1_rat1'];
$q1after=$_POST['f1_rat2'];
$q1comment=$_POST['com1_f1'];
$q2before=$_POST['f1_rat3'];
$q2after=$_POST['f1_rat4'];
$q2comment=$_POST['com2_f1'];
$q3before=$_POST['f1_rat5'];
$q3after=$_POST['f1_rat6'];
$q3comment=$_POST['com3_f1'];
$q4before=$_POST['f1_rat7'];
$q4after=$_POST['f1_rat8'];
$q4comment=$_POST['com4_f1'];
$q5before=$_POST['f1_rat9'];
$q5after=$_POST['f1_rat10'];
$q5comment=$_POST['com5_f1'];

$session_id = $_POST['sessionId'];
$emp_id = $_POST['employeeId'];
$date = $_POST['date'];
$date1 = str_replace('/', '-', $date);
$date1= date('Y-m-d', strtotime($date1));
$session_registration_id = $_POST['registrationId'];
$q6rating=$_POST['f2_rat1'];
$q7rating=$_POST['f2_rat2'];
$q8rating=$_POST['f2_rat3'];
$q9rating=$_POST['f2_rat4'];
$q10rating=$_POST['f2_rat5'];
$q11rating=$_POST['f2_rat6'];
$q12rating=$_POST['f2_rat7'];
$q13rating=$_POST['f2_rat8'];
$q14rating=$_POST['f2_rat9'];
$q15rating=$_POST['f2_rat10'];
$q16rating=$_POST['com1_f2'];
$q17rating=$_POST['com2_f2'];
$data = array();
mysql_select_db($database_talent_uk, $talent_uk);
if(isset($q1before))
{

$query1 = "INSERT INTO feedback1(session_registration_id,date,q1before,q1after,q1comment,q2before,q2after,q2comment,q3before,q3after,q3comment,q4before,q4after,q4comment,q5before,q5after,q5comment) values('$session_registration_id',now(),'$q1before','$q1after','$q1comment','$q2before','$q2after','$q2comment','$q3before','$q3after','$q3comment','$q4before','$q4after','$q4comment','$q5before','$q5after','$q5comment')";
$result1 = mysql_query($query1,$talent_uk);


$query2= "INSERT INTO feedback3(session_registration_id,date,q6rating,q7rating,q8rating,q9rating,q10rating,q11rating,q12rating,q13rating,q14rating,q15rating,q16rating,q17rating) values('$session_registration_id',now(),'$q6rating','$q7rating','$q8rating','$q9rating','$q10rating','$q11rating','$q12rating','$q13rating','$q14rating','$q15rating','$q16rating','$q17rating')";
$result2 = mysql_query($query2,$talent_uk);


$query3 = "UPDATE session_attend SET is_feedback='1' WHERE `emp_id`='$emp_id' AND `session_id`='$session_id' AND registeration_id='$session_registration_id' AND date LIKE '%$date1%'";
$result3 = mysql_query($query3,$talent_uk);


$query4 = "SELECT * FROM `session_attend` WHERE `emp_id`='$emp_id' AND `session_id`='$session_id' AND registeration_id='$session_registration_id' AND is_feedback='1'";
$result4 = mysql_query($query4,$talent_uk);
$rows4 = mysql_num_rows($result4);


$query5 = "SELECT * FROM `session` WHERE `session_id`='$session_id'";
$result5 = mysql_query($query5,$talent_uk);
$row = mysql_fetch_assoc($result5);
$noofdays= $row['noofdays'];
if($rows4==$noofdays)
{
$query6 = "UPDATE session_registration SET is_feedback='1' WHERE registeration_id='$session_registration_id'";
$result6 = mysql_query($query6,$talent_uk);

}

if($result1)
{echo "true";}
else
{echo "false";}

}
mysql_close($talent_uk);
?>