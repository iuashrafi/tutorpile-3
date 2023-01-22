<?php 
class stud_stat
{
	public function stats_bar($id)
	{
	
		$select=mysql_query("SELECT * FROM students_stats_info WHERE Emailid='$_SESSION[emailid]' AND T_uniqueid='$id' ");
		$row=mysql_fetch_array($select);
		/*	Joining requst statistics starts */ 
		if($row['Request_status']=="accepted" )
		{
			echo "<a class='btn btn-tw tw-mosaic'  >
				<span class='glyphicon glyphicon-link'></span>&nbsp;Linked</a>";
		}
		else if($row['Request_status']=="yes")
		{
			?>
			<span id="div1"><a class="btn btn-tw tw-mosaic" onclick="stats_operate('<?php echo $id;?>','cancel_request','div1')" >
			<span class='glyphicon glyphicon-link'></span>
			Cancel Request</a></span>
			<?php
		}
		else if(empty($row['Request_status']) || $row['Request_status']=="no" || $row['Request_status']=="rejected" )
		{
			?>
			<span id="div1"><a class="btn  btn-tw tw-mosaic" onclick="stats_operate('<?php echo $id;?>','send_request','div1')" >
			<span class="glyphicon glyphicon-link"></span>&nbsp;Join Request</a></span>
			<?php
		} /* Joining requst statistics ends  */ 
		
		 /* Reputation statistics starts 
		if($row['Like_status']=="true" )
		{
			echo "<a class='btn btn-tw tw-mosaic'  >
				<span class='glyphicon glyphicon-link'></span>&nbsp;Reputed</a>";
		}
		else
		{
			echo "<a class='btn btn-tw tw-mosaic'  >
				<span id='div2' class='glyphicon glyphicon-half_moon'></span>&nbsp;Repute</a>";
		}
		  Reputation statistics ends  */ 
	}
	public function update_request($tid,$bool)
	{
		$update="UPDATE students_stats_info SET Request_status='$bool' WHERE T_uniqueid='$tid' AND Emailid='$_SESSION[emailid]' ";
		if(mysql_query($update))
		{
			// add or increase teachers statistics i.e. teaching requests++ also
			// add notification in to teachers table
			include "class_teacher_fetch_id.php";
			$ob=new teacher_fetch_id();
			$ob->fetch_id_primary($_GET['id']);
			$emailid=$ob->fetch_emailid();
			include("classes/class_teacher_notification.php");
			$test=new notification;
			$test->set_tui($tid);
			$test->set_emailid($emailid);
			$test->set_nc("Join");
			$test->set_nt("Join request");
			$test->set_np("yes");
			$test->set_ns("Request received");
			$test->set_sname($_SESSION['name']);
			$test->set_sid($_SESSION['student_id']);
			$test->set_se($_SESSION['emailid']);
			$test->set_v("no");
			$test->set_nss("sending");
			$test->set_nl("www.w3schools.com");
			$test->set_nimg("a.jpg");
			$test->set_nmess($_SESSION['name']." send you a request");
			$test->decide()."<br/>";
		}
		else 
		{
			error_log("\nClass stud stat -> update_request(), Operation->unable to update request ".mysql_error(),3, "../logged errors/e.log");
		}
	}
	public function insert_request($tid,$bool)
	{
		$teacher_details=mysql_query("SELECT Emailid FROM teachers_primary_info WHERE T_uniqueid='$tid' ");
		$row_teacher_details=mysql_fetch_array($teacher_details);
		$insert="INSERT INTO students_stats_info
		(
			S_uniqueid,
			Emailid,
			T_Emailid,
			T_uniqueid,
			Request_status
		)
		VALUES (
			'$_SESSION[student_id]',
			'$_SESSION[emailid]',
			'$row_teacher_details[Emailid]',
			'$tid',
			'$bool')";
			if(mysql_query($insert))
			{
				// add or increase teachers statistics i.e. teaching requests++ also
				// add notification in to teachers table
				include "class_teacher_fetch_id.php";
				$ob=new teacher_fetch_id();
				$ob->fetch_id_primary($_GET['id']);
				$emailid=$ob->fetch_emailid();
				include("classes/class_teacher_notification.php");
				$test=new notification;
				$test->set_tui($tid);
				$test->set_emailid($emailid);
				$test->set_nc("Join");
				$test->set_nt("Join request");
				$test->set_np("yes");
				$test->set_ns("Request received");
				$test->set_sname($_SESSION['name']);
				$test->set_sid($_SESSION['student_id']);
				$test->set_se($_SESSION['emailid']);
				$test->set_v("no");
				$test->set_nss("sending");
				$test->set_nl("www.w3schools.com");
				$test->set_nimg("a.jpg");
				$test->set_nmess($_SESSION['name']." send you a request");
				$test->decide()."<br/>";
			}
			else 
			{
				error_log("\nClass stud stat -> funct insert_request ,operation->unable to insert request ".mysql_error(),3, "../logged errors/e.log");
			}
	}
}
?>