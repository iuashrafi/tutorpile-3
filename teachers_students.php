<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
	require("db and tables/connect.php");
	if(isset($_SESSION['name']) || isset($_SESSION['emailid']) || isset($_SESSION['catogory']) || isset($_SESSION['teacher_id']) || isset($_SESSION['tooltip']) || isset($_SESSION['display']))
	{
		if($_SESSION['name']!="" || $_SESSION['emailid']!="" || $_SESSION['catogory']!="" || $_SESSION['teacher_id']!="" || $_SESSION['tooltip']!="" || $_SESSION['display']!="")
		{
			/***********************************************************************/
			?>
			<html>
			<head>
				<title>Tutor Pile</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
				<link href="css/bootstrap.min.css" rel="stylesheet"> 
				<link rel="stylesheet" href="style sheet/style.css" type="text/css">
				<script src="js/jquery.min.js"></script>    <!---remove this page and search for an alternative---->
				<script src="js/bootstrap.min.js"></script>		<!---remove this page and search for an alternative---->
			</head>
			<body>
				
		<?php
			include("teachers_header_icon.php");
			include("teacher_header_nav_online.php");
		?>
	<div class="container index page-height" >
		<div class="row " style="margin-top:20px;">
			<div class="col-lg-12">
				<ol class="breadcrumb">
					<li><i class="fa fa-tachometer" ></i>&nbsp;<a href="teacher_profile.php">Dashboard</a></li>
					<li><i class="fa fa-users" ></i>&nbsp;Students</li>
				</ol>
			</div>
		</div>
						<!------------------------------------------------------------------------------------------------>
						<div class="row">
							<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
								<section class="panel"  style="overflow-x:scroll;">
									<header class="panel-heading" style="color:yellowgreen;">
										<b><h3>Your Students Record</h3></b>
										<hr>
									</header>
									<table class="table table-striped table-advance table-hover">
										<div class="row">
											<tr>
												<th><i class="icon_calendar"></i> Students Name</th>
												<th><i class="icon_profile"></i> Batch Name</th>
												<th class="clearfix visible-sm clearfix visible-md clearfix visible-lg"><i class="icon_mobile"></i> Standard</th>
												<th><i class="icon_pin_alt"></i> Mobile no.</th>
												<th><i class="icon_mail_alt"></i> School</th>
												<th><i class="icon_cogs"></i> Action</th>
											</tr>
										</div>
										<div class="row ">
											<?php
												$nos=0;
												$result_94 = mysql_query("SELECT * FROM teachers_students_info WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid = '$_SESSION[teacher_id]' ORDER BY Students_Name ASC");
												while($row94= mysql_fetch_array($result_94))
												{
													$nos++;
													$result78 = mysql_query("SELECT Batches_id,Batch_Name,Emailid FROM teachers_batches_info
													WHERE Emailid = '$_SESSION[emailid]' AND Batches_id = '$row94[Batches_id]'");
													$row78 = mysql_fetch_array($result78);
													if(!empty($row78))
													  {
														$BN=$row78['Batch_Name'];
													  }
													$C= $row94['Students_Deleted'];
													if(!empty($row94['Batches_id']) && !empty($row78['Batch_Name']) && !empty($row94['Students_id']) && $C=="no" && $row94['Emailid'] = '$_SESSION[emailid]' )
													{
														require("Student_row_combo.php");
													}
												}
											?>
										</div>
									</table>
									<?php
										if($nos==0)
										echo "<br/> No, student created yet. <br/>";
										echo " Please, Create Student first by clicking <a href='teachers_Batches.php'>here</a>.";
									?>
								</section>
							</div>
						</div>
					</div>
					<div style="float:bottom;margin-top:20px;">
						<?php
							include("./include/footer.php");
						?>
					</div>
				</body>
			</html>
			<?php
			mysql_close($con);
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
			error_log("\nTryed to open the teachers batch page with session set but the session was empty!",3, "logged errors/e.log");//remove it later
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
		error_log("\nTryed to open the teachers batch page without session being set!",3, "logged errors/e.log");//remove it later
		echo "You need to log in to access this page.";
		mysql_close($con);
		header("location:login.php");
	}
?>