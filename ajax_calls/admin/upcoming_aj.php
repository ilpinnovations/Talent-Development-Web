<?php require_once('talent_uk.php'); ?>
<?php
$session_id= $_REQUEST['q'];
$first = $session_id+1;
$second = $session_id+3;
$result6 = mysql_query("SELECT * FROM session WHERE status='0' AND session_id BETWEEN  '$first' AND '$second' ORDER BY start_date ASC ", $talent_uk);
$rows = mysql_num_rows($result6);

if($rows<1)
{
echo "<div id='upcoming'>
	 <div class='desc' align='center' >
                     <div class='thumb' >
                      		<span><i class='fa fa-calendar' style='font-size:25px;'></i></span>
                      	</div>
                      	<div class='details'>
                      		<p style='font-size:15px'><b>No Sessions</b></p><br/>
                       	</div>
                      </div>";

echo "<p>&nbsp;</p>
<p align='center'><button type='button' onClick='previous_list(".$session_id.")' class='btn btn-round btn-primary'>Back</button></p>                                       <p>&nbsp;</p>
</div>";
}
else
{
while($row5 = mysql_fetch_array($result6)) {
	$session_name=$row5['session_name'];
	$session_id=$row5['session_id'];
	$start_date=$row5['start_date'];
	$end_date=$row5['end_date'];
	$start_time=$row5['start_time'];
	$end_time=$row5['end_time'];
$start_date = date("D,j M",strtotime($start_date));
$start_state = date("A",strtotime($start_time));
$end_date = date("D,j M",strtotime($end_date));
$end_state = date("A",strtotime($end_time));
							  
    echo "<div id='upcoming'>
	 <div class='desc' align='center' onClick='get_registerlist(".$session_id.")'>
                     <div class='thumb' >
                      		<span><i class='fa fa-calendar' style='font-size:25px;'></i></span>
                      	</div>
                      	<div class='details'>
                      		<p style='font-size:15px'><b>".$session_name."</b></p><br/>
                      		   <p style='font-size:13px'>Date : ".$start_date." to ".$end_date."<br/>
							   Time : ".$start_time." to ".$end_time."
                      		</p>
                      	</div>
                      </div>";
}
echo "<p>&nbsp;</p>
<p align='center'><button type='button' onClick='previous_list(".$session_id.")' class='btn btn-round btn-primary'>Back</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type='button' onClick='next_list(".$session_id.")' class='btn btn-round btn-primary'>Next</button></p>                                       <p>&nbsp;</p>
</div>";
}
					  ?>