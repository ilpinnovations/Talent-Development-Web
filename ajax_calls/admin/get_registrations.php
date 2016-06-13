<?php require_once('talent_uk.php'); ?>
<?php
$session_id= $_REQUEST['q'];

mysql_select_db($database_talent_uk, $talent_uk);
$result9 = mysql_query("SELECT * FROM registered_sessions WHERE session_id='$session_id'", $talent_uk);
if($result9)
{
$registered_count = mysql_num_rows($result9);
$row9=mysql_fetch_assoc($result9);
$ses_name = $row9['session_name'];
}

echo "
<div id='reg'>
<div class='row mtbox'>
<div class='col-md-4 col-sm-4 box0'>
</div>
                  <div class='col-md-3 col-sm-3 box0'>
                  			<div class='box1'>
                            <h3>Registrations</h3>
					  			<span class='li_user'></span>
					  			<h3>".$registered_count."</h3>
                  			</div>
					  			<p>Totally ".$registered_count." members have registered for ".$ses_name." session.</p>
                  		</div>
                  </div>";


 ?>