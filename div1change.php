<?php
// no need of this page
		require_once "include/student_secure_header.php";
		require_once "classes/connect.php";
		require_once "classes/class_stud_stat.php";
		if(!isset($_SESSION))
			session_start();
		$newbar=new stud_stat();
		$newbar->stats_bar($_GET['id']); 
		?>

