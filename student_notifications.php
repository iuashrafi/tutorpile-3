<?php
	require_once "include/student_secure_header.php";
?>
<html>
<head>
	<title>Tutor Pile | Notifications</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
	<link rel="stylesheet" href="style sheet/style_notification_page.css" type="text/css">
	<link rel="shortcut icon" href="system img/favicon.png"> 
	 <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
	
<script src="style sheet/snotify.js"></script>
</head>
<body>
<div style="float:top;">
<?php
	include("students_header_icon.php");
	include("students_header_nav_online.php");
?>
</div>
<div class="container index page-height">
		<div class="row" >
			<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
			<br/>
				<ol class="breadcrumb">
					<li><i class="fa fa-tachometer" ></i>&nbsp;<a href="student_profile.php">Dashboard</a></li>
					<li><span class="glyphicon glyphicon-bell" ></span>&nbsp;Notifications</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-lg-12 title_of_page">
			<h2><strong><span class="glyphicon glyphicon-bell"></span>&nbsp;Notifications&nbsp;</strong></h2><hr/>
			</div>
		</div>
		<!-- left pane reinvent -->
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-4 "> 
					<div class="mail-profile">
							<div class="mailer-name"> 	
									<h4><strong><?php echo $_SESSION["name"];?></strong></h4>  	 				
									<h6><?php echo $_SESSION["emailid"]; ?></h6>   
							</div>
							<div class="clearfix"> </div>
					</div>
					<div class="compose-bottom">
							  <nav class="nav-sidebar">
								<ul class="nav tabs">
								<?php require_once "classes/class_stud_notif.php"; $badge=new stud_notification;?>
								  <li><a href="#" onclick="change_notification('general')" ><span class="glyphicon glyphicon-inbox"></span>General<?php 
								  $gb=$badge->get_gbadge($_SESSION["student_id"]);
								  if($gb>0)
									{
										echo "<span style='float:right;' class='badge'>".$gb."</span>";
									}
								  ?><div class="clearfix"></div></a></li>
								  <li><a href="#" onclick="change_notification('join')"><span class="glyphicon glyphicon-link"></span>Joining Requests
								 <?php 
									$jb=$badge->get_jbadge($_SESSION["student_id"]);
								  if($jb>0)
									{
										echo "<span style='float:right;' class='badge'>".$jb."</span>";
									}
								 ?></a></li>
								  
								  <li><a href="#"  onclick="change_notification('payments')"><span class="glyphicon glyphicon-credit-card"></span>Payments
								  <?php 
									$pb=$badge->get_pbadge($_SESSION["student_id"]);
								  if($pb>0)
									{
										echo "<span style='float:right;' class='badge'>".$pb."</span>";
									}
								 ?><div class="clearfix"></div></a></li>  
								  <li><a href="#" onclick="change_notification('settings')" ><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;&nbsp;Settings
								  <?php 
									$sb=$badge->get_sbadge($_SESSION["student_id"]);
								  if($sb>0)
									{
										echo "<span style='float:right;' class='badge'>".$sb."</span>";
									}
								 ?></a></li>                              
								</ul>
							</nav>
						</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-9 col-lg-8" style="background-color:;">
					<div class="panel panel-default">
						<div class="panel-body" style="min-height:310px;">
							<!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div style="float:left;">
										<div class="btn  btn-default" onclick="">
										   <i class="fa fa-refresh"> </i>
										</div>
								</div>
								<div style="float:right;">
								<span class="text-muted ">Showing 20 of 346 </span>
								<div class="btn-group">
										<a class="btn btn-default"><i class="fa fa-angle-left"></i></a>
										<a class="btn btn-default"><i class="fa fa-angle-right"></i></a>
								</div>
								</div>
							</div> -->
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;" id="inbox">
									<?php 
										require_once "classes/class_stud_notif.php";
										$notify=new stud_notification();
										$notify->show_gen_notif($_SESSION['student_id'],0,5);
									?>
							</div>
						</div>
					</div>
			</div>
		</div>
</div>
<?php include_once "./include/footer.php"; ?>
</body>
</html>