<?php 
class teacher_sett
{
	private $_fname;
	private $_lname;
	private $day;
	private $mon;
	private $yrs;
	private $_phno;
	private $_paswd;
	private $_temp;	
	/********************************/
		private $_profession;
		private $_qualifications;
		private $_worksat;
		private $_experience;
		private $_address;
		private $_city;
		private $_state;
		private $_description;
	/********************************/
	private function _trimer($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	/***************************************************************/
	public function get_fname(){ return $this->_fname; }
	public function get_lname(){ return $this->_lname; } 
	public function get_phno(){ return $this->_phno; }
	
	/***************************************************************/
	public function get_profession(){ return $this->_profession; }
	public function get_qualifications(){ return $this->_qualifications; }
	public function get_worksat(){ return $this->_worksat; }
	public function get_experience(){ return $this->_experience; }
	public function get_address(){ return $this->_address; }
	public function get_city(){ return $this->_city; }
	public function get_state(){ return $this->_state; }
	public function get_description(){ return $this->_description; }
	/***************************************************************/
	// primary updation 
	public function update_teacher_primary()
	{
		include("connect.php");
		$update_primary="UPDATE teachers_primary_info SET Firstname='$this->_fname',Lastname='$this->_lname',Phonenumber='$this->_phno' WHERE Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]' ";
		if(!mysql_query($update_primary,$con))
		{
			error_log("\nerror -> class teacher_sett page -> function_update_teacher_primary() -> operation = Unable to update teacher's primary",3, "../logged errors/e.log");
		}
		else 
		{
			$_SESSION["name"]=$this->_fname." ".$this->_lname;
		}
	}
	public function update_teacher_secondary()
	{
		include("connect.php");
		$update_secondary="UPDATE teachers_secondary_info SET Profession='$this->_profession',Qualifications='$this->_qualifications',Worksat='$this->_worksat',Experience='$this->_experience',Address='$this->_address',City='$this->_city',STATE='$this->_state',Description='$this->_description' WHERE Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]' ";
		if(!mysql_query($update_secondary,$con))
		{
			error_log("\nerror -> class teacher_sett page -> update_teacher_secondary() -> operation = Unable to update teacher's secondary",3, "../logged errors/e.log");
		}
	}
	public function update_teacher_passwd()
	{
		include("connect.php");
		$update_second="UPDATE teachers_primary_info SET Password='$this->_paswd', Confirmpassword='$this->_paswd' WHERE  Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]' ";
		if(!mysql_query($update_second))
		{
			error_log("\nerror -> class teacher_sett page -> update_teacher_passwd() -> operation = Unable to update student's secondary  ".mysql_error(),3, "../logged errors/e.log");
		}
		// add notification
		require_once("class_teacher_notification.php");
		$test=new notification;
		$test->set_tui($_SESSION['teacher_id']);
		$test->set_emailid($_SESSION['emailid']);
		$test->set_nc("Settings");
		$test->set_nt("Password settings");
		$test->set_np("yes");
		$test->set_ns("Password changed");
		$test->set_sname("Tutorsweb");
		$test->set_sid("A2025");
		$test->set_se("support@tutorsweb.com");
		$test->set_v("no");
		$test->set_nss("sending");
		$test->set_nl("www.w3schools.com");
		$test->set_nimg("a.jpg");
		$test->set_nmess("Your password has been changed");
		$test->decide();
	}
	//Primary setting's functions begin
	public function set_fname($data)
	{
		$error="";
		if(empty($data))
		{
			$error="Required";
			//$this->_decide="insecure";
			return $error;
		}
		else
		{
			$this->_temp=$this->_trimer($data);
			if(empty($this->_temp))
			{
				$error="Required";
				//$this->_decide="insecure";
				return $error;
			}
			else
			{
				if(!preg_match("/^[a-zA-Z]*$/",$this->_temp))
				{
					$error="Only letters are allowed";
					//$this->_decide="insecure";
					return $error;
				}
				else
				{
					$this->_fname=$this->_temp;
					return $error;
				}
			}
		}
	}
		public function set_lname($data)
		{
			$error="";
			if(empty($data))
			{
				$error="Required";
				//$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_temp=$this->_trimer($data);
				if(empty($this->_temp))
				{
					$error="Required";
					//$this->_decide="insecure";
					return $error;
				}
				else
				{
					if(!preg_match("/^[a-zA-Z]*$/",$this->_temp))
					{
						$error="Only letters are allowed";
						//$this->_decide="insecure";
						return $error;
					}
					else
					{
						$this->_lname=$this->_temp;
						return $error;
					}
				}
			}
		}
		public function set_phno($data)
		{
			$error="";
			if(empty($data))
			{
				$error=" required";
				//$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_temp=$data;
				if(empty($this->_temp))
				{
					$error=" invalid";
					//$this->_decide="insecure";
					return $error;
				}
				else
				{
					if(($this->_temp>=1000000000) && ($this->_temp<=9999999999))	//this statement is wrong
					{
						$this->_phno=$this->_temp;
						return $error;
					}
					else
					{
						$error=" invalid";
						$this->_phno=$this->_temp;
						//$this->_decide="insecure";
						return $error;
					}
				}
			}
		}
		public function set_paswd($data)
		{
			$error="";
			if(empty($data))
			{
				$error=" required";
				return $error;
			}
			else
			{
				$this->_temp=$data;
				$pass="hello"; 
				$fetc_pass=mysql_query("SELECT Password FROM teachers_primary_info WHERE Emailid='$_SESSION[emailid]' ");
				$row_pass=mysql_fetch_array($fetc_pass);
				if($this->_temp!=$row_pass['Password'])
				{
					$error="Wrong password";
					return $error;
				}
				else
					return $error;
			}
		}
		//Primary setting's functions end
		//Secondary setting's functions begin	
		
		public function set_profession($data)
		{
			$error="";
			if(!empty($data))
			{
				$this->_temp=$this->_trimer($data);
				if(!empty($this->_temp))
					$this->_profession=$this->_temp; // further check with preg match 
				else 
					return $error;
			}
			else 
				return $error;
		}
		public function set_qualifications($data)
		{
			$error="";
			if(!empty($data))
			{
				$this->_temp=$this->_trimer($data);
				if(!empty($this->_temp))
					$this->_qualifications=$this->_temp; // further check with preg match 
				else 
					return $error;
			}
			else 
				return $error;
		}
		public function set_worksat($data)
		{
			$error="";
			if(!empty($data))
			{
				$this->_temp=$this->_trimer($data);
				if(!empty($this->_temp))
					$this->_worksat=$this->_temp; // further check with preg match 
				else 
					return $error;
			}
			else 
				return $error;
		}
		public function set_experience($data)
		{
			$error="";
			if(!empty($data))
			{
				$this->_temp=$this->_trimer($data);
				if(!empty($this->_temp))
					$this->_experience=$this->_temp; // further check with preg match 
				else 
					return $error;
			}
			else 
				return $error;
		}
		public function set_address($data)
		{
			$error="";
			if(!empty($data))
			{
				$this->_temp=$this->_trimer($data);
				if(!empty($this->_temp))
					$this->_address=$this->_temp; // further check with preg match 
				else 
					return $error;
			}
			else 
				return $error;
		}
		public function set_city($data)
		{
			$error="";
			if(!empty($data))
			{
				$this->_temp=$this->_trimer($data);
				if(!empty($this->_temp))
					$this->_city=$this->_temp; // further check with preg match 
				else 
					return $error;
			}
			else 
				return $error;
		}
		public function set_state($data)
		{
			$error="";
			if(!empty($data))
			{
				$this->_temp=$this->_trimer($data);
				if(!empty($this->_temp))
					$this->_state=$this->_temp; // further check with preg match 
				else 
					return $error;
			}
			else 
				return $error;
		}
		public function set_description($data)
		{
			$error="";
			if(!empty($data))
			{
				$this->_temp=$this->_trimer($data);
				if(!empty($this->_temp))
					$this->_description=$this->_temp; // further check with preg match 
				else 
					return $error;
			}
			else 
				return $error;
		}
		// Secondary settings function end
		// Reset password functions start
		public function check_passwords($pass1,$pass2,$pass3)
		{
			$error="";
			if(empty($pass1) ||empty($pass2) ||empty($pass3))
				return $error="All fields are required";
			else if(!empty($pass1) && !empty($pass2) && !empty($pass3))
			{
				if(strlen($pass2)<8 || strlen($pass3)<8)
					return $error="At least 8 characters";
				$select_pass=mysql_query("SELECT Password FROM teachers_primary_info WHERE Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]' ");
				$row_pass=mysql_fetch_array($select_pass);
				if($pass1!=$row_pass['Password'])
				{
					return $error="Your current password was wrong";
				}
				else if($pass2!=$pass3)
				{
					return $error="New passwords doesn't matches";
				}
				else if($pass1==$row_pass['Password'] && $pass2==$pass3 )
				{
					//check for captcha code and update the database
					$this->_paswd=$pass2;
					return $error;
					
					
				}
			}
			else 
				return $error;
		}
	
}
?>