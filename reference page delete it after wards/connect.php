<?php
$con=mysql_connect("localhost","root","");
if(!$con)
	echo "unable to connect to tutorsweb";
else
{
	mysql_select_db("Best",$con);
}
?>