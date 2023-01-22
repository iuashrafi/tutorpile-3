<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
	include("classes/connect.php");
	if(isset($_SESSION['name']) || isset($_SESSION['emailid']) || isset($_SESSION['catogory']) || isset($_SESSION['teacher_id']) || isset($_SESSION['tooltip']) || isset($_SESSION['display']))
	{
		if($_SESSION['name']!="" || $_SESSION['emailid']!="" || $_SESSION['catogory']!="" || $_SESSION['teacher_id']!="" || $_SESSION['tooltip']!="" || $_SESSION['display']!="")
		{
		/***********************************************************************/
?>
<html>
<head>
	<title>Tutor Pile | Student_profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
</head>
<body>
STUDENT PROFILE
<?php 
require_once "classes/class_stud_fetch_id.php";
$info=new stud_fetch_id();
$info->fetch_id_primary($_GET['id']);
echo "<br/>".$info->fetch_name();
echo "<br/>".$info->fetch_emailid();
?>			
</body>
</html>
<?php
		echo "<br/><br/><br/><br/><br/><br/><br/>Student details:<br/>";
			echo "Name: ".$_SESSION["name"]."<br/>";
			echo "Emailid: ".$_SESSION["emailid"]."<br/>";
			echo "Category: ".$_SESSION["catogory"]."<br/>";
			echo "Student id: ".$_SESSION["teacher_id"]."<br/>";
		/***********************************************************************/
		}
		else
		{
			unset($_SESSION['name']);
			unset($_SESSION['emailid']);
			unset($_SESSION['catogory']);
			unset($_SESSION['teacher_id']);
			unset($_SESSION['tooltip']);
			unset($_SESSION['display']);
			session_destroy();
			error_log("\nTryed to open the teachers profile page without session being set!",3, "logged errors/e.log");//remove it later
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
		unset($_SESSION['teacher_id']);
		unset($_SESSION['tooltip']);
		unset($_SESSION['display']);
		session_destroy();
		error_log("\nTryed to open the teachers profile page without session being set!",3, "logged errors/e.log");//remove it later
		echo "You need to log in to access this page.";
		mysql_close($con);
		header("location:login.php");
	}
?>