<?php require_once('Connections/talent_uk.php'); ?>
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

$query = sprintf("SELECT count(*) FROM session_registration");
$result = mysql_query($query, $talent_uk) or die(mysql_error());
$row= mysql_fetch_assoc($result);
$total_registrations=$row['count(*)'];

$query1 = sprintf("SELECT count(*) FROM session");
$result1 = mysql_query($query1, $talent_uk) or die(mysql_error());
$row1= mysql_fetch_assoc($result1);
$total_sessions=$row1['count(*)'];

$query2 = sprintf("SELECT count(*) FROM session_registration WHERE is_feedback='1'");
$result2 = mysql_query($query2, $talent_uk) or die(mysql_error());
$row2= mysql_fetch_assoc($result2);
$total_feedbacks=$row2['count(*)'];
?>

<?php
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
	  echo"<script>window.location='http://theinspirer.in/talentdevelopmentuki/login.php';</script>";
    
    exit;
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
     <!--- Admin JS files --->
     <script src="js/rmg_js/rmg.js"></script>
     
  </head>
  <body>
  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" ></div>
              </div>
            <a href="index.php" class="logo"><b>Talent Development Uk & I</b></a>
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
      <!--main content start-->
     <section id='main-content'>
          <section class='wrapper'>

           <div class='row'>
                  <div class='col-lg-12 main-chart'>
                  
                  <div id='reg'>
                  </div>
                  <h2><i class='fa fa-angle-right'></i> Search</h2>
                  <div class='row mt'>
          		<div class='col-lg-12'>
          			<div class='form-panel'>
                  	 <!--- <h4 class='mb'><i class='fa fa-angle-right'></i> Please select Session</h4>--->
                      <form class='form-horizontal style-form' role='form' method='POST'>
                          
        
                                   <p>&nbsp;</p>
                              <div class="col-sm-12">
                                  <input type="text" id="searchdata" name="searchdata" placeholder="Search Role, Skills, Courses , Designation , Experience..." onKeyUp="searchd();" class="form-control round-form">
                              </div>
                                        

	

  
                             
                           <p>&nbsp;</p>
                             
                               
                              
                      
                              
                             </form>
                               <!-- SERVER STATUS PANELS -->
                      	
          			</div><!-- /form-panel -->
                     
                   
          		</div><!-- /col-lg-12 -->
                <p>&nbsp;</p>
          <p>&nbsp;</p>
           
    <div class='col-lg-12'>      
    <div class='form-panel'>       
  <div id='editinfo'> 
  <p>&nbsp;</p>
  <h4>You can filter employess according to their Skills, Designation, Role, Total Experiance, Courses attended etc.</h4>
								
             </div>
             </div>  
             </div>       	
          	</div><!-- /row -->
            
                  
          <p>&nbsp;</p>
				 <p>&nbsp;</p>
               
            </div>
           </div>
          </section>
      </section>";                      
      <!--main content end-->
      
      <!--footer start-->
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
       <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
       <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
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
<?php
mysql_free_result($Recordset1);

?>

