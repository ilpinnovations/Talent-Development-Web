<?php require_once('Connections/talent_uk.php'); ?>
<?php
error_reporting(0);
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "addsession")) {
	$result7 = mysql_query("SELECT max(session_id) FROM session", $talent_uk);
	$rows7 = mysql_fetch_assoc($result7);
	$id = $rows7['max(session_id)'];
	$id = $id+1;
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$session_description1 = $_POST['description'];
$faculty1 = $_POST['faculty'];
$venue1 = $_POST['venue'];
$outcome1 = $_POST['outcome'];
$delivery1 = $_POST['delivery'];
$category1 = $_POST['category'];
$diff = abs(strtotime($end_date) - strtotime($start_date)); 

$years  = floor($diff / (365*60*60*24)); 
$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
$days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
$days = $days+1;
$query11 = "SELECT emp_id FROM users WHERE emp_id='$faculty1'";
$result11 = mysql_query($query11,$talent_uk);
$rows11 = mysql_num_rows($result11);
if($rows11==1)
{
	 $insertSQL = sprintf("INSERT INTO `session` (session_name, start_date, end_date, start_time, end_time,noofdays,session_id,session_category,session_description,session_venue,session_faculty,expected_outcome,mode_of_delivery) VALUES (%s, %s, %s, %s, %s,'$days','$id','$category1','$session_description1','$venue1','$faculty1','$outcome1','$delivery1')",
                       GetSQLValueString($_POST['session_name'], "text"),
                       GetSQLValueString($_POST['start_date'], "date"),
                       GetSQLValueString($_POST['end_date'], "date"),
                       GetSQLValueString($_POST['start_time'], "text"),
                       GetSQLValueString($_POST['end_time'], "text"));

  mysql_select_db($database_talent_uk, $talent_uk);
  $Result1 = mysql_query($insertSQL, $talent_uk) or die(mysql_error());
if($Result1){  
  echo "<script type=\"text/javascript\">".
        "alert('New session added successfully');".
        "</script>";
}
}
else
{
 echo "<script type=\"text/javascript\">".
        "alert('Employee with employee ID $faculty1 does not exists');".
        "</script>";	
}
 
  $insertGoTo = "add_session.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_Recordset1 = $_SESSION['MM_Username'];
}
mysql_select_db($database_talent_uk, $talent_uk);
$query_Recordset1 = sprintf("SELECT * FROM authentication WHERE emp_id='$colname_Recordset1'");
$Recordset1 = mysql_query($query_Recordset1, $talent_uk) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$name=$row_Recordset1['emp_name'];
$emp_id=$row_Recordset1['emp_id'];
$email=$row_Recordset1['emp_email'];
$photo ="images/nopro.jpg";
$role=$row_Recordset1['role_inwebsite'];
?>
<?php
if(isset($_POST["submit"]))
{
	$file = $_FILES['file']['tmp_name'];
	$handle = fopen($file, "r");
	$c = 0;
	fgetcsv($handle);
	while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
	{
		$result7 = mysql_query("SELECT max(session_id) FROM session", $talent_uk);
	$rows7 = mysql_fetch_assoc($result7);
	$id = $rows7['max(session_id)'];
	$id = $id+1;
		$session_name = $filesop[0];
		$start_date = $filesop[1];
		$sdate = str_replace('/', '-', $start_date);
		$start_date = date('Y-m-d', strtotime($sdate));
		$end_date = $filesop[2];
		$edate = str_replace('/', '-', $end_date);
		$end_date = date('Y-m-d', strtotime($edate));
		$noofdays = $filesop[3];
		$start_time = $filesop[4];
		$end_time = $filesop[5];
		$session_category = $filesop[6];
		$session_description = $filesop[7];
		$venue = $filesop[8];
		$faculty = $filesop[9];
		$expected_outcome = $filesop[10];
		$mode_of_delivery = $filesop[11];
		$sql = mysql_query("INSERT INTO session (session_name,start_date, end_date,noofdays,start_time,end_time,session_id,session_category,session_description,session_venue,session_faculty,expected_outcome,mode_of_delivery) VALUES ('$session_name','$start_date','$end_date','$noofdays','$start_time','$end_time','$id','$session_category','$session_description','$venue','$faculty','$expected_outcome','$mode_of_delivery')", $talent_uk);
	}
	
		if($sql){
			echo "<script type=\"text/javascript\">".
        "alert('Sessions uploaded successfully');".
        "</script>";
		}else{
			echo "<script type=\"text/javascript\">".
        "alert('Error in uploading sessions');".
        "</script>";
		}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Talent Development Uk & I</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link rel="stylesheet" type="text/css" href="assets/css/pace.css">    
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
     <script src="assets/js/pace.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Talent Development Uk & I</b></a>
          <div class="top-menu">
            	<ul class="nav pull-right top-menu">
               <!-- <li><a class="logo" href="facebook/fbconfig.php">Connect To Facebook</a></li>-->
                <li><a class="logo" href="index.php">Home</a></li>
                <li><a class="logout" href="<?php echo $logoutAction ?>">Logout</a></li>
                    
            	</ul>
            </div>
        </header>
      <!--header end-->     
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="<?php echo $photo; ?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $name; ?></h5>
                  <h5 class="centered"><?php echo $emp_id; ?></h5>
<?php if ($role=="Admin"): ?>
<?php
include('menu/admin_menu.php');
?>
<?php elseif($role=="Learning Ambassador"): ?>
<?php
include('menu/ambassador_menu.php');
?>
<?php elseif($role=="hr"): ?>
<?php
include('menu/hr_menu.php');
?>
<?php elseif($role=="rmg"): ?>
<?php
include('menu/rmg_menu.php');
?>
<?php elseif($role=="supervisor"): ?>
<?php
include('menu/supervisor_menu.php');
?>
<?php elseif($role=="Learning Officer"): ?>
<?php
include('menu/officer_menu.php');
?>
<?php elseif($role=="Talent Engagement"): ?>
<?php
include('menu/engagement_menu.php');
?>
<?php endif ?>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		<h2><i class="fa fa-angle-right"></i> Add New Session</h2>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  
                    <div class="col-lg-6">
<h4 class="mb"><i class="fa fa-angle-right"></i> Upload Multiple Sessions</h4>
<form name="import" method="post" enctype="multipart/form-data">
    	<input type="file" class="btn btn-primary" name="file" accept=".csv" required/><br />
        <input type="submit" class="btn btn-primary" name="submit" value="Upload" />
</form>
                    </div>
                    
                    <div class="col-lg-6">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> CSV Format</h4>
                    <p><a href="http://theinspirer.in/talentdevelopmentuki/upload_format/format.csv" class="btn btn-primary btn-lg">Download Format</a></p>
                    </div>
                    <p>&nbsp;</p>
                     <p>&nbsp;</p>
                  </div>
          		</div>    	
          	</div><!-- /row -->
            
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Session Details</h4>
                      <form action="<?php echo $editFormAction; ?>" class="form-horizontal style-form" method="POST" name="addsession" id="addsession">
                          
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Session Name</label>
                              <div class="col-sm-7">
                        <input type="text" class="form-control round-form" id="session_name" name="session_name" required>
                              </div>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Start Date</label>
                              <div class="col-sm-7">
                            <input type="date" class="form-control round-form" id="start_date" name="start_date" required> 
                              </div>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">End Date</label>
                              <div class="col-sm-7">
                            <input type="date" class="form-control round-form" id="end_date" name="end_date" required> 
                              </div>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Start Time (HH:MM)</label>
                              <div class="col-sm-7">
                            <input type="time" class="form-control round-form" id="start_time" name="start_time" required>
                              </div>
                              </div>
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">End Time (HH:MM)</label>
                              <div class="col-sm-7">
                            <input type="time" class="form-control round-form" id="end_time" name="end_time" required>
                              </div>
                              </div>
                               <div class="form-group">
                               <label class="col-sm-2 col-sm-2 control-label">Session Category</label>
                              <div class="col-sm-7">
                                 
                                  <select class="form-control" id="category" name="category" required>
						 <option value='workshop'>Workshop</option>
						  <option value='webx'>Web X</option>
						  <option value='certification'>Certification</option>
						  <option value='tcsion'>TCS ION</option>
                           <option value='ondemand'>On Demand Sessions</option>
                           
                            </select>
                              </div>
                              </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Session Description</label>
                              <div class="col-sm-7">
                           <textarea id="description" name="description" rows="4" cols="50"></textarea>
                              </div>
                              </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Venue</label>
                              <div class="col-sm-7">
                            <input type="text" class="form-control round-form" id="venue" name="venue" required>
                              </div>
                              </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Faculty Employee ID</label>
                              <div class="col-sm-7">
                            <input type="number" class="form-control round-form" id="faculty" name="faculty" required>
                              </div>
                              </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Expected Outcome</label>
                              <div class="col-sm-7">
                            <input type="text" class="form-control round-form" id="outcome" name="outcome" required>
                              </div>
                              </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Mode of Delivery</label>
                              <div class="col-sm-7">
                            <input type="text" class="form-control round-form" id="delivery" name="delivery" required>
                              </div>
                              </div>
                              <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-lg btn-block">Add Session</button>
                          </div>
                          <div class="form-group" id="status">
                              
                              </div>
                          <input type="hidden" name="MM_insert" value="addsession">
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
             
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!--               </div><! --/row -->
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              &copy;ILP Innovations | All Rights Reserved
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
	   <!--<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Dashgum!',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: 'assets/img/ui-sam.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>-->
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  

  </body>
</html>