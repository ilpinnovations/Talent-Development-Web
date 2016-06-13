<?php require_once('Connections/talent_uk.php'); ?>
<?php
$emp_id = $_REQUEST['id'];

mysql_select_db($database_talent_uk, $talent_uk);
$query_member = sprintf("UPDATE users SET role_inwebsite='Employee' WHERE emp_id='$emp_id'");
$Recordset1 = mysql_query($query_member, $talent_uk) or die(mysql_error());

	echo "<div  id='delete_ses'>
         <div class='row mt'>
          		<div class='col-lg-12'>
                
     <div class='tabbable'>
                
                    <ul class='nav nav-tabs' id='myTab'>
                    <li class='active'><a href='#admins' data-toggle='tab'>Admins</a></li>
                   <li ><a href='#officer' data-toggle='tab'>Learning Officer</a></li>
                    <li ><a href='#ambassador' data-toggle='tab'>Learning Ambassador</a></li>     
                    <li ><a href='#rmg' data-toggle='tab'>RMG</a></li>
                     <li ><a href='#hr' data-toggle='tab'>HR Business Partner</a></li>      
                      <li ><a href='#supervisor' data-toggle='tab'>Supervisor</a></li>     
                        <li ><a href='#engagement' data-toggle='tab'>Talent Engagement</a></li>                  
                    </ul>
                 
                    <div class='tab-content'>
                        <div class='tab-pane fade in active' id='admins'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
    <table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Admins</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Name</th>
                                  <th class='hidden-phone'><i class='fa fa-envelope'></i> Email</th>
								  <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								   <th><i class='fa fa-bullhorn'></i> IOU</th>
								    <th><i class='fa fa-map-marker'></i> Location</th>
                                  <th><i class=' fa fa-trash-o'></i> Delete</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM users WHERE role_inwebsite='admin'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$emp_id=$row5['emp_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['emp_name'] . "</td>
                                  <td>" . $row5['emp_email'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['iou'] . "</td>
								  <td>" . $row5['location'] . "</td>
                                

<td><button type='button' class='btn btn-danger btn-xs' onClick='get_list(".$emp_id.")'><i class=' fa fa-trash-o'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                        <div class='tab-pane fade in' id='engagement'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
 <table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Talent Engagement</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Name</th>
                                  <th class='hidden-phone'><i class='fa fa-envelope'></i> Email</th>
								  <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								   <th><i class='fa fa-bullhorn'></i> IOU</th>
								    <th><i class='fa fa-map-marker'></i> Location</th>
                                  <th><i class=' fa fa-trash-o'></i> Delete</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM users WHERE role_inwebsite='engagement'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$emp_id=$row5['emp_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['emp_name'] . "</td>
                                  <td>" . $row5['emp_email'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['iou'] . "</td>
								  <td>" . $row5['location'] . "</td>
                                

<td><button type='button' class='btn btn-danger btn-xs' onClick='get_list(".$emp_id.")'><i class=' fa fa-trash-o'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
    </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                         <div class='tab-pane fade in' id='hr'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                        


<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> HR Business Partners</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Name</th>
                                  <th class='hidden-phone'><i class='fa fa-envelope'></i> Email</th>
								  <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								  <th><i class='fa fa-bullhorn'></i> IOU</th>
								    <th><i class='fa fa-map-marker'></i> Location</th>
                                  <th><i class=' fa fa-trash-o'></i> Delete</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM users WHERE role_inwebsite='HR'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$emp_id=$row5['emp_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['emp_name'] . "</td>
                                  <td>" . $row5['emp_email'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['iou'] . "</td>
								  <td>" . $row5['location'] . "</td>
                                

<td><button type='button' class='btn btn-danger btn-xs' onClick='get_list(".$emp_id.")'><i class=' fa fa-trash-o'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                         <div class='tab-pane fade in' id='officer'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                          


<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Learning Officers</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                 <th><i class='fa fa-bullhorn'></i> Name</th>
                                  <th class='hidden-phone'><i class='fa fa-envelope'></i> Email</th>
								  <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								  <th><i class='fa fa-bullhorn'></i> IOU</th>
								    <th><i class='fa fa-map-marker'></i> Location</th>
                                  <th><i class=' fa fa-trash-o'></i> Delete</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM users WHERE role_inwebsite='Learning Officer'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$emp_id=$row5['emp_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['emp_name'] . "</td>
                                  <td>" . $row5['emp_email'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['iou'] . "</td>
								  <td>" . $row5['location'] . "</td>
                                

<td><button type='button' class='btn btn-danger btn-xs' onClick='get_list(".$emp_id.")'><i class=' fa fa-trash-o'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                         <div class='tab-pane fade in' id='supervisor'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                        


<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Supervisor</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                 <th><i class='fa fa-bullhorn'></i> Name</th>
                                  <th class='hidden-phone'><i class='fa fa-envelope'></i> Email</th>
								  <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								  <th><i class='fa fa-bullhorn'></i> IOU</th>
								    <th><i class='fa fa-map-marker'></i> Location</th>
                                  <th><i class=' fa fa-trash-o'></i> Delete</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM users WHERE role_inwebsite='supervisor'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$emp_id=$row5['emp_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['emp_name'] . "</td>
                                  <td>" . $row5['emp_email'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['iou'] . "</td>
								  <td>" . $row5['location'] . "</td>
                                

<td><button type='button' class='btn btn-danger btn-xs' onClick='get_list(".$emp_id.")'><i class=' fa fa-trash-o'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
	

                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                        <div class='tab-pane fade in' id='rmg'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                         


<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> RMG</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                 <th><i class='fa fa-bullhorn'></i> Name</th>
                                  <th class='hidden-phone'><i class='fa fa-envelope'></i> Email</th>
								  <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								  <th><i class='fa fa-bullhorn'></i> IOU</th>
								    <th><i class='fa fa-map-marker'></i> Location</th>
                                  <th><i class=' fa fa-trash-o'></i> Delete</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM users WHERE role_inwebsite='RMG'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$emp_id=$row5['emp_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['emp_name'] . "</td>
                                  <td>" . $row5['emp_email'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['iou'] . "</td>
								  <td>" . $row5['location'] . "</td>
                                

<td><button type='button' class='btn btn-danger btn-xs' onClick='get_list(".$emp_id.")'><i class=' fa fa-trash-o'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
	
	
 
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div><!--- end tab--->
                        <div class='tab-pane fade in' id='ambassador'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                            


<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Learning Ambassador</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                 <th><i class='fa fa-bullhorn'></i> Name</th>
                                  <th class='hidden-phone'><i class='fa fa-envelope'></i> Email</th>
								  <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								  <th><i class='fa fa-bullhorn'></i> IOU</th>
								    <th><i class='fa fa-map-marker'></i> Location</th>
                                  <th><i class=' fa fa-trash-o'></i> Delete</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM users WHERE role_inwebsite='Learning Ambassador'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$emp_id=$row5['emp_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['emp_name'] . "</td>
                                  <td>" . $row5['emp_email'] . "</td>
								  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['iou'] . "</td>
								  <td>" . $row5['location'] . "</td>
                                

<td><button type='button' class='btn btn-danger btn-xs' onClick='get_list(".$emp_id.")'><i class=' fa fa-trash-o'></i> </button></td>

								 
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

mysql_close($talent_uk)
?>