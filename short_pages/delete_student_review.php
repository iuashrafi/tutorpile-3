<?php 
@session_start();
require_once "../classes/connect.php";
require_once "../classes/class_stud_reviews.php";	
$ob=new stud_reviews();
$ob->delete_review($_GET['id']);
?>