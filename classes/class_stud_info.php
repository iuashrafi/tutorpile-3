<?php 
class stud_info
{
	public function fetch_primary($title)
	{
		require_once "connect.php";
		$select=mysql_query("SELECT * FROM students_primary_info WHERE Emailid='$_SESSION[emailid]' AND S_uniqueid='$_SESSION[student_id]' ");
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
		$select=mysql_query("SELECT * FROM students_secondary_info WHERE Emailid='$_SESSION[emailid]' AND S_uniqueid='$_SESSION[student_id]'");
		$row=mysql_fetch_array($select);
		switch($title)
		{
			case 'Institute':
			return $row['Institute'];
			break;
			case 'Institute_address':
			return $row['Institute_address'];
			break;
			case 'Standard':
			return $row['Standard'];
			break;
			case 'City':
			return $row['City'];
			break;
			case 'Istate':
			return $row['Istate'];
			break;
			case 'Description':
			return $row['Description'];
			break;
		}
	}
} 
?>