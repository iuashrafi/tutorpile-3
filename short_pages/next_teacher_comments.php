<?php 
require_once("../classes/connect.php");
require_once "../classes/class_view_teacher_comments.php";
@session_start();
$obc=new view_teacher_comments();
$obc->display_teacher_comments($_SESSION['teacher_id'],$_GET["s"],$_GET["e"]);
?>
