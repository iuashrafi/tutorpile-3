<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
	<title>Tutor Pile | Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
	<link rel="shortcut icon" href="system img/favicon.png"> 
	<!----class files--->
	<?php
		require_once("classes/class_signup_user.php");
	?>
	<!----close class files--->
	
	<style>
	.loader {
		border: 3px solid #f3f3f3;
		border-radius: 50%;
		border-top: 3px solid #8E8E8E;
		width: 15px;
		height:15px;
		-webkit-animation: spin 1s linear infinite;
		animation: spin 1s linear infinite;
	}
	@keyframes spin {
		0% { transform: rotate(0deg); }
		100% { transform: rotate(360deg); }
	}

	</style>
</head>
<body>
	<!-- Fixed navbar -->
	<div style="float:top;">
		<?php
			require_once("db and tables/connect.php");
			include_once("header_icon.php");
			include_once("header_nav.php");
		?>
	</div>
	<!-- /.navbar -->
	<!-- container -->
	<div class="container" style="z-index:1;">
		<div class="row">
			<!-- Article main content -->
			<div class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Registration <img src="system img/pages img/lock.gif"/></h1>
				</header>
				<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Create a new account &nbsp;&nbsp;__<i class="glyphicon glyphicon-pencil"> </i></h3>
							<p class="text-center text-muted">Fill up your details, to create a new account with <a href="#">Tutor Pile</a> or <a href="login.php">Log in</a> if you have already have an account with us.</p>
							<hr>
							<?php
								//defining error variables
								$fname_err=$lname_err=$emailid_err=$paswd_err=$cpaswd_err=$gen_err=$phno_err=$catogory_err=$pincode_err=$subo_err=$subz_err="";
								$decide="NOT ALLOWED";
								//defining post variables
								$fname=$lname=$emailid=$paswd=$cpaswd=$subo=$subz=$gen=$phno=$catogory=$pincode="";
								if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["Signup_submit"]))
								{
									$user=new signup_user;
									$fname_err=$user->set_fname($_POST["fname"]);
									$lname_err=$user->set_lname($_POST["lname"]);
									$emailid_err=$user->set_emailid($_POST["emailid"]);
									$paswd_err=$user->set_paswd($_POST["paswd"]);
									$cpaswd_err=$user->set_cpaswd($_POST["cpaswd"]);
									$catogory_err=$user->set_catogory($_POST["catogory"]);
									$pincode_err=$user->set_pincode((int)$_POST["pincode"]);
									$subo_err=$user->set_subo($_POST["subo"]);
									$subz_err=$user->set_subz($_POST["subz"]);
									$gen_err=$user->set_gen($_POST["gen"]);
									$phno_err=$user->set_phno($_POST["phno"]);
									//echo $user->set_decide();		//printing the decide variable of the system
									$user->set_decide();
									$fname=$_POST["fname"];
									$lname=$_POST["lname"];
									$emailid=$_POST["emailid"];
									$paswd=$_POST["paswd"];
									$cpaswd=$_POST["cpaswd"];
									$subo=$_POST["subo"];
									$subz=$_POST["subz"];
									$gen=$_POST["gen"];
									$phno=$_POST["phno"];
									$catogory=$_POST["catogory"];
									$pincode=$_POST["pincode"];
								}
									
							?>
							<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
								<div class="row top-margin">
									<div class="col-sm-6" >
										<label>First Name <span class="text-danger">*<?php echo " ".$fname_err;?></span></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></i></span>
											<input type="text" class="form-control" name="fname" value="<?php echo $fname;?>">
										</div>
									</div>
									<div class="col-sm-6">
										<label>Last Name<span class="text-danger">*<?php echo " ".$lname_err;?></span></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											<input type="text" class="form-control" name="lname" value="<?php echo $lname;?>">
										</div>
									</div>
								</div>
								<div class="top-margin">
									<label>Email Address <span class="text-danger">*<?php echo " ".$emailid_err;?></span></label>
									<div class="input-group">
										<span class="input-group-addon">@</span>
										<input type="text" class="form-control" name="emailid" value="<?php echo $emailid;?>">
									</div>
								</div>
								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Password <span class="text-danger">*<?php echo " ".$paswd_err;?></span></label>
										<div class="input-group">
											<span class="input-group-addon"><img src="system img/pages img/key.gif"/></span>
											<input type="password" class="form-control" name="paswd" value="<?php echo $paswd;?>">
										</div>
									</div>
									<div class="col-sm-6">
										<label>Confirm Password <span class="text-danger">*<?php echo " ".$cpaswd_err;?></span></label>
										<div class="input-group">
											<span class="input-group-addon"><img src="system img/pages img/key.gif"/></span>
											<input type="password" class="form-control"  name="cpaswd" value="<?php echo $cpaswd;?>">
										</div>
									</div>
								</div>
								<hr>
								<div class="row top-margin">
									<div class="col-xs-6 col-sm-6">
										<label>Catogory <span class="text-danger">*<?php echo " ".$catogory_err;?></span></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-th-large"></i></span>
											<select name="catogory" class="form-control">
												<option value="" onclick="document.getElementById('subject').style.display='none'"  <?php if($catogory=="") echo "selected";?>>catogory</option>
												<option value="Teacher" onclick="document.getElementById('subject').style.display='block'" <?php if($catogory=="Teacher") echo "selected";?>>Teacher</option>
												<option value="Student" onclick="document.getElementById('subject').style.display='none'" <?php if($catogory=="Student") echo "selected";?>>Student</option>
											</select>
										</div>
									</div>
									<?php
									if($catogory=="Teacher" || $catogory=="teacher")
									{?><script>
										document.getElementById('subject').style.display='block';
										</script>
										<?php
									}?>
									<div  class="col-xs-6 col-sm-6">
										<label>Pin code<span class="text-danger">*<?php echo " ".$pincode_err;?></span></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
											<input type="text" class="form-control" name="pincode"  value="<?php echo $pincode;?>">
										</div>
									</div>
								</div>
								<hr>
								<div class="row top-margin">
									<div class="subject" id="subject" style="display:;">
										<div class="col-xs-6 col-sm-6">
											<label>Subject <span class="text-danger">#<?php echo " ". $subo_err ;?></span></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
												<select name="subo"  class="form-control">
													<option value="" <?php if($subo=="") echo "selected";?>>subject you teach</option>
													<?php 
													include("db and tables/connect.php");
													$options=mysql_query("SELECT Subject FROM subject");
													while($row_option=mysql_fetch_array($options))
													{
														?>
														<option value="<?php echo $row_option['Subject']; ?>" <?php if($subo==$row_option['Subject']) echo "selected";?>><?php echo $row_option['Subject'];?></option>
														<?php
													}
													?>
												</select>
											</div>
										</div>
										<div  class="col-xs-6 col-sm-6">
											<label>&nbsp;<span class="text-danger"><?php echo " ". $subz_err ;?></span></label></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
												<input type="text" name="subz" class="form-control" value="<?php echo $subz;?>" placeholder="Custom subject"/>
											</div>
										</div>
									</div>
									<?php
									if($catogory=="Student" || $catogory=="student")
									{?><script type="text/javascript">
										document.getElementById('subject').style.display='none';
										</script>
										<?php
									}
									?>
									<div  class="col-xs-6 col-sm-6">
										<label>Gender <span class="text-danger">*<?php echo " ".$gen_err;?></span></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											<select name="gen"  class="form-control">
												<option value="" <?php if($gen=="") echo "selected";?>>Gender</option>
												<option value="Male" <?php if($gen=="Male") echo "selected";?>>Male</option>
												<option value="Female" <?php if($gen=="Female") echo "selected";?>>Female</option>
											</select>
										</div>
									</div>
									<div  class="col-xs-6 col-sm-6">
										<label>Phone Number <span class="text-danger">*<?php echo " ".$phno_err;?></span></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
											<input type="text" class="form-control" name="phno" value="<?php echo $phno;?>">
											</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-9" style="margin-left:5px;float:left;">
											By clicking on sign up, you accept our <a href="t&c.php">Terms & Conditions </a>.<span class="text-danger">* Required. # Required only for teachers</span>
										   <?php 
											// print_r($user);		//remove afterwards
											?>        
									</div>  
									<div class="col-lg-3 text-right" style="float:right;">
										<button class="btn btn-action btn-smit" onclick="document.getElementById('prog').style.display='block'" style="width:90px;text-align:right;" name="Signup_submit" value="Signup_submit" type="submit"><div id="prog" style="display:none;float:left;"><div class="loader" ></div></div><div> Sign up</div></button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- /Article -->
		</div>
	</div>	<!-- /container -->
	<div style="float:bottom;margin-top:20px;">
		<?php
			include_once("./include/footer.php");
		?>
	</div>
</body>
</html>