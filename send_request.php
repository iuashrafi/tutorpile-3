<?php 

	require_once "include/student_secure_header.php";
	require_once "classes/connect.php";
	require_once "classes/class_stud_stat.php";
	if(!isset($_SESSION))
	session_start();
	$select_tr=mysql_query("SELECT T_uniqueid FROM teachers_primary_info WHERE T_uniqueid='$_GET[id]' ");
	$tr=mysql_fetch_array($select_tr);
	$present=0; $times=0;
	$checkifpresent=mysql_query("SELECT T_uniqueid FROM students_stats_info WHERE T_uniqueid='$_GET[id]' AND Emailid='$_SESSION[emailid]' ");
	while($checkif_row=mysql_fetch_array($checkifpresent))
	{
			if($checkif_row['T_uniqueid']==$tr['T_uniqueid'] )
			{
				$times++;
				$present=1;
			}	
	}
	if($present==1)
	{
		$ob=new stud_stat();
		$ob->update_request($_GET['id'],"yes");
	//	echo "updated";
		$ob->stats_bar($_GET['id']);
		//display 
	}
	else if($present==0)
	{
		$ob=new stud_stat();
		$ob->insert_request($_GET['id'],"yes");
		//display 
		$ob->stats_bar($_GET['id']);
	}  
?>