<?php require_once('Connections/talent_uk.php'); ?>
<!----This code retrives event detais from database---->
<?php
$session_id = $_REQUEST['a'];
mysql_select_db($database_talent_uk, $talent_uk);
$query_member = sprintf("SELECT * FROM session WHERE session_id = '$session_id'");
$Recordset1 = mysql_query($query_member, $talent_uk) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


$session_name= $row_Recordset1['session_name'];
 $start_date = $row_Recordset1['start_date'];
  $end_date = $row_Recordset1['end_date'];
 $session_start_time = $row_Recordset1['start_time'];
  $session_end_time = $row_Recordset1['end_time'];
$session_category = $row_Recordset1['session_category'];
$session_description = $row_Recordset1['session_description'];
$session_venue = $row_Recordset1['session_venue'];
$session_faculty = $row_Recordset1['session_faculty'];
$outcome = $row_Recordset1['expected_outcome'];
$delivery = $row_Recordset1['mode_of_delivery'];

	echo "  <div class='row mt'>
          		<div class='col-lg-12'>
                  <div class='form-panel'>
                  <h4 class='mb'><i class='fa fa-angle-right'></i> Session Details</h4>
                      
                      <form class='form-horizontal style-form' method='post' name='addmember' id='addmember'>
                          <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>Session Name</label>
                              <div class='col-sm-7'>
  <input type='text' class='form-control round-form' id='session_name' name='session_name' value='".$session_name."' >
                              </div>
                              </div>
                          
                          <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>Start Date</label>
                              <div class='col-sm-7'>
 <input type='date' class='form-control round-form' id='start_date' name='start_date' value='".$start_date."'>
                              </div>
                              </div>
							  <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>End Date</label>
                              <div class='col-sm-7'>
 <input type='date' class='form-control round-form' id='end_date' name='end_date' value='".$end_date."'>
                              </div>
                              </div>
                              <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>Start Time</label>
                              <div class='col-sm-7'>
   <input type='time' class='form-control round-form' id='start_time' name='start_time' value='".$session_start_time."'>
                              </div>
                              </div>
                              <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>End Time</label>
                              <div class='col-sm-7'>
               <input type='time' class='form-control round-form' id='end_time' name='end_time' value='".$session_end_time."'>
			    <input type='hidden' class='form-control round-form' id='session_id' name='session_id' value='".$session_id."'>
                              </div>
                              </div>
						<div class='form-group'>
                               <label class='col-sm-2 col-sm-2 control-label'>Session Category</label>
                              <div class='col-sm-7'>
                                 
                                  <select class='form-control' id='category' name='category' required>
								   <option value='".$session_category."'>".$session_category."</option>
						  <option value='workshot'>Workshop</option>
						  <option value='webx'>Web X</option>
						  <option value='certification'>Certification</option>
						  <option value='tcsion'>TCS ION</option>
                           
                            </select>
                              </div>
                              </div>
                               <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>Session Description</label>
                              <div class='col-sm-7'>
                           <textarea id='description' name='description' rows='4' cols='50'>".mysql_escape_string($session_description)."</textarea>
                              </div>
                              </div>
                               <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>Venue</label>
                              <div class='col-sm-7'>
                            <input type='text' class='form-control round-form' id='venue' value='".mysql_escape_string($session_venue)."' name='venue' required>
                              </div>
                              </div>
                               <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>Faculty</label>
                              <div class='col-sm-7'>
                            <input type='text' class='form-control round-form' id='faculty' value='".mysql_escape_string($session_faculty)."' name='faculty' required>
                              </div>
                              </div>
                               <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>Expected Outcome</label>
                              <div class='col-sm-7'>
                            <input type='text' class='form-control round-form' id='outcome' value='".mysql_escape_string($outcome)."' name='outcome' required>
                              </div>
                              </div>
                               <div class='form-group'>
                              <label class='col-sm-2 col-sm-2 control-label'>Mode of Delivery</label>
                              <div class='col-sm-7'>
                            <input type='text' class='form-control round-form' value='".mysql_escape_string($delivery)." 'id='delivery' name='delivery' required>
                              </div>
                              </div>
                              <div class='form-group'>
                          <button type='submit' id='editevent' name='editevent' class='btn btn-primary btn-lg btn-block'>Edit Session</button>
                          </div>
                          
                          <div class='form-group' id='status'>
                              
                              </div>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->";
             
			 
			 
       
mysql_free_result($Recordset1);


?>