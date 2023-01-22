<?php 

require_once "classes/class_teacher_set_page.php";
$ob=new teacher_set_page();
$ob->set_page_no($_GET['no']); 
?>