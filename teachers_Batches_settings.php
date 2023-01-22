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
				$B_id=htmlspecialchars($_GET['B_id']);			//real batch id
				$res=mysql_query("SELECT * FROM teachers_batches_info WHERE Batches_id= '$B_id' AND  Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]'");
				if($r = mysql_fetch_array($res))
				{
					$B_nm=$r['Batch_Name'];				
					$B_no=$r['Batch_no'];				
					$B_sy=$r['Batch_start_year'];		
					$Uui=$r['Unique_user_id'];		//dont remove it
					$Std=$r['Standard'];		
					$B_ey=$r['Batch_end_year'];			
					$B_id=$r['Batches_id'];		
					$B_cd=$r['Batch_Created_Date'];		
					$B_nd=$r['No_Of_day'];		
					$B_ns=$r['No_Of_Student'];		
					$B_nf=$r['Batch_Notification'];		
					$B_fees=$r['Batch_Fees'];		
					$B_a=$r['Batch_Address'];		
				}
				else
				{
					die('Unable to find the page error : TWE_TBS01' . error_log("\n someone changesd the batch id which was passed through the get function to teachers_Batches_settings.php page -> ".mysql_error(),3, "logged errors/e2.log"));
					mysql_close($con);
				}
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
				<div style="float:top;">
					<?php
						include("teachers_header_icon.php");
						include("teacher_header_nav_online.php");
					?>
				</div>
				<?php  
				$bname= $B_nm;
				$fee= $B_fees;
				$eyrs = $B_ey;
				$noti= $B_nf;
				$cpw=$B_nd;
				$addr= $B_a;
				$standard=$Std;
				$decide="NOT ALLOWED";
				//defining post variables
				$bname_err=$fee_err=$eyrs_err=$standard_err=$noti_err=$cpw_err=$addr_err="";
				if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["BU_submit"]))
				{
					function trimer($data)
					{
						$data=trim($data);
						$date=stripslashes($data);
						$data=htmlspecialchars($data);
						return $data;
					}
					if(empty($_POST["bname"]))
					{
						$bname="";
					}
					else
					{
						$bname=trimer($_POST["bname"]);
						if(!preg_match("/^([a-zA-Z0-9À-ÿ-' ]+)$/",$bname))
						{
							$bname_err=" invalid";
							$bname=$B_nm;
						}
					}
					if(empty($_POST["fee"]))
					{
						$fee="";
					}
					else
					{
						$fee=trimer($_POST["fee"]);
						if(!filter_var($fee, FILTER_VALIDATE_INT))
						{
							$fee_err="invalid";
						}
					}
					if(empty($_POST["cpw"]))
					{
						$cpw="";
					}
					else
					{
						$cpw=trimer($_POST["cpw"]);
						if(!filter_var($cpw, FILTER_VALIDATE_INT))
						{
							$cpw_err="invalid";
						}
					}
					if(empty($_POST["eyrs"]))
					{
						$eyrs="";
					}
					else
					{
						$eyrs=trimer($_POST["eyrs"]);
						if(!filter_var($eyrs, FILTER_VALIDATE_INT))
						{
							$eyrs_err="invalid";
						}
					}
					if(empty($_POST["noti"]))
					{
						$noti="";
					}
					else
					{
						$noti=trimer($_POST["noti"]);
						if($noti != "On" && $noti != "Off")
						{
							$noti_err=" invalid";
						}
					}
					if(empty($_POST["standard"]))
					{
						$standard="";
					}
					else
					{
						$standard=trimer($_POST["standard"]);
					}
					if(empty($_POST["addr"]))
					{
						$addr="";
					}
					else
					{
						$addr=trimer($_POST["addr"]);
						if(preg_match("/^[?&$#^!@]*$/",$addr))
						{
							$addr_err=" invalid";
						}
					}
					if($bname_err==$fee_err && $fee_err==$eyrs_err && $eyrs_err==$addr_err && $addr_err==$standard_err && $standard_err==$cpw_err && $cpw_err==$noti_err && $noti_err=="" )
					{
						$decide="ALLOWED";
					}
					if($decide=="ALLOWED")
					{
						$count=0;
						if($bname=="" || $bname==" ")
						{
							$bname=$B_nm;
							$count++;
						//	echo " bname ";
						}
						if($fee=="" || $fee==" ")
						{
							$fee=$B_fees;
							$count++;
						//	echo " fee ";
						}
						if($eyrs=="" || $eyrs==" ")
						{
							$eyrs=$B_ey;
							$count++;
						//	echo " eyrs ";
						}
						if($addr=="" || $addr==" ")
						{
							$addr=$B_a;
							$count++;
						//	echo " addr ";
						}
						if($standard=="" || $standard==" ")
						{
							$standard=$Std;
							$count++;
						//	echo " standard ";
						}
						if($cpw=="" || $cpw==" ")
						{
							$cpw=$B_nd;
							$count++;
						//	echo " cpw ";
						}
						if($noti=="" || $noti==" ")
						{
							$noti=$B_nf;
							$count++;
						//	echo " noti ";
						}
						if($count <=5)
						{
							/*echo "count = ".$count;*/
							if(mysql_query("UPDATE teachers_batches_info
								SET Batch_Name = '$bname', Batch_Fees= '$fee', Batch_end_year= '$eyrs', No_Of_day= '$cpw', Batch_Notification= '$noti', Batch_Address= '$addr', Standard= '$standard' 
								WHERE Emailid = '$_SESSION[emailid]' AND Batches_id = '$B_id' AND T_uniqueid = '$_SESSION[teacher_id]' "))
							{
								/***********************************************/
								/* make the new payment row here when the ending date is increased in the next version of the tutorsweb*/
									$display_batch = mysql_query("SELECT Unique_user_id,Emailid,T_uniqueid,Batches_id,Batch_no,Students_Deleted,Students_Name,Students_id,Students_Fees FROM teachers_students_info WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid = '$_SESSION[teacher_id]' AND Batches_id = '$B_id'");
									while($row84= mysql_fetch_array($display_batch))
									{
										$d= $row84['Students_Deleted'];
										$Unique_ui= $row84['Unique_user_id'];
										$Batch_no= $row84['Batch_no'];
										$Student_id= $row84['Students_id'];
										if(!empty($row84['Batches_id']) && strtolower($d)=="no" && $row84['Emailid'] = '$_SESSION[emailid]')
										{
											$j=(int)$B_sy;
											while($j<=$eyrs)
											{
												/*firt check and then update payment table here*/
												$check_stud = mysql_query("SELECT Emailid,T_uniqueid,Batches_id,Students_id,Payment_Year,Default_Payment_Amount FROM teachers_payments_info WHERE Emailid = '$_SESSION[emailid]' AND Batches_id = '$B_id' AND Students_id = '$row84[Students_id]' AND Payment_Year='$j'");
												if($row_check_stud= mysql_fetch_array($check_stud))
												{
													/*echo $row84['Students_Name']." payment row present of year $j";*/
												}
												else
												{
													/*echo $row84['Students_Name']."payment row is not present of the year $j";*/
													/*************adding payment row**********************/
													$upi=md5(uniqid(rand(),true));		
													$upi= substr($upi,0,5);
													$upi=$Student_id.$upi;			
													$batch_payment_insert="INSERT INTO teachers_payments_info
													(
													Unique_user_id,
													T_uniqueid,
													Emailid,
													Batch_no,
													Batches_id,
													Students_id,
													Unique_payment_id,
													Default_Payment_Amount,
													Payment_Year,
													Payment_Starting_Date,
													January,
													February,
													March,
													April,
													May,
													June,
													July,
													August,
													September,
													October,
													November,
													December,
													January_Paid_Date,
													February_Paid_Date,
													March_Paid_Date,
													April_Paid_Date,
													May_Paid_Date,
													June_Paid_Date,
													July_Paid_Date,
													August_Paid_Date,
													September_Paid_Date,
													October_Paid_Date,
													November_Paid_Date,
													December_Paid_Date,
													January_Paid_Time,
													February_Paid_Time,
													March_Paid_Time,
													April_Paid_Time,
													May_Paid_Time,
													June_Paid_Time,
													July_Paid_Time,
													August_Paid_Time,
													September_Paid_Time,
													October_Paid_Time,
													November_Paid_Time,
													December_Paid_Time,
													January_Paid_Mode,
													February_Paid_Mode,
													March_Paid_Mode,
													April_Paid_Mode,
													May_Paid_Mode,
													June_Paid_Mode,
													July_Paid_Mode,
													August_Paid_Mode,
													September_Paid_Mode,
													October_Paid_Mode,
													November_Paid_Mode,
													December_Paid_Mode,
													January_Paid_Amount,
													February_Paid_Amount,
													March_Paid_Amount,
													April_Paid_Amount,
													May_Paid_Amount,
													June_Paid_Amount,
													July_Paid_Amount,
													August_Paid_Amount,
													September_Paid_Amount,
													October_Paid_Amount,
													November_Paid_Amount,
													December_Paid_Amount,
													Last_Updated_Date,
													Last_Updated_Time
													)

													VALUES
													(
													'$Unique_ui',
													'$_SESSION[teacher_id]',
													'$_SESSION[emailid]',
													'$Batch_no',
													'$B_id',
													'$Student_id',
													'$upi',
													'$fee',
													'$j',
													 now(),
													'unpaid',
													'unpaid',
													'unpaid',
													'unpaid',
													'unpaid',
													'unpaid',
													'unpaid',
													'unpaid',
													'unpaid',
													'unpaid',
													'unpaid',
													'unpaid',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													'',
													now(),
													CURRENT_TIMESTAMP()
													)";
													if (!mysql_query($batch_payment_insert,$con))
													{
														die('Unable to perform the operation Error: TWE_TBS_UPT01'.$i.'  ' . error_log("\n unable to create the payment row of the student with id -> $Student_id <- in teachers_batch_settings.php page for year $j.   -> ".mysql_error(),3, "logged errors/e.log"));
													}
													/**********************************************************/
												}
												$j+=1;
											}
										}
									}
								/***************************************************/
								$bname_err= $fee_err= $eyrs_err =$addr_err= $standard_err= $cpw_err= $noti_err="";
								$decide="NOT";
								//defining post variables
								$bname=$syrs=$eyrs=$standard=$addr=$cpw=$noti="";
								header("location:teachers_Batches_settings.php?B_id=$B_id");	
							}
							else
							{
								echo "Unable To update the batche information: Error:TBSU000E[o9";
								header("location:teachers_Batches_settings.php?B_id=$B_id");
							}
						}
						else
						{
							echo "<span class='text-danger'>No data to be edited</span>";
							error_log("\n $count Unable to edit the batche informtion in teachers batche settings page-> ending year -> ".mysql_error(),3, "logged errors/e2.log");
						}
					}
				}
			?>
				<div class="container"  style="z-index:1;">
					<div class="row " style="margin-top:20px;">
						<div class="col-lg-12">
							<ol class="breadcrumb">
								<li><span class="glyphicon glyphicon-home" ></span>&nbsp;<a href="#">Home</a></li>
								<li><span class="glyphicon glyphicon-list" ></span>&nbsp;<a href="teachers_batches.php">Batches</a></li>
								<li><span class="glyphicon glyphicon-info-sign"></span>&nbsp;<a href=""><?php echo $B_nm; ?> info</a></li>
							</ol>
						</div>
					</div>
					<div class="row" style="margin-top:;">
						<div class="col-xs-0 col-sm-12 col-md-12 col-lg-12 clearfix visible-sm visible-md visible-lg">
							<div class="panel panel-default">
								<header class="panel-heading">
									<b><h4> Batch's Description</h4></b>
								</header>
								<!-- batch info display-->
								<table class="panel-body table table-striped table-advance">
									<tr>
										<td><b>Batch no. : </b> <?php echo " ". $B_no; ?></td>
										<td><b>Batch name : </b> <?php echo $B_nm; ?></td>
										<td><b>Batch id : </b> <?php echo substr($B_id,20,5).substr($B_id,0,5); ?></td>
										<td><b>Session Starting : </b> <?php echo $B_sy; ?></td>
									</tr>
									<tr>
										<td><b>Session Ending: </b> <?php echo $B_ey; ?></td>
										<td><b>Creation Date: </b> <?php echo $B_cd; ?></td>
										<td><b>Classes per week : </b> <?php echo $B_nd; ?></td>
										<td><b>No. of Students : </b> <?php echo $B_ns; ?></td>
									</tr>
									<tr>
										<td><b>Notificatoin : </b> <?php echo $B_nf; ?></td>
										<td><b>Batch fees : </b> <?php echo $B_fees; ?></td>
										<td><b>Standard : </b> <?php echo $Std; ?></td>
										<td><b>Address : </b> <?php echo $B_a; ?></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="col-xs-12 clearfix visible-xs">
							<div class="panel panel-default">
								<header class="panel-heading">
									<b><h4>  Batch's Description</h4></b>
								</header>
								<!-- batch info display-->
								<table class="panel-body table table-striped table-advance">
									<tr>
										<td><b>Batch no. : </b> <?php echo " ". $B_no; ?></td>
										<td><b>Batch name : </b> <?php echo $B_nm; ?></td>
									</tr>
									<tr>
										<td><b>Batch id : </b> <?php echo substr($B_id,20,5).substr($B_id,0,5); ?></td>
										<td><b>Session Starting : </b> <?php echo $B_sy; ?></td>
									</tr>
									<tr>
										<td><b>Session Ending: </b> <?php echo $B_ey; ?></td>
										<td><b>Creation Date: </b> <?php echo $B_cd; ?></td>
									</tr>
									<tr>
										<td><b>Classes per week : </b> <?php echo $B_nd; ?></td>
										<td><b>No. of Students : </b> <?php echo $B_ns; ?></td>
									</tr>
									<tr>
										<td><b>Notificatoin : </b> <?php echo $B_nf; ?></td>
										<td><b>Batch fees : </b> <?php echo $B_fees; ?></td>
									</tr>
									<tr>
										<td><b>Standard : </b> <?php echo $Std; ?></td>
										<td><b>Address : </b> <?php echo $B_a; ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<!------------------------------------------------------------------------------------------------>
					<div class="row" style="margin-top:;">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="panel panel-default">
								<header class="panel-heading" style="color:yellowgreen;">
									<b><h3>Editing Batch</h3></b>
								</header>
								<div class="panel-body">
										<form onclick="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); echo "?B_id=".$B_id;?>" method="post">
											<div class="row top-margin">
												<div class="col-sm-3 col-xs-6">
													<label>Batch Name <span class="text-danger"><?php echo " ".$bname_err;?></span></label>
													<input type="text" name="bname" value="<?php echo $bname; ?>" class="form-control">
												</div>
												<div class="col-xs-6 col-sm-2">
													<label>Batch fees <span class="text-danger"><?php echo " ".$fee_err;?></span></label>
													<input type="text" name="fee" value="<?php echo $fee;?>" class="form-control">
												</div>
												<div class="col-xs-4 col-sm-2">
													<label>Classes<span class="text-danger"><?php echo " ".$cpw_err;?></span></label>
													<select name="cpw"  class="form-control">
														<option value="" <?php if($cpw=="") echo "selected";?>>Classes per week</option>
														<option value="1" <?php if($cpw=="1") echo "selected";?>>1</option>
														<option value="2" <?php if($cpw=="2") echo "selected";?>>2</option>
														<option value="3" <?php if($cpw=="3") echo "selected";?>>3</option>
														<option value="4" <?php if($cpw=="4") echo "selected";?>>4</option>
														<option value="5" <?php if($cpw=="5") echo "selected";?>>5</option>
														<option value="6" <?php if($cpw=="6") echo "selected";?>>6</option>
														<option value="7" <?php if($cpw=="7") echo "selected";?>>7</option>
													</select>
												</div>
												<div class="col-xs-4 col-sm-2 ">
													<label>Ending <span class="text-danger"><?php echo " ".$eyrs_err;?></span></label>
													<select name="eyrs"  class="form-control"><?php if($t=$B_ey) ;else error_log("\n Unable to get the batch ending year in teachers batche settings page-> ending year",3, "logged errors/e2.log"); ?>
													<option value="" <?php if($eyrs=="") echo "selected";?>>year</option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t; $t++;?></option>
													<option value="<?php echo $t;?>" <?php if($eyrs==$t) echo "selected";?>><?php echo $t;;?></option>
												</select>
												</div>
												<div class="col-xs-4 col-sm-3 ">
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
												<div class="col-xs-4 col-sm-3 ">
													<label>Notifications<span class="text-danger"><?php echo " ".$noti_err;?></span></label>
													<select name="noti"  class="form-control">
														<option value="On" <?php if($noti=="On") echo "selected";?>>On</option>
														<option value="Off" <?php if($noti=="Off") echo "selected";?>>Off</option>
													</select>
												</div>
												<div class="col-xs-8 col-sm-8 top-margin">
													<label>Address <span class="text-danger"><?php echo " ".$addr_err;?></span></label>
													<input type="text" Placeholder="coaching/teaching center address" value="<?php echo $addr;?>" name="addr" class="form-control">
												</div>
												<div class="col-sm-1" style="float:right; margin-top:25px;">
													<button class="btn btn-action btn-smit" title="Save" name="BU_submit" value="BU_submit" type="submit"><span class="glyphicon glyphicon-ok"></span></button>
												</div>
											</div>
										</form>
								</div>
							</div>
						</div>
					</div>
					<!------------------------------------------------------------------------------------------------>
					<div class="row" style="margin-top:;">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="panel panel-default">
								<header class="panel-heading">
									<b style="color:firebrick;" >Delete Batche</b>
								</header>
								<div class="panel-body">
								<?php
									$_SESSION['B_id'] =htmlspecialchars($B_id);
								?>
									<form method="post" action="teachers_batches_delete_page.php">
										<div class="row">
											<p style="width:90%; margin-left:15px; text-align:justify;">Deleting the batch means you are completely removing the record of the Batch, and its elements like students list and their information. This all information will also be completely removed. The complete information about your Batche will be deleted and you can't recover it later. </p>
											<p style="width:90%; margin-left:15px; text-align:left;"><b>Are you sure that you want to delete the Batch - <?php echo $B_nm; ?> ?</b></p>
											<div style="float:right; margin-right:20px;; margin-top:25px;">
												<button class="btn btn-smit" title="Delete Batche" type="submit">Delete Batche <span class="glyphicon glyphicon-trash"></span></button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!------------------------------------------------------------------------------------------------>
				</div> 
				<div style="margin-top:20px;">
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
			error_log("\nTryed to open the teachers batch more info page session set but the values are null!",3, "logged errors/e2.log");//remove it later
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
		error_log("\nTryed to open the teachers batch settings page without session being set!",3, "logged errors/e2.log");//remove it later
		echo "You need to log in to access this page.";
		mysql_close($con);
		header("location:login.php");
	}
?>