<?php 
	require_once "include/teacher_secure_header.php";
	require_once "classes/connect.php";
	require_once "classes/class_view_teacher_comments.php";	
	$ob=new view_teacher_comments();
	$ob->delete_review($_GET['id']);
?>