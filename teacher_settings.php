<?php 
	require_once "include/teacher_secure_header.php";
?>
<html>
<head>
	<title>Tutor Pile | Settings</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
	<style>
	</style>
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}

function teacher_set_page(sid,no)
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
	xmlhttp.open("GET", "teacher_set_page.php?id="+sid+"&no="+no+"", true);
	xmlhttp.send();
}
</script>
</head>
<body>
<div style="float:top;">
<?php
	include("teachers_header_icon.php");
	include("teachers_header_nav_online.php");
	$page_no=$_SESSION['set_page_no'];
?>
</div>
<div class="container" style="z-index:1;">
	<section class="panel">
		 <header class="panel-heading tab-bg-primary clearfix visible-sm clearfix visible-md clearfix visible-lg">
			<ul class="nav nav-tabs"> 
				<li class="<?php if($page_no==1) echo "active";?>" ><a onclick="teacher_set_page('<?php echo $_SESSION['teacher_id'];?>','1')"  data-toggle="tab">Primary</a></li> 
				<li class="<?php if($page_no==2) echo "active";?>"><a onclick="teacher_set_page('<?php echo $_SESSION['teacher_id'];?>','2')" data-toggle="tab">Secondary</a></li>
				<li class="<?php if($page_no==3) echo "active";?>"><a onclick="teacher_set_page('<?php echo $_SESSION['teacher_id'];?>','3')" data-toggle="tab">Password</a></li>
				<li class="<?php if($page_no==4) echo "active";?>"><a onclick="teacher_set_page('<?php echo $_SESSION['teacher_id'];?>','4')" data-toggle="tab">Display_pic</a></li>
			</ul> 
		</header> 
		<header class="panel-heading tab-bg-primary clearfix visible-xs">
			<ul class="nav nav-tabs">
			<li class="<?php if($page_no==1) echo "active";?>" ><a onclick="teacher_set_page('<?php echo $_SESSION['teacher_id'];?>','1')" title="primary" data-toggle="tab"><span class="glyphicon glyphicon-edit"></span></a></li> 
			<li class="<?php if($page_no==2) echo "active";?>"><a onclick="teacher_set_page('<?php echo $_SESSION['teacher_id'];?>','2')" href="#SI" title="secondary settings" data-toggle="tab"><span class="glyphicon glyphicon-pencil"></a></li>
			<li class="<?php if($page_no==3) echo "active";?>"><a onclick="teacher_set_page('<?php echo $_SESSION['teacher_id'];?>','3')" href="#RP" data-toggle="tab"><span class="glyphicon glyphicon-lock"></a></li>
			<li class="<?php if($page_no==4) echo "active";?>"><a onclick="teacher_set_page('<?php echo $_SESSION['teacher_id'];?>','4')" href="#DP" data-toggle="tab"><span class="glyphicon glyphicon-picture"></a></li>
			</ul>
		</header>
		<div class="tab-content" id="set_page"> 
		<?php 
			if($page_no==1) 
				include 'teacher_primary_settings.php';
			if($page_no==2) 
				include 'teacher_secondary_settings.php';
			if($page_no==3) 
				include 'teacher_password_settings.php';
			if($page_no==4) 
				include 'teacher_dp_settings.php';
		?>
		</div>
	</section>
</div>	
</body>
</html>		
