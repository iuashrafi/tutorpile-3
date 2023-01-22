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
			/*take the fees amount fron the database and then add it in the database*/
			$fee_amount=$_SESSION['fee'];
			$m=$_GET['mon'];
			$mondate=$_GET['mon']."_Paid_Date";
			$montime=$_GET['mon']."_Paid_Time";
			$monamount=$_GET['mon']."_Paid_Amount";
			$monmode=$_GET['mon']."_Paid_Mode";
			if(mysql_query("UPDATE teachers_payments_info SET $m = 'paid', $mondate= now(), $montime= CURRENT_TIMESTAMP(), $monmode= 'By cash', $monamount= '$fee_amount',Last_Updated_Date= now(), Last_Updated_Time= CURRENT_TIMESTAMP()
			WHERE Emailid = '$_SESSION[emailid]' AND Batches_id = '$_GET[B_id]' AND Students_id = '$_GET[S_id]' AND Payment_Year = '$_GET[yers]' "))
			{?>
				<tr>
				<td><?php echo " ".$m; ?></td>
				<td style="color:orange;"><b><?php echo "just paid"; ?></b></td>
				<td><?php echo date("Y-m-d"); ?></td>
				<td><?php echo $fee_amount; ?></td>
				<td>
				<div>
					<button class="btn btn-success btn-sm" style="width:125px;"><b>Payment received</b></button>
				</div>
				</td><?php
			}
			else
			{
				
			}
			
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
			error_log("\nTryed to open the teachers_add_student_fees page with session set but the session was empty!",3, "logged errors/e2.log");//remove it later
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
		error_log("\nTryed to open the teachers_add_student_fees page without session being set!",3, "logged errors/e2.log");//remove it later
		echo "You need to log in to access this page.";
		mysql_close($con);
		header("location:login.php");
	}
?>