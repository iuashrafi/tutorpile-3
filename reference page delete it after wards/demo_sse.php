<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');



include("connect.php");
$result_94 = mysql_query("SELECT * FROM teachers_students_info WHERE Batches_id= '6064d6b96d36af6dcdbc3c97b' AND Emailid='example@example.com' AND T_uniqueid='770cfc0a5154aba61f15' ");
while($row94= mysql_fetch_array($result_94))
{
	$C= $row94['Students_Deleted'];
	if(!empty($row94['Batches_id']) && !empty($row94['Students_id']) && $C=="no" && $row94['Emailid'] = 'example@example.com' && $row94['T_uniqueid'] = '770cfc0a5154aba61f15')
	{
		$s=$row94['Students_id'];
		$n=$row94['Students_Name'];
		echo "data: The server time is: {$s}-------{$n} \n\n";
	}
}




flush();
?> 