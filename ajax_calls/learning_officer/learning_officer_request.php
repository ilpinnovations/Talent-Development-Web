<?php require_once('talent_uk.php'); ?>
<?php
$reg_id = $_REQUEST['id'];
$key = $_REQUEST['key'];
$comment = $_REQUEST['comment'];
if($key=="0")
{
	//for approval
	mysql_select_db($database_talent_uk, $talent_uk);
$query_member = sprintf("UPDATE registered_sessions SET is_confirmed='1' WHERE session_category='workshop' AND registeration_id='$reg_id'");
$Recordset1 = mysql_query($query_member, $talent_uk) or die(mysql_error());

	echo "
	<div  id='approve'>
         <div class='row mt'>
          		<div class='col-lg-12'>
                
     <div class='tabbable'>
                
                    <ul class='nav nav-tabs' id='myTab'>
                    <li class='active'><a href='#asd' data-toggle='tab'>Pending Approvals</a></li>
                   <li ><a href='#approved' data-toggle='tab'>Approved Requests</a></li>
                    <li ><a href='#rejected' data-toggle='tab'>Rejected Requests</a></li>
                            
                    </ul>
                 
                    <div class='tab-content'>
                        <div class='tab-pane fade in active' id='asd'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                       


<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Pending Approvals</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Workshop Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
								   <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								    <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Name</th>
									 <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Email</th>
                                  <th><i class='fa fa-check'></i> Approve</th>
								  <th><i class=' fa fa-times'></i> Reject</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM registered_sessions WHERE is_confirmed='0' AND session_category='workshop'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$reg_id=$row5['registeration_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['emp_name'] . "</td>
								  <td>" . $row5['emp_email'] . "</td>
                                

<td><button type='button' class='btn btn-success btn-xs' onClick='approve_request(".$reg_id.")'><i class='fa fa-check'></i> </button></td>
<td><button type='button' class='btn btn-danger btn-xs' onClick='reject_request(".$reg_id.")'><i class=' fa fa-times'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
	
	

                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                         <div class='tab-pane fade in' id='approved'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                        


<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Approved Reguests</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Workshop Name</th>
                                  <th class='hidden-phone'><i class='fa fa-envelope'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-credit-card'></i> End Date</th>
								   <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								    <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Name</th>
									 <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Email</th>
                                 
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM registered_sessions WHERE is_confirmed='1' AND session_category='workshop'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$reg_id=$row5['registeration_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['emp_name'] . "</td>
								  <td>" . $row5['emp_email'] . "</td>
                                      </tr>
							  </tbody>";
    
}


echo "</table>
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                        <div class='tab-pane fade in' id='rejected'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                      
					  <table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Rejected Requests</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Workshop Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
								   <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								    <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Name</th>
									 <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Email</th>
                                  <th><i class='fa fa-check'></i> Approve</th>
								  <th><i class=' fa fa-trash-o'></i> Delete</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM registered_sessions WHERE is_confirmed='2' AND session_category='workshop'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$reg_id=$row5['registeration_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['emp_name'] . "</td>
								  <td>" . $row5['emp_email'] . "</td>
                                

<td><button type='button' class='btn btn-success btn-xs' onClick='approve_request(".$reg_id.")'><i class='fa fa-check'></i> </button></td>
<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_request(".$reg_id.")'><i class=' fa fa-trash-o'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                       
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
       
          
             
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
	";
}
else if($key=="1")
{
	//for rejection
	mysql_select_db($database_talent_uk, $talent_uk);
$query_member = sprintf("UPDATE registered_sessions SET is_confirmed='2',reject_comment='$comment' WHERE session_category='workshop' AND registeration_id='$reg_id'");
$Recordset1 = mysql_query($query_member, $talent_uk) or die(mysql_error());

	echo "
	<div  id='approve'>
         <div class='row mt'>
          		<div class='col-lg-12'>
                
     <div class='tabbable'>
                
                    <ul class='nav nav-tabs' id='myTab'>
                    <li class='active'><a href='#asd' data-toggle='tab'>Pending Approvals</a></li>
                   <li ><a href='#approved' data-toggle='tab'>Approved Requests</a></li>
                    <li ><a href='#rejected' data-toggle='tab'>Rejected Requests</a></li>
                            
                    </ul>
                 
                    <div class='tab-content'>
                        <div class='tab-pane fade in active' id='asd'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                       


<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Pending Approvals</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Workshop Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
								   <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								    <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Name</th>
									 <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Email</th>
                                  <th><i class='fa fa-check'></i> Approve</th>
								  <th><i class=' fa fa-times'></i> Reject</th>
								     <th><i class='fa fa-bullhorn'></i> Comment</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM registered_sessions WHERE is_confirmed='0' AND session_category='workshop'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
$reg_id=$row5['registeration_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['emp_name'] . "</td>
								  <td>" . $row5['emp_email'] . "</td>
                                

<td><button type='button' class='btn btn-success btn-xs' onClick='approve_request(".$reg_id.")'><i class='fa fa-check'></i> </button></td>
<td><button type='button' class='btn btn-danger btn-xs' onClick='reject_request(".$reg_id.")'><i class=' fa fa-times'></i> </button></td>
<td> <input type='text' class='form-control round-form' id='comment' name='comment' required></td>
								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
	
	

                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                         <div class='tab-pane fade in' id='approved'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                        


<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Approved Requests</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Workshop Name</th>
                                  <th class='hidden-phone'><i class='fa fa-envelope'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-credit-card'></i> End Date</th>
								   <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								    <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Name</th>
									 <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Email</th>
                                 
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM registered_sessions WHERE is_confirmed='1' AND session_category='workshop'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$reg_id=$row5['registeration_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['emp_name'] . "</td>
								  <td>" . $row5['emp_email'] . "</td>
                                      </tr>
							  </tbody>";
    
}


echo "</table>
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                        <div class='tab-pane fade in' id='rejected'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                      
					  <table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Rejected Requests</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Workshop Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
								   <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								    <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Name</th>
									 <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Email</th>
                                  <th><i class='fa fa-check'></i> Approve</th>
								  <th><i class=' fa fa-trash-o'></i> Delete</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM registered_sessions WHERE is_confirmed='2' AND session_category='workshop'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
$reg_id=$row5['registeration_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['emp_name'] . "</td>
								  <td>" . $row5['emp_email'] . "</td>
                                

<td><button type='button' class='btn btn-success btn-xs' onClick='approve_request(".$reg_id.")'><i class='fa fa-check'></i> </button></td>
<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_request(".$reg_id.")'><i class=' fa fa-trash-o'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                       
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
       
          
             
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
	";
}
else if($key=="2")
{
	//for delete
	mysql_select_db($database_talent_uk, $talent_uk);
$query_member = sprintf("DELETE FROM session_registration WHERE registeration_id='$reg_id'");
$Recordset1 = mysql_query($query_member, $talent_uk) or die(mysql_error());

	echo "
	<div  id='approve'>
         <div class='row mt'>
          		<div class='col-lg-12'>
                
     <div class='tabbable'>
                
                    <ul class='nav nav-tabs' id='myTab'>
                    <li class='active'><a href='#asd' data-toggle='tab'>Pending Approvals</a></li>
                   <li ><a href='#approved' data-toggle='tab'>Approved Requests</a></li>
                    <li ><a href='#rejected' data-toggle='tab'>Rejected Requests</a></li>
                            
                    </ul>
                 
                    <div class='tab-content'>
                        <div class='tab-pane fade in active' id='asd'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                       


<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Pending Approvals</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Workshop Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
								   <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								    <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Name</th>
									 <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Email</th>
                                  <th><i class='fa fa-check'></i> Approve</th>
								  <th><i class=' fa fa-times'></i> Reject</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM registered_sessions WHERE is_confirmed='0' AND session_category='workshop'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$reg_id=$row5['registeration_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['emp_name'] . "</td>
								  <td>" . $row5['emp_email'] . "</td>
                                

<td><button type='button' class='btn btn-success btn-xs' onClick='approve_request(".$reg_id.")'><i class='fa fa-check'></i> </button></td>
<td><button type='button' class='btn btn-danger btn-xs' onClick='reject_request(".$reg_id.")'><i class=' fa fa-times'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
	
	

                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                         <div class='tab-pane fade in' id='approved'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                        


<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Approved Requests</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Workshop Name</th>
                                  <th class='hidden-phone'><i class='fa fa-envelope'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-credit-card'></i> End Date</th>
								   <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								    <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Name</th>
									 <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Email</th>
                                 
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM registered_sessions WHERE is_confirmed='1' AND session_category='workshop'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$reg_id=$row5['registeration_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['emp_name'] . "</td>
								  <td>" . $row5['emp_email'] . "</td>
                                      </tr>
							  </tbody>";
    
}


echo "</table>
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                        <div class='tab-pane fade in' id='rejected'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                      
					  <table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Rejected Requests</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Workshop Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
								   <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								    <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Name</th>
									 <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Email</th>
                                  <th><i class='fa fa-check'></i> Approve</th>
								  <th><i class=' fa fa-trash-o'></i> Delete</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM registered_sessions WHERE is_confirmed='2' AND session_category='workshop'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$reg_id=$row5['registeration_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['emp_name'] . "</td>
								  <td>" . $row5['emp_email'] . "</td>
                                

<td><button type='button' class='btn btn-success btn-xs' onClick='approve_request(".$reg_id.")'><i class='fa fa-check'></i> </button></td>
<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_request(".$reg_id.")'><i class=' fa fa-trash-o'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                       
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
       
          
             
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
	";
}


mysql_close($talent_uk)
?>