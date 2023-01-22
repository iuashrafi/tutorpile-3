<?php 
	require_once "include/teacher_secure_header.php";
?>
<html>
<head>
	<title>Tutor Pile | Linked Students</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
	<script src="style sheet/teacher_custom.js"></script>
</head>
<body>
<?php
	include("teachers_header_icon.php");
	include("teachers_header_nav_online.php");
?>
<div class="container page-height index" >		
		<div class="row">
			<div class="col-lg-12">
			<br/>
				<ol class="breadcrumb">
					<li><i class="fa fa-tachometer" ></i>&nbsp;<a href="teacher_profile.php">Dashboard</a></li>
					<li><span class="glyphicon glyphicon-link" ></span>&nbsp;Linked students</li>
				</ol>
			</div>
		</div>			
	<div class="row">					
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="title_of_page" style="margin-top:30px;"><h3><strong>Linked Students</strong></h3><hr/></div>
				<?php
				require_once "classes/class_teacher_stud_link.php";
				$link=new teacher_stud_link();
				$link->display_linked_students($_SESSION['teacher_id']);
				?>
	</div>
	</div>
</div>
<?php include_once "include/footer.php"; ?>
</body>
</html>