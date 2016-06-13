<?php
$DB_Server = "160.153.89.96"; 
$DB_Username = "jeet"; 
$DB_Password = "J@447788"; 
$DB_DBName = "talent_uki"; 
$DB_TBLName = "feedback1_details"; 
$xls_filename = 'feedback_form.xls';
$session_id= $_REQUEST['session_id'];
$sql = "SELECT 
emp_id AS 'Employee ID',
emp_name AS 'Employee Name',
emp_email AS 'Employee Email',
q1before AS 'Knowledge about the topics covered inn the program. befores rating',
q1after AS 'Knowledge about the topics covered inn the program. after rating',
q1comment AS 'Knowledge about the topics covered inn the program. comment',
q2before AS 'Knowledge about importance of the topic covered andd its relevance too my job. befores rating',
q2after AS 'Knowledge about importance of the topic covered andd its relevance too my job. after rating',
q2comment AS 'Knowledge about importance of the topic covered andd its relevance too my job. comment',
q3before AS 'Practical know-how of how too apply these aspects inn my job. befores rating',
q3after AS 'Practical know-how of how too apply these aspects inn my job. after rating',
q3comment AS 'Practical know-how of how too apply these aspects inn my job. comment',
q4before AS 'Confidence too apply these skills inn my job. befores rating',
q4after AS 'Confidence too apply these skills inn my job. after rating',
q4comment AS 'Confidence too apply these skills inn my job. comment',
q5before AS 'Commitment too apply these aspects inn my job. befores rating',
q5after AS 'Commitment too apply these aspects inn my job. after rating',
q5comment AS 'Commitment too apply these aspects inn my job. comment',
q6rating AS 'The manner inn which the training program was conducted helped me inn my learning process. rating',
q7rating AS 'I was actively engaged andd involved throughout the program. rating',
q8rating AS 'The information was presented inn a logical andd structured manner. rating',
q9rating AS 'The knowledge, information andd resources presented helped me inn my learning. rating',
q10rating AS 'The scope and the content of the training was appropriate to meet my needs/job. rating',
q11rating AS 'The examples presented helped me understand the content. rating',
q12rating AS 'Was engaging and exciting. rating',
q13rating AS 'The room was free of any distractions and conductive to learning. rating',
q14rating AS 'The training would have a significant impact on: Increasing productivity & quality; Improving CSAT; Improving employee satisfaction and job performance. rating',
q15rating AS 'Overall. I rate this training course as,1.Poor 2.Fair 3.Good 4.Very Good 5.Outstanding.rating',
q16rating AS 'What about this class was most useful to you? rating',
q17rating AS 'What about this class was least useful to you and what can we change to make it more revelant to your job?. rating'

FROM feedback_details Where session_id='$session_id'";
$Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Failed to connect to MySQL:<br />" . mysql_error() . "<br />" . mysql_errno());

$Db = @mysql_select_db($DB_DBName, $Connect) or die("Failed to select database:<br />" . mysql_error(). "<br />" . mysql_errno());

$result = @mysql_query($sql,$Connect) or die("Failed to execute query:<br />" . mysql_error(). "<br />" . mysql_errno());
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$xls_filename");
header("Pragma: no-cache");
header("Expires: 0");
$sep = "\t"; 
for ($i = 0; $i<mysql_num_fields($result); $i++) {
  echo mysql_field_name($result, $i) . "\t";
}
print("\n");
while($row = mysql_fetch_row($result))
{
  $schema_insert = "";
  for($j=0; $j<mysql_num_fields($result); $j++)
  {
    if(!isset($row[$j])) {
      $schema_insert .= "NULL".$sep;
    }
    elseif ($row[$j] != "") {
      $schema_insert .= "$row[$j]".$sep;
    }
    else {
      $schema_insert .= "".$sep;
    }
  }
  $schema_insert = str_replace($sep."$", "", $schema_insert);
  $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
  $schema_insert .= "\t";
  print(trim($schema_insert));
  print "\n";
}
?>