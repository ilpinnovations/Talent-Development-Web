<?php require_once('talent_uk.php'); ?>
<?php
//error_reporting(0);
$contacts = array();
$message1 = array();
$message2 = array();
$faq = array();
mysql_select_db($database_talent_uk, $talent_uk);
//contacts
$query = "SELECT * FROM contacts";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows>=1)
{
while($row = mysql_fetch_assoc($result))
{
$contacts[]= $row;
}
$message1=array(
"message"=>"Contacts Available"
);

//echo json_encode($message,$contacts);
}
else{
$message1=array(
"message"=>"No Contacts available"
);
//echo json_encode($message);
}
$data1=array($message1,$contacts);
//end contacts
// faq
$query1 = "SELECT * FROM faq";
$result1 = mysql_query($query1,$talent_uk);
$rows1 = mysql_num_rows($result1);
if($rows1>=1)
{
while($row1 = mysql_fetch_assoc($result1))
{
$faq[]= $row1;
}
$message2=array(
"message"=>"Faq Available"
);
//echo json_encode($message,$faq);
}
else{
$message2=array(
"message"=>"No FAQ Available"
);

}
$data2=array($message2,$faq);
//end faq
//course details
$query3 = "SELECT * FROM session WHERE status='0' ORDER BY start_date ASC";
$result3 = mysql_query($query3,$talent_uk);
$rows3 = mysql_num_rows($result3);
if($rows3>=1)
{
while($row3 = mysql_fetch_assoc($result3))
{
	$courses[]= $row3;
}
$message3=array(
"message"=>"Courses Available"
);
}
else{
$message3=array(
"message"=>"No Courses Available"
);
}
$data3=array($message3,$courses);
echo json_encode(array($data1,$data2,$data3));
//end courses
mysql_close($talent_uk);
?>