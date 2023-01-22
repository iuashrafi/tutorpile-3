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
			<?php
				
				$delete = "DELETE FROM teachers_batches_info WHERE Batches_id='$_SESSION[B_id]' AND T_uniqueid='$_SESSION[teacher_id]' AND Emailid='$_SESSION[emailid]'";
				if(!mysql_query($delete,$con))
				{
					echo " Unable to delete the batch". mysql_error();
					error_log("\n Unable to delete the batche with id - $B_id  in teachers batche delete page->  ".mysql_error(),3, "logged errors/e2.log");
					header("location:teachers_Batches_settings.php?B_id=$_SESSION[B_id]");
				}
				else
				{
					error_log("\n successfully delete the batche with id - $_SESSION[B_id]  in teachers batche delete page->  ".mysql_error(),3, "logged errors/e2.log");
					
					/*deleting students of the batche*/
					$delete_stud = "DELETE FROM teachers_students_info WHERE Batches_id='$_SESSION[B_id]' AND T_uniqueid='$_SESSION[teacher_id]' AND Emailid='$_SESSION[emailid]'";
					if(!mysql_query($delete_stud,$con))
					{
						echo " Unable to delete the students of the batch". mysql_error();
						error_log("\n Unable to delete the students with batch id -  $B_id  in teachers batche delete page->  ".mysql_error(),3, "logged errors/e2.log");
						header("location:teachers_Batches_settings.php?B_id=$_SESSION[B_id]");
					}
					else
					{
						/*update the teacher stat info and decrease the batch no with 1 and count the no of student and decrese it*/
						$Sno=0;
						$Bno=0;
						$count_s = mysql_query("SELECT Emailid,T_uniqueid FROM teachers_students_info WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid = '$_SESSION[teacher_id]'");
						while($row_c= mysql_fetch_array($count_s))
						{
							$Sno++;
						}
						$count_b = mysql_query("SELECT Emailid,T_uniqueid FROM teachers_batches_info WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid = '$_SESSION[teacher_id]'");
						while($row_b= mysql_fetch_array($count_b))
						{
							$Bno++;
						}
						/*updating here*/
						if(mysql_query("UPDATE teachers_stats_info
						SET No_Of_Batches = '$Bno', No_Of_Students= '$Sno', Last_Updated_Date= now(), Last_Updated_Time= CURRENT_TIMESTAMP() 
						WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid = '$_SESSION[teacher_id]' "))
						{
							echo "batch sucessfully deleted <br/>";
							echo "redirecting you to the main page <br/>";
							header("location:teachers_batches.php");
						}
						else
						{
							error_log("\n Unable to update the database table teachers_stats_info with teacher uniqueid -  '$_SESSION[teacher_id]'  in teachers batche delete page->  ".mysql_error(),3, "logged errors/e2.log");
							header("location:teachers_batches.php");
						}
						/*updating here*/
					}
					header("location:teachers_batches.php");
				}
			?>
			<?php
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
			error_log("\nTryed to open the teachers batch delete page with session set but empty!",3, "logged errors/e.log");//remove it later
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
		error_log("\nTryed to open the teachers batch delete page without session being set!",3, "logged errors/e.log");//remove it later
		echo "You need to log in to access this page.";
		mysql_close($con);
		header("location:login.php");
	}
?>