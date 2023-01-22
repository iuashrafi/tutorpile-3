<?php
	class login_user
	{
		private $_emailid;
		private $_paswd;
		private $_catogory;
		private $_temp;			//temporary variable
		private $_decide;
		function __construct()
		{
			$this->_decide="secure";
		}
		private function _trimer($data)
		{
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		public function set_emailid($data)
		{
			$error="";
			$data=$this->_trimer($data);
			if(empty($data))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_temp=$data;
				if(!filter_var($this->_temp,FILTER_VALIDATE_EMAIL))
				{
					$error="Incorrect";
					$this->_decide="insecure";
					return $error;
				}
				else
				{
					$this->_emailid=$this->_temp;
					return $error;
				}
			}
		}
		public function set_paswd($data)
		{
			$error="";
			$data=$this->_trimer($data);
			if(empty($data))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_paswd=$data;
				return $error;
			}
		}
		public function set_catogory($data)
		{
			$error="";
			$data=$this->_trimer($data);
			if(empty($data))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_catogory=strtolower($data);
				return $error;
			}
		}
		/*****************************************/
		private function check_user()
		{
			/***********************teacher check****************************/
			if($this->_catogory == "teacher" || $this->_catogory == "teachers")
			{
				include("connect.php");
				$checking=mysql_query("SELECT T_uniqueid,Firstname,Lastname,Emailid,Password,Category FROM teachers_primary_info WHERE Emailid='$this->_emailid' AND Category='$this->_catogory' AND Password='$this->_paswd' ");
				$row=mysql_fetch_array($checking);
				if(!empty($row['Emailid']) && !empty($row['Password']) && !empty($row['Category']))
				{
					if($this->_emailid==$row['Emailid'] && $this->_paswd==$row['Password'] && $this->_catogory==$row['Category'])
					{
						//start the session now
						session_start();
						if(isset($_SESSION['teacher_id']) || isset($_SESSION['emailid']) || isset($_SESSION['catogory']) || isset($_SESSION['name']) || isset($_SESSION['tooltip']) || isset($_SESSION['display']))
						{
							error_log("\n Session already existed so the  session was destroyed while log in",3, "../logged errors/e.log");
							session_destroy();
						}
					//	error_log("\n Session created while login",3, "../logged errors/e.log");//remove it later
						$_SESSION['name']=htmlspecialchars($row['Firstname'])." ". htmlspecialchars($row['Lastname']);
						$_SESSION['emailid'] =htmlspecialchars($row['Emailid']);
						$_SESSION['catogory'] =htmlspecialchars($row['Category']); 
						$_SESSION['teacher_id'] =htmlspecialchars($row['T_uniqueid']);
						$_SESSION['set_page_no']=1;
						$_SESSION['WELCOME']=1;
						//other works
						$l=0;
						$checking2=mysql_query("SELECT T_uniqueid,Emailid,No_Of_Login,Last_Login_Date,Login_status,Account_Status FROM teachers_system_info WHERE Emailid='$this->_emailid' AND T_uniqueid='$_SESSION[teacher_id]' ");
						$row2= mysql_fetch_array($checking2);
						if(!empty($row2['T_uniqueid']) && !empty($row2['Emailid']) && !empty($row2['No_Of_Login']) && !empty($row2['Last_Login_Date']) && !empty($row2['Login_status']) && !empty($row2['Account_Status']) && $this->_emailid==$row2['Emailid'])
						{
							$l=$row2['No_Of_Login'];
							if($l<=5)
							{
								$_SESSION['tooltip'] =htmlspecialchars("yes"); 	//to display tooltip or not
								$_SESSION['display'] =htmlspecialchars("yes");
							}
							else
							{
								$_SESSION['tooltip'] =htmlspecialchars("no");
								$_SESSION['display'] =htmlspecialchars("yes");
							}
							$l++;
							if($row2['Account_Status']!="Active")
							{
								echo "<div class='text-danger'>Your account is deactivated.you can activate it by contacting us!</div>";
								return "not allowed";
							}
							else
							{
								//update the database here
								if(mysql_query("UPDATE teachers_system_info
								SET No_Of_Login= '$l', Last_Login_Date= now(), Login_status = 'online' 
								WHERE Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]' "))
								{
									echo "Successfully logging in...<br/>";
									header("location:teacher_profile.php");		//redirect to other page
								}
								else
								{
									error_log("\nunable to update the login details - ".mysql_error(),3, "../logged errors/e.log");
									echo "<div class='text-danger'>Some error occured, please retry...</div>";
									return "not allowed";
								}
								
							}
						}
						else
						{
							error_log("\n page->class_login_user.php -> unable to fetch information from teachers system info ".mysql_error(),3, "../logged errors/e.log");
							session_destroy();
							return "not allowed";
						}
					}
					else
					{
						echo "<div class='text-danger'>Email id or Password is incorrect</div>";
						return "not allowed";
					}
				}
				else
				{
					echo "<div class='text-danger'>Email id or Password is incorrect</div>";
					return "not allowed";
				}
			}
			/***************************************************/
			/***********************Student check****************************/
			elseif($this->_catogory == "student" || $this->_catogory == "students")
			{
				/*****************************************************************************************/
				include("connect.php");
				$checking=mysql_query("SELECT S_uniqueid,Firstname,Lastname,Emailid,Password,Category FROM students_primary_info WHERE Emailid='$this->_emailid' AND Category='$this->_catogory' AND Password='$this->_paswd' ");
				$row=mysql_fetch_array($checking);
				if(!empty($row['Emailid']) && !empty($row['Password']) && !empty($row['Category']))
				{
					if($this->_emailid==$row['Emailid'] && $this->_paswd==$row['Password'] && $this->_catogory==$row['Category'])
					{
						//start the session now
						session_start();
						if(isset($_SESSION['student_id']) || isset($_SESSION['emailid']) || isset($_SESSION['catogory']) || isset($_SESSION['name']) || isset($_SESSION['tooltip']) || isset($_SESSION['display']))
						{
							error_log("\n Session already existed so the  session was destroyed while log in of student",3, "../logged errors/e.log");
							session_destroy();
						}
						error_log("\n Session created while login of student",3, "../logged errors/e.log");//remove it later
						$_SESSION['name']=htmlspecialchars($row['Firstname'])." ". htmlspecialchars($row['Lastname']);
						$_SESSION['emailid'] =htmlspecialchars($row['Emailid']);
						$_SESSION['catogory'] =htmlspecialchars($row['Category']); 
						$_SESSION['student_id'] =htmlspecialchars($row['S_uniqueid']);
						$_SESSION['set_page_no'] =1;
						$_SESSION['WELCOME']=1;
						//other works
						$l=0;
						$checking2=mysql_query("SELECT S_uniqueid,Emailid,No_Of_Login,Last_Login_Date,Login_status,Account_Status FROM students_system_info WHERE Emailid='$this->_emailid' AND S_uniqueid='$_SESSION[student_id]' ");
						$row2= mysql_fetch_array($checking2);
						if(!empty($row2['S_uniqueid']) && !empty($row2['Emailid']) && !empty($row2['No_Of_Login']) && !empty($row2['Last_Login_Date']) && !empty($row2['Login_status']) && !empty($row2['Account_Status']) && $this->_emailid==$row2['Emailid'])
						{
							$l=$row2['No_Of_Login'];
							if($l<=5)
							{
								$_SESSION['tooltip'] =htmlspecialchars("yes"); 	//to display tooltip or not
								$_SESSION['display'] =htmlspecialchars("yes");
							}
							else
							{
								$_SESSION['tooltip'] =htmlspecialchars("no");
								$_SESSION['display'] =htmlspecialchars("yes");
							}
							$l++;
							if($row2['Account_Status']!="Active")
							{
								echo "<div class='text-danger'>Your account is deactivated.you can activate it by contacting us!</div>";
								return "not allowed";
							}
							else
							{
								//update the database here
								if(mysql_query("UPDATE students_system_info
								SET No_Of_Login= '$l', Last_Login_Date= now(), Login_status = 'online' 
								WHERE Emailid='$_SESSION[emailid]' AND S_uniqueid='$_SESSION[student_id]' "))
								{
									echo "Successfully logging in...<br/>";
									header("location:student_profile.php");		//redirect to other page
								}
								else
								{
									error_log("\nunable to update the login details - ".mysql_error(),3, "../logged errors/e.log");
									echo "<div class='text-danger'>Some error occured, please retry...</div>";
									return "not allowed";
								}
								
							}
						}
						else
						{
							error_log("\n page->class_login_user.php -> unable to fech information from teachers system info ".mysql_error(),3, "../logged errors/e.log");
							session_destroy();
							return "not allowed";
						}
					}
					else
					{
						echo "<div class='text-danger'>Email id or Password is incorrect</div>";
						return "not allowed";
					}
				}
				else
				{
					echo "<div class='text-danger'>Email id or Password is incorrect</div>";
					return "not allowed";
				}
				/*****************************************************************************************/
			}
			/***************************************************/
			else
			{
				return "not allowed";
			}
		}
		public function check_login()
		{
			$error="";
			if($this->_decide=="insecure")
			{
				$error="Unauthorizes Access denied by our system...";
				$this->_decide="insecure";
				return $error;
			}
			elseif($this->_decide=="secure")
			{
				$flag=$this->check_user();				//it will either return correct or not allowed
				if($flag=="correct")
					return "logging into your account....";
				else
					return $flag;
			}
			else
			{
				$error="Unspecified Access denied by our system...";
				$this->_decide="insecure";
				return $error;
			}
		}
	}
?>