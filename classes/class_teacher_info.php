<?php 
class teacher_info
{
	public function fetch_primary($title)
	{
		require_once "connect.php";
		$select=mysql_query("SELECT * FROM teachers_primary_info WHERE Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]' ");
		$row=mysql_fetch_array($select);
		switch($title)
		{
			case 'Firstname':
			return $row['Firstname'];
			break;
			case 'Lastname':
			return $row['Lastname'];
			break;
			case 'Phonenumber':
			return $row['Phonenumber'];
			break;
			
		}
	}
	public function fetch_secondary($title)
	{
		require_once "connect.php";
		$select=mysql_query("SELECT * FROM teachers_secondary_info WHERE Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]'");
		$row=mysql_fetch_array($select);
		switch($title)
		{
			case 'Profession':
			return $row['Profession'];
			break;
			case 'Qualifications':
			return $row['Qualifications'];
			break;
			case 'Worksat':
			return $row['Worksat'];
			break;
			case 'Experience':
			return $row['Experience'];
			break;
			case 'Address':
			return $row['Address'];
			break;
			case 'City':
			return $row['City'];
			break;
			case 'State':
			return $row['STATE'];
			break;
			case 'Description':
			return $row['Description'];
			break;
		}
	}
} 
?>