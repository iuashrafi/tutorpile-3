<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<?php
	session_start();
	require("classes/connect.php");
	if(isset($_SESSION['name']) || isset($_SESSION['emailid']) || isset($_SESSION['catogory']) || isset($_SESSION['teacher_id']) || isset($_SESSION['tooltip']) || isset($_SESSION['display']))
	{
		if($_SESSION['name']!="" || $_SESSION['emailid']!="" || $_SESSION['catogory']!="" || $_SESSION['teacher_id']!="" || $_SESSION['tooltip']!="" || $_SESSION['display']!="")
		{
			/***********************************************************************/
			?>
			<html>
			<head>
				<title>Tutor Piles</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
				<link href="css/font-awesome.css" rel="stylesheet">
				<link href="css/bootstrap.min.css" rel="stylesheet">
				<script src="js/jquery.min.js"></script>    <!---remove this page and search for an alternative---->
				<script src="js/bootstrap.min.js"></script>		<!---remove this page and search for an alternative---->
				<link rel="stylesheet" href="style sheet/style.css" type="text/css">
			</head>
			<body>
					<?php
						require_once("classes/class_teacher_batch.php");
						include_once("teachers_header_icon.php");
						include_once("teacher_header_nav_online.php");
					?>
				<div class="container index page-height">
					<div class="row " style="margin-top:20px;">
						<div class="col-lg-12">
							<ol class="breadcrumb">
								<li><i class="fa fa-tachometer" ></i>&nbsp;<a href="teacher_profile.php">Dasboard</a></li>
								<li><i class="fa fa-users" ></i>&nbsp;<a href="#">Batch</a></li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0" style="margin-top:10px;">
							<div class="panel panel-default">
								<header class="panel-heading">
								<b>Create Batches </b><i class="glyphicon glyphicon-info-sign " onclick="color:red;" style="color:#b0c4de;"></i>
								</header>
								<div class="panel-body">
								<?php  
									$bname_err= $syrs_err= $eyrs_err =$addr_err= $standard_err="";
									$decide="NOT ALLOWED";
									//defining post variables
									$bname=$syrs=$eyrs=$standard=$addr="";
									if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST["B_submit"]=="B_submit" && $decide=="NOT ALLOWED")
									{
										$newbatch = new batch;
										$bname_err=$newbatch->set_bname($_POST["bname"]);
										$syrs_err=$newbatch->set_syears($_POST["syrs"]);
										$eyrs_err=$newbatch->set_eyears($_POST["eyrs"]);
										$standard_err=$newbatch->set_standard($_POST["standard"]);
										$addr_err=$newbatch->set_address($_POST["addr"]);
										$chk=$newbatch->create_batch();
										if( $chk== "created")
										{
											$bname="";
											$syrs="";
											$eyrs="";
											$standard="";// some error in standard
											$addr="";
										}
										else
										{
											$bname=$_POST["bname"];
											$syrs=$_POST["syrs"];
											$eyrs=$_POST["eyrs"];
											$standard=$_POST["standard"];
											$addr=$_POST["addr"];
										}
									}
								?>
									<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
										<div class="row top-margin">
											<div class="col-sm-3">
												<label>Batch Name <span class="text-danger"><?php echo " ".$bname_err;?></span></label>
												<input type="text" name="bname" value="<?php echo $bname;?>" class="form-control">
											</div>
											<div class="col-xs-4 col-sm-2">
												<label>Starting <span class="text-danger"><?php echo " ".$syrs_err;?></span></label>
												<select name="syrs"  class="form-control"><?php if($t=date('Y'));else error_log("\n Unable to get the year in teachers batche page-> starting year",3, "logged errors/e.log"); ?>
													<option value="" <?php if($syrs=="") echo "selected";?>>year</option>
													<option value="<?php echo $t;?>" <?php if($syrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($syrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($syrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($syrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($syrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($syrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($syrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($syrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($syrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($syrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($syrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
												</select>
											</div>
											<div class="col-xs-4 col-sm-2 ">
												<label>Ending <span class="text-danger"><?php echo " ".$eyrs_err;?></span></label>
												<select name="eyrs"  class="form-control"><?php if($t=date('Y'));else error_log("\n Unable to get the year in teachers batche page-> ending year",3, "logged errors/e.log"); ?>
													<option value="" <?php if($eyrs=="") echo "selected";?>>year</option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t;?></option>
												</select>
											</div>
											<div class="col-xs-4 col-sm-2 ">
												<label>Standard <span class="text-danger"><?php echo " ".$standard_err;?></span></label>
												<select name="standard"  class="form-control">
													<option value="" <?php if($standard=="") echo "selected";?>>select class</option>
													<option value="junior" <?php if($standard=="junior") echo "selected";?>>junior</option>
													<option value="class I" <?php if($standard=="class I") echo "selected";?>>class I</option>
													<option value="class II" <?php if($standard=="class II") echo "selected";?>>class II</option>
													<option value="class III" <?php if($standard=="class III") echo "selected";?>>class III</option>
													<option value="class IV" <?php if($standard=="class IV") echo "selected";?>>class IV</option>
													<option value="class V" <?php if($standard=="class V") echo "selected";?>>class V</option>
													<option value="class VI" <?php if($standard=="class VI") echo "selected";?>>class VI</option>
													<option value="class VII" <?php if($standard=="class VII") echo "selected";?>>class VII</option>
													<option value="class VIII" <?php if($standard=="class VIII") echo "selected";?>>class VIII</option>
													<option value="class IX" <?php if($standard=="class IX") echo "selected";?>>class IX</option>
													<option value="class X" <?php if($standard=="class X") echo "selected";?>>class X</option>
													<option value="class XI" <?php if($standard=="class XI") echo "selected";?>>class XI</option>
													<option value="class XII" <?php if($standard=="class XII") echo "selected";?>>class XII</option>
													<option value="Others" <?php if($standard=="Others") echo "selected";?>>Others</option>
												</select>
											</div>
											<div class=" col-sm-3 top-margin">
												<label>Address <span class="text-danger"><?php echo " ".$addr_err;?></span></label>
												<input type="text" Placeholder="coaching/teaching center address" value="<?php echo $addr;?>" name="addr" class="form-control">
											</div>
											<div class="col-sm-1" style="float:right; margin-top:25px;">
												<button class="btn btn-action btn-smit" title="Create Batche" name="B_submit" value="B_submit" type="submit"><span class="glyphicon glyphicon-ok"></span></button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				<!----batch creation---->
					<div class="row">
						<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
							<section class="panel"  style="overflow-x:scroll;"><!-- style="overflow-x:scroll;"--->
								<header class="panel-heading" style="color:yellowgreen;">
									<b><h3>Your Batches</h3></b>
									<hr>
								</header>
								<table class="table table-striped table-advance table-hover ">
									<div class="row">
										<tr>
											<th><i class="icon_profile"></i> Batch Name</th>
											<th><i class="icon_mobile"></i> Year</th>
											<th class="hidden-xs"><i class="icon_pin_alt"></i> Address</th>
											<th><i class="icon_mail_alt"></i> Students</th>
											<th><i class="icon_calendar"></i> Standard</th>
											<th><i class="icon_cogs"></i> Action</th>
										</tr>
									</div>
									<div class="row ">
										<?php	//just display the batches here
											$s=0;
											$display_batch = mysql_query("SELECT * FROM teachers_batches_info WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid = '$_SESSION[teacher_id]' ORDER BY Batch_Name ASC");
											while($row84= mysql_fetch_array($display_batch))
											{
												$s++;
												$C= $row84['Batch_Deleted'];
												if(!empty($row84['Batches_id']) && strtolower($C)=="no" && $row84['Emailid'] = '$_SESSION[emailid]')
												{
													include("Batch_row.php");
												}
											}
										?>
									</div>
								</table>
								<?php
									if($s==0)
									{
										echo "<p>No batche created yet </p>";
										echo "<p>Please, create new batche </p>";
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
			error_log("\nTryed to open the teachers batch page with session set but the values are null",3, "logged errors/e.log");//remove it later
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