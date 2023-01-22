<?php
require_once "classes/class_join_request.php";
$request=new join_request();
$request->reject_request($_GET['id']);
?>