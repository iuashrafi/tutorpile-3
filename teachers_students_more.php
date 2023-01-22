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
				
				<div>
					<div class="container index page-height">
						<?php
							$B_id=$_GET['B_id'];
							$res=mysql_query("SELECT * FROM teachers_batches_info WHERE Batches_id= '$_GET[B_id]' ");
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
							/*students*/
							$S_id=$_GET['S_id'];
							$res32=mysql_query("SELECT * FROM teachers_students_info WHERE Students_id= '$_GET[S_id]' ");
							if($r32 = mysql_fetch_array($res32))
							{
								$S_nm=$r32['Students_Name'];
								$S_jd=$r32['Student_Joining_Date'];
								$S_ei=$r32['Students_Emailid'];
								$S_g=$r32['Gender'];
								$S_pn=$r32['S_Phonenumber'];
								$S_st=$r32['Students_Standard'];
								$S_sc=$r32['Students_School'];
								$S_f=$r32['Students_Fees'];
								$S_a=$r32['Students_Address'];
							}
							if(empty($S_ei))
								$S_ei="unavailable";
						?>
						<div class="row " style="margin-top:20px;">
							<div class="col-lg-12">
								<ol class="breadcrumb">
									<li><span class="glyphicon glyphicon-home" ></span>&nbsp;<a href="#">Home</a></li>
									<li><span class="glyphicon glyphicon-list" ></span>&nbsp;<a href="teachers_batches.php">Batches</a></li>
									<li><span class="glyphicon glyphicon-info-sign"></span>&nbsp;<a href="teachers_Batches_more_info.php?B_id=<?php echo $B_id; ?>"><?php echo $B_nm; ?></a></li>
									<li><span class="glyphicon glyphicon-info-sign"></span>&nbsp;<a href="#"><?php echo $S_nm; ?> details</a></li>
								</ol>
							</div>
						</div>
						<div class="row" style="margin-top:;">
							<div class="col-xs-0 col-sm-12 col-md-12 col-lg-12 clearfix visible-sm visible-md visible-lg">
								<div class="panel panel-default">
									<header class="panel-heading">
										<b><h4> Description of <span style="color:green;"><?php echo $S_nm; ?></span></h4></b>
									</header>
									<!-- batch info display-->
									<table class="panel-body table table-striped table-advance">
										<tr>
											<td><b>Student name : </b><?php echo $S_nm; ?></td>
											<td><b>Batch name : </b> <?php echo $B_nm; ?></td>
											<td><b>Student id : </b> <?php echo substr($S_id,20,5).substr($S_id,0,5); ?></td>
											<td><b>Batch id : </b> <?php echo substr($B_id,20,5).substr($B_id,0,5); ?></td>
										</tr>
										<tr>
											<td><b>email id:</b> <?php echo $S_ei; ?></td>
											<td><b>Joining Date:</b> <?php echo $S_jd; ?></td>
											<td><b>Standard:</b> <?php echo $S_st; ?></td>
											<td><b>Phone no:</b> <?php echo $S_pn; ?></td>
										</tr>
										<tr>
											<td><b>Classes per week : </b> <?php echo $B_nd; ?></td>
											<td><b>Students fee:</b> <?php if($S_f==0) echo $B_fees;else echo $S_f; ?></td>
											<td><b>Notificatoin : </b> <?php echo $B_nf; ?></td>
											<td><b>Batch fee : </b> <?php echo $B_fees; ?></td>
										</tr>
										<tr>
											<td><b>Batch starting:</b> <?php echo $B_sy; ?></td>
											<td><b>Batch ending:</b> <?php echo $B_ey; ?></td>
											<td><b>Student Address:</b> <?php echo $S_a; ?></td>
											<td><b>Batch Address : </b> <?php echo $B_a; ?></td>
										</tr>
									</table>
								</div>
							</div>
							<div class="col-xs-12 clearfix visible-xs">
								<div class="panel panel-default">
									<header class="panel-heading">
										<b><h4> Description of <span style="color:green;"><?php echo $S_nm; ?></span></h4></b>
									</header>
									<!-- batch info display-->
									<table class="panel-body table table-striped table-advance">
										<tr>
											<td><b>Student name : </b><?php echo $S_nm; ?></td>
											<td><b>Batch name : </b> <?php echo $B_nm; ?></td>
										</tr>
										<tr>
											<td><b>Student id : </b> <?php echo substr($S_id,20,5).substr($S_id,0,5); ?></td>
											<td><b>Batch id : </b> <?php echo substr($B_id,20,5).substr($B_id,0,5); ?></td>
										</tr>
										<tr>
											<td><b>email id:</b> <?php echo $S_ei; ?></td>
											<td><b>Joining Date:</b> <?php echo $S_jd; ?></td>
										</tr>
										<tr>
											<td><b>Standard:</b> <?php echo $S_st; ?></td>
											<td><b>Phone no:</b> <?php echo $S_pn; ?></td>
										</tr>
										<tr>
											<td><b>Classes per week : </b> <?php echo $B_nd; ?></td>
											<td><b>Students fee:</b> <?php if($S_f==0) echo $B_fees;else echo $S_f; ?></td>
										</tr>
										<tr>
											<td><b>Notificatoin : </b> <?php echo $B_nf; ?></td>
											<td><b>Batch fee : </b> <?php echo $B_fees; ?></td>
										</tr>
										<tr>
											<td><b>Student Address:</b> <?php echo $S_a; ?></td>
											<td><b>Batch Address : </b> <?php echo $B_a; ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
						<!------------------------------------------------------------------------------------------------>
						<div class="row">
							<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
								<header style="color:yellowgreen;">
									<b><h3>Payment detalis of - <?php echo $S_nm; ?></h3></b>
									<hr>
								</header>
									<script type="text/javascript">
										function payment_table(x)
										{
										var bid="<?php echo $B_id; ?>";
										var sid="<?php echo $S_id; ?>";
										var xmlhttp;
										if (window.XMLHttpRequest)
										  {// code for IE7+, Firefox, Chrome, Opera, Safari
										  xmlhttp=new XMLHttpRequest();
										  }
										else
										  {// code for IE6, IE5
										  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
										  }
										xmlhttp.onreadystatechange=function()
										  {
										  if (xmlhttp.readyState==4 && xmlhttp.status==200)
											{
											document.getElementById("pay_table").innerHTML=xmlhttp.responseText;
											}
										  }
										xmlhttp.open("GET","teachers_payment_table.php?yers="+x+"&&S_id="+sid+"&&B_id="+bid+"",true);
										xmlhttp.send();
										}
										
											function payment_process(a , mn)
											{
												var bi="<?php echo $B_id; ?>";
												var si="<?php echo $S_id; ?>";
												var bfee="<?php if($S_f==0){$_SESSION['fee']=$B_fees; echo $B_fees;} else {$_SESSION['fee']=$S_f; echo $S_f;} ?>";		
												var yr=a;
												if(mn==1)
													var mon="January";
												else if(mn==2)
													var mon="February";
												else if(mn==3)
													var mon="March";
												else if(mn==4)
													var mon="April";
												else if(mn==5)
													var mon="May";
												else if(mn==6)
													var mon="June";
												else if(mn==7)
													var mon="July";
												else if(mn==8)
													var mon="August";
												else if(mn==9)
													var mon="September";
												else if(mn==10)
													var mon="October";
												else if(mn==11)
													var mon="November";
												else if(mn==12)
													var mon="December";
												else
													var mon="Error";
												var xmlhttp2;
												if (window.XMLHttpRequest)
													{
														xmlhttp2=new XMLHttpRequest();
													}
												else
													{// code for IE6, IE5
														xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
													}
												xmlhttp2.onreadystatechange=function()
												{
													if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
													{
														document.getElementById(mon).innerHTML=xmlhttp2.responseText;
													}
												}
												xmlhttp2.open("GET","teachers_add_students_fees.php?yers="+yr+"&&S_id="+si+"&&B_id="+bi+"&&mon="+mon+"",true);
												xmlhttp2.send();
											}
										</script>
									<?php
										$yers=$B_sy;
										$B_ey;
										while($yers<=$B_ey)
										{
											/*include("teachers_payment_table.php");*/?>
											<div>
												<button class="btn btn-success btn-sm col-xs-3 col-sm-2" id="asdasd" onclick="payment_table(<?php echo "".$yers.""; ?>)" style="margin-right:5px;margin-top:5px;"><b><?php echo $yers; ?></b></button>
											</div><?php
											$yers++;
										}
									?>
							</div>
						</div>
						<hr/>
						<div class="row" id="pay_table" style="overflow-x:scroll;">
							Click on the buttons to see the payment detail of that year.
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
			error_log("\nTryed to open the teachers student more page with session set but the session was empty!",3, "logged errors/e.log");//remove it later
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
		error_log("\nTryed to open the teachers student more page without session being set!",3, "logged errors/e.log");//remove it later
		echo "You need to log in to access this page.";
		mysql_close($con);
		header("location:login.php");
	}
?>