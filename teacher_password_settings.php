<?php 
	require_once "include/teacher_secure_header.php";
	$pass_err=$cap_err="";
	if(isset($_POST["password_submit"]) && $_SERVER["REQUEST_METHOD"]=="POST")
	{
		require_once("classes/class_teacher_sett.php");
		$rsett=new teacher_sett; 
		$pass_err=$rsett->check_passwords($_POST["password"],$_POST["Npass"],$_POST["Cpass"]);
		if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0){  
			$cap_err="Incorrect validation code";	
		}
		if($pass_err==$cap_err && $cap_err=="")
		{
			echo "<span style='color:green;'>Password changed successfully</span>";
			$rsett->update_teacher_passwd();
		}
	}
?>
		<div class="tab-pane fade in active" id="RP"> 
			<div class="row">
			<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
			<h4>Reset Password [Edit]</h4> <hr/>
			</div>
			<div class="col-xs-12 col-sm-10 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
				<div class="panel panel-default" style="min-width:220px;">
						<div class="panel-body">
							<form name="reset_form" action="<?php echo htmlspecialchars("teacher_settings.php");?>" method="post">
								<div class="top-margin">
									<label>Password<span class="text-danger">*<?php echo " ".$pass_err;?></span></label>
									<input type="password" value="<?php //echo $pass;?>" name="password" class="form-control">
								</div>
								<div class="top-margin">
									<label>New password<span class="text-danger">*<?php //echo " ".$npass_err;?></span></label>
									<input type="password" value="<?php // echo $npass;?>" name="Npass" class="form-control">
								</div>
								<div class="top-margin">
									<label>Confirm new password<span class="text-danger">*<?php //echo " ".$cpass_err;?></span></label>
									<input type="password" name="Cpass" class="form-control">
								</div>
								<hr>
								
								<div class="top-margin">
									<div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" style="float:left;">
									<img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br/>
									Click <a href='javascript:refreshCaptcha();'>here</a> to refresh.<br/>
									</div>
									<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12 " style="float:right;">
									<label>Enter the code<span class="text-danger">*<?php echo $cap_err;  ?></span></label>
									<input type="text" id="captcha_code" name="captcha_code"  class="form-control">
									</div>
									</div>
								</div>
								
								
								<hr>
								<div class="col-lg-3 text-right" style="float:right;">
									<button class="btn btn-action btn-smit" onclick="" name="password_submit" value="password_submit" type="submit">Save</button>
								</div>
							</form>
						</div>
				</div>
			</div>
			</div>
		</div> 
		</div> 