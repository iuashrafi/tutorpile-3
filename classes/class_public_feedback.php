<?php 
class public_feedback
{
	private $_fullname;
	private $_emailid;
	private $_phno;
	private $_message;
	private $_temp;
	
	/*****************************/
	private function _trimer($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	/*****************************/
	public function get_fullname() { return $this->_fullname;}
	public function get_emailid() { return $this->_emailid;}
	public function get_message() { return $this->_message;}
	public function get_phonenumber() { return $this->_phno;}
	/*****************************/	
	function __construct()
	{
		$this->_phno="";
	}
	public function set_fullname($data)
	{
		$error="";
		if(empty($data))
		{
			$error="Required";
			return $error;
		}
		else
		{
			$this->_temp=$this->_trimer($data);
			if(empty($this->_temp))
			{
				$error="Required";
				return $error;
			}
			else
			{
				if(!preg_match("/^[a-z A-Z]*$/",$this->_temp))
				{
					$error="Only letters are allowed";
					return $error;
				}
				else
				{
					$this->_fullname=$this->_temp;
					return $error;
				}
			}
		}
	}
		
		public function set_emailid($data)
		{
			$error="";
			if(empty($data))
			{
				$error="Required";
				return $error;
			}
			else
			{
				$this->_temp=$this->_trimer($data);
				if(empty($this->_temp))
				{
					$error="Required";
					return $error;
				}
				else
				{
					if(!filter_var($this->_temp,FILTER_VALIDATE_EMAIL))
					{
						$this->_emailid=$this->_temp;
						$error="Incorrect format";
						return $error;
					}
					else
					{
						$this->_emailid=$this->_temp;
						return $error;
					}
				}
			}
		}
		public function set_phonenumber($data)
		{
			$error="";
			if(empty($data))
				return $error;
			else
			{
				$this->_temp=$data;
				if(empty($this->_temp))
				{
					$error="Invalid";
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
						$this->_phno=$this->_temp;
						$error="Invalid";
						return $error;
					}
				}
			}
		}
		public function set_feedbackmsg($data)
		{
			$error="";
			if(empty($data))
			{
				$error="Required";
				return $error;
			}
			else
			{
				$this->_temp=$this->_trimer($data);
				if(empty($this->_temp))
				{
					$error="Required";
					return $error;
				}
				else 
				{
					$this->_message=$this->_temp;
				}
			}
		}
		public function submit_feedback()
		{
			require_once "classes/connect.php";
			$finsert="INSERT INTO feedback_tutorsweb 
			(
				Emailid,
				Fullname,
				Phonenumber,
				Feedback_date,
				Message
			)
			VALUES
			(
				'$this->_emailid',
				'$this->_fullname',
				'$this->_phno',
				now(),
				'$this->_message'
			)";
			if(!mysql_query($finsert,$con))
			{
				 error_log("\n  error -> class public feedback page -> submit_feedback() -> operation = finsert! ->".mysql_error(),3, "../logged errors/e.log");
			}	
		}
		public function submit_contactus()
		{
			require_once "classes/connect.php";
			$cinsert="INSERT INTO contactus_tutorsweb 
			(
				Emailid,
				Fullname,
				Phonenumber,
				Feedback_date,
				Message
			)
			VALUES
			(
				'$this->_emailid',
				'$this->_fullname',
				'$this->_phno',
				now(),
				'$this->_message'
			)";
			if(!mysql_query($cinsert,$con))
			{
				 error_log("\n  error -> class public feedback page -> submit_contactus() -> operation = cinsert! ->".mysql_error(),3, "../logged errors/e.log");
			}
		}
	}
?>