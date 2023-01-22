<?php 
	require_once "include/student_secure_header.php";
	require_once "classes/connect.php";
	require_once "classes/class_stud_notif.php";
	$notify2=new stud_notification;
	$notify2->show_join_notif($_SESSION['student_id'],0,5);
?>