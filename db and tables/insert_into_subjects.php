<?php
include("connect.php");
$sub[0]="Computers";
$sub[1]="Mathematics";
$sub[2]="Physics";
$sub[3]="Chemistry";
$sub[4]="Biology";
$sub[5]="Economics";
$sub[6]="English";
$sub[7]="Literature";
$sub[8]="Geography";
$sub[9]="History";
$sub[10]="Civics";
$sub[11]="Arabic/Urdu";
$sub[12]="Sanskrit";
$sub[13]="General Knowledge";
$sub[14]="Physical Training";
$sub[15]="Martial Arts";
for($i=0;$i<16;$i++)
{
		$iis="INSERT INTO subject ( Subject,No_of_subject_user ) VALUES ('$sub[$i]','0')";
		mysql_query($iis) or die("Cannot insert array $i ".mysql_error()."<br>");

}
?>