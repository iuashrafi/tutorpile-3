<?php 
	require_once "include/teacher_secure_header.php";
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
	
<script>
function change_notification(data)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {
	xmlhttp=new XMLHttpRequest();
  }
else
  {
	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("inbox").innerHTML=xmlhttp.responseText;
    }
  }
  if(data=="general")
	{
		xmlhttp.open("GET","teacher_general.php",true);
		xmlhttp.send();
	}
	else if(data=="join")
	{
		xmlhttp.open("GET","teacher_joining.php",true);
		xmlhttp.send();
	}
	else if(data=="payments")
	{
		xmlhttp.open("GET","teacher_payments.php",true);
		xmlhttp.send();
	}
	else if(data=="settings")
	{
		xmlhttp.open("GET","teacher_settings_notify.php",true);
		xmlhttp.send();
	}
}
function load_notifications(data,divid,start,end)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById(divid).innerHTML=xmlhttp.responseText;
		}
	  }
	if(data=="general")
	{
	xmlhttp.open("GET","short_pages/teacher_general_page2.php?s="+start+"&e="+end,true);
	xmlhttp.send();
	}
	else if(data=="join")
	{
	xmlhttp.open("GET","short_pages/teacher_joining_page2.php?s="+start+"&e="+end,true);
	xmlhttp.send();
	}
	else if(data=="payments")
	{
	xmlhttp.open("GET","short_pages/teacher_payments_page2.php?s="+start+"&e="+end,true);
	xmlhttp.send();
	}
	else if(data=="settings")
	{
	xmlhttp.open("GET","short_pages/teacher_settings_notify_page2.php?s="+start+"&e="+end,true);
	xmlhttp.send();
	}
}
</script>
</head>
<body>
<?php
	include("teachers_header_icon.php");
	include("teachers_header_nav_online.php");
?>
<div class="container page-height index">
		<div class="row">
			<div class="col-lg-12">
			<br/>
				<ol class="breadcrumb">
					<li><i class="fa fa-tachometer" ></i>&nbsp;<a href="teacher_profile.php">Dashboard</a></li>
					<li><span class="glyphicon glyphicon-bell" ></span>&nbsp;Notifications</li>
				</ol>
			</div>
		</div>
		<div class="row title_of_page">
		<h3><strong><span class="glyphicon glyphicon-bell"></span>&nbsp;Notifications&nbsp;</strong></h3><hr/>
		</div>
		
		<div class="row">
			<!-- left pane-->
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 " style="margin-top:20px;" >
						<div class="mail-profile">
							<div class="mailer-name"> 	
									<h4><strong><?php echo $_SESSION["name"];?></strong></h4>  	 				
									<h6><?php echo $_SESSION["emailid"]; ?></h6>   
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="compose-bottom">
							  <nav class="nav-sidebar">
								<ul class="nav tabs">
								<?php require_once "classes/class_teacher_notiff.php"; $badge=new teacher_notification;?>
								  <li><a href="#" onclick="change_notification('general')" ><span class="glyphicon glyphicon-inbox"></span>General<?php 
								  $gb=$badge->get_gbadge($_SESSION["teacher_id"]);
								  if($gb>0)
									{
										echo "<span style='float:right;' class='badge'>".$gb."</span>";
									}
								  ?><div class="clearfix"></div></a></li>
								  <li><a href="#" onclick="change_notification('join')"><span class="glyphicon glyphicon-link"></span>Joining Requests
								 <?php 
									$jb=$badge->get_jbadge($_SESSION["teacher_id"]);
								  if($jb>0)
									{
										echo "<span style='float:right;' class='badge'>".$jb."</span>";
									}
								 ?></a></li>
								  
								  <li><a href="#"  onclick="change_notification('payments')"><span class="glyphicon glyphicon-credit-card"></span>Payments
								  <?php 
									$pb=$badge->get_pbadge($_SESSION["teacher_id"]);
								  if($pb>0)
									{
										echo "<span style='float:right;' class='badge'>".$pb."</span>";
									}
								 ?><div class="clearfix"></div></a></li>  
								  <li><a href="#" onclick="change_notification('settings')" ><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;&nbsp;Settings
								  <?php 
									$sb=$badge->get_sbadge($_SESSION["teacher_id"]);
								  if($sb>0)
									{
										echo "<span style='float:right;' class='badge'>".$sb."</span>";
									}
								 ?></a></li>                              
								</ul>
							</nav>
						</div>
			</div>
			<!-- right pane -->
			<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
				<br/>
					<div class="panel panel-default" style="min-height:310px;" >
						<div class="panel-body">
							
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;" id="inbox">
									<?php 
										require_once "classes/class_teacher_notiff.php";
										$notify=new teacher_notification();
										$notify->show_gen_notif($_SESSION['teacher_id'],0,5);
									?>
							</div>
						</div>
					</div>
			</div>
		</div>
</div>			
<?php include_once "include/footer.php"; ?>
</body>
</html>