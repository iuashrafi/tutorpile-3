<?php
	require_once "include/student_secure_header.php";
?>
<html>
<head>
	<title>Tutor Pile | Maintain Privacy</title>
	<?php include_once "include/include_meta.php";?>
	
</head>
<body>
<div style="float:top;">
<?php
	include("students_header_icon.php");
	include("students_header_nav_online.php");
?>
</div>
<div class="container index page-height">
	<div class="row ">
		<div class="col-lg-12">
		<br/>
			<ol class="breadcrumb">
				<li><i class="fa fa-tachometer" ></i>&nbsp;<a href="student_profile.php">Dashboard</a></li>
				<li><span class="glyphicon glyphicon-eye-close" ></span>&nbsp;Privacy</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title_of_page ">
			<h3><strong>Maintain Privacy</strong></h3><hr/> 
		</div>
		<div class="col-xs-10 col-sm-6 col-md-4 col-lg-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1">
				<?php 
					require_once "classes/class_stud_privacy.php";
					$ob=new stud_privacy();
					$ob->set_privacy($_SESSION['emailid']);
					$ep=$ob->get_emailid_privacy();
					$pp=$ob->get_phno_privacy();
					$pass_err="";
					if(isset($_POST['Maintain_privacy']) && $_SERVER['REQUEST_METHOD']=="POST")
					{
						$ep=$ob->form_get_emailid_privacy($_POST['emailid_privacy']);
						$pp=$ob->form_get_phone_privacy($_POST['phone_privacy']);
						$pass_err=$ob->validate_password($_POST['pass']);
						if($pass_err=="")
						{
							$ob->update_privacy($_SESSION['emailid']);
						}
					}
				
				?>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
					<div class="row">
						<div class="col-xs-12 col-sm-12">
							<label>Emailid<span class="text-danger"></span></label>
								 <select name="emailid_privacy" class="form-control">
									<option value="no" <?php if($ep=="no") echo "selected";?>  >false</option>
									<option value="yes" <?php if($ep=="yes") echo "selected";?> >true</option>
								</select>
						</div>
					</div>
					<div class="row" style="margin-top:15px;">
						<div class="col-xs-12 col-sm-12">
							<label>Phone number<span class="text-danger"></span></label>
								 <select name="phone_privacy" class="form-control">
									<option value="no" <?php if($pp=="no") echo "selected";?>>false</option>
									<option value="yes" <?php if($pp=="yes") echo "selected";?>>true</option>
								</select>
						
						</div>
					</div>
					<div class="row" style="margin-top:10px;">
						<div class="col-xs-12 col-sm-12">
							<label>Password<span class="text-danger">*<?php echo $pass_err;?></span></label>
							<input type="password" name="pass" class="form-control"/>
							<br/>
						</div>
						<div class="col-xs-12 col-sm-12">
						<button class="btn btn-action btn-smit" style="" name="Maintain_privacy" value="Maintain_privacy" type="submit">Save</button>
						<br/>
							<hr/>
					<span class="text-info">Maintain Privacy(true) hides your information- Emailid and Phone number</span>
						</div>
					</div>
				</form>
					<br/>
				
		</div>
	</div>
</div>
<?php include_once "./include/footer.php"; ?>
</body>
</html>