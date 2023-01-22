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
			<header class="paSnel-heading" style="color:#442E66;">
			<?php
				$yers=$_GET['yers'];
			?>
				<h3>  &nbsp;&nbsp;&nbsp;payment details of year - <?php echo $yers; ?></h3>
			</header>
			<div class="panel-body col-xs-12 col-lg-12 col-md-12 col-sm-12">
				<section class="panel">
					<!-- students info display-->
					<table class="table table-striped table-advance table-hover">
						<div class="row">
							<tr>
								<th><i class="icon_profile"></i> Payable Month</th>
								<th><i class="icon_mobile"></i> Payment record</th>
								<th><i class="icon_pin_alt"></i> Payment date</th>
								<th><i class="icon_mail_alt"></i> Amount paid</th>
								<th><i class="icon_cogs"></i> Action</th>
							</tr>
						</div>
						<div class="row ">
								<?php
								$B_id=$_GET['B_id'];
								$S_id=$_GET['S_id'];
									$result_943= mysql_query("SELECT * FROM teachers_payments_info WHERE Emailid = '$_SESSION[emailid]' AND Students_id = '$S_id' ");
									while($row943= mysql_fetch_array($result_943))/*use while */
									{
										if( $row943['Payment_Year']==$yers)
										{
											
											/***************/
											if($row943['Default_Payment_Amount']==0)
											{
												/*no task*/
											}
											else
											{
												$_SESSION['fee']=$row943['Default_Payment_Amount'];
											}
											/***************/
											$PY= $row943['Payment_Year'];
											if(!empty($row943['Batches_id']) && !empty($row943['Students_id']) && $PY==$yers && $row943['Emailid'] = '$_SESSION[emailid]' )
											{
												include("teachers_payment_table_row.php");
											}
										}
									}
									
								?>
						</div>
					</table>
				</section>
			</div>
			<?php
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
			error_log("\nTryed to open the teachers payment table page with session set but the session was empty!",3, "logged errors/e.log");//remove it later
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
		error_log("\nTryed to open the teachers payment table page without session being set!",3, "logged errors/e.log");//remove it later
		echo "You need to log in to access this page.";
		mysql_close($con);
		header("location:login.php");
	}
?>