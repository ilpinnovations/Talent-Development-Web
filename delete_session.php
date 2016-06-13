<?php require_once('Connections/talent_uk.php'); ?>
<!----This code retrives event detais from database---->
<?php
$session_id = $_REQUEST['id'];
mysql_select_db($database_talent_uk, $talent_uk);
$query_member = sprintf("DELETE FROM session WHERE session_id='$session_id'");
$Recordset1 = mysql_query($query_member, $talent_uk) or die(mysql_error());

echo "
<div id='delete_ses'>
<div class='row mt'>
          		<div class='col-lg-12'>
                
     <div class='tabbable'>
                
                    <ul class='nav nav-tabs' id='myTab'>
                    <li class='active'><a href='#jan' data-toggle='tab'>January</a></li>
                   <li ><a href='#feb' data-toggle='tab'>February</a></li>
                    <li ><a href='#mar' data-toggle='tab'>March</a></li>
                     <li ><a href='#apr' data-toggle='tab'>April</a></li>
                      <li ><a href='#may' data-toggle='tab'>May</a></li>
                       <li ><a href='#jun' data-toggle='tab'>June</a></li>
                        <li ><a href='#july' data-toggle='tab'>July</a></li>
                         <li ><a href='#aug' data-toggle='tab'>August</a></li>
                          <li ><a href='#sep' data-toggle='tab'>September</a></li>
                           <li ><a href='#oct' data-toggle='tab'>October</a></li>
                            <li ><a href='#nov' data-toggle='tab'>November</a></li>
                             <li ><a href='#dec' data-toggle='tab'>December</a></li>
                   
                    </ul>
                 
                    <div class='tab-content'>
                        <div class='tab-pane fade in active' id='jan'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>";
                         


echo "<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Sessions in January, 2016</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Session Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
                                  <th><i class='fa fa-clock-o'></i> Start time</th>
                                  <th><i class=' fa fa-clock-o'></i> End Time</th>
                                 <!--- <th><i class=' fa fa-edit'></i> Edit Session</th>--->
								  <th><i class=' fa fa-trash-o'></i> Delete Session</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";


$march_flag=0;
$result6 = mysql_query("SELECT * FROM session ORDER BY start_date DESC", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$session_id=$row5['session_id'];
	$start_date = $row5['start_date'];
$month = date( "m", strtotime($start_date));
$result7 = mysql_query("SELECT * FROM session_registration WHERE session_id='$session_id'", $talent_uk);
	$rows7 = mysql_num_rows($result7);	
	if($month==01)
	{
		$march_flag++;
							  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
                                  <td>" . $row5['start_time'] . "</td>
                                  <td>" . $row5['end_time'] . "</td>
<!---<td> <a class='btn btn-primary btn-xs' href='feedback_export.php?session_id=".$session_id."'><i class=' fa fa-pencil'></i></a></td>--->";
if($rows7>0)
{
echo "<td> <a class='btn btn-success btn-xs' onClick='message()'><i class='fa fa-times'></i></a></td>";
}
else
{

echo "<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_session(".$session_id.")'><i class=' fa fa-trash-o'></i> </button></td>";
}
								 
                                echo " </tr>";
							 
	}
}
if($march_flag==0)
{
	echo " <tr><td>No sessions found</td> </tr>";
}
echo" </tbody>";
echo "</table>
	
	
  
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div>
                         <div class='tab-pane fade in' id='feb'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>";

$march_flag=0;
echo "<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Sessions in February, 2016</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Session Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
                                  <th><i class='fa fa-clock-o'></i> Start time</th>
                                  <th><i class=' fa fa-clock-o'></i> End Time</th>
                                 <!--- <th><i class=' fa fa-edit'></i> Edit Session</th>--->
								  <th><i class=' fa fa-trash-o'></i> Delete Session</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM session ORDER BY start_date DESC", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$session_id=$row5['session_id'];
	$start_date = $row5['start_date'];
$month = date( "m", strtotime($start_date));
$result7 = mysql_query("SELECT * FROM session_registration WHERE session_id='$session_id'", $talent_uk);
	$rows7 = mysql_num_rows($result7);	
	if($month==02)
	{
		$march_flag++;
							  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
                                  <td>" . $row5['start_time'] . "</td>
                                  <td>" . $row5['end_time'] . "</td>
<!---<td> <a class='btn btn-primary btn-xs' href='feedback_export.php?session_id=".$session_id."'><i class=' fa fa-pencil'></i></a></td>--->";
if($rows7>0)
{
echo "<td> <a class='btn btn-success btn-xs' onClick='message()'><i class='fa fa-times'></i></a></td>";
}
else
{

echo "<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_session(".$session_id.")'><i class=' fa fa-trash-o'></i> </button></td>";
}
								 
                                 echo " </tr>";
							 
	}	
}
if($march_flag==0)
{
	echo " <tr><td>No sessions found</td> </tr>";
}
echo" </tbody>";
echo "</table>
	
	
  
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div>
                         <div class='tab-pane fade in' id='mar'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>";  
	$march_flag=0;

