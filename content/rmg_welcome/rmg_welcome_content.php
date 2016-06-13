<?php
echo"<section id='main-content'>
          <section class='wrapper'>

           <div class='row'>
                  <div class='col-lg-9 main-chart'>
                  
                  <div id='reg'>
                  </div>
                  <h2><i class='fa fa-angle-right'></i> Statistics</h2>
                  <div class='row mt'>
          		<div class='col-lg-12'>
          			<div class='form-panel'>
                  	  <h4 class='mb'><i class='fa fa-angle-right'></i> Please select Session</h4>
                      <form class='form-inline' role='form' method='POST'>";
                          
                             
$result = mysql_query("SELECT * FROM session WHERE status='1' ORDER BY end_date DESC", $talent_uk);
echo "<select class='form-control' name='sessionid' id='sessionid'  onchange='get_session_details(this.value)' '>"; 
echo "<option value=''></option>";
while ($row = mysql_fetch_assoc($result)){
	$id= $row['session_id'];
	$name=$row['session_name'];
	$en_date=$row['end_date'];
	$en_date = date("D,j M",strtotime($en_date));
	echo "<option value=$id>$name (End Date:$en_date)</option>";
	}
	echo "</select>";
	

  
                             
                              echo"<p>&nbsp;</p>
                             
                               
                              
                      
                              
                             </form>
                               <!-- SERVER STATUS PANELS -->
                      	
          			</div><!-- /form-panel -->
                     
                   
          		</div><!-- /col-lg-12 -->
                <p>&nbsp;</p>
          <p>&nbsp;</p>
           
                 
  <div id='editinfo'> <h4>Sessions statistics will be shown here. First, please select session.</h4>
             
             </div>         	
          	</div><!-- /row -->
            
                  
          <p>&nbsp;</p>
				 <p>&nbsp;</p>
               
            </div>
           <div class='col-lg-3 ds'>
                    <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>Upcoming Events</h3>";
                                   
                        
                   
					  $result6 = mysql_query("SELECT * FROM session WHERE status='0' ORDER BY start_date ASC LIMIT 3", $talent_uk);

while($row5 = mysql_fetch_array($result6)) {
	$session_ids=$row5['session_id'];
	$session_name=$row5['session_name'];
	$start_date=$row5['start_date'];
	$session_id=$row5['session_id'];
	$end_date=$row5['end_date'];
	$start_time=$row5['start_time'];
	$end_time=$row5['end_time'];
$start_date = date("D,j M",strtotime($start_date));
$start_state = date("A",strtotime($start_time));
$end_date = date("D,j M",strtotime($end_date));
$end_state = date("A",strtotime($end_time));
							  
    echo " 
	<div id='upcoming' >
	<div class='desc' align='center' onClick='get_registerlist(".$session_ids.")'>
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
<p align='center'><button type='button' onClick='next_list(".$session_id.")' class='btn btn-round btn-primary'>Next</button></p>                                       <p>&nbsp;</p>
</div>";
					
                    
                  echo"</div><!-- /col-lg-3 -->
           </div>
          </section>
      </section>";
?>