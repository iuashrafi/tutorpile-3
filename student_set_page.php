<?php 
@session_start();
require_once "classes/connect.php";
require_once "classes/class_stud_set_page.php";
$ob=new stud_set_page();
$ob->set_page_no($_GET['no']);
?>