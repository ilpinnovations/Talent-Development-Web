<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
mysql_select_db($database_talent_uk, $talent_uk);
$json_array =$_POST['json_array'];
//$url="http://api.androidhive.info/volley/person_array.json";
//$json = file_get_contents($url);
$json_data = json_decode($json_array);
foreach($json_data->data as $p)
{	
 $session_id = $p->sessionId;
 $emp_id = $p->employeeId;
 $date = $p->date;
 $session_registration_id = $p->registrationId;
 $q6rating=$p->f2_rat1;
 $q7rating=$p->f2_rat2;
 $q8rating=$p->f2_rat3;
 $q9rating=$p->f2_rat4;
 $q10rating=$p->f2_rat5;
 $q11rating=$p->f2_rat6;
 $q12rating=$p->f2_rat7;
$q13rating=$p->f2_rat8;
 $q14rating=$p->f2_rat9;
 $q15rating=$p->f2_rat10;
 $q16rating=$p->com1_f2;
 $q17rating=$p->com2_f2;

 $q1before=$p->f1_rat1;
 $q1after=$p->f1_rat2;
 $q1comment=$p->com1_f1;
 $q2before=$p->f1_rat3;
 $q2after=$p->f1_rat4;
$q2comment=$p->com2_f1;
 $q3before=$p->f1_rat5;
 $q3after=$p->f1_rat6;
 $q3comment=$p->com3_f1;
 $q4before=$p->f1_rat7;
 $q4after=$p->f1_rat8;
 $q4comment=$p->com4_f1;
 $q5before=$p->f1_rat9;
 $q5after=$p->f1_rat10;
$q5comment=$p->com5_f1;
$query1 = "INSERT INTO feedback1(session_registration_id,date,q1before,q1after,q1comment,q2before,q2after,q2comment,q3before,q3after,q3comment,q4before,q4after,q4comment,q5before,q5after,q5comment) values('$session_registration_id',now(),'$q1before','$q1after','$q1comment','$q2before','$q2after','$q2comment','$q3before','$q3after','$q3comment','$q4before','$q4after','$q4comment','$q5before','$q5after','$q5comment')";
$result1 = mysql_query($query1,$talent_uk);


$query2= "INSERT INTO feedback3(session_registration_id,date,q6rating,q7rating,q8rating,q9rating,q10rating,q11rating,q12rating,q13rating,q14rating,q15rating,q16rating,q17rating) values('$session_registration_id',now(),'$q6rating','$q7rating','$q8rating','$q9rating','$q10rating','$q11rating','$q12rating','$q13rating','$q14rating','$q15rating','$q16rating','$q17rating')";
$result2 = mysql_query($query2,$talent_uk);


$query3 = "UPDATE session_attend SET is_feedback='1' WHERE `emp_id`='$emp_id' AND `session_id`='$session_id' AND registeration_id='$session_registration_id' AND date LIKE '%$date%'";
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
}
echo "Update Successful";

mysql_close($talent_uk);
?>