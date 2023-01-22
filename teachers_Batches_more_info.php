<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	session_start();
	require("db and tables/connect.php");
	if(isset($_SESSION['name']) || isset($_SESSION['emailid']) || isset($_SESSION['catogory']) || isset($_SESSION['teacher_id']) || isset($_SESSION['tooltip']) || isset($_SESSION['display']))
	{
		if($_SESSION['name']!="" || $_SESSION['emailid']!="" || $_SESSION['catogory']!="" || $_SESSION['teacher_id']!="" || $_SESSION['tooltip']!="" || $_SESSION['display']!="" )
		{
			?>
			<!--*********************************************************************************************************-->
			<?php
				$B_id=htmlspecialchars($_GET['B_id']);			//real batch id
				$res=mysql_query("SELECT T_uniqueid,Emailid,Unique_user_id,Batch_no,Standard,Batches_id,Batch_Name,Batch_start_year,Batch_end_year FROM teachers_batches_info WHERE Batches_id= '$B_id' AND  Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]'");
				if($r = mysql_fetch_array($res))
				{
					$B_nm=$r['Batch_Name'];				//dont remove it as it is used in class
					$B_no=$r['Batch_no'];				//dont remove it as it is used in class
					$B_sy=$r['Batch_start_year'];		//dont remove it
					$Uui=$r['Unique_user_id'];		//dont remove it as it is used in class
					$Std=$r['Standard'];		//dont remove it as it is used in class
					$B_ey=$r['Batch_end_year'];			//dont remove it
					$B_id=$r['Batches_id'];			//dont remove it as it is used in class
				}
				else
				{
					die('Unable to find the page :' . error_log("\n someone changesd the batch id which was passed through the get function to teachers_Batch_more_info.php page -> ".mysql_error(),3, "logged errors/e.log"));
					mysql_close($con);
				}
			?>
			<!--*********************************************************************************************************-->
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
					<div style="float:top;">
						<?php
							include("classes/class_teacher_student_create.php");
							include("teachers_header_icon.php");
							include("teacher_header_nav_online.php");
						?>
					</div>
					<div class="container index page-height">
						<div class="row " style="margin-top:20px;">
							<div class="col-lg-12">
								<ol class="breadcrumb">
									<li><span class="glyphicon glyphicon-home" ></span>&nbsp;<a href="#">Home</a></li>
									<li><span class="glyphicon glyphicon-list" ></span>&nbsp;<a href="teachers_batches.php">Batches</a></li>
									<li><span class="glyphicon glyphicon-info-sign"></span>&nbsp;<a href="#"><?php echo $B_nm; ?></a></li>
								</ol>
							</div>
						</div>
						<!------------------------------------------------------------------------------------------------>
						<div class="row" style="margin-top:;">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="panel panel-default">
										<header class="panel-heading">
											<b>Create Students </b><i class="glyphicon glyphicon-info-sign " onclick="color:red;" style="color:#b0c4de;"></i>
										</header>
										<div class="panel-body">
												<?php  
												$sname_err= $jyrs_err= $mono_err =$addr_err= $email_err= $school_err="";
												//defining post variables
												$sname=$jyrs=$mono=$email=$school=$addr="";
												if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST["S_submit"]=="S_submit")
												{
													$newstudent= new student;
													$newstudent->set_uui($Uui);
													$newstudent->set_bn($B_no);
													$newstudent->set_bi($B_id);
													$newstudent->set_bname($B_nm);
													$sname_err=$newstudent->set_sname($_POST["sname"]);
													$email_err=$newstudent->set_semail($_POST["email"]);
													$mono_err =$newstudent->set_phno($_POST["mono"]);
													$newstudent->set_std($Std);
													$school_err=$newstudent->set_scl($_POST["school"]);
													$newstudent->set_sjm($_POST["jyrs"]);
													$jyrs_err=$newstudent->set_sjdy($_POST["jyrs"]);
													$addr_err=$newstudent->set_sadd($_POST["addr"]);
													$chk=$newstudent->create_student();
													/*echo $chk;*/				/*system status */
													if( $chk== "created")
													{
														$sname="";
														$jyrs="";
														$mono="";
														$email="";
														$school="";
														$addr="";
													}
													else
													{
														$sname=$_POST["sname"];
														$jyrs=$_POST["jyrs"];
														$mono=$_POST["mono"];
														$email=$_POST["email"];
														$school=$_POST["school"];
														$addr=$_POST["addr"];
													}
												}
											?>
												<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); echo "?B_id=".$B_id;?>" method="post">
													<div class="row top-margin">
														<div class="col-sm-2 col-xs-6">
															<label>Name <span class="text-danger"><?php echo " ".$sname_err;?></span></label>
															<input type="text" Placeholder="Student's name" name="sname" value="<?php echo $sname;?>" class="form-control">
														</div>
														<div class="col-xs-6 col-sm-2">
															<label>Joining  <span class="text-danger"><?php echo " ".$jyrs_err;?></span></label>
															<select name="jyrs" style="max-height:100px;" class="form-control"><?php if($t=$B_sy);else error_log("\n Unable to get the starting year of batche in teachers batche mor info page-> joining year",3, "logged errors/e.log"); ?>
																<?php
																	if($B_sy > date('Y'))
																		$t=$B_sy;
																	else
																		$t=date('Y');
																	echo "<option value='' ";
																		if($jyrs=="")
																		{
																			echo "selected";
																		}
																		echo ">none</option>";/**/
																	for(;$t<=$B_ey;$t++)
																	{
																		echo "<option value=$t.Janurary ";
																		if($jyrs=="$t.Janurary")
																		{
																			echo "selected";
																		}
																		echo ">Janurary, $t</option>";
																		echo "<option value=$t.February ";
																		if($jyrs=="$t.February")
																		{
																			echo "selected";
																		}
																		echo ">February, $t</option>";
																		echo "<option value=$t.March ";
																		if($jyrs=="$t.March")
																		{
																			echo "selected";
																		}
																		echo ">March, $t</option>";
																		echo "<option value=$t.April ";
																		if($jyrs=="$t.April")
																		{
																			echo "selected";
																		}
																		echo ">April, $t</option>";
																		echo "<option value=$t.May ";
																		if($jyrs=="$t.May")
																		{
																			echo "selected";
																		}
																		echo ">May, $t</option>";
																		echo "<option value=$t.June ";
																		if($jyrs=="$t.June")
																		{
																			echo "selected";
																		}
																		echo ">June, $t</option>";
																		echo "<option value=$t.July ";
																		if($jyrs=="$t.July")
																		{
																			echo "selected";
																		}
																		echo ">July, $t</option>";
																		echo "<option value=$t.August ";
																		if($jyrs=="$t.August")
																		{
																			echo "selected";
																		}
																		echo ">August, $t</option>";
																		echo "<option value=$t.September ";
																		if($jyrs=="$t.September")
																		{
																			echo "selected";
																		}
																		echo ">September, $t</option>";
																		echo "<option value=$t.October ";
																		if($jyrs=="$t.October")
																		{
																			echo "selected";
																		}
																		echo ">October, $t</option>";
																		echo "<option value=$t.November ";
																		if($jyrs=="$t.November")
																		{
																			echo "selected";
																		}
																		echo ">November, $t</option>";
																		echo "<option value=$t.December ";
																		if($jyrs=="$t.December")
																		{
																			echo "selected";
																		}
																		echo ">December, $t</option>";
																	}
																?>
															</select>
														</div>
														<div class="col-xs-6 col-sm-2 ">
															<label>Mobile no. <span class="text-danger"><?php echo " ".$mono_err;?></span></label>
															<input type="text" Placeholder="Student's number" value="<?php echo $mono;?>" name="mono" class="form-control">
														</div>
														<div class="col-xs-6 col-sm-2 ">
															<label>Email id <span class="text-danger"><?php echo " ".$email_err;?></span></label>
															<input type="text" Placeholder="Student's(optional)" value="<?php echo $email;?>" name="email" class="form-control">
														</div>
														<div class="col-xs-6 col-sm-2 top-margin">
															<label>School<span class="text-danger"><?php echo " ".$school_err;?></span></label>
															<input type="text" Placeholder="School's name" value="<?php echo $school;?>" name="school" class="form-control">
														</div>
														<div class="col-xs-6 col-sm-2 top-margin">
															<label>Address<span class="text-danger"><?php echo " ".$addr_err;?></span></label>
															<input type="text" Placeholder="residential address" value="<?php echo $addr;?>" name="addr" class="form-control">
														</div>
														<div>
															<div class="col-sm-9" style="float:left; margin-top:25px;">
																fill up all the details of the students and press <b>Ok</b>.
															</div>
															<div class="col-sm-1" style="float:right; margin-top:25px;">
																<button class="btn btn-action btn-smit" title="Create Students" name="S_submit" value="S_submit" type="submit"><span class="glyphicon glyphicon-ok"></span></button>
															</div>
														</div>
													</div>
												</form>
										</div>
								</div>
							</div>
						</div>
						<!------------------------------------------------------------------------------------------------>
						<div class="row">
							<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
								<section class="panel"  style="overflow-x:scroll;">
									<header class="panel-heading" style="color:yellowgreen;">
										<b><h3>Your Students</h3></b>
										<hr>
									</header>
									<table class="table table-striped table-advance table-hover">
										<div class="row">
											<tr>
												<th><i class="icon_profile"></i> Students Name</th>
												<th class="clearfix visible-sm clearfix visible-md clearfix visible-lg"><i class="icon_mobile"></i> Standard</th>
												<th><i class="icon_pin_alt"></i> Mobile no.</th>
												<th><i class="icon_mail_alt"></i> School</th>
												<th><i class="icon_cogs"></i> Action</th>
											</tr>
										</div>
										<div class="">
											<?php
												$astud=0;
												$result_94 = mysql_query("SELECT * FROM teachers_students_info WHERE Batches_id= '$B_id' AND Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]' ORDER BY Students_Name ASC");
												while($row94= mysql_fetch_array($result_94))
												{
													$astud++;
													$C= $row94['Students_Deleted'];
													if(!empty($row94['Batches_id']) && !empty($row94['Students_id']) && $C=="no" && $row94['Emailid'] = '$_SESSION[emailid]' && $row94['T_uniqueid'] = '$_SESSION[teacher_id]')
													{
														require("Student_row.php");
													}
												}
											?>
										</div>
									</table>
									<?php
										if($astud==0)
										{
											echo "<br/>No, student created yet.<br/>";
											echo "Please, create student in this batch.";
										}
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
			<!--*********************************************************************************************************-->
			<?php
			mysql_close($con);
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
			error_log("\nTryed to open the teachers batch more info page session set but the values are null!",3, "logged errors/e.log");//remove it later
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
		error_log("\nTryed to open the teachers batch more info page without session being set!",3, "logged errors/e.log");//remove it later
		echo "You need to log in to access this page.";
		mysql_close($con);
		header("location:login.php");
	}
?>