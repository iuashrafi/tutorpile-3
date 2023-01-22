<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>Tutor Pile | Feedback</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
</head>
<body>
<!-- header -->
<div class="container index page-height">
	<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<?php 
		@session_start();
		require_once "classes/class_public_feedback.php";
		$fname=$phno=$msg=$emailid="";
		$ch="";
		$fname_err=$msg_err=$emailid_err=$phno_err="";
		if(!empty($_SESSION['name']))
			{
				$fname=$_SESSION['name'];
				$ch="disable";
			}
		if(!empty($_SESSION['emailid']))
			{
				$emailid=$_SESSION['emailid'];
				$ch="disable";
			}
		if(isset($_POST["feedback"]) && $_SERVER["REQUEST_METHOD"]=="POST" )
		{
			$feedob=new public_feedback();
			
			$fname_err=$feedob->set_fullname($_POST['fname']);
		
		
			$emailid_err=$feedob->set_emailid($_POST['email']);
		
			$phno_err=$feedob->set_phonenumber($_POST['phno']);
			
			$msg_err=$feedob->set_feedbackmsg($_POST['msg']);
			
			$fname=$feedob->get_fullname();
			$emailid=$feedob->get_emailid();
			$msg=$feedob->get_message();
			if(isset($_POST['phno']))
				$phno=$feedob->get_phonenumber();
			if($fname_err==$msg_err && $msg_err==$emailid_err && $emailid_err==$phno_err && $phno_err=="")
			{
				echo "succesfully filled"; 
				$feedob->submit_feedback();
				header("location:feedback.php");
			}
			
		}
		?>
		<h2 class="title_of_page">Feedback</h2><hr/>
		<p>We'd love to hear from you</p>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
				<?php 
				@session_start();
					
					?>
				<div class="row">
					<div class="col-sm-4 col-lg-3" style="margin-top:2px;">
						<label>Full Name <span class="text-danger">*<?php echo " ".$fname_err;?></span></label>
						<input class="form-control" type="text" name="fname" value="<?php echo $fname; ?>" placeholder="Full Name">
					</div>
					<div class="col-sm-4 col-lg-3" style="margin-top:2px;">
						<label>Emailid<span class="text-danger">*<?php  echo " ".$emailid_err;?></span></label>
						<input class="form-control" type="text" name="email" value="<?php echo $emailid; ?>" placeholder="Email id">
					</div>
					<div class="col-sm-4 col-lg-3" style="margin-top:2px;">
						<label>Contact<span class="text-danger"><?php echo " ".$phno_err;?></span></label>
						<input class="form-control" type="text" name="phno" value="<?php  echo $phno; ?>" placeholder="Phone no.">
					</div>
				</div>
				<?php						
					
				
				?>
				<br/>
				<div class="row">
					<div class="col-sm-12 col-lg-9">
					<label>Message<span class="text-danger">*<?php  echo " ".$msg_err;?></span></label>
						<textarea placeholder="Message" class="form-control" name="msg"  rows="9"><?php  echo $msg; ?></textarea>
					</div>
				</div><br/>
				<div class="row">
					<div class="col-sm-12 col-lg-9 text-right">
						<input class="btn btn-action btn-smit" type="submit" name="feedback" value="Add feedback">
					</div>
				</div>
		</form>
	</div>
	<footer id="footer">
		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<b><p>Whatsapp :</b> +91 9641305184<br>
							<b><p>Email id :</b> support@tutorsweb.com<br>
								<br>
								Station More, Bagdogra, Dist:- Darjeeling, West Bengal-734014, INDIA.
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget" style="background-color:;">
						<h3 class="widget-title"></h3>
						
					</div>

					<div class="col-md-6 widget" style="background-color:;">
						<h3 class="widget-title"></h3>
						<div class="widget-body">

						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="index.php">Home</a> | 
								<a href="about.php">About</a> |
								<a href="contactus.php">Contact</a> |
								<b><a href="signup.php">Sign up</a></b>|
								<b><a href="login.php">log in</a></b>
							</p>
						</div>
					</div>
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2015, <a href="index.php" rel="Tutor Web">Tutors Web</a>.
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>
	</footer>
	</div>
</div>
<?php 
include_once "./include/footer.php";
?>
</body>
</html>