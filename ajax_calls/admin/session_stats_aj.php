<?php require_once('talent_uk.php'); ?>
<?php
$session_id= $_REQUEST['a'];
mysql_select_db($database_talent_uk, $talent_uk);
$result9 = mysql_query("SELECT * FROM registered_sessions WHERE session_id='$session_id'", $talent_uk);
if($result9)
{
$registered_count = mysql_num_rows($result9);
$row9=mysql_fetch_assoc($result9);
$ses_name = $row9['session_name'];
}
$result10 = mysql_query("SELECT * FROM session_attend WHERE session_id='$session_id' AND is_attend='1'", $talent_uk);
if($result10)
{
$attended_count= mysql_num_rows($result10);
$diff = intval($registered_count)-intval($attended_count);
}
$query2 = sprintf("SELECT count(*) FROM session_attend WHERE is_feedback='1' AND session_id='$session_id'");
if($query2)
{
$result2 = mysql_query($query2, $talent_uk) or die(mysql_error());
$row2= mysql_fetch_assoc($result2);
$total_feedbacks=$row2['count(*)'];
}
echo " 
<div id='editinfo'>
<h2><i class='fa fa-angle-right'></i> Total Registrations Vs Attendies</h2>
          <p>&nbsp;</p>
           
                    <div class='col-lg-6 col-md-6 col-sm-6 mb'>
							<div class='steps pn'>
                            <input type='submit' value='".$ses_name."' id='submit'/>
							    
							    <label>  ".$registered_count." Registrations</label>
							    
							    <label>  ".$attended_count." Attendies</label>
							    
							    <label> ".$total_feedbacks." Feedbacks</label>
							    
							</div>
						</div><! --/col-md-4 -->   
						</div>
                        ";
?>
