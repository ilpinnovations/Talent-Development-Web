<?php require_once('Connections/talent_uk.php'); ?>
<?php
$faq_id = $_REQUEST['id'];

mysql_select_db($database_talent_uk, $talent_uk);
$query_member = sprintf("DELETE FROM faq WHERE faq_id='$faq_id'");
$Recordset1 = mysql_query($query_member, $talent_uk) or die(mysql_error());

	echo "
<div  id='delete_ses'>
<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Admins</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Question</th>
                                  <th class='hidden-phone'><i class='fa fa-bullhorn'></i> Answer</th>
								  
                                  <th><i class=' fa fa-trash-o'></i> Delete</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM faq", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$faq_id=$row5['faq_id'];
								  echo "<tbody>
                              <tr>
                                  <td>" . $row5['question'] . "</td>
                                  <td>" . $row5['answer'] . "</td>
								  
                             
<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_faq(".$faq_id.")'><i class=' fa fa-trash-o'></i> </button></td>

								 
                                  </tr>
							  </tbody>";
    
}


echo "</table>
</div>";

mysql_close($talent_uk)
?>