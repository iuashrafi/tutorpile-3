<?php
	class batch
	{
		private $_bname;
		private $_syears;
		private $_eyears;
		private $_standard;
		private $_address;
		private $_temp;			//temporary variable
		private $_decide;
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
		public function set_syears($data)
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
				$this->_syears=$this->_temp;
				return $error;
			}
		}
		public function set_eyears($data)
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
				if($this->_temp >= $this->_syears)
				{
					$this->_eyears=$this->_temp;
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
		public function set_standard($data)
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
				$this->_standard=$this->_temp;
				return $error;
			}
		}
		public function set_address($data)
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
					$this->_address=$this->_temp;
					return $error;
				}
			}
		}
		private function _create()
		{
			include("connect.php");
			/*$getdata=mysql_query("SELECT User_no,Unique_user_id,T_uniqueid,No_Of_Batches,Emailid FROM teachers_system_info WHERE Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]' ");
			$getdata_row= mysql_fetch_array($getdata);
			if(($getdata_row['T_uniqueid']==$_SESSION['teacher_id']) && ($getdata_row['Emailid']==$_SESSION['emailid']))
			{
				$un=$getdata_row['User_no'];		//user no
				$uui=$getdata_row['Unique_user_id'];		//unique user id
				$bn=$getdata_row['No_Of_Batches'];		//batch no
				$bn=$bn+1;
				$bi=md5(uniqid(rand(),true));		//batch id
				$bi= substr($bi,0,15);
			}*/
			$bn=0;		//for batch no
			$count_b=mysql_query("SELECT T_uniqueid,User_no,Unique_user_id,Emailid,Batches_id,Batch_Name FROM teachers_batches_info WHERE Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]' ");
			while($count_b_row= mysql_fetch_array($count_b))
			{
				$bi=md5(uniqid(rand(),true));		//batch id
				$bi= substr($bi,0,25);
				if(($count_b_row['T_uniqueid']==$_SESSION['teacher_id']) && ($count_b_row['Emailid']==$_SESSION['emailid']) && ($count_b_row['Batches_id']!=$bi) && ($count_b_row['Batch_Name']!=$this->_bname))
				{
					$un=$count_b_row['User_no'];		//user no
					$uui=$count_b_row['Unique_user_id'];		//unique user id
					$bn++;
					
				}
				elseif(($count_b_row['Batches_id']==$bi) || ($count_b_row['Batch_Name']==$this->_bname))
				{
					echo "<span class='text-danger'> Batch with same name cannet be created </span>";
					return "not created";
				}
				else
				{
					echo "<span class='text-danger'>An unknown error occured</span>";
					error_log("\n Unknown error generated in teachers_batch.php page -> some unknown person has HACKED into our the system",3, "../logged errors/e.log");
					return "not created";
				}
			}
			if($bn==0)		//if no batch was previously created
			{
				$count_b2=mysql_query("SELECT T_uniqueid,User_no,Unique_user_id,Emailid FROM teachers_system_info WHERE Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]' ");
				while($count_b_row2= mysql_fetch_array($count_b2))
				{
					if(($count_b_row2['T_uniqueid']==$_SESSION['teacher_id']) && ($count_b_row2['Emailid']==$_SESSION['emailid']))
					{
						$un=$count_b_row2['User_no'];		//user no
						$uui=$count_b_row2['Unique_user_id'];		//unique user id
						/*$bn++;*/		//no increment here only increment outside
						$bi=md5(uniqid(rand(),true));		//batch id
						$bi= substr($bi,0,25);
					}
				}
			}
			/*if (!mysql_query($count_b_row,$con))			//this are errors during batch creation
			{
				error_log("\n Unable to fetch the batch record in teachers_batch.php page -> ".mysql_error(),3, "../logged errors/e.log");
			}
			if (!mysql_query($count_b_row2,$con))
			{
				error_log("\n Unable to fetch the batch record in teachers_batch.php page from teacher system info -> ".mysql_error(),3, "../logged errors/e.log");
			}*/
			$bn++;		//increment outside
			$batch_insert="INSERT INTO teachers_batches_info
			(
			User_no,
			Unique_user_id,
			T_uniqueid,
			Emailid,
			Batch_no,
			Batches_id,
			Batch_Name,
			Batch_start_year,
			Batch_end_year,
			Batch_Created_Date,
			No_Of_day,
			Days_week,
			No_Of_Student,
			Standard,
			Batch_Notification,
			Batch_Fees,
			Batch_Deleted,
			Batch_Address
			)

			VALUES
			(
			'$un',
			'$uui',
			'$_SESSION[teacher_id]',
			'$_SESSION[emailid]',
			'$bn',
			'$bi',
			'$this->_bname',
			'$this->_syears',
			'$this->_eyears',
			now(),
			'0',
			'0',
			'0',
			'$this->_standard',
			'On',
			'0',
			'No',
			'$this->_address'
			)";
			if (!mysql_query($batch_insert,$con))
			{
				die('Unable to create your Batch: ' . error_log("\n unable to create batch in teachers_batch.php page -> ".mysql_error(),3,"../logged errors/e.log"));
				return "not created";
			}
			else
			{
				if(mysql_query("UPDATE teachers_stats_info
				SET No_Of_Batches= '$bn', Last_Updated_Date = now(), Last_Updated_Time=CURRENT_TIMESTAMP()
				WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]'"))
				{
					return "created";
				}
				else
				{
					echo "Created But Not Updated part 2";
					error_log("\n created the batche but not uploded part 2 the teachers_stats_info table in teachers_batch.php page -> ".mysql_error(),3, "../logged errors/e.log");
					return "not created";
				}
			}
		}
		//in decide function check that wheather that session email id is present in the data base or not. if not present then go to login page.
		public function create_batch()
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
				$flag=$this->_create();				//it will either return 'created' or 'not created'
				/*if($flag=="created")
					return "created";
				else*/
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