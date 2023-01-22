<?php
	class student
	{
		private $_uui;			//Unique_user_id
		private $_bn;			//Batch_no
		private $_bi;			//Batches_id
		private $_bname;		//Batch_Name
		private $_sname;		//Students_Name
		private $_semail;		//Students_Emailid
		private $_phno;			//S_Phonenumber
		private $_sjm;			//Students_joining_month
		private $_sjdy;			//Student_Joining_Date_year
		private $_std;			//Students_Standard
		private $_scl;			//Students_School
													//Students_Deleted  ;it will store yes or no
		private $_sadd;			//Students_Address
		private $_temp;			//temporary variable
		private $_batch_ending_year;			//temporary variable
		private $_decide;		//decide variable
		function __construct()
		{
			$this->_decide="secure";	//after checking add an alphabet
		}
		private function _trimer($data)
		{
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		/*****************************************************************************************************************************************/
		public function set_semail($data)
		{
			$error="";
			if(empty($data))
			{
				/*$error=" required";
				$this->_decide="insecure";
				return $error;*/
				$this->_semail="";
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
					if(!filter_var($this->_temp,FILTER_VALIDATE_EMAIL))
					{
						$error="Incorrect format";
						$this->_decide="insecure";
						return $error;
					}
					else
					{
						$this->_semail=$this->_temp;
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
						$check_phno= mysql_query("SELECT * FROM teachers_students_info WHERE Batches_id= '$this->_bi' AND Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]'");
						while($row9494= mysql_fetch_array($check_phno))
						{
							$C= $row9494['S_Phonenumber'];
							if($C==$this->_temp)
							{
								$error=" already assigned";
								$this->_decide="insecure";
								return $error;
							}
						}
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
		public function set_sname($data)
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
					if(!preg_match("/^([a-zA-ZÀ-ÿ-' ]+)$/",$this->_temp))
					{
						$error=" only letters are allowed";
						$this->_decide="insecure";
						return $error;
					}
					else
					{
						$this->_sname=$this->_temp;
						return $error;
					}
				}
			}
		}
		public function set_bname($data)
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
					if(!preg_match("/^([a-zA-Z0-9À-ÿ-' ]+)$/",$this->_temp))
					{
						$error=" only letters are allowed";
						$this->_decide="insecure";
						return $error;
					}
					else
					{
						$this->_bname=$this->_temp;
						return $error;
					}
				}
			}
		}
		public function set_uui($data)
		{
			$error="";
			$this->_temp=$this->_trimer($data);
			if(empty($this->_temp))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_uui=$this->_temp;
				return $error;
			}
		}
		public function set_bn($data)
		{
			$error="";
			$this->_temp=$this->_trimer($data);
			if(empty($this->_temp))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_bn=$this->_temp;
				return $error;
			}
		}
		public function set_bi($data)
		{
			$error="";
			$this->_temp=$this->_trimer($data);
			if(empty($this->_temp))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_bi=$this->_temp;
				return $error;
			}
		}
		public function set_sjm($data)
		{
			$error="";
			$this->_temp=$this->_trimer(substr($data,5));
			if(empty($this->_temp))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_sjm=$this->_temp;
				return $error;
			}
		}
		public function set_sjdy($data)
		{
			$error="";
			$this->_temp=$this->_trimer(substr($data,0,4));
			if(empty($this->_temp))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_sjdy=$this->_temp;
				return $error;
			}
		}
		public function set_std($data)
		{
			$error="";
			$this->_temp=$this->_trimer($data);
			if(empty($this->_temp))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_std=$this->_temp;
				return $error;
			}
		}
		public function _uui($data)
		{
			$error="";
			$this->_temp=$this->_trimer($data);
			if(empty($this->_temp))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_uui=$this->_temp;
				return $error;
			}
		}
		public function set_scl($data)
		{
			$error="";
			$this->_temp=$this->_trimer($data);
			if(empty($this->_temp))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				if(!preg_match("/^([a-zA-Z.0-9À-ÿ-' ]+)$/",$this->_temp))
				{
					$error=" only letters are allowed";
					$this->_decide="insecure";
					return $error;
				}
				else
				{
					$this->_scl=$this->_temp;
					return $error;
				}
			}
		}
		public function set_sadd($data)
		{
			$error="";
			$this->_temp=$this->_trimer($data);
			if(empty($this->_temp))
			{
				$error=" required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				if(preg_match("/^[?&$#^!@]*$/",$this->_temp))
				{
					$error=" invalid";
					$this->_decide="insecure";
					return $error;
				}
				else
				{
					$this->_sadd=$this->_temp;
					return $error;
				}
			}
		}
		public function create_student()
		{
			$error="";
			if($this->_decide=="insecure")
			{
				$error="Unauthorizes Access denied by our system...";
				$this->_decide="insecure";
				return $error;
			}
			elseif($this->_decide=="secure" && $this->_bi!="" && $this->_uui!="")
			{
				
				//it will either return 'created' or 'not created'
				/****************************************************************************************************************************************/
				/***************creating payment table****************************/
					$f=0;
					$b=$this->_bi;
					$this->_batch_ending_year=0;
					$check_ey= mysql_query("SELECT T_uniqueid,Emailid,Batches_id,Batch_Fees,Batch_end_year FROM teachers_batches_info WHERE Batches_id= '$b' AND Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]'");
					while($r564= mysql_fetch_array($check_ey))
					{
						if($r564['Batches_id'] == $this->_bi)
						{
							$this->_batch_ending_year= $r564['Batch_end_year'];			//check this statement
							$f= $r564['Batch_Fees'];				//check this statement
						}
					}
				/**********************************end payment part*******************************/
				//add new student her
				$si=md5(uniqid(rand(),true));		
				$si= substr($si,0,35);
				require("connect.php");
				$student_insert="INSERT INTO teachers_students_info 
				(
				Unique_user_id,
				T_uniqueid,
				Emailid,
				Batch_no,
				Batches_id,
				Batch_Name,
				Students_id,
				Students_Name,
				Students_Emailid,
				Gender,
				S_Phonenumber,
				Students_Standard,
				Students_School,
				Students_joining_month,
				Student_Joining_Date_year,
				Student_Joining_Date,
				Student_Joining_Time,
				Students_Fees,
				Students_Deleted,
				Students_Address,
				Students_percentage,
				Students_Quality
				)
					
				VALUES
				(
				'$this->_uui',
				'$_SESSION[teacher_id]',
				'$_SESSION[emailid]',
				'$this->_bn',
				'$this->_bi',
				'$this->_bname',
				'$si',
				'$this->_sname',
				'$this->_semail',
				'',
				'$this->_phno',
				'$this->_std',
				'$this->_scl',
				'$this->_sjm',
				'$this->_sjdy',
				 now(),
				 CURRENT_TIMESTAMP(),
				'$f',
				'no',
				'$this->_sadd',
				'',
				''
				)";
				if (!mysql_query($student_insert,$con))
				{
					die('Unable to create the student: ' . error_log("\n unable to create the student in teachers_batch_more_info.php page -> ".mysql_error(),3, "../logged errors/e.log"));
					return "not created";
				}
				else
				{
					/***************creating payment table****************************/
					$f=0;
					$b=$this->_bi;
					$this->_batch_ending_year=0;
					$check_ey= mysql_query("SELECT T_uniqueid,Emailid,Batches_id,Batch_Fees,Batch_end_year FROM teachers_batches_info WHERE Batches_id= '$b' AND Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]'");
					while($r564= mysql_fetch_array($check_ey))
					{
						if($r564['Batches_id'] == $this->_bi)
						{
							$this->_batch_ending_year= $r564['Batch_end_year'];			//check this statement
							$f= $r564['Batch_Fees'];				//check this statement
						}
					}
					for($i=$this->_sjdy;$i<=$this->_batch_ending_year;$i++)				//check this statement
					{
						$upi=md5(uniqid(rand(),true));		
						$upi= substr($upi,0,5);
						$upi=$si.$upi;			//si -> student id
						$batch_payment_insert="INSERT INTO teachers_payments_info
						(
						Unique_user_id,
						T_uniqueid,
						Emailid,
						Batch_no,
						Batches_id,
						Students_id,
						Unique_payment_id,
						Default_Payment_Amount,
						Payment_Year,
						Payment_Starting_Date,
						January,
						February,
						March,
						April,
						May,
						June,
						July,
						August,
						September,
						October,
						November,
						December,
						January_Paid_Date,
						February_Paid_Date,
						March_Paid_Date,
						April_Paid_Date,
						May_Paid_Date,
						June_Paid_Date,
						July_Paid_Date,
						August_Paid_Date,
						September_Paid_Date,
						October_Paid_Date,
						November_Paid_Date,
						December_Paid_Date,
						January_Paid_Time,
						February_Paid_Time,
						March_Paid_Time,
						April_Paid_Time,
						May_Paid_Time,
						June_Paid_Time,
						July_Paid_Time,
						August_Paid_Time,
						September_Paid_Time,
						October_Paid_Time,
						November_Paid_Time,
						December_Paid_Time,
						January_Paid_Mode,
						February_Paid_Mode,
						March_Paid_Mode,
						April_Paid_Mode,
						May_Paid_Mode,
						June_Paid_Mode,
						July_Paid_Mode,
						August_Paid_Mode,
						September_Paid_Mode,
						October_Paid_Mode,
						November_Paid_Mode,
						December_Paid_Mode,
						January_Paid_Amount,
						February_Paid_Amount,
						March_Paid_Amount,
						April_Paid_Amount,
						May_Paid_Amount,
						June_Paid_Amount,
						July_Paid_Amount,
						August_Paid_Amount,
						September_Paid_Amount,
						October_Paid_Amount,
						November_Paid_Amount,
						December_Paid_Amount,
						Last_Updated_Date,
						Last_Updated_Time
						)

						VALUES
						(
						'$this->_uui',
						'$_SESSION[teacher_id]',
						'$_SESSION[emailid]',
						'$this->_bn',
						'$this->_bi',
						'$si',
						'$upi',
						'$f',
						'$i',
						 now(),
						'unpaid',
						'unpaid',
						'unpaid',
						'unpaid',
						'unpaid',
						'unpaid',
						'unpaid',
						'unpaid',
						'unpaid',
						'unpaid',
						'unpaid',
						'unpaid',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						'',
						now(),
						CURRENT_TIMESTAMP()
						)";
						if (!mysql_query($batch_payment_insert,$con))
						{
							die('Unable to create your Batch Error: TWE_BPI'.$i.'  ' . error_log("\n unable to create the payment row of the batche with id -> $bi <- in class_teachers_batch.php page fo year $i.   -> ".mysql_error(),3, "../logged errors/e.log"));
							return "not created";
						}
					}
					/***************ending creating payment table****************************/
					/***************updating stats here****************************/
					$T_stud_no=0;					//total student no
					$B_stud_no=0;			//batche student no
					$count_t= mysql_query("SELECT T_uniqueid,Emailid,Batches_id FROM teachers_students_info WHERE Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]'");
					while($trow= mysql_fetch_array($count_t))
					{
						if($trow['T_uniqueid'] == $_SESSION['teacher_id'])
						{
							$T_stud_no++;
						}
						if($trow['Batches_id'] == $this->_bi)
						{
							$B_stud_no++;				//check this statement
						}
					}
					if(mysql_query("UPDATE teachers_stats_info
					SET No_Of_Students= '$T_stud_no', Last_Updated_Date = now(), Last_Updated_Time=CURRENT_TIMESTAMP()
					WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]'"))
					{
						/*update batche with no of student*/
						if(!mysql_query("UPDATE teachers_batches_info
						SET No_Of_Student= '$B_stud_no'
						WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]' AND Batches_id='$b'"))
						{
							echo "Created But Not Updated Error: TWE_CTSC_U02";
							error_log("\n created the student but not uploded teachers_batches_info table in class teacher student create.php page ->  ".mysql_error(),3, "../logged errors/e.log");
							return "not created";
						}
						else
						{
							/* relode the page here*/
						}
						/*update batche with no of student*/
					}
					else
					{
						echo "Created But Not Updated Error: TWE_CTSC_U01";
						error_log("\n created the student but not uploded teachers_stats_info table in class teacher student create.php page ->  ".mysql_error(),3, "../logged errors/e.log");
						return "not created";
					}
					/***************updating stats here****************************/
					return "created";
				}
				/***************************************************************************************************************************************/
			}
			else
			{
				$error="Unspecified Access denied by our system...";
				$this->_decide="insecure";
				return $error;
			}
		}
		/*****************************************************************************************************************************************/
	}
?>