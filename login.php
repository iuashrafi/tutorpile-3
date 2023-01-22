<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>Tutor Pile | Log in</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
	<link rel="shortcut icon" href="system img/favicon.png">
	<!----class files--->
	<?php
		require_once("classes/class_login_user.php");
	?>
	<!----close class files--->
</head>
<body>
	<div style="float:top;">
		<?php
			include_once("header_icon.php");
			include_once("header_nav.php");
		?>
	</div>
	<div class="container index page-height"  >
		<div class="row">
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Log in <img src="system img/pages img/lock.gif"/></h1>
				</header>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body"> 
						<p class="login-img"></p>
							<h3 class="thin text-center">Log in to your account</h3>
							<p class="text-center text-muted">if you already have an account with <a href="#">Tutor Pile</a>, then log in or, <a href="signup.php">sign up</a> for a new account with us.
							<hr>
							<?php
								$emailid_err=$pass_err=$categ_err="";
								$emailid=$pass=$categ="";
								if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["login_submit"]))
								{
									$user=new login_user;
									$emailid_err=$user->set_emailid($_POST["emailid"]);
									$pass_err=$user->set_paswd($_POST["pass"]);
									$categ_err=$user->set_catogory($_POST["category"]);
									//echo $user->check_login();		//printing the decide variable of the system	//remove it after
									$user->check_login();
									$emailid=$_POST["emailid"];
									$pass=$_POST["pass"];
									$categ=$_POST["category"];
								}
							?>
							<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
								<div class="top-margin">
									<label>Email id <span class="text-danger">*<?php echo " ".$emailid_err;?></span></label>
									<div class="input-group">
									<span class="input-group-addon">@</span>
									<input type="text" name="emailid" value="<?php echo $emailid;?>" class="form-control">
									</div>
								</div>
								<div class="top-margin">
									<label>Password <span class="text-danger">*<?php echo " ".$pass_err;?></span></label>
									<div class="input-group">
									<span class="input-group-addon"><img src="system img/pages img/key.gif"/></span>
									<input type="password" name="pass" value="<?php echo $pass;?>" class="form-control">
									</div>
								</div>
								<div class="top-margin">
									<label>Category <span class="text-danger">*<?php echo " ".$categ_err;?></span></label>
									<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-th-large"></i></span>
									<select name="category" class="form-control">
										<option value="" <?php if($categ=="")echo 'selected'; ?>>Category</option>
										<option value="Teacher" <?php if($categ=="Teacher")echo 'selected'; ?> >Teacher</option>
										<option value="Student" <?php if($categ=="Student")echo 'selected'; ?> >Student</option>
									</select>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-8">
										<b><a href="forgot_password.php">Forgot password?</a></b>
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action btn-smit" name="login_submit" value="login_submit" type="submit">log in</button>
									</div>
								</div>
								<?php 
									//print_r($user);		//remove afterwards
								?> 
							</form>
						</div>
					</div>
					<p style="text-align:center;"><strong>OR</strong></p>
					<div class="panel panel-default">
						<div class=" panel-body">
							<div class="col-xs-10 col-sm-8 col-xs-offset-1 col-sm-offset-2">
										<a class="btn btn-tw tw-notify" href="signup.php" style="width:100%;">Register / Sign up</a>
							</div>
						</div>
					</div>
				</div>
			</article>
		</div>
	</div>
	<div style="margin-top:20px;">
		<?php include_once "include/footer.php"; ?>
	</div>
</body>
</html>