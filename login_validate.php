<?php require_once('Connections/talent_uk.php'); ?>	
<?php
error_reporting(0);
  
$uname = $_GET['uname'];
$pass=$_GET['pass'];
$data = array();
if(isset($uname))
{
$query = "SELECT * FROM users WHERE emp_id='$uname'";
$result = mysql_query($query,$talent_uk);
$rows = mysql_num_rows($result);
if($rows==1)
{
echo "
<p><strong>Validated Successfully</strong></p>";
}
else{
echo "
<p><strong>Incorrect Username or Password</strong></p>";
}

}
mysql_close($talent_uk);
?>