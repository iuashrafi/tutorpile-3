<?php 
@session_start();
require_once "../classes/connect.php";
require_once "../classes/class_teacher_stud_link.php";
$ob=new teacher_stud_link();
$ob->delete_stud_link($_GET['id']);
?>