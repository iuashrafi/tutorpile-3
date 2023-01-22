<?php 
	@session_start();
	require_once "../classes/connect.php";
	require_once "../classes/class_stud_notif.php";
	$notify=new stud_notification;
	$notify->show_gen_notif($_SESSION['student_id'],$_GET['s'],$_GET['e']);
?>