<?php 
		require_once "include/teacher_secure_header.php";
		require_once "classes/class_teacher_info.php";
		$ob=new teacher_info();
		$all_err="";  // fetch from db
		$prof=$qual=$work=$city=$state=$exp=$address=$descript=$pass_err="";
		// fetch profession,qualifications etc from db
		$prof=$ob->fetch_secondary("Profession");
		$qual=$ob->fetch_secondary("Qualifications");
		$work=$ob->fetch_secondary("Worksat");
		$city=$ob->fetch_secondary("City");
		$state=$ob->fetch_secondary("State");
		$exp=$ob->fetch_secondary("Experience");
		$address=$ob->fetch_secondary("Address");
		$descript=$ob->fetch_secondary("Description");
		$prof_err=$qual_err=$work_err=$city_err=$state_err=$exp_err=$address_err=$descript_err="";
		if(isset($_POST["secondary_submit"]) && $_SERVER["REQUEST_METHOD"]=="POST")
		{
			require_once("classes/class_teacher_sett.php");
			$ssett=new teacher_sett;
			$prof_err=$ssett->set_profession($_POST['prof']);
			$qual_err=$ssett->set_qualifications($_POST['qual']);
			$work_err=$ssett->set_worksat($_POST['work']);
			$exp_err=$ssett->set_experience($_POST['exp']);
			$add_err=$ssett->set_address($_POST['address']);
			$city_err=$ssett->set_city($_POST['city']);
			$state_err=$ssett->set_state($_POST['state']);
			$descript_err=$ssett->set_description($_POST['descript']);
			$pass_err=$ssett->set_paswd($_POST["pass"]);
			$prof=$ssett->get_profession();
			$qual=$ssett->get_qualifications();
			$work=$ssett->get_worksat();
			$exp=$ssett->get_experience();
			$address=$ssett->get_address();
			$city=$ssett->get_city();
			$state=$ssett->get_state();
			$descript=$ssett->get_description();
			if($prof_err==$qual_err &&$qual_err==$work_err && $work_err==$exp_err && $exp_err==$add_err && $add_err==$city_err&& $city_err==$state_err && $state_err==$descript_err && $descript_err==$pass_err && $pass_err=="")
			{
				$ssett->update_teacher_secondary();
			}
		}
		?>
		<div class="tab-pane fade in active" id="SI">
			<div class="row">
			<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
			<h4>Secondary Information [Edit]</h4> <hr/>
			</div>
			<div class="col-xs-12 col-sm-10 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
				<div class="panel panel-default" style="min-width:220px;">
					<div class="panel-body">
						<form name="secondary_form" action="<?php echo htmlspecialchars('teacher_settings.php');?> " method="post">
							<div class="row top-margin">
								<div class="col-sm-6">
									<label>Profession<span class="text-danger">*</span></label>
									<input type="text" name="prof" value="<?php echo $prof; ?>" class="form-control">
								</div>
								<div class="col-sm-6">
									<label>Qualifications<span class="text-danger">*</span></label>
									<input type="text"  name="qual" value="<?php echo $qual; ?>" class="form-control">
								</div>
							</div>
							<hr>
							<div class="row top-margin">
								<div class="col-sm-6">
									<label>Worksat <span class="text-danger">*</span></label>
									<input type="text" name="work" value="<?php echo $work; ?>" class="form-control">
								</div>
								<div class="col-sm-6">
									<label>Experience<span class="text-danger">*</span></label>
									<input type="text" name="exp" value="<?php echo $exp; ?>" class="form-control">
								</div>
							</div>
							<hr>
							<div class="row top-margin">
								<div class="col-sm-6">
									<label>City <span class="text-danger">*</span></label>
									<input type="text" name="city" value="<?php echo $city; ?>" class="form-control">
								</div>
								<div class="col-sm-6">
									<label>State<span class="text-danger">*</span></label>
									<input type="text" name="state" value="<?php echo $state; ?>" class="form-control">
								</div>
							</div>
														
							<hr>
							<div class="top-margin form-group">
								<label>Address<span class="text-danger">*</span></label>
								<input type="text" name="address" value="<?php echo $address; ?>" class="form-control">
							</div>	
							<div class="top-margin">
								<label>Description<span class="text-danger">*</span></label>
								<textarea name="descript" class="form-control" placeholder="Description" rows="4"><?php echo $descript; ?></textarea>
							</div>
														
							<hr>
							<div class="row">
								<div class="col-lg-9" style="float:left;">
									<div class="top-margin"><span class="text-danger"><?php echo " ".$pass_err; ?></span>
										<input type="password" placeholder="Tutors web Password" name="pass" class="form-control" style="margin-bottom:5px;">
									</div>                 
								</div>
								<div class="col-lg-3 text-right" style="float:right;">
									<button class="btn btn-action btn-smit" type="password" name="secondary_submit" value="secondary_submit" type="submit">Save</button>
								</div>
							</div>
													</form>
		
					</div>
				</div>
			</div>		
			</div>		
		</div> 