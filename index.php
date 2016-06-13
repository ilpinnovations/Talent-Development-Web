<?php

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
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
	  echo '<script>window.location = "'.$logoutGoTo.'";</script>';
  
    
    exit;
  }
}
?>
<!DOCTYPE HTML>
<!--
	Twenty 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Talent Development Uk & I</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	</head>
	<body class="index loading">
	
		<!-- Header -->
			<header id="header" class="alt">
				<h1 id="logo"><a href="index.html">Talent Development Uk & I</a></h1>
                <?php if (isset($_SESSION['MM_Username'])): ?>
<nav id="nav">
					<ul>
						<li class="current"><a href="index.php">Home</a></li>
                        <li class="current"><a href="welcome.php">My Account</a></li>
					 <li><a href="<?php echo $logoutAction ?>" class="button special">Log out</a></li>
                    </ul>
				</nav>
<?php else: ?>
<nav id="nav">
					<ul>
						<li class="current"><a href="index.php">Home</a></li>
                      <li><a href="login.php" class="button special">Login</a></li>
                                          
                                               
					</ul>
				</nav>
<?php endif ?>
				</header>

		<!-- Banner -->		
			<section id="banner">
				
				<!--
					".inner" is set up as an inline-block so it automatically expands
					in both directions to fit whatever's inside it. This means it won't
					automatically wrap lines, so be sure to use line breaks where
					appropriate (<br />).
				-->
				<div class="inner">
					
					<header>
						<h2>Talent Development Uk & I</h2>
					</header>
                     <p>&nbsp;</p>
                    <!---<img src="images/TD_logo.png" width="250" height="250">-->
                    
					<p><strong>Enabling Certainity</strong></p>
                    
                    <p>&nbsp;</p>
					
				</div>
				
			</section>
		
		<!-- Main -->
			<!---<article id="main">

				<header class="special container">
					
					<h2><strong>RULES</strong></h2>
					
				</header>
				
					<section class="wrapper style2 container special-alt">
						<div class="row half">
							<div class="8u">
							
								
									<h2><strong>Conditions Apply</strong></h2>
							
								<p>[1] I have joined this company on my own will, without others influence.</p>
                                <p>[2] I agree to follow all the rules & regulations of this company.</p>
                                <p>[3] I will be held responsible for the loss in the company, if such occurs.</p>
                                <p>[4] I agree to follow the rules & regulations which may change as per time. </p>
                                <p>[5] Registration amount is not refundable.</p>
                                <p>[6] Any profit in this company wont be shared with me at any condition.</p>
                                <p>[7] I agree to follow all the conditions which are shown above on my own will.</p>
															
							</div>
										
						</div>
					</section>
					
				
					<section class="wrapper style1 container special">
                    <header class="major">
							<h2><strong>Are you Ready??</strong></h2>
						</header>
						<div class="row">
							<div class="6u">
							
								<section>
									<span class="icon feature fa-check"></span>
									<header>
										<h3><a href="register.php">Join Spandana Groups</a></h3>
									</header>
									<p>Its time to be a part of an amazing network and explore different opportunities to reach the peak of <strong>Success</strong></p>
                                    <p><footer class="major">
							<ul class="buttons">
								<li><a href="register.php" class="button">join Now</a></li>
							</ul>
						</footer></p>
								</section>
							
							</div>
							<div class="6u">
							
								<section>
									<span class="icon feature fa-check"></span>
									<header>
										<h3>Manage your Account</h3>
									</header>
									<p>Keep track of your Income, Members, Invite friends to join, and much more.. </p>
                                    <p><footer class="major">
							<ul class="buttons">
								<li><a href="welcome.php" class="button">Manage My Account</a></li>
							</ul>
						</footer></p>
								</section>
							
							</div>
							<div class="6u">
							
								<section>
									<span class="icon feature fa-check"></span>
									<header>
										<h3>Increase Members</h3>
									</header>
									<p>Invite your friends to join Spandana Groups and increase your members. More Members, More Income More Opportunities</p>
                                   
								</section>
							
							</div>
                            <div class="6u">
							
								<section>
									<span class="icon feature fa-check"></span>
									<header>
										<h3>Enjoy Periodic Income</h3>
									</header>
									<p>Complete your group with 14 Members and enjoy periodic income according to company policy, More Members, More Income</p>
								</section>
							
							</div>
						</div>
					</section>--->
					
				
					<!---<section class="wrapper style3 container special">
					
						<header class="major">
							<h2>Next look at this <strong>cool stuff</strong></h2>
						</header>
						
						<div class="row">
							<div class="6u">
							
								<section>
									<a href="#" class="image feature"><img src="images/pic01.jpg" alt="" /></a>
									<header>
										<h3>A Really Fast Train</h3>
									</header>
									<p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
								</section>

							</div>
							<div class="6u">
							
								<section>
									<a href="#" class="image feature"><img src="images/pic02.jpg" alt="" /></a>
									<header>
										<h3>An Airport Terminal</h3>
									</header>
									<p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
								</section>

							</div>
						</div>
						<div class="row">
							<div class="6u">
							
								<section>
									<a href="#" class="image feature"><img src="images/pic03.jpg" alt="" /></a>
									<header>
										<h3>Hyperspace Travel</h3>
									</header>
									<p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
								</section>

							</div>
							<div class="6u">
							
								<section>
									<a href="#" class="image feature"><img src="images/pic04.jpg" alt="" /></a>
									<header>
										<h3>And Another Train</h3>
									</header>
									<p>Sed tristique purus vitae volutpat commodo suscipit amet sed nibh. Proin a ullamcorper sed blandit. Sed tristique purus vitae volutpat commodo suscipit ullamcorper sed blandit lorem ipsum dolore.</p>
								</section>

							</div>
						</div>

						<footer class="major">
							<ul class="buttons">
								<li><a href="#" class="button">See More</a></li>
							</ul>
						</footer>
					
					</section>
					
			</article>--->

		<!-- CTA -->
		<!---<section id="cta">
			
				<header>
					<h2>Ready to do <strong>something</strong>?</h2>
					<p>Be a part of Spandana Groups Now!!!</p>
				</header>
				<footer>
					<ul class="buttons">
						<li><a href="register.php" class="button special">Join Spandana Groups</a></li>
						<!--<li><a href="#" class="button">LOL Wut</a></li>
					</ul>
				</footer>
			
			</section>--->

		<!-- Footer -->
			<footer id="footer">
			
				<!---<ul class="icons">
					<li><a href="#" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
					<li><a href="#" class="icon circle fa-github"><span class="label">Github</span></a></li>
					<li><a href="#" class="icon circle fa-dribbble"><span class="label">Dribbble</span></a></li>
				</ul>--->
				
				<span class="copyright">&copy; ILP Innovations. All rights reserved.</span>
			
			</footer>

	</body>
</html>