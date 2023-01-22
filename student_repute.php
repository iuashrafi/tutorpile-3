<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
	require_once("classes/connect.php");
	if(isset($_SESSION['name']) || isset($_SESSION['emailid']) || isset($_SESSION['catogory']) || isset($_SESSION['student_id']) || isset($_SESSION['tooltip']) || isset($_SESSION['display']))
	{
		if($_SESSION['name']!="" || $_SESSION['emailid']!="" || $_SESSION['catogory']!="" || $_SESSION['student_id']!="" || $_SESSION['tooltip']!="" || $_SESSION['display']!="")
		{
			/***********************************************************************/   
?>
<html>
<head>
	<title>Tutor Pile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
	<style type="text/css">
	</style>
</head>
<body>

<div class="container" style="z-index:1">
	<div class="row " style="margin-top:10px;">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><span class="glyphicon glyphicon-home" ></span>&nbsp;<a href="student_profile.php">Home</a></li>
				<li><span class="glyphicon glyphicon-thumbs-up" ></span>&nbsp;Liked Teachers</li>
			</ol>
		</div>
	</div>


	<div class="row">					
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div style="background-color:;color:Yellowgreen;margin-top:30px;"><h2><strong>Teachers you have Liked</strong></h2><hr/></div>
							

							<!-- Displaying the comment-->
							<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
								<section class="panel panel-default">
								  <div class="panel-heading "><strong>Name of the teacher</strong></div>
								  <div class="panel-body alert-info">
									Qualifications
									<div style="margin-top:5px;">
										<a id="remove-all" class="btn btn-danger btn-sm" onclick=""  
										style="float:left;margin-left:5px;">
										<span class='glyphicon glyphicon-star'></span> 
										<span class='glyphicon glyphicon-star'></span> 
										<span class='glyphicon glyphicon-star'></span> 
										<span class='glyphicon glyphicon-star'></span> 
										<span class='glyphicon glyphicon-star'></span> 
										</a>
										
										<a id='remove-all' class='btn btn-primary btn-sm' href='view_profile.php' style='float:right;margin-left:5px;'>
										&nbsp;<span class='glyphicon glyphicon-eye-open'></span>&nbsp;
										</a>
										<a id='remove-all' class='btn btn-primary btn-sm' href='view_profile.php' style='float:right;margin-left:5px;'>
										&nbsp;<span class='glyphicon glyphicon-pencil'></span>&nbsp;
										</a>
									</div>
								  </div>
								  
								</section>
							</div>
								
	</div>
	</div>

</div>	

</body>
</html>
<?php 
			echo "<br/><br/><br/><br/><br/><br/><br/>Student details:<br/>";
			echo "Name: ".$_SESSION["name"]."<br/>";
			echo "Emailid: ".$_SESSION["emailid"]."<br/>";
			echo "Category: ".$_SESSION["catogory"]."<br/>";
			echo "Student id: ".$_SESSION["student_id"]."<br/>";
			
			
			/***********************************************************************/
		}
		else
		{
			unset($_SESSION['name']);
			unset($_SESSION['emailid']);
			unset($_SESSION['catogory']);
			unset($_SESSION['student_id']);
			unset($_SESSION['tooltip']);
			unset($_SESSION['display']);
			session_destroy();
			error_log("\nTried to open the student pro page without session being set!",3, "logged errors/e.log");//remove it later
			echo "You need to log in to access this page.";
			mysql_close($con);
			header("location:login.php");
		}
	}
	else
	{
		unset($_SESSION['name']);
		unset($_SESSION['emailid']);
		unset($_SESSION['catogory']);
		unset($_SESSION['student_id']);
		unset($_SESSION['tooltip']);
		unset($_SESSION['display']);
		session_destroy();
		error_log("\nTried to open the student pro page without session being set!",3, "logged errors/e.log");//remove it later
		echo "You need to log in to access this page.";
		mysql_close($con);
		header("location:login.php");
	}
?>