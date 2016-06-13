<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$trainer_emp_id=$_POST['trainer_emp_id'];
$trainee_emp_id=$_POST['trainee_emp_id'];
$rating=$_POST['rating'];
$comment=$_POST['comment'];
$session_id=$_POST['session_id'];

$data = array();
mysql_select_db($database_talent_uk, $talent_uk);
if(isset($trainer_emp_id))
{
	
$query5 = "SELECT * FROM `trainer_feedback` WHERE `session_id`='$session_id' AND trainer_emp_id='$trainer_emp_id' AND trainee_emp_id='$trainee_emp_id' ";
$result5 = mysql_query($query5,$talent_uk);
$row = mysql_num_rows($result5);
if($row==1)
{
	
echo "Feedback already submitted";		
}
else
{

$query1 = "INSERT INTO  trainer_feedback (trainer_emp_id,trainee_emp_id ,rating ,comment,session_id) VALUES('$trainer_emp_id',  '$trainee_emp_id',  '$rating',  '$comment','$session_id')";
$result1 = mysql_query($query1,$talent_uk);
if($result1)
{
	echo "Feedback submitted successfully";	
}
else
{
	echo "Failed to submit feedback";	
}	
}
}
mysql_close($talent_uk);
?>