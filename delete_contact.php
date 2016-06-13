<?php require_once('Connections/talent_uk.php'); ?>
<?php
$contact_id = $_REQUEST['id'];

mysql_select_db($database_talent_uk, $talent_uk);
$query_member = sprintf("DELETE FROM contacts WHERE contact_id='$contact_id'");
$Recordset1 = mysql_query($query_member, $talent_uk) or die(mysql_error());

	echo "
	<div  id='delete_ses'>
<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Admins</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Name</th>
                                  <th class='hidden-phone'><i class='fa fa-envelope'></i> Email</th>
								  <th class='hidden-phone'><i class='fa fa-credit-card'></i> Contact</th>
								   <th><i class='fa fa-bullhorn'></i> Role</th>
                                  <th><i class=' fa fa-trash-o'></i> Delete</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM contacts", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$contact_id=$row5['contact_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['contact_name'] . "</td>
                                  <td>" . $row5['contact_email'] . "</td>
								  <td>" . $row5['contact_number'] . "</td>
								  <td>" . $row5['role'] . "</td>
                                

<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_contact(".$contact_id.")'><i class=' fa fa-trash-o'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
</div>
	";

mysql_close($talent_uk)
?>