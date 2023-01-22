<?php 
class stud_sett
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
	private $_school;
	private $_instaddress;
	private $_standard;
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
	public function get_school(){ return $this->_school; }
	public function get_instadd(){ return $this->_instaddress; }
	public function get_standard(){ return $this->_standard; }
	public function get_city(){ return $this->_city; }
	public function get_state(){ return $this->_state; }
	public function get_description(){ return $this->_description; }
	/***************************************************************/
	public function update_student_primary()
	{
		include("connect.php");
		$update_primary="UPDATE students_primary_info SET Firstname='$this->_fname',Lastname='$this->_lname',Phonenumber='$this->_phno' WHERE Emailid='$_SESSION[emailid]' AND S_uniqueid='$_SESSION[student_id]' ";
		if(!mysql_query($update_primary,$con))
		{
			error_log("\nerror -> class student_sett page -> update_student_primary() -> operation = Unable to update student's primary  ".mysql_error(),3, "../logged errors/e.log");
		}
	}
	public function update_student_secondary()
	{
		include("connect.php");
		$update_second="UPDATE students_secondary_info SET Institute='$this->_school', Institute_address='$this->_instaddress',Standard='$this->_standard',City='$this->_city', Istate='$this->_state',Description='$this->_description' WHERE  Emailid='$_SESSION[emailid]' AND S_uniqueid='$_SESSION[student_id]' ";
		if(!mysql_query($update_second))
		{
			error_log("\nerror -> class student_sett page -> update_student_secondary() -> operation = Unable to update student's secondary  ".mysql_error(),3, "../logged errors/e.log");
		}
	}
	public function update_student_passwords()
	{
		include("connect.php");
		$update_second="UPDATE students_primary_info SET Password='$this->_paswd', Confirmpassword='$this->_paswd' WHERE  Emailid='$_SESSION[emailid]' AND S_uniqueid='$_SESSION[student_id]' ";
		if(!mysql_query($update_second))
		{
			error_log("\nerror -> class student_sett page -> update_student_passwords() -> operation = Unable to update student's secondary  ".mysql_error(),3, "../logged errors/e.log");
		}
		// add notification
		require_once("class_add_student_notifications.php");
		$test=new add_student_notifications;
		$test->set_sui($_SESSION['student_id']);
		$test->set_emailid($_SESSION['emailid']);
		$test->set_nc("Settings");
		$test->set_nt("Password settings");
		$test->set_np("yes");
		$test->set_ns("Password changed");
		$test->set_tname("Tutorsweb");
		$test->set_tid("A2025");
		$test->set_te("support@tutorsweb.com");
		$test->set_v("no");
		$test->set_nss("sending");
		$test->set_nl("www.w3schools.com");
		$test->set_nimg("a.jpg");
		$test->set_nmess("Your password has been changed");
		
		$pri=$test->decide();
		echo $pri;
		if($pri=="added")
		{
			echo "<span style='color:green;'>password reseted sucessfully.</span>";
		}
		else
		{
			echo "<span style='color:red;'>password reseted failed.</span>";
		}
		/*echo $test->decide()."<br/>";
		print_r($test);
		echo "\n ";*/
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
				$select_pswd=mysql_query("SELECT Password FROM students_primary_info WHERE Emailid='$_SESSION[emailid]' AND S_uniqueid='$_SESSION[student_id]' ");
				$row=mysql_fetch_array($select_pswd);
				$pass=$row['Password'];
				if($this->_temp!=$pass)
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
		public function set_school($data)
		{
			$error="";
			if(!empty($data))
			{
				$this->_temp=$this->_trimer($data);
				if(!empty($this->_temp))
				{
					$this->_school=$this->_temp;
					return $error;
				}
				else 
					return $error;
			}
			else 
				return $error;
		}
		public function set_instadd($data)
		{
			$error="";
			if(!empty($data))
			{
				$this->_temp=$this->_trimer($data);
				if(!empty($this->_temp))
				{
					$this->_instaddress=$this->_temp;
					return $error;
				}
				else 
					return $error;
			}
			else 
				return $error;
		}
		public function set_standard($data)
		{
			$error="";
			if(!empty($data))
			{
				$this->_temp=$this->_trimer($data);
				if(!empty($this->_temp))
				{
					$this->_standard=$this->_temp;
					return $error;
				}
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
				{
					$this->_city=$this->_temp;
					return $error;
				}
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
				{
					$this->_state=$this->_temp;
					return $error;
				}
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
				{
					$this->_description=$this->_temp;
					return $error;
				}
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
					{
					$error="At least 8 characters";
					return $error;
					}
				$select_pass=mysql_query("SELECT Password FROM students_primary_info WHERE Emailid='$_SESSION[emailid]' AND S_uniqueid='$_SESSION[student_id]' ");
				$row_pass=mysql_fetch_array($select_pass);
				if($pass1!=$row_pass['Password'])
				{
					return $error="Your current password was wrong";
				}
				else if($pass2!=$pass3)
				{
					return $error="New passwords doesn't matches";
				}
				else if($pass2==$pass3 && strlen($pass2)< 8 )
				{
					return $error="At least 8 letters";
				}
				else if($pass1==$row_pass['Password'] && $pass2==$pass3 && strlen($pass2)>=8 )
				{
					$this->_paswd=$pass2;
					return $error;
				}
			}
			else 
				return $error;
		}
}
?>