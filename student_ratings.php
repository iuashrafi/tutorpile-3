<?php
	require_once "include/student_secure_header.php";
?>
<html>
<head>
	<title>Tutor Pile | Ratings </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
</head>
<body>
<?php
	include("students_header_icon.php");
	include("students_header_nav_online.php");
?>
<div class="container page-height index">
	<div class="row top-10px">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><i class="fa fa-tachometer" ></i>&nbsp;<a href="student_profile.php">Dashboard</a></li>
				<li><span class="glyphicon glyphicon-star" ></span>&nbsp;Rated Teachers</li>
			</ol>
		</div>
	</div>
	<div class="row">					
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="title_of_page"><h3><strong>Rated Teachers</strong></h3><hr/></div>
			<?php 
					require_once "./classes/class_stud_teacher_ratings.php";
					$ob=new stud_teacher_ratings();
					$ob->display_rated_teachers($_SESSION['student_id']);
			?>		
	</div>
	</div>
</div>	
<?php include_once "./include/footer.php"; ?>
</body>
</html>