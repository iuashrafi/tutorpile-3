<?php 
class front_page_teachers_fetch
{
	public function fetch_no_of_notifications($id)
	{
		$select=mysql_query("SELECT T_uniqueid FROM teachers_notification_info WHERE T_uniqueid='$id' AND Viewed='no'");
		$ct=0;
		while($row=mysql_fetch_array($select))
		{
			$ct++;
		}
		return $ct;
	}
}
?>