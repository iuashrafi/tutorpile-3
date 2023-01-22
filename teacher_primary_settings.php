<?php
		require_once "include/teacher_secure_header.php";
		$fname_err=$lname_err=$phno_err=$pass_err="";
		$fname=$lname=$phno="";
		require_once "classes/class_teacher_info.php";
		$ob=new teacher_info();
		$fname=$ob->fetch_primary("Firstname");
		$lname=$ob->fetch_primary("Lastname");
		$phno=$ob->fetch_primary("Phonenumber");
		if(isset($_POST["primary_submit"]) && $_SERVER["REQUEST_METHOD"]=="POST")
		{
			require_once("classes/class_teacher_sett.php");
			$psett=new teacher_sett;
			// fetching errors
			$fname_err=$psett->set_fname($_POST["fname"]);
			$lname_err=$psett->set_lname($_POST["lname"]);
			$phno_err=$psett->set_phno($_POST["phno"]);
			$pass_err=$psett->set_paswd($_POST["pass"]);
			//fetching values
			$fname=$psett->get_fname();
			$lname=$psett->get_lname();
			$phno=$psett->get_phno();
			if($fname_err==$lname_err && $lname_err==$phno_err && $phno_err==$pass_err &&$pass_err=="")
			{
				$psett->update_teacher_primary();
			}
		}
		?>
		<div class="tab-pane fade in active" id="PI">
			<div class="row">
			<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
			<h4>Primary Information [Edit]</h4> <hr/>
			</div>
			<div class="col-xs-12 col-sm-10 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
				<div class="panel panel-default" style="min-width:220px;">
						<div class="panel-body">
							<form name="primary_form" action="<?php echo htmlspecialchars("teacher_settings.php");?>" method="POST"> 
								<div class="row top-margin">
									<div class="col-sm-6">
										<label>First Name <span class="text-danger">*<?php echo " ".$fname_err;?></span></label>
										<input type="text" name="fname" value="<?php echo $fname; ?>" class="form-control">
									</div>
									<div class="col-sm-6">
										<label>Last Name<span class="text-danger">*<?php echo " ".$lname_err; ?></span></label>
										<input type="text" name="lname" value="<?php echo $lname;?>" class="form-control">
									</div>
								</div>
								<hr/>
								<!-- <div class="row top-margin">
									 Subjects
								</div><hr> --> 
								
								<div class="top-margin">
									<label>Phone Number <span class="text-danger">*<?php echo " ".$phno_err; ?></span></label>
									<input type="text" name="phno" value="<?php echo $phno; ?>" class="form-control">
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-9" style="float:left;">
										<div class="top-margin">
										<span class="text-danger"><?php echo" ".$pass_err;?></span>
											<input type="password" name="pass" placeholder="Tutors web Password" class="form-control" style="margin-bottom:5px;">
										</div>                 
									</div>
									<div class="col-lg-3 text-right" style="float:right;">
										<button class="btn btn-action btn-smit" name="primary_submit" onclick="" value="primary_submit" type="submit">Save</button>
									</div>
								</div>
							</form>
						</div>
				</div>
			</div>
			</div>
								
		</div> 
		