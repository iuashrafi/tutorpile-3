<?php 
		require_once "include/student_secure_header.php";
		require_once("classes/class_stud_info.php");
		$ob=new stud_info;
		$sc_err=$inst_err=$stand_err=$city_err=$state_err=$descript_err=$pass_err="";  // fetch from db
		$sc=$inst=$stand=$city=$state=$descript="";
		$sc=$ob->fetch_secondary('Institute');
		$inst=$ob->fetch_secondary('Institute_address');
		$stand=$ob->fetch_secondary('Standard');
		$city=$ob->fetch_secondary('City');
		$state=$ob->fetch_secondary('Istate');
		$descript=$ob->fetch_secondary('Description');
		if(isset($_POST["secondary_submit"]) && $_SERVER["REQUEST_METHOD"]=="POST")
		{
			require_once("classes/class_stud_sett.php");
			$ssett=new stud_sett;
			$sc_err=$ssett->set_school($_POST["sc"]); //school +address validation function
			$sc=$ssett->get_school();
			$inst_err=$ssett->set_instadd($_POST["inst"]);
			$inst=$ssett->get_instadd();
			$stand_err=$ssett->set_standard($_POST["stand"]);
			$stand=$ssett->get_standard();
			$city_err=$ssett->set_city($_POST["city"]);
			$city=$ssett->get_city();
			$state_err=$ssett->set_state($_POST["state"]);
			$state=$ssett->get_state();
			$descript_err=$ssett->set_description($_POST["descript"]);
			$descript=$ssett->get_description();
			$pass_err=$ssett->set_paswd($_POST["pass"]);
			
		if($sc_err==$inst_err &&$inst_err==$stand_err && $stand_err==$city_err && $city_err==$state_err && $state_err==$descript_err&& $descript_err==$pass_err  && $pass_err=="")
			{
				//echo "Succesfully Secondary informations filled";
				$ssett->update_student_secondary();
			}
		}
		?>
		<div class="tab-pane fade in active " id="SI">
			<div class="row">
				<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
				<h4>Secondary Information [Edit]</h4>
				<hr>
				</div>
				<div class="col-xs-12 col-sm-10 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
					<div class="panel panel-default" >
						<div class="panel-body">
								
					<form name="secondary_form" action="<?php echo htmlspecialchars('student_settings.php');?>" method="post">
									
						<div class="row top-margin">
							<div class="col-sm-6 col-xs-12">
								<label>School/College <span class="text-danger"><?php echo " ".$sc_err; ?></span></label>
								<input type="text" name="sc" value="<?php echo $sc; ?>" class="form-control">
							</div>
							<div class="col-sm-6 col-xs-12">
								<label>Institute address<span class="text-danger"><?php echo " ".$inst_err; ?></span></label>
								<input type="text" name="inst" class="form-control" value="<?php echo $inst; ?>">
							</div>
						</div>
						<hr>
						<div class="row top-margin">
							
							<div class="col-sm-6 col-xs-12">
								<label>Standard<span class="text-danger"><?php echo " ".$stand_err; ?></span></label>
								<input type="text" name="stand" value="<?php echo $stand; ?>" class="form-control">
							</div>
						</div>
									<hr>
						<div class="row top-margin">
							<div class="col-sm-6 col-xs-12">
								<label>City <span class="text-danger"><?php echo " ".$city_err; ?></span></label>
								<input type="text" name="city" value="<?php  echo $city; ?>" class="form-control">
							</div>
							<div class="col-sm-6 col-xs-12">
								<label>State<span class="text-danger"><?php echo " ".$state_err; ?></span></label>
								<input type="text" name="state" value="<?php  echo $state; ?>" class="form-control">
							</div>
						</div>
							<hr>
						<div class="row top-margin">
							<div class="col-xs-12">
							<label>Description <span class="text-danger"><?php echo " ".$descript_err; ?></span></label>
							<textarea name="descript" class="form-control" placeholder="Description" rows="4"><?php echo $descript; ?></textarea>
						</div>
						</div>
									<hr>
									<div class="row">
										<div class="col-xs-12 col-lg-9" style="float:left;">
											<div class="top-margin">
											<span class="text-danger"><?php echo $pass_err;?></span>
										<input type="password" name="pass" placeholder="Tutors web Password" class="form-control" style="margin-bottom:5px;">
											</div>                 
										</div>
										<div class="col-xs-12 col-lg-3 text-right" style="float:right;">
											<button class="btn btn-action btn-smit" name="secondary_submit" value="secondary_submit" type="submit">Save</button>
										</div>
									</div>
					</form>
							</div>
					</div>
				</div>		
			</div>		
		</div>