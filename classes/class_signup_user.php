<?php
	class signup_user
	{
		private $_fname;			//code to acess it is = 1
		private $_lname;			//code = 2
		private $_emailid;			//code = 3
		private $_paswd;			//code = 4
		private $_cpaswd;			//code = 5
		private $_catogory;			//code = 6
		private $_pincode;			//code = 7
		private $_subo;			//code = 8
		private $_subz;			//code = 9
		private $_gen;			//code = 10
		private $_phno;			//code = 11
		private $_decide;			//code = 12
		private $_temp;			//temporary variable	code = 13
		function __construct()
		{
			$this->_decide="secure";
		}
		/********************************/
		private function _trimer($data)
		{
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		/***************************************************************/
		public function show_signup_fname()
		{
			return $this->_fname;
		}
		public function show_signup_lname()
		{
			return $this->_lname;
		}
		public function show_signup_emailid()
		{
			return $this->_emailid;
		}
		public function show_signup_paswd()
		{
			return $this->_paswd;
		}
		public function show_signup_cpaswd()
		{
			return $this->_cpaswd;
		}
		public function show_signup_catogory()
		{
			return $this->_catogory;
		}
		public function show_signup_pincode()
		{
			return $this->_pincode;
		}
		public function show_signup_subo()
		{
			return $this->_subo;
		}
		public function show_signup_subz()
		{
			return $this->_subz;
		}
		public function show_signup_gen()
		{
			return $this->_gen;
		}
		public function show_signup_phno()
		{
			return $this->_phno;
		}
		public function show_signup_decide()
		{
			return $this->_decide;
		}
		public function show_signup_no_of_try()
		{
			return $this->_no_of_try;
		}
		/********************************/
		public function set_fname($data)
		{
			$error="";
			if(empty($data))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_temp=$this->_trimer($data);
				if(empty($this->_temp))
				{
					$error=" required";
					$this->_decide="insecure";
					return $error;
				}
				else
				{
					if(!preg_match("/^[a-zA-Z]*$/",$this->_temp))
					{
						$error="only letters are allowed";
						$this->_decide="insecure";
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
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_temp=$this->_trimer($data);
				if(empty($this->_temp))
				{
					$error=" required";
					$this->_decide="insecure";
					return $error;
				}
				else
				{
					if(!preg_match("/^[a-zA-Z]*$/",$this->_temp))
					{
						$error="only letters are allowed";
						$this->_decide="insecure";
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
		public function set_emailid($data)
		{
			$error="";
			if(empty($data))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_temp=$this->_trimer($data);
				if(empty($this->_temp))
				{
					$error=" required";
					$this->_decide="insecure";
					return $error;
				}
				else
				{
					if(!filter_var($this->_temp,FILTER_VALIDATE_EMAIL))
					{
						$error="Incorrect format";
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
		}
		public function set_paswd($data)
		{
			$error="";
			if(empty($data))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_temp=$this->_trimer($data);
				if(empty($this->_temp))
				{
					$error=" invalid";
					$this->_decide="insecure";
					return $error;
				}
				else
				{
					if(strlen($this->_temp) < 8)
					{
						$error="At least 8 letters";
						$this->_decide="insecure";
						return $error;
					}
					else
					{
						$this->_paswd=$this->_temp;
						return $error;
					}
				}
			}
		}
		public function set_cpaswd($data)
		{
			$error="";
			if(empty($data))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_temp=$data;
				if($this->_temp!=$this->_paswd)
				{
					$error="Password does not match";
					$this->_decide="insecure";
					return $error;
				}
				else
				{
					$this->_cpaswd=$this->_temp;
					return $error;
				}
			}
		}
		public function set_catogory($data)
		{
			$error="";
			if(empty($data))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_temp=$data;
				if(strtolower($this->_temp)=="teacher" || strtolower($this->_temp)=="teachers")
				{
					$this->_catogory=strtolower($this->_temp);
					return $error;
				}
				if(strtolower($this->_temp)=="student" || strtolower($this->_temp)=="students")
				{
					$this->_catogory=strtolower($this->_temp);
					return $error;
				}
				else
				{
					$error="invalid";
					$this->_decide="insecure";
					return $error;
				}
			}
		}
		public function set_pincode($data)
		{
			$error="";
			if(empty($data))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_temp=$data;
				if(empty($this->_temp))
				{
					$error=" invalid";
					$this->_decide="insecure";
					return $error;
				}
				else
				{
					if(($this->_temp>=1)&&($this->_temp<=9999999))
					{
						$this->_pincode=$this->_temp;
						return $error;
					}
					else
					{
						$error=" invalid";
						$this->_decide="insecure";
						return $error;
					}
				}
			}
		}
		public function set_subo($data)
		{
			$error="";
			$catogory=$this->_catogory;
			$this->_temp=$data;
			if($catogory=="teacher" || $catogory=="teachers")
			{
				if($this->_temp=="")
				{
					$error=" required";
					$this->_decide="insecure";
					return $error;
				}
				else
				{
					$this->_subo=$this->_temp;
					return $error;
					//search from data base that thus subject exist or not
				}
			}
			/*elseif($catogory=="student" || $catogory=="students")
			{
				if($this->_temp!="")
				{
					$error="not required";
					$this->_decide="insecure";
					return $error;
				}
				else
				{
					return $error;
				}
			}*/
			elseif($catogory=="")
			{
				$error=" select category";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				/*$error=" invalid category";
				$this->_decide="insecure";
				return $error;*/
			}
		}
		public function set_subz($data)
		{
			$error="";
			$this->_temp=$this->_trimer($data);
			if($this->_temp!="" && !preg_match("/^[a-zA-Z0-9]*$/",$this->_temp))
			{
				$error="incorrect";
				return $error;
			}
			else
			{
				include("connect.php");
				$options=mysql_query("SELECT Subject FROM subject");
				while($row_option=mysql_fetch_array($options))
				{
					if(strtolower($row_option['Subject'])==strtolower($this->_temp))
					{
						$error="subject present in the list";
						$this->_decide="insecure";
						return $error;
					}
					else
					{
						$this->_subz=$this->_temp;
						return $error;
					}
				}
			}
			$error="qwer";
			return $error;
		}
		public function set_gen($data)
		{
			$error="";
			if(empty($data))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_temp=$data;
				if($this->_temp=="male" || $this->_temp=="Male" || $this->_temp=="MALE" || strtolower($this->_temp)=="male")
				{
					$this->_gen=strtolower($this->_temp);
					return $error;
				}
				if($this->_temp=="FEMALE" || $this->_temp=="Female" || $this->_temp=="female" || strtolower($this->_temp)=="female")
				{
					$this->_gen=strtolower($this->_temp);
					return $error;
				}
				else
				{
					$error="invalid";
					$this->_decide="insecure";
					return $error;
				}
			}
		}
		public function set_phno($data)
		{
			$error="";
			if(empty($data))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_temp=$data;
				if(empty($this->_temp))
				{
					$error=" invalid";
					$this->_decide="insecure";
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
						$this->_decide="insecure";
						return $error;
					}
				}
			}
		}
		/***********************************************************teacher*****************************************************************/
		public function _teacher_add_info($d)
		{
			$err=0;
			$usi=md5(uniqid(rand(),true));
			$usi= substr($usi,0,20);
			if($this->_decide=="secure" and $d=="ready")
			{
				$tsi=md5(uniqid(rand(),true));
				$tsi= substr($tsi,0,20);
				include("connect.php");
				$check2 = mysql_query("SELECT * FROM user_system_info");
				while($row = mysql_fetch_array($check2))
				{
					$u=$row['Unique_user_id'];
					$t=$row['T_uniqueid'];
					$e=$row['Emailid'];
					if(($usi==$u)||($tsi==$t))
					{
						error_log("error -> class_signup_user.php -> function_teacher_add_info() -> operation = unique id generated during signup already exist in database!",3, "../logged errors/e.log");
						return "some error occured....";
					}
					if($this->_emailid == $e)
					{
						return "This email id is already registered";
					}
				}
				include("db and tables/connect.php");
				$s_insert="INSERT INTO user_system_info
				(
				Unique_user_id,
				T_uniqueid,
				S_uniqueid,
				Emailid
				)
				VALUES
				(
				'$usi',
				'$tsi',
				'',
				'$this->_emailid'
				)";
				if (!mysql_query($s_insert,$con))
				{
					$err++;//stoping further action
					die('Unable to create your account Error: TWE_TPI01' . mysql_error(). error_log("\nerror -> class_signup_user.php -> function_teacher_add_info() -> operation = s_insert of teacherers!\n",3, "../logged errors/e.log"));
					return "some error occured!";
				}
				$un=0;
				if($err==0) //feching unique id's
				{
					$search = mysql_query("SELECT * FROM user_system_info WHERE Emailid = '$this->_emailid'");
					while($search_row= mysql_fetch_array($search))
					{
						if(!empty($search_row['Emailid']) && $search_row['Emailid'] = '$this->_emailid' )
						{
							$un= $search_row['User_no'];//declared
							$usi= $search_row['Unique_user_id'];//redefined
							$tsi= $search_row['T_uniqueid'];//redifined
						}
					}
					if($un<1000)
					{
						$ref=md5(uniqid(rand(),true));
						$ref=substr($ref,0,4);
						$ref=substr($tsi,0,1).$ref.$un;
					}
					else
					{
						$ref=md5(uniqid(rand(),true));
						$ref=substr($ref,0,3);
						$ref=$ref.$un.substr($tsi,0,1);
					}
				}
				if($err==0) //insert in primary of teacher
				{
					$primary_insert="INSERT INTO teachers_primary_info
					(
					User_no,
					Unique_user_id,
					T_uniqueid,
					Firstname,
					Lastname,
					Emailid,
					Password,
					Confirmpassword,
					Gender,
					Phonenumber,
					Category,
					Subject1,
					Subject2,
					Subject3,
					Security,
					Encrypted,
					Pincode,
					Wallet,
					Referal_id
					)
					VALUES
					(
					'$un',
					'$usi',
					'$tsi',
					'$this->_fname',
					'$this->_lname',
					'$this->_emailid',
					'$this->_paswd',
					'$this->_cpaswd',
					'$this->_gen',
					'$this->_phno',
					'$this->_catogory',
					'$this->_subo',
					'',
					'$this->_subz',
					'$this->_decide',
					'false',
					'$this->_pincode',
					'20',
					'$ref'
					)";
					if (!mysql_query($primary_insert,$con))
					{
						$err=1;
						die('Unable to create your account Error: TWE_TPI02' . error_log("\n".mysql_error(),3, "../logged errors/e.log"));
						return "unsucessful";
					}
				}
				if($err==0) //insert in secondry of teacher
				{
					$secondary_insert = "INSERT INTO teachers_secondary_info
					(
					User_no,
					Unique_user_id,
					T_uniqueid,
					Emailid,
					Qualifications,
					Profession,
					Worksat,
					Experience,
					Address,
					City,
					STATE,
					Image_name,
					Display_Format,
					Maintain_emailid,
					Maintain_phonenumber,
					Setting_Page_No,
					Description
					)
					VALUES
					(
					'$un',
					'$usi',
					'$tsi',
					'$this->_emailid',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'ao1.JPEG',
					'',
					'no',
					'no',
					'1',
					''
					)";
					if (!mysql_query($secondary_insert,$con))
					{
						$err=1;
						die('Unable to create your account Error: TWE_TPI03' . error_log("\n".mysql_error(),3, "../logged errors/e.log"));
						return "unsucessful";
					}
				}
				if($err==0) //insert in teachers_system_info of teacher
				{
					$teachers_system_info_insert="INSERT INTO teachers_system_info 
					(
					User_no,
					Unique_user_id,
					T_uniqueid,
					Emailid,
					No_Of_Login,
					No_Of_Logout_Used,
					Last_Login_Date,
					Successful_Referal,
					Login_status,
					Dp_Present,
					Profile_Status,
					Recieve_Notification,
					Password_Reset,
					Amount_Transacted,
					Previous_Password,
					Account_Status,
					Refering_person_id,
					Signup_Date,
					Signup_Time,
					Wallet_System_Confirm
					)
					VALUES
					(
					'$un',
					'$usi',
					'$tsi',
					'$this->_emailid',
					'1',
					'0',
					now(),
					'0',
					'online',
					'No',
					'Not completed',
					'Yes',
					'No',
					'0',
					'',
					'Active',
					'',
					now(),
					CURRENT_TIMESTAMP(),
					'20'
					)";
					if (!mysql_query($teachers_system_info_insert,$con))
					{
						$err=1;
						die('Unable to create your account Error: TWE_TPI04' . error_log("\n".mysql_error(),3, "../logged errors/e.log"));
						return "unsucessful";
					}
				}
				if($err==0)
				{
					$teachers_system_more_info_insert="INSERT INTO teachers_system_more_info
					(
					User_no,
					Unique_user_id,
					T_uniqueid,
					Emailid,
					Message_send_to_Tech,
					Email_send_to_Tech,
					Feedback_Added,
					Complain_Added,
					Comment_Added,
					Advertising_With_Us,
					TutorsWeb_Member
					)
					VALUES
					(
					'$un',
					'$usi',
					'$tsi',
					'$this->_emailid',
					'0',
					'0',
					'0',
					'0',
					'0',
					'No',
					'No'
					)";
					if (!mysql_query($teachers_system_more_info_insert,$con))
					{
						$err=1;
						die('Unable to create your account Error: TWE_TPI05' . error_log("\n".mysql_error(),3, "../logged errors/e.log"));
						return "unsucessful";
					}
				}
				if($err==0)//start of teacher stats info
				{
					$teachers_stats_info_insert="INSERT INTO teachers_stats_info
					(
					User_no,
					Unique_user_id,
					T_uniqueid,
					Emailid,
					Rating,
					Total_People_Rated,
					Monthly_People_Rated,
					Total_Views,
					Monthly_Views,
					Total_Likes,
					Monthly_Likes,
					Teaching_Request,
					Total_Comments,
					Monthly_Comments,
					No_Of_Batches,
					No_Of_Students,
					Last_Updated_Date,
					Last_Updated_Time
					)
					VALUES
					(
					'$un',
					'$usi',
					'$tsi',
					'$this->_emailid',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					'0',
					now(),
					CURRENT_TIMESTAMP()
					)";
					if (!mysql_query($teachers_stats_info_insert,$con))
					{
						$err=1;
						die('Unable to create your account Error: TWE_TPI06' . error_log("\n".mysql_error(),3, "../logged errors/e.log"));
						return "unsucessful";
					}
				}
				if($err==0)//session start
				{
					session_start();
					if(isset($_SESSION['teacher_id']) || isset($_SESSION['emailid']) || isset($_SESSION['catogory']) || isset($_SESSION['name']) || isset($_SESSION['tooltip']))
					{
						error_log("\n Session already existed so the  session was destroyed while signup",3, "../logged errors/e.log");
						session_destroy();
					}
					$_SESSION['name']=htmlspecialchars($this->_fname)." ". htmlspecialchars($this->_lname);
					$_SESSION['emailid'] =htmlspecialchars($this->_emailid);
					$_SESSION['catogory'] =htmlspecialchars($this->_catogory);
					$_SESSION['teacher_id'] =htmlspecialchars($tsi);
					$_SESSION['tooltip'] =htmlspecialchars("yes"); 	//to display tooltip or not
					$_SESSION['display'] =htmlspecialchars("yes"); 	//to display the page or not
					$_SESSION['set_page_no']=1;
					$_SESSION['WELCOME']=1;
					//insert notification with welcome message
					
					include("class_teacher_notification.php");
					$test=new notification;
					$test->set_tui($tsi);
					$test->set_emailid($this->_emailid);
					$test->set_nc("General");
					$test->set_nt("Welcome");
					$test->set_np("yes");
					$test->set_ns("Welcome to Tutorsweb");
					$test->set_sname("Tutorsweb");
					$test->set_sid("A2025");
					$test->set_se("support@tutorsweb.com");
					$test->set_v("yes");
					$test->set_nss("sending");
					$test->set_nl("www.w3schools.com");
					$test->set_nimg("a.jpg");
					$test->set_nmess("Complete your profile and enjoy the services available...");
					$ret=$test->decide();
					if($ret!="added")
					{
						error_log("\n"."error -> class_signup_user.php -> adding notification -> \n".mysql_error(),3, "../logged errors/e.log");
					}
					/***********mail part**********/
					/*require_once("mail.php");
					$send=new send_mail;
					$send->set_to($_SESSION['emailid']);
					$send->set_subject('thanks you for registering at www.tutorpile.tk');
					$send->set_message("
					<html>
					<head>
					<title>tutorpile</title>
					</head>
					<body>
					<p>This to inform you that you have registered at www.tutorpile.tk.</p>
					<p>Your registration details are :</p>
					<table>

					<tr>
					<td>Name : <td>
					<td>$_SESSION['name']<td>
					</tr>

					<tr>
					<td>email id : </td>
					<td>$_SESSION['emailid']</td>
					</tr>

					<tr>
					<td>password : </td>
					<td>*********</td>
					</tr>

					<tr>
					<td>mobile number : </td>
					<td>$this->_phno</td>
					</tr>

					</table>
					<p>Congrats, for a new tutorweb account.</p>
					<p>Please, update your profile by going to settings section.</p>
					<p>For further query please contact our customer care at - support@tutorpile.tk<br/><br/></p>
					<p>Thank You,<br/><strong>Tutor Pile</strong><br/>(www.tutorpile.tk)</p>
					</body>
					</html>
					");
					$send->set_decide();*/
					/***********mail part**********/
					
					//after alltask return success
					return "success";
				}
			}
			else
			{
				error_log("\n"."error -> class_signup_user.php -> function_students_add_info() -> operation = system has stopped the illegal access to our teachers system....!\n",3, "../logged errors/e.log");
				return "our system has stopped your illegal access to our system....";
			}
		}
		/************************************************************student****************************************************************/
		private function _student_add_info($d)
		{
			$err=0;
			$usi=md5(uniqid(rand(),true));
			$usi= substr($usi,0,20);
			if($this->_decide=="secure" && $d=="ready")
			{
				$tsi=md5(uniqid(rand(),true));
				$tsi= substr($tsi,0,20);
				include("db and tables/connect.php");
				$check2 = mysql_query("SELECT * FROM user_system_info");
				while($row = mysql_fetch_array($check2))
				{
					$u=$row['Unique_user_id'];
					$t=$row['S_uniqueid'];
					$e=$row['Emailid'];
					if(($usi==$u)||($tsi==$t))
					{
						error_log("\n error -> class_signup_user.php -> function_students_add_info() -> operation = unique id generated during signup already exist in database!",3, "../logged errors/e.log");
						return "some error occured....";
					}
					if($this->_emailid == $e)
					{
						return "This email id is already registered";
					}
				}
				include("connect.php");
				$s_insert="INSERT INTO user_system_info
				(
				Unique_user_id,
				T_uniqueid,
				S_uniqueid,
				Emailid
				)
				VALUES
				(
				'$usi',
				'',
				'$tsi',
				'$this->_emailid'
				)";
				if (!mysql_query($s_insert,$con))
				{
					$err++;// stopping further action
					die('Unable to create your account Error: TWE_SPI01' . error_log("\n error -> class_signup_user.php -> function_students_add_info() -> operation = s_insert of student! -> ".mysql_error(),3, "../logged errors/e.log"));
					return "some error occured!";
				}
				/**************student primary info****************start********/
				$un=0;
				if($err==0) //feching unique id's
				{
					$search = mysql_query("SELECT * FROM user_system_info WHERE Emailid = '$this->_emailid'");
					while($search_row= mysql_fetch_array($search))
					{
						if(!empty($search_row['Emailid']) && $search_row['Emailid'] = '$this->_emailid' )
						{
							$un= $search_row['User_no'];//declared
							$usi= $search_row['Unique_user_id'];//redefined
							$tsi= $search_row['S_uniqueid'];//redifined
						}
					}
					if($un<1000)
					{
						$ref=md5(uniqid(rand(),true));
						$ref= substr($ref,0,4);
						$ref=substr($tsi,0,1).$ref.$un;
					}
					else
					{
						$ref=md5(uniqid(rand(),true));
						$ref= substr($ref,0,3);
						$ref=$ref.$un.substr($tsi,0,1);
					}
				}
				if($err==0) // insert in student primary
				{
					require_once("connect.php");
					$s_insert_primary="INSERT INTO students_primary_info
					(
						User_no,
						Unique_user_id,
						S_uniqueid,
						Firstname,
						Lastname,
						Emailid,
						Password,
						Confirmpassword,
						Gender,
						Phonenumber,
						Category,
						Security,
						Encrypted,
						Pincode,
						Wallet,
						Referal_id
					)
					VALUES
					(
						'$un',
						'$usi',
						'$tsi',
						'$this->_fname',
						'$this->_lname',
						'$this->_emailid',
						'$this->_paswd',
						'$this->_cpaswd',
						'$this->_gen',
						'$this->_phno',
						'$this->_catogory',
						'$this->_decide',
						'false',
						'$this->_pincode',
						'20',
						'$ref'
					)";
					if (!mysql_query($s_insert_primary,$con))
					{
						$err=1;
						die('Unable to create your account Error: TWE_SPI02' . error_log("\n error -> class_signup_user.php -> function_students_add_info() -> operation = s_insert_primary of student! ->".mysql_error(),3, "../logged errors/e.log"));
						return "unsucessful";
					}
				}
				/**************student primary info****************end********/
				if($err==0) // secondary insert
				{
					$s_student_sec="INSERT INTO students_secondary_info
					(
					User_no,
					Unique_user_id,
					S_uniqueid,
					Emailid,
					Institute,
					Institute_address,
					Standard,
					Address,
					City,
					Istate,
					Image_name,
					Display_Format,
					Maintain_emailid,
					Maintain_phonenumber,
					Setting_Page_No,
					Description
					)
					VALUES
					(
					'$un',
					'$usi',
					'$tsi',
					'$this->_emailid',
					'',
					'',
					'',
					'',
					'',
					'',
					'ao1.JPEG',
					'',
					'no',
					'no',
					'1',
					''
					)
					";
					if (!mysql_query($s_student_sec,$con))
					{
						$err=1;
						die('Unable to create your account Error: TWE_SSI03' . error_log("\n error -> class_signup_user.php -> function_students_add_info() -> operation = s_student_sec of student! ->".mysql_error(),3, "../logged errors/e.log"));
						return "unsucessful";
					}
				}
				if($err==0) // Students system update
				{
					$s_student_sys="INSERT INTO students_system_info
					(
					User_no,
					Unique_user_id,
					S_uniqueid,
					Emailid,
					No_Of_Login,
					No_Of_Logout_Used,
					Last_Login_Date,
					Successful_Referal,
					Login_status,
					Dp_Present,
					Profile_Status,
					Recieve_Notification,
					Password_Reset,
					Amount_Transacted,
					Previous_Password,
					Account_Status,
					No_Of_Batches,
					No_Of_Students,
					Refering_person_id,
					Signup_Date,
					Signup_Time,
					Wallet_System_Confirm
					)
					VALUES (
					'$un',
					'$usi',
					'$tsi',
					'$this->_emailid',
					'1',
					'0',
					now(),
					'0',
					'online',
					'No',
					'Not completed',
					'Yes',
					'No',
					'0',
					'',
					'Active',
					'0',
					'0',
					'',
					now(),
					CURRENT_TIMESTAMP(),
					'20'
					)";
					if (!mysql_query($s_student_sys,$con))
					{
						$err=1;
						die('Unable to create your account Error: TWE_SSI04' . error_log("\n  error -> class_signup_user.php -> function_students_add_info() -> operation = s_student_sys of student! ->".mysql_error(),3, "../logged errors/e.log"));
						return "unsucessful";
					}
				}
				if($err==0)//session start
				{
					session_start();
					if(isset($_SESSION['student_id']) || isset($_SESSION['emailid']) || isset($_SESSION['catogory']) || isset($_SESSION['name']) || isset($_SESSION['tooltip']) || isset($_SESSION['display']))
					{
						error_log("\n Session already existed so the  session was destroyed while signup of student",3, "../logged errors/e.log");
						session_destroy();
					}
					$_SESSION['name']=htmlspecialchars($this->_fname)." ". htmlspecialchars($this->_lname);
					$_SESSION['emailid'] =htmlspecialchars($this->_emailid);
					$_SESSION['catogory'] =htmlspecialchars($this->_catogory);
					$_SESSION['student_id'] =htmlspecialchars($tsi);
					$_SESSION['tooltip'] =htmlspecialchars("yes"); 	//to display tooltip or not
					$_SESSION['display'] =htmlspecialchars("yes"); 	//to display the page or not
					$_SESSION['set_page_no']=1;
					$_SESSION['WELCOME']=1;
					//insert notification with welcome message
					

					$nid=md5(uniqid(rand(),true));
					$nid=substr($nid,0,30);
					// add notification
					require_once("class_add_student_notifications.php");
					$test=new add_student_notifications;
					$test->set_sui($_SESSION['student_id']);
					$test->set_emailid($_SESSION['emailid']);
					$test->set_nc("General");
					$test->set_nt("Welcome");
					$test->set_np("yes");
					$test->set_ns("Welcome to Tutorsweb");
					$test->set_tname("Tutorsweb");
					$test->set_tid("A2025");
					$test->set_te("support@tutorsweb.com");
					$test->set_v("no");
					$test->set_nss("sending");
					$test->set_nl("www.w3schools.com");
					$test->set_nimg("a.jpg");
					$test->set_nmess("Complete your profile and enjoy the services available...");
					$ret=$test->decide();
					if($ret!="added")
					{
						error_log("\n"."error -> class_signup_user.php -> adding welcome notification of students -> \n".mysql_error(),3, "../logged errors/e.log");
					}
					/***********mail part**********/
					/*require_once("mail.php");
					$send=new send_mail;
					$send->set_to($_SESSION['emailid']);
					$send->set_subject('thanks you for registering at www.tutorpile.tk');
					$send->set_message("
					<html>
					<head>
					<title>tutorpile</title>
					</head>
					<body>
					<p>This to inform you that you have registered at www.tutorpile.tk.</p>
					<p>Your registration details are :</p>
					<table>

					<tr>
					<td>Name : <td>
					<td>$_SESSION['name']<td>
					</tr>

					<tr>
					<td>email id : </td>
					<td>$_SESSION['emailid']</td>
					</tr>

					<tr>
					<td>password : </td>
					<td>*********</td>
					</tr>

					<tr>
					<td>mobile number : </td>
					<td>$this->_phno</td>
					</tr>

					</table>
					<p>Congrats, for a new tutorweb account.</p>
					<p>Please, update your profile by going to settings section.</p>
					<p>For further query please contact our customer care at - support@tutorpile.tk<br/><br/></p>
					<p>Thank You,<br/><strong>Tutor Pile</strong><br/>(www.tutorpile.tk)</p>
					</body>
					</html>
					");
					$send->set_decide();*/
					/***********mail part**********/
					//after alltask return success
					return "success";
				}
			}
			else
			{
				error_log("\n error -> class_signup_user.php -> function_students_add_info() -> operation = system has stopped the illegal access to our student system....!",3, "../logged errors/e.log");
				return "our system has stopped your illegal access to our system....";
			}
		}
		/**********************************************************************************************************************************/
		public function set_decide()
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
				if($this->_catogory=="teacher" || $this->_catogory=="teachers")
				{
					$msg=$this->_teacher_add_info("ready");			//it willeither return sucess or error
					if($msg=="success")
					{
						echo "Your account has been created secussfull, Please Wait...";
						
						header("location:teacher_profile.php");
					}
					else
					{
						$this->_decide="insecure";
						return $msg;//return unsucessful
					}
				}
				elseif($this->_catogory=="student" || $this->_catogory=="students")
				{
					$msg=$this->_student_add_info("ready");
					if($msg=="success")
					{
						echo  "Your account has been successfully created..<br/>Please Wait";
						header("location:student_profile.php");
					}
					else
					{
						$this->_decide="insecure";
						return $msg;
					}
				}
				else
				{
					$error="UNIDENTIFIED ACCESS IS DENIED.....";
					$this->_decide="insecure";
					return $error;
				}
			}
			else
			{
				$error="Access denied by our system.";
				$this->_decide="insecure";
				return $error;
			}
		}
	}
?>