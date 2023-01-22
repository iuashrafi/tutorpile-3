<?php 
class teacher_set_page 
{
	function get_page_no($id)
	{
		$page_no=mysql_query("SELECT Setting_page_no FROM teachers_secondary_info WHERE T_uniqueid='$id' ");
		$row=mysql_fetch_array($page_no);
		echo $row['Setting_page_no']."is the page";
		return $row['Setting_page_no'];
	}
	function set_page_no($no)
	{
			include("connect.php");
			if(!isset($_SESSION))
				session_start();
			$_SESSION['set_page_no']=$no;
			$page_no=$_SESSION['set_page_no'];
			if($page_no==1) 
				include 'teacher_primary_settings.php';
			if($page_no==2) 
				include 'teacher_secondary_settings.php';
			if($page_no==3) 
				include 'teacher_password_settings.php';
			if($page_no==4) 
				include 'teacher_dp_settings.php';
	}
}
?>