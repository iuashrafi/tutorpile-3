<?php 
	@session_start();
	require_once "../classes/connect.php";
	require_once "../classes/class_stud_notif.php";
	$notify2=new stud_notification();
	$notify2->show_payments_notif($_SESSION['student_id'],$_GET['s'],$_GET['e']);
?>