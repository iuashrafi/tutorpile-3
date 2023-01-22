<?php 
class stud_set_page 
{
	function get_page_no($id)
	{
		$page_no=mysql_query("SELECT Setting_page_no FROM students_secondary_info WHERE S_uniqueid='$id' ");
		$row=mysql_fetch_array($page_no);
		echo $row['Setting_page_no']."is the page";
		return $row['Setting_page_no'];
	}
	function set_page_no($no)
	{
		include("connect.php");
			@session_start();
			$_SESSION['set_page_no']=$no;
			$page_no=$_SESSION['set_page_no'];
			if($page_no==1) 
				include 'student_primary_settings.php';
			if($page_no==2) 
				include 'student_secondary_settings.php';
			if($page_no==3) 
				include 'student_password_settings.php';
			if($page_no==4) 
				include 'student_dp_settings.php';
	}
}
?>