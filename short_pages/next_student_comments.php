<?php 
require_once("../classes/connect.php");
require_once "../classes/class_stud_reviews.php";
@session_start();
$obc=new stud_reviews();
$obc->display_next_comments($_SESSION['emailid'],$_GET["s"],$_GET["e"]);
?>
