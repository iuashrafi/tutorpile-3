<?php
	require_once "include/student_secure_header.php";
?>
<html>
<head>
	<title>Tutor Pile | Settings</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.form.js"></script> <!-- for uploading dp -->
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
function set_page(sid,no)
{
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
		document.getElementById("set_page").innerHTML=xmlhttp.responseText;
		}
	  }
	  xmlhttp.open("GET", "student_set_page.php?no="+no, true);
	xmlhttp.send();
}
</script>
</head>
<body>
<?php
	include("students_header_icon.php");
	include("students_header_nav_online.php");
?>
<div class="container index page-height">
	<div class="row">
		<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
		<section class="panel">
		<?php 
		require_once "classes/class_stud_set_page.php";	
		$page_no=$_SESSION['set_page_no'];
		?>
		 <header class="panel-heading tab-bg-primary clearfix visible-sm clearfix visible-md clearfix visible-lg">
			<ul class="nav nav-tabs"> 
				<li class="<?php if($page_no==1) echo 'active'?>" ><a onclick="set_page('<?php echo $_SESSION['student_id'];?>','1')" data-toggle="tab">Primary</a></li> 
				<li class="<?php if($page_no==2) echo 'active'?>"><a onclick="set_page('<?php echo $_SESSION['student_id'];?>','2')" data-toggle="tab">Secondary</a></li>
				<li class="<?php if($page_no==3) echo 'active'?>"><a onclick="set_page('<?php echo $_SESSION['student_id'];?>','3')" data-toggle="tab">Password</a></li>
				<li class="<?php if($page_no==4) echo 'active'?>"><a onclick="set_page('<?php echo $_SESSION['student_id'];?>','4')" data-toggle="tab">Display_pic</a></li>
			</ul> 
		</header>
		 <header class="panel-heading tab-bg-primary clearfix visible-xs">
			<ul class="nav nav-tabs">
			<li class="<?php if($page_no==1) echo 'active'?>" ><a onclick="set_page('<?php echo $_SESSION['student_id'];?>','1')" title="Primary settings" data-toggle="tab"><span class="glyphicon glyphicon-edit"></span></a></li> 
			<li class="<?php if($page_no==2) echo 'active'?>"><a onclick="set_page('<?php echo $_SESSION['student_id'];?>','2')" title="Secondary settings" data-toggle="tab"><span class="glyphicon glyphicon-pencil"></a></li>
			<li class="<?php if($page_no==3) echo 'active'?>"><a onclick="set_page('<?php echo $_SESSION['student_id'];?>','3')" title="Reset password" data-toggle="tab"><span class="glyphicon glyphicon-lock"></a></li>
			<li class="<?php if($page_no==4) echo 'active'?>"><a onclick="set_page('<?php echo $_SESSION['student_id'];?>','4')" title="Display picture" data-toggle="tab"><span class="glyphicon glyphicon-picture"></a></li>
			</ul>
		</header> 
		<div class="tab-content" id="set_page"> 
				 <?php
					if($page_no==1) 
						include 'student_primary_settings.php';
					if($page_no==2) 
						include 'student_secondary_settings.php';
					if($page_no==3) 
						include 'student_password_settings.php';
					if($page_no==4) 
						include 'student_dp_settings.php';
				?>
		</div> 
		</section>
		</div>
	</div>
</div>
<?php include_once "./include/footer.php"; ?>
</body>
</html>		