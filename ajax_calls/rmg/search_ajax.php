<?php require_once('talent_uk.php'); ?>
<?php
$searchquery = $_REQUEST['searchquery'];

$query7 = "SELECT * FROM rmg_search WHERE search LIKE '%$searchquery%' GROUP BY emp_id";
$result7= mysql_query($query7,$talent_uk);
echo"<div id='editinfo'> 
<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Search Results</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                 <th><i class='fa fa-bullhorn'></i> Employee ID</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Employee Name</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> Employee Email</th>
                                  <th><i class='fa fa-clock-o'></i> Designation</th>
                                  <th><i class=' fa fa-clock-o'></i> Location</th>
								   <th><i class='fa fa-bullhorn'></i> IOU</th>
								   <th><i class='fa fa-bullhorn'></i> SP</th>
								    <th><i class='fa fa-bullhorn'></i> SUB SP</th>
									<th><i class='fa fa-bullhorn'></i> Experiance</th>
									  <th><i class='fa fa-bullhorn'></i> Role</th>                                 
                          
                              </tr>
                              </thead>
							  ";
while($row7= mysql_fetch_assoc($result7))
{
$emp_id=$row7['emp_id'];
$result6 = mysql_query("SELECT emp_id,emp_name,emp_email,role_intcs,location,iou,designation,sp,sub_sp,total_experiance FROM users WHERE emp_id='$emp_id'", $talent_uk);
$row5= mysql_fetch_assoc($result6);
	$emp_id1=$row5['emp_id'];
	
	$emp_name = $row5['emp_name'];
	$emp_email = $row5['emp_email'];
	$role = $row5['role_intcs'];
	$location = $row5['loation'];
	$iou = $row5['iou'];
	$designation = $row5['designation'];
	$sp = $row5['sp'];
	$exp = $row5['total_experiance'];
	$sub_sp= $row5['sub_sp'];

							  echo "<tbody>
                              <tr>
                                  <td>" . $emp_id1. "</td>
                                  <td>" . $emp_name. "</td>
								  <td>" . $emp_email. "</td>
                                  <td>" . $designation . "</td>
								   <td>" . $location . "</td>
                                  <td>" . $iou. "</td>
								  <td>" . $sp . "</td>
								  <td>" .$sub_sp . "</td>
								   <td>" .$exp . "</td>
								  <td>" . $role . "</td>
								 
								 
                                  </tr>";
							 



	
}
echo" </tbody>";
echo "</table>
	</div>   ";
mysql_close($talent_uk)
?>