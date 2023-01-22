<?php
$con=mysql_connect("localhost","root","");
if (!$con)
{
	die('unable to connect to tutorsweb ' . mysql_error());
}
if (mysql_query("CREATE DATABASE Best",$con))
{
	echo "Database created";
}
else
{
	echo "Error creating database: " . mysql_error();
}
mysql_close($con);
?>