echo "<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Sessions in March, 2016</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Session Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
                                  <th><i class='fa fa-clock-o'></i> Start time</th>
                                  <th><i class=' fa fa-clock-o'></i> End Time</th>
                                 <!--- <th><i class=' fa fa-edit'></i> Edit Session</th>--->
								  <th><i class=' fa fa-trash-o'></i> Delete Session</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";



$result6 = mysql_query("SELECT * FROM session ORDER BY start_date DESC", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$session_id=$row5['session_id'];
	$start_date = $row5['start_date'];
$month = date( "m", strtotime($start_date));
$result7 = mysql_query("SELECT * FROM session_registration WHERE session_id='$session_id'", $talent_uk);
	$rows7 = mysql_num_rows($result7);	
	if($month==03)
	{
		$march_flag++;
							  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
                                  <td>" . $row5['start_time'] . "</td>
                                  <td>" . $row5['end_time'] . "</td>
<!---<td> <a class='btn btn-primary btn-xs' href='feedback_export.php?session_id=".$session_id."'><i class=' fa fa-pencil'></i></a></td>--->";
if($rows7>0)
{
echo "<td> <a class='btn btn-success btn-xs' onClick='message()'><i class='fa fa-times'></i></a></td>";
}
else
{

echo "<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_session(".$session_id.")'><i class=' fa fa-trash-o'></i> </button></td>";
}
								 
                                 echo " </tr>";
							 
	}
}
if($march_flag==0)
{
	echo " <tr><td>No sessions found</td> </tr>";
}
echo" </tbody>";
echo "</table>
	
	
  
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div>
                         <div class='tab-pane fade in' id='apr'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>";

echo "<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Sessions in April, 2016</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Session Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
                                  <th><i class='fa fa-clock-o'></i> Start time</th>
                                  <th><i class=' fa fa-clock-o'></i> End Time</th>
                                 <!--- <th><i class=' fa fa-edit'></i> Edit Session</th>--->
								  <th><i class=' fa fa-trash-o'></i> Delete Session</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";

$march_flag=0;

$result6 = mysql_query("SELECT * FROM session ORDER BY start_date DESC", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$session_id=$row5['session_id'];
	$start_date = $row5['start_date'];
$month = date( "m", strtotime($start_date));
$result7 = mysql_query("SELECT * FROM session_registration WHERE session_id='$session_id'", $talent_uk);
	$rows7 = mysql_num_rows($result7);	
	if($month==04)
	{
		$march_flag++;
							  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
                                  <td>" . $row5['start_time'] . "</td>
                                  <td>" . $row5['end_time'] . "</td>
<!---<td> <a class='btn btn-primary btn-xs' href='feedback_export.php?session_id=".$session_id."'><i class=' fa fa-pencil'></i></a></td>--->";
if($rows7>0)
{
echo "<td> <a class='btn btn-success btn-xs' onClick='message()'><i class='fa fa-times'></i></a></td>";
}
else
{

echo "<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_session(".$session_id.")'><i class=' fa fa-trash-o'></i> </button></td>";
}
								 
                                echo " </tr>";
							 
	}
}
if($march_flag==0)
{
	echo " <tr><td>No sessions found</td> </tr>";
}
echo" </tbody>";
echo "</table>
	
	
  
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div>
                         <div class='tab-pane fade in' id='may'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>";


echo "<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Sessions in May, 2016</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Session Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
                                  <th><i class='fa fa-clock-o'></i> Start time</th>
                                  <th><i class=' fa fa-clock-o'></i> End Time</th>
                                 <!--- <th><i class=' fa fa-edit'></i> Edit Session</th>--->
								  <th><i class=' fa fa-trash-o'></i> Delete Session</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";

$march_flag=0;

