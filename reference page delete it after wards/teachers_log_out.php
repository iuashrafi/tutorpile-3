<?php
include("connect.php");
session_start();
echo "Please wait...";
$a=0;
$result_l = mysql_query("SELECT No_Of_Logout_Used,T_uniqueid FROM teachers_system_info
WHERE Emailid = '$_SESSION[user_id]'");
$row = mysql_fetch_array($result_l);
if(!empty($row['No_Of_Logout_Used']))
  {
	$a=$row['No_Of_Logout_Used'];
	$a++;
  }
if(mysql_query("UPDATE teachers_system_info
SET No_Of_Logout_Used= '$a', Login_status = 'OFLINE' 
WHERE Emailid = '$_SESSION[user_id]'"))
{
echo "Logging out in processs....";
}
unset($_SESSION['user_id']);
unset($_SESSION['user_online']);
unset($_SESSION['user_category']);
unset($_SESSION['uniqid']);
unset($_SESSION['disp_count_1']);
unset($_SESSION['disp_count_2']);
unset($_SESSION['disp_count_3']);
if(session_destroy())
{
	echo "Sucessful Logged out..";
}
else
{
	echo "Unsucessful Logged out..<a href='teachers_log_out.php'>Retry</a>";
}
header("location:login.php");
mysql_close($con);
?>