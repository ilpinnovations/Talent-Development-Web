<?php require_once('talent_uk.php'); ?>
<?php
$project_name= $_REQUEST['q'];
$key= $_REQUEST['key'];
$emp_id= $_REQUEST['emp_id'];
mysql_select_db($database_talent_uk, $talent_uk);
if($key=="1")
{
//get employee details	
$result9 = mysql_query("SELECT emp_id,emp_email,emp_name,iou,location,project_name FROM users WHERE project_name='$project_name' AND role_inwebsite!='hr'", $talent_uk);
echo "
<div id='editinfo'>
<div class='row mt'>
          		<div class='col-lg-12'>
          			<div class='form-panel'>
                  	  <h4 class='mb'><i class='fa fa-angle-right'></i> Please select Project Name</h4>
                      <form class='form-inline' role='form' method='POST'>";
                          
                             
$result = mysql_query("SELECT project_name, emp_id, role_inwebsite FROM users GROUP BY project_name", $talent_uk);
echo "<select class='form-control' name='iouid' id='iouid'  onchange='get_emp_details()' '>"; 
echo "<option value=''></option>";
while ($row = mysql_fetch_assoc($result)){
$emp_id1 = $row['emp_id'];
$project_name1 = $row['project_name'];
$role_inwebsite1 = $row['role_inwebsite'];

echo '<option value="'.mysql_real_escape_string($project_name1).'">'.$project_name1.'</option>';


}

	echo "</select>

	

  
                             
                              <p>&nbsp;</p>
                              <p>&nbsp;</p>
                               
                              
                      
                              
                             </form>
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	</div><!-- /row -->
        <!-- BASIC FORM ELELEMNTS -->
<div>
<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Tag HR to Project</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Project Name</th>
								   <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								    <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Name</th>
									 <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Email</th>
									  <th class='hidden-phone'><i class='fa fa-credit-card'></i> Location</th>
                                  <th><i class='fa fa-check'></i> Make HR</th> <th></th>
                              </tr>
                              </thead>";
while($row5 = mysql_fetch_array($result9)) {
	$emp_id=$row5['emp_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['project_name'] . "</td>
                                  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['emp_name'] . "</td>
								  <td>" . $row5['emp_email'] . "</td>
								   <td>" . $row5['location'] . "</td>
								                              

<td><button type='button' class='btn btn-success btn-xs' onClick='tag_hr(".$emp_id.")'><i class='fa fa-check'></i> </button></td>
								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
</div>
</div>";
}
else if($key=="2")
{
	$role = "hr";
//update query to make LA
$result9 = mysql_query("UPDATE users SET role_inwebsite='$role' WHERE emp_id='$emp_id'", $talent_uk);

echo "
<div  id='approve'>
         <div class='row mt'>
          		<div class='col-lg-12'>
                
     <div class='tabbable'>
                
                    <ul class='nav nav-tabs' id='myTab'>
					 <li class='active'><a href='#tagged' data-toggle='tab'>Tagged HR to Projects</a></li>
                    <li ><a href='#tag' data-toggle='tab'>Tag HR to Project</a></li>
                  
                                              
                    </ul>
                 
                    <div class='tab-content'>
                        
                         <div class='tab-pane fade in' id='tag'>
                         <div id='editinfo'>
        <div class='row mt'>
          		<div class='col-lg-12'>
          			<div class='form-panel'>
                  	  <h4 class='mb'><i class='fa fa-angle-right'></i> Please select Project Name</h4>
                      <form class='form-inline' role='form' method='POST'>";
                          
                            
$result = mysql_query("SELECT project_name, emp_id, role_inwebsite FROM users GROUP BY project_name", $talent_uk);
echo "<select class='form-control' name='iouid' id='iouid'  onchange='get_emp_details()'>"; 
echo "<option value=''></option>";
while ($row = mysql_fetch_assoc($result)){
$emp_id1 = $row['emp_id'];
$project_name1 = $row['project_name'];
$role_inwebsite1 = $row['role_inwebsite'];

echo '<option value="'.mysql_real_escape_string($project_name1).'">'.$project_name1.'</option>';


}

	echo "</select>
	

  
                             
                              <p>&nbsp;</p>
                              <p>&nbsp;</p>
                               
                              
                      
                              
                             </form>
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	</div><!-- /row -->
        <!-- BASIC FORM ELELEMNTS -->
          	
					<div > <h4>Details will be listed here, First please select IOU.</h4>
             
             </div>
             </div>
                        </div><!--- end tab--->
                        <div class='tab-pane fade in active' id='tagged'>
                        <div id='result'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                          


<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Tagged HR to Projects</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Project Name</th>
                                  <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								    <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Name</th>
									 <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Email</th>
									  <th class='hidden-phone'><i class='fa fa-credit-card'></i> Location</th>
                                   <th><i class=' fa fa-times'></i> Un Tag</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT project_name,emp_id,emp_name,emp_email,location FROM users WHERE role_inwebsite='hr'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$emp_id=$row5['emp_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['project_name'] . "</td>
                                  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['emp_name'] . "</td>
								  <td>" . $row5['emp_email'] . "</td>
								   <td>" . $row5['location'] . "</td>
								  
                                
<td><button type='button' class='btn btn-danger btn-xs' onClick='untag_hr(".$emp_id.")'><i class=' fa fa-times'></i> </button></td>

								 
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
else if($key=="3")
{
	//untag learning ambassador
	$role = "Employee";

$result9 = mysql_query("UPDATE users SET role_inwebsite='$role' WHERE emp_id='$emp_id'", $talent_uk);

echo "
<div id='result'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>
                     


<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Tagged HR to Projects</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Project Name</th>
                                  <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee ID</th>
								    <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Name</th>
									 <th class='hidden-phone'><i class='fa fa-credit-card'></i> Employee Email</th>
									  <th class='hidden-phone'><i class='fa fa-credit-card'></i> Location</th>
                                   <th><i class=' fa fa-times'></i> Un Tag</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT project_name,iou,emp_id,emp_name,emp_email,location FROM users WHERE role_inwebsite='hr'", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$emp_id=$row5['emp_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['project_name'] . "</td>
                                  <td>" . $row5['emp_id'] . "</td>
								  <td>" . $row5['emp_name'] . "</td>
								  <td>" . $row5['emp_email'] . "</td>
								  <td>" . $row5['location'] . "</td>
								  
                                
<td><button type='button' class='btn btn-danger btn-xs' onClick='untag_hr(".$emp_id.")'><i class=' fa fa-times'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
	
	

                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>";
}


 ?>