$result6 = mysql_query("SELECT * FROM session ORDER BY start_date DESC", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$session_id=$row5['session_id'];
	$start_date = $row5['start_date'];
$month = date( "m", strtotime($start_date));
$result7 = mysql_query("SELECT * FROM session_registration WHERE session_id='$session_id'", $talent_uk);
	$rows7 = mysql_num_rows($result7);	
	if($month==05)
	{
		$march_flag++;
							  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
                                  <td>" . $row5['start_time'] . "</td>
                                  <td>" . $row5['end_time'] . "</td>
<!---<td> <a class='btn btn-primary btn-xs' href='feedback_export.php?session_id=".$session_id."'><i class=' fa fa-pencil'></i></a></td>--->";
if($rows7>0)
{
echo "<td> <a class='btn btn-success btn-xs' onClick='message()'><i class='fa fa-times'></i></a></td>";
}
else
{

echo "<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_session(".$session_id.")'><i class=' fa fa-trash-o'></i> </button></td>";
}
								 
                                echo " </tr>";
							 
	}
}
if($march_flag==0)
{
	echo " <tr><td>No sessions found</td> </tr>";
}
echo" </tbody>";
echo "</table>
	
	
  
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div>
                         <div class='tab-pane fade in' id='jun'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>";

echo "<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Sessions in June, 2016</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Session Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
                                  <th><i class='fa fa-clock-o'></i> Start time</th>
                                  <th><i class=' fa fa-clock-o'></i> End Time</th>
                                 <!--- <th><i class=' fa fa-edit'></i> Edit Session</th>--->
								  <th><i class=' fa fa-trash-o'></i> Delete Session</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";

$march_flag=0;

$result6 = mysql_query("SELECT * FROM session ORDER BY start_date DESC", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$session_id=$row5['session_id'];
	$start_date = $row5['start_date'];
$month = date( "m", strtotime($start_date));
$result7 = mysql_query("SELECT * FROM session_registration WHERE session_id='$session_id'", $talent_uk);
	$rows7 = mysql_num_rows($result7);	
	if($month==06)
	{
		$march_flag++;
							  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
                                  <td>" . $row5['start_time'] . "</td>
                                  <td>" . $row5['end_time'] . "</td>
<!---<td> <a class='btn btn-primary btn-xs' href='feedback_export.php?session_id=".$session_id."'><i class=' fa fa-pencil'></i></a></td>--->";
if($rows7>0)
{
echo "<td> <a class='btn btn-success btn-xs' onClick='message()'><i class='fa fa-times'></i></a></td>";
}
else
{

echo "<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_session(".$session_id.")'><i class=' fa fa-trash-o'></i> </button></td>";
}
								 
                                 echo " </tr>";
							 
	}
}
if($march_flag==0)
{
	echo " <tr><td>No sessions found</td> </tr>";
}
echo" </tbody>";
echo "</table>
	
	
  
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div>
                         <div class='tab-pane fade in' id='july'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>";


echo "<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Sessions in July, 2016</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Session Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
                                  <th><i class='fa fa-clock-o'></i> Start time</th>
                                  <th><i class=' fa fa-clock-o'></i> End Time</th>
                                 <!--- <th><i class=' fa fa-edit'></i> Edit Session</th>--->
								  <th><i class=' fa fa-trash-o'></i> Delete Session</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";


$march_flag=0;
$result6 = mysql_query("SELECT * FROM session ORDER BY start_date DESC", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$session_id=$row5['session_id'];
	$start_date = $row5['start_date'];
$month = date( "m", strtotime($start_date));
$result7 = mysql_query("SELECT * FROM session_registration WHERE session_id='$session_id'", $talent_uk);
	$rows7 = mysql_num_rows($result7);	
	if($month==07)
	{
							$march_flag++;
							  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
                                  <td>" . $row5['start_time'] . "</td>
                                  <td>" . $row5['end_time'] . "</td>
<!---<td> <a class='btn btn-primary btn-xs' href='feedback_export.php?session_id=".$session_id."'><i class=' fa fa-pencil'></i></a></td>--->";
if($rows7>0)
{
echo "<td> <a class='btn btn-success btn-xs' onClick='message()'><i class='fa fa-times'></i></a></td>";
}
else
{

echo "<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_session(".$session_id.")'><i class=' fa fa-trash-o'></i> </button></td>";
}
								 
                                 echo " </tr>";
							 
	}
}
if($march_flag==0)
{
	echo " <tr><td>No sessions found</td> </tr>";
}
echo" </tbody>";
echo "</table>
	
	
  
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div>
                         <div class='tab-pane fade in' id='aug'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>";
                          


echo "<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Sessions in August, 2016</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Session Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
                                  <th><i class='fa fa-clock-o'></i> Start time</th>
                                  <th><i class=' fa fa-clock-o'></i> End Time</th>
                                 <!--- <th><i class=' fa fa-edit'></i> Edit Session</th>--->
								  <th><i class=' fa fa-trash-o'></i> Delete Session</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";


