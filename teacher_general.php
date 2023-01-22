<?php 
	require_once "include/teacher_secure_header.php";
	if(!isset($_SESSION))
		session_start();
	require_once "classes/connect.php";
	require_once "classes/class_teacher_notiff.php";
	$notify=new teacher_notification;
	$notify->show_gen_notif($_SESSION['teacher_id'],0,5);
?>