<?php 
class stud_fetch_id
{
	private $_name;
	private $_emailid;
	private $_city;
	public function fetch_name(){ return $this->_name;	}
	public function fetch_emailid(){ return $this->_emailid;	}
	public function fetch_city(){ return $this->_city;	}
	public function fetch_id_primary($id)
	{
		require_once "connect.php";
		$select=mysql_query("SELECT * FROM students_primary_info WHERE S_uniqueid='$id' ");
		$row=mysql_fetch_array($select);
		$this->_name=$row['Firstname']." ".$row['Lastname'];
		$this->_emailid=$row['Emailid'];
	}
	public function fetch_id_secondary($id)
	{
		require_once "connect.php";
		$select=mysql_query("SELECT * FROM students_secondary_info WHERE S_uniqueid='$id' ");
		$row=mysql_fetch_array($select);
		$this->_city=$row['City'];
	}
	
}
?>