$march_flag=0;
$result6 = mysql_query("SELECT * FROM session ORDER BY start_date DESC", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$session_id=$row5['session_id'];
	$start_date = $row5['start_date'];
$month = date( "m", strtotime($start_date));
$result7 = mysql_query("SELECT * FROM session_registration WHERE session_id='$session_id'", $talent_uk);
	$rows7 = mysql_num_rows($result7);	
	if($month==08)
	{
		$march_flag++;
							  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
                                  <td>" . $row5['start_time'] . "</td>
                                  <td>" . $row5['end_time'] . "</td>
<!---<td> <a class='btn btn-primary btn-xs' href='feedback_export.php?session_id=".$session_id."'><i class=' fa fa-pencil'></i></a></td>--->";
if($rows7>0)
{
echo "<td> <a class='btn btn-success btn-xs' onClick='message()'><i class='fa fa-times'></i></a></td>";
}
else
{

echo "<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_session(".$session_id.")'><i class=' fa fa-trash-o'></i> </button></td>";
}
								 
                                 echo " </tr>";
							 
	}
}
if($march_flag==0)
{
	echo " <tr><td>No sessions found</td> </tr>";
}
echo" </tbody>";
echo "</table>
	
	
  
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div>
                         <div class='tab-pane fade in' id='sep'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>";
                


echo "<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Sessions in September, 2016</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Session Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
                                  <th><i class='fa fa-clock-o'></i> Start time</th>
                                  <th><i class=' fa fa-clock-o'></i> End Time</th>
                                 <!--- <th><i class=' fa fa-edit'></i> Edit Session</th>--->
								  <th><i class=' fa fa-trash-o'></i> Delete Session</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";


$march_flag=0;
$result6 = mysql_query("SELECT * FROM session ORDER BY start_date DESC", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$session_id=$row5['session_id'];
	$start_date = $row5['start_date'];
$month = date( "m", strtotime($start_date));
$result7 = mysql_query("SELECT * FROM session_registration WHERE session_id='$session_id'", $talent_uk);
	$rows7 = mysql_num_rows($result7);	
	if($month==09)
	{
		$march_flag++;
							  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
                                  <td>" . $row5['start_time'] . "</td>
                                  <td>" . $row5['end_time'] . "</td>
<!---<td> <a class='btn btn-primary btn-xs' href='feedback_export.php?session_id=".$session_id."'><i class=' fa fa-pencil'></i></a></td>--->";
if($rows7>0)
{
echo "<td> <a class='btn btn-success btn-xs' onClick='message()'><i class='fa fa-times'></i></a></td>";
}
else
{

echo "<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_session(".$session_id.")'><i class=' fa fa-trash-o'></i> </button></td>";
}
								 
                                echo " </tr>";
							 
	}
}
if($march_flag==0)
{
	echo " <tr><td>No sessions found</td> </tr>";
}
echo" </tbody>";
echo "</table>
	
	

                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div>
                         <div class='tab-pane fade in' id='oct'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>";
                        


echo "<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Sessions in October, 2016</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Session Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
                                  <th><i class='fa fa-clock-o'></i> Start time</th>
                                  <th><i class=' fa fa-clock-o'></i> End Time</th>
                                 <!--- <th><i class=' fa fa-edit'></i> Edit Session</th>--->
								  <th><i class=' fa fa-trash-o'></i> Delete Session</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";

$march_flag=0;

$result6 = mysql_query("SELECT * FROM session ORDER BY start_date DESC", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$session_id=$row5['session_id'];
	$start_date = $row5['start_date'];
$month = date( "m", strtotime($start_date));
$result7 = mysql_query("SELECT * FROM session_registration WHERE session_id='$session_id'", $talent_uk);
	$rows7 = mysql_num_rows($result7);	
	if($month==10)
	{
		$march_flag++;
							  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
                                  <td>" . $row5['start_time'] . "</td>
                                  <td>" . $row5['end_time'] . "</td>
<!---<td> <a class='btn btn-primary btn-xs' href='feedback_export.php?session_id=".$session_id."'><i class=' fa fa-pencil'></i></a></td>--->";
if($rows7>0)
{
echo "<td> <a class='btn btn-success btn-xs' onClick='message()'><i class='fa fa-times'></i></a></td>";
}
else
{

echo "<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_session(".$session_id.")'><i class=' fa fa-trash-o'></i> </button></td>";
}
								 
                                 echo " </tr>";
							 
	}
}
if($march_flag==0)
{
	echo " <tr><td>No sessions found</td> </tr>";
}
echo" </tbody>";
echo "</table>
	
	

                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div>
                         <div class='tab-pane fade in' id='nov'>
                        <div class='row'>
                        
                        <div class='span5'>
                        
                          <form id='contact-form' class='contact-form' action='' method='post'>
                     <div class='content-panel'>";
                          


echo "<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Sessions in November, 2016</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Session Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
                                  <th><i class='fa fa-clock-o'></i> Start time</th>
                                  <th><i class=' fa fa-clock-o'></i> End Time</th>
                                 <!--- <th><i class=' fa fa-edit'></i> Edit Session</th>--->
								  <th><i class=' fa fa-trash-o'></i> Delete Session</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";


$march_flag=0;
$result6 = mysql_query("SELECT * FROM session ORDER BY start_date DESC", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$session_id=$row5['session_id'];
	$start_date = $row5['start_date'];
$month = date( "m", strtotime($start_date));
$result7 = mysql_query("SELECT * FROM session_registration WHERE session_id='$session_id'", $talent_uk);
	$rows7 = mysql_num_rows($result7);	
	if($month==11)
	{
		$march_flag++;
							  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
                                  <td>" . $row5['start_time'] . "</td>
                                  <td>" . $row5['end_time'] . "</td>
<!---<td> <a class='btn btn-primary btn-xs' href='feedback_export.php?session_id=".$session_id."'><i class=' fa fa-pencil'></i></a></td>--->";
if($rows7>0)
{
echo "<td> <a class='btn btn-success btn-xs' onClick='message()'><i class='fa fa-times'></i></a></td>";
}
else
{

echo "<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_session(".$session_id.")'><i class=' fa fa-trash-o'></i> </button></td>";
}
								 
                                 echo " </tr>";
							 
	}
}
if($march_flag==0)
{
	echo " <tr><td>No sessions found</td> </tr>";
}
echo" </tbody>";
echo "</table>
	
	
 
                      </div>
            	
               
            </form>
                        </div>
                        
                        </div>
                        </div>
                         <div class='tab-pane fade in' id='dec'>
                          <div class='row'>
                          
                          <div id='my_table' class='span5'>
                      
        <div class='content-panel'>";
                         


echo "<table class='table table-striped table-advance table-hover'>
	                  	  	  <h4><i class='fa fa-angle-right'></i> Sessions in December, 2016</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th><i class='fa fa-bullhorn'></i> Session Name</th>
                                  <th class='hidden-phone'><i class='fa fa-calendar'></i> Start Date</th>
								  <th class='hidden-phone'><i class='fa fa-calendar'></i> End Date</th>
                                  <th><i class='fa fa-clock-o'></i> Start time</th>
                                  <th><i class=' fa fa-clock-o'></i> End Time</th>
                                 <!--- <th><i class=' fa fa-edit'></i> Edit Session</th>--->
								  <th><i class=' fa fa-trash-o'></i> Delete Session</th>
                                 
                              <th></th>
                              </tr>
                              </thead>";


$march_flag=0;
$result6 = mysql_query("SELECT * FROM session ORDER BY start_date DESC", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$session_id=$row5['session_id'];
	$start_date = $row5['start_date'];
$month = date( "m", strtotime($start_date));
$result7 = mysql_query("SELECT * FROM session_registration WHERE session_id='$session_id'", $talent_uk);
	$rows7 = mysql_num_rows($result7);	
	if($month==12)
	{
		$march_flag++;
							  echo "<tbody>
                              <tr>
                                  <td>" . $row5['session_name'] . "</td>
                                  <td>" . $row5['start_date'] . "</td>
								  <td>" . $row5['end_date'] . "</td>
                                  <td>" . $row5['start_time'] . "</td>
                                  <td>" . $row5['end_time'] . "</td>
<!---<td> <a class='btn btn-primary btn-xs' href='feedback_export.php?session_id=".$session_id."'><i class=' fa fa-pencil'></i></a></td>--->";
if($rows7>0)
{
echo "<td> <a class='btn btn-success btn-xs' onClick='message()'><i class='fa fa-times'></i></a></td>";
}
else
{

echo "<td><button type='button' class='btn btn-danger btn-xs' onClick='delete_session(".$session_id.")'><i class=' fa fa-trash-o'></i> </button></td>";
}
								 
                                 echo " </tr>";
							 
	}
}
if($march_flag==0)
{
	echo " <tr><td>No sessions found</td> </tr>";
}
echo" </tbody>";
echo "</table>
	
	
 
                      </div>
            	
                    
                        </div>
                        
                        
                          </div>
                         
                            
                        </div>
                        
                     
                    </div>
                            
				</div>
           
            <!-- End Tabs -->
          
  
                </div>
                </div>
				</div>

";
mysql_close($talent_uk);
?>