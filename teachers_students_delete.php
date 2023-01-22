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
			/*echo $_SESSION['redirect']."<br/>";
			echo "starting delete process <br/>";*/
			$B_id=htmlspecialchars($_GET['B_id']);
			$S_id=htmlspecialchars($_GET['S_id']);
			/*echo "batch id =  $B_id <br/>";
			echo "student id =  $S_id <br/>";*/
			$delete = "DELETE FROM teachers_students_info WHERE Batches_id='$B_id' AND T_uniqueid='$_SESSION[teacher_id]' AND Emailid='$_SESSION[emailid]' AND Students_id='$S_id'";
			if(!mysql_query($delete,$con))
			{
				echo " Unable to delete the student";
				error_log("\n Unable to delete the student with id - $S_id  in teachers student delete page->  ".mysql_error(),3, "logged errors/e2.log");
				header("location:$_SESSION[redirect]");
			}
			else
			{
				/************finding feilds*******************/
				$Tsno=0;
				$Bsno=0;
				$count_s = mysql_query("SELECT Emailid,T_uniqueid FROM teachers_students_info WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid = '$_SESSION[teacher_id]'");
				while($row_c= mysql_fetch_array($count_s))
				{
					$Tsno++;
				}
				/*echo "total no. of student is =  $Tsno  <br/>";*/
				
				$count_ss = mysql_query("SELECT Emailid,T_uniqueid,Batches_id FROM teachers_students_info WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid = '$_SESSION[teacher_id]' AND Batches_id='$B_id'");
				while($row_cc= mysql_fetch_array($count_ss))
				{
					$Bsno++;
				}
				/*echo "total no. of student in this batch is =  $Bsno  <br/>";*/
				
				if(mysql_query("UPDATE teachers_stats_info
				SET No_Of_Students= '$Tsno', Last_Updated_Date= now(), Last_Updated_Time= CURRENT_TIMESTAMP() 
				WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid = '$_SESSION[teacher_id]' "))
				{
					/*echo "teacher stats sucessfully updated <br/>";*/
					if(mysql_query("UPDATE teachers_batches_info
					SET No_Of_Student= '$Bsno' 
					WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid = '$_SESSION[teacher_id]' AND Batches_id = '$B_id'"))
					{
						/*echo "teacher batch sucessfully updated <br/>";*/
						header("location:$_SESSION[redirect]");
					}
					else
					{
						echo " Unable to complete the task";
						error_log("\n Unable to update the details of the student with id - $S_id in table teachers_batches_info in teachers student delete page->  ".mysql_error(),3, "logged errors/e2.log");
						header("location:$_SESSION[redirect]");
					}
				}
				else
				{
					echo " Unable to complete the task";
					error_log("\n Unable to update the details of the student with id - $S_id in table teacher stats info in teachers student delete page->  ".mysql_error(),3, "logged errors/e2.log");
					header("location:$_SESSION[redirect]");
				}
				/************updating feilds*******************/
				
				header("location:$_SESSION[redirect]");
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
			error_log("\nTryed to open the teachers student delete page with session set but the session was empty!",3, "logged errors/e.log");//remove it later
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
		error_log("\nTryed to open the teachers student delete page without session being set!",3, "logged errors/e.log");//remove it later
		echo "You need to log in to access this page.";
		mysql_close($con);
		header("location:login.php");
	}
?>