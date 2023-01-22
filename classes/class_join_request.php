<?php
class join_request
{
	function accept_request($id)
	{
		require_once "connect.php";
		@session_start();
		$update="UPDATE students_stats_info SET Request_status='accepted' WHERE S_uniqueid='$id'  AND T_uniqueid='$_SESSION[teacher_id]' ";
		if(!mysql_query($update))
		{
			 error_log("\n unable to update accept request status in student stats info in class join_request.php - ".mysql_error(),3, "../logged errors/e.log");
		}
		else 
		{
			echo "Request accepted";
			// Additional adding linked student and teacher into another table
		}
	}
	function reject_request($id)
	{
		require_once "connect.php";
		@session_start();
		$update="UPDATE students_stats_info SET Request_status='no' WHERE S_uniqueid='$id'  AND T_uniqueid='$_SESSION[teacher_id]' ";
		if(!mysql_query($update))
		{
			 error_log("\n unable to update reject request status in student stats info in class join_request.php - ".mysql_error(),3, "../logged errors/e.log");
		}
		else 
		{
			echo "Request rejected";
			// also needs to be updated in other table
		}
	}
}
?>