<?php 
	require_once "include/teacher_secure_header.php";
?>
<html>
<head>
	<title>Tutor Pile | Ratings</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
</head>
<body>

<div style="float:top;">
<?php
	include("teachers_header_icon.php");
	include("teachers_header_nav_online.php");
	$page_no=$_SESSION['set_page_no'];
?>
</div>
<div class="container page-height index">	
<div class="row">
			<div class="col-lg-12">
			<br/>
				<ol class="breadcrumb">
					<li><i class="fa fa-tachometer" ></i>&nbsp;<a href="teacher_profile.php">Dashboard</a></li>
					<li><span class="glyphicon glyphicon-star star-color"  ></span>&nbsp;Ratings</li>
				</ol>
			</div>
		</div>				
	<div class="row">					
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="title_of_page" style="margin-top:30px;"><h3><strong>Ratings</strong></h3><hr/></div>	
		</div>
	</div>
	<div class="row">					
		<div class="col-xs-12 col-sm-10 col-md-8 col-lg-8 col-lg-offset-2  col-sm-offset-1 col-md-offset-2" style="background-color:;">
			<table class="table table-hover " style="border:1px solid #DDDDDD;background-color:;"><tbody>
				<?php 
					require_once "classes/class_stud_teacher_ratings.php";
					$ob=new stud_teacher_ratings();
					$ob->display_rated_students($_SESSION["teacher_id"]);
				?>
			</tbody>
			</table>
		</div>
	</div>
</div>
<?php include_once "include/footer.php"; ?>
</body>
</html>