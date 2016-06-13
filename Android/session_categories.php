<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
$emp_id=$_GET['emp_id'];
$category=$_GET['category'];
$data = array();
$data1 = array();
mysql_select_db($database_talent_uk, $talent_uk);
if($category=="workshop")
{
$query = "SELECT * FROM session WHERE status='0' AND session_category='$category' ORDER BY start_date ASC";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows>=1)
{
while($row = mysql_fetch_assoc($result))
{
$session_id=$row['session_id'];
$query1 = "SELECT * FROM session_registration WHERE emp_id='$emp_id' AND session_id='$session_id'";
$result1 = mysql_query($query1,$talent_uk);
$row1 = mysql_fetch_assoc($result1);
$isconfirmed = $row1['is_confirmed'];
$count = mysql_num_rows($result1);
if($count==1)
{
	
$data1=array(
"is_registered"=>"True",
"is_confirmed"=>$isconfirmed
);
$data[]= array ('data1'=>$row,'data2'=>$data1);
}
else
{
$data1=array(
"is_registered"=>"False",
"is_confirmed"=>$isconfirmed
);	
$data[]= array ('data1'=>$row,'data2'=>$data1);
}

}
echo json_encode(array('data'=>$data));
}
else{
$data=array(
"null_trigger"=>"session do not exist"
);
echo json_encode($data);
}	
}
else if($category=="webx")
{
$query = "SELECT * FROM session WHERE status='0' AND session_category='$category' ORDER BY start_date ASC";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows>=1)
{
while($row = mysql_fetch_assoc($result))
{
$session_id=$row['session_id'];
$query1 = "SELECT * FROM session_registration WHERE emp_id='$emp_id' AND session_id='$session_id'";
$result1 = mysql_query($query1,$talent_uk);
$row1 = mysql_fetch_assoc($result1);
$isconfirmed = $row1['is_confirmed'];
$count = mysql_num_rows($result1);
if($count==1)
{
	
$data1=array(
"is_registered"=>"True",
"is_confirmed"=>$isconfirmed
);
$data[]= array ('data1'=>$row,'data2'=>$data1);
}
else
{
$data1=array(
"is_registered"=>"False",
"is_confirmed"=>$isconfirmed
);	
$data[]= array ('data1'=>$row,'data2'=>$data1);
}

}
echo json_encode(array('data'=>$data));
}
else{
$data=array(
"null_trigger"=>"session do not exist"
);
echo json_encode($data);
}		
}
else if($category=="tcsion")
{
$query = "SELECT * FROM session WHERE status='0' AND session_category='$category' ORDER BY start_date ASC";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows>=1)
{
while($row = mysql_fetch_assoc($result))
{
$session_id=$row['session_id'];
$query1 = "SELECT * FROM session_registration WHERE emp_id='$emp_id' AND session_id='$session_id'";
$result1 = mysql_query($query1,$talent_uk);
$row1 = mysql_fetch_assoc($result1);
$isconfirmed = $row1['is_confirmed'];
$count = mysql_num_rows($result1);
if($count==1)
{
	
$data1=array(
"is_registered"=>"True",
"is_confirmed"=>$isconfirmed
);
$data[]= array ('data1'=>$row,'data2'=>$data1);
}
else
{
$data1=array(
"is_registered"=>"False",
"is_confirmed"=>$isconfirmed
);	
$data[]= array ('data1'=>$row,'data2'=>$data1);
}

}
echo json_encode(array('data'=>$data));
}
else{
$data=array(
"null_trigger"=>"session do not exist"
);
echo json_encode($data);
}		
}
else if($category=="certifications")
{
$query = "SELECT * FROM session WHERE status='0' AND session_category='$category' ORDER BY start_date ASC";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows>=1)
{
while($row = mysql_fetch_assoc($result))
{
$session_id=$row['session_id'];
$query1 = "SELECT * FROM session_registration WHERE emp_id='$emp_id' AND session_id='$session_id'";
$result1 = mysql_query($query1,$talent_uk);
$row1 = mysql_fetch_assoc($result1);
$isconfirmed = $row1['is_confirmed'];
$count = mysql_num_rows($result1);
if($count==1)
{
	
$data1=array(
"is_registered"=>"True",
"is_confirmed"=>$isconfirmed
);
$data[]= array ('data1'=>$row,'data2'=>$data1);
}
else
{
$data1=array(
"is_registered"=>"False",
"is_confirmed"=>$isconfirmed
);	
$data[]= array ('data1'=>$row,'data2'=>$data1);
}

}
echo json_encode(array('data'=>$data));
}
else{
$data=array(
"null_trigger"=>"session do not exist"
);
echo json_encode($data);
}		
}
else if($category=="ondemand")
{
$query = "SELECT * FROM session WHERE status='0' AND session_category='$category' ORDER BY start_date ASC";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows>=1)
{
while($row = mysql_fetch_assoc($result))
{
$session_id=$row['session_id'];
$query1 = "SELECT * FROM session_registration WHERE emp_id='$emp_id' AND session_id='$session_id'";
$result1 = mysql_query($query1,$talent_uk);
$row1 = mysql_fetch_assoc($result1);
$isconfirmed = $row1['is_confirmed'];
$count = mysql_num_rows($result1);
if($count==1)
{
	
$data1=array(
"is_registered"=>"True",
"is_confirmed"=>$isconfirmed
);
$data[]= array ('data1'=>$row,'data2'=>$data1);
}
else
{
$data1=array(
"is_registered"=>"False",
"is_confirmed"=>$isconfirmed
);	
$data[]= array ('data1'=>$row,'data2'=>$data1);
}

}
echo json_encode(array('data'=>$data));
}
else{
$data=array(
"null_trigger"=>"session do not exist"
);
echo json_encode($data);
}		
}
mysql_close($talent_uk);
?>