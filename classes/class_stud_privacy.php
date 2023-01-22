<?php 
class stud_privacy
{
	private $_emailid_privacy;
	private $_phno_privacy;
	public function get_emailid_privacy() { return $this->_emailid_privacy;}
	public function get_phno_privacy() { return $this->_phno_privacy;}
	private function _trimer($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	public function set_privacy($id)
	{
		$select=mysql_query("SELECT Maintain_emailid,Maintain_phonenumber FROM students_secondary_info WHERE Emailid='$id' ");
		$row=mysql_fetch_array($select);
		$this->_emailid_privacy=$row["Maintain_emailid"];
		$this->_phno_privacy=$row["Maintain_phonenumber"];
	}
	public function form_get_emailid_privacy($data)
	{
		$data=$this->_trimer($data);
		if(!empty($data))
			$this->_emailid_privacy=$data;
		return $data;
		
	}
	public function form_get_phone_privacy($data)
	{
		$data=$this->_trimer($data);
		if(!empty($data))
			$this->_phno_privacy=$data;
		return $data;
	}
	public function validate_password($pass1)
	{
		$error="";
		if(empty($pass1))
		{
			return $error=" Required";
		}
		else 
		{
			$select=mysql_query("SELECT Password FROM students_primary_info WHERE Emailid='$_SESSION[emailid]' ");
			$row=mysql_fetch_array($select);
			if($row['Password']!="$pass1")
			{
				$error="Wrong password";
				return $error;
			}
			return $error;
		}
	}
	public function update_privacy($id)
	{
		$update="UPDATE students_secondary_info SET Maintain_emailid='$this->_emailid_privacy',Maintain_phonenumber='$this->_phno_privacy' WHERE Emailid='$id' ";
		if(!mysql_query($update))
		{
			 error_log("\nUnable to update privacy in stud_privacy".mysql_error(),3, "../logged errors/e.log");
		}
	}
}
?>