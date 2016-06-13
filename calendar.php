<?php
$name="Omkar Tarale";
$photo ="asd";
$rnumber = "1";
$role="A";
$total_members="50";
$credit="100";
$debit="40";
$level3_groups="6";
$group_count="45";
$temp_members="47";
$total_members5="56";
$total_amount6="24";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Talent Development Uk I</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

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
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Talent Development Uk I</b></a>
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
                  <h5 class="centered"><?php echo $rnumber; ?></h5>
<?php if ($role=="A"): ?>
<li class="mt">
                      <a class="active" href="welcome.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
  					<li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Sessions</span>
                      </a>
                      <ul class="sub">
                      	  <li><a  href="view_session.php">View Session Details</a></li>
                          <li><a  href="add_session.php">Add New Session</a></li>
                          <li><a  href="edit_session.php">Edit/Delete Session Details</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-users"></i>
                          <span>Feedbacks</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="feedback.php">Download Feedbacks</a></li>
                      </ul>
                  </li>
                  
					<li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-cogs"></i>
                          <span>My Settings</span>
                      </a>
                      <ul class="sub">
                      <li><a  href="change_password.php">Change Password</a></li>
                      <li><a  href="edit_personal_info.php">Edit Personal Information</a></li>
                      <li><a  href="add_remove_admin.php">Add/Remove Admin</a></li>
                      </ul>
                  </li>
<?php elseif($role=="U"): ?>
<li class="mt">
                      <a class="active" href="welcome.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
  					<li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Sessions</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="view_session.php">View Sessions</a></li>
                      </ul>
                  </li>

                 	<li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-cogs"></i>
                          <span>My Settings</span>
                      </a>
                      <ul class="sub">
                      <li><a  href="change_password.php">Change Password</a></li>
                          <li><a  href="edit_personal_info.php">Edit Personal Information</a></li>
                      </ul>
                  </li>
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
          	<h3><i class="fa fa-angle-right"></i> Calendar</h3>
              <!-- page start-->
              <div class="row mt">
                  <aside class="col-lg-3 mt">
                      <h4><i class="fa fa-angle-right"></i> Draggable Events</h4>
                      <div id="external-events">
                          <div class="external-event label label-theme">My Event 1</div>
                          <div class="external-event label label-success">My Event 2</div>
                          <div class="external-event label label-info">My Event 3</div>
                          <div class="external-event label label-warning">My Event 4</div>
                          <div class="external-event label label-danger">My Event 5</div>
                          <div class="external-event label label-default">My Event 6</div>
                          <div class="external-event label label-theme">My Event 7</div>
                          <div class="external-event label label-info">My Event 8</div>
                          <div class="external-event label label-success">My Event 9</div>
                          <p class="drop-after">
                              <input type="checkbox" id="drop-remove">
                              Remove After Drop
                          </p>
                      </div>
                  </aside>
                  <aside class="col-lg-9 mt">
                      <section class="panel">
                          <div class="panel-body">
                              <div id="calendar" class="has-toolbar"></div>
                          </div>
                      </section>
                  </aside>
              </div>
              <!-- page end-->
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="calendar.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
	<script src="assets/js/fullcalendar/fullcalendar.min.js"></script>    
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
	<script src="assets/js/calendar-conf-events.js"></script>    
  
  <script>
      //custom select box

      $(function(){
          $("select.styled").customSelect();
      });

  </script>

  </body>
</html>
