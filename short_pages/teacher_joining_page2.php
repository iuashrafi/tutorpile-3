<?php 
	@session_start();
	require_once "../classes/connect.php";
	require_once "../classes/class_teacher_notiff.php";
	$notify2=new teacher_notification;
	$notify2->show_join_notif($_SESSION['teacher_id'],$_GET['s'],$_GET['e']);
?>