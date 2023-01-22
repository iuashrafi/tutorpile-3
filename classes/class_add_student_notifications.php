<?php
class add_student_notifications
{
	private $_sui;		//student unique id
	private $_emailid;
	private $_uni;		//unique notification id
	private $_nc;		//Notify_catogory
	private $_nt;		//Notify_type
	private $_np;		//Notify_priority
	private $_ns;		//Notify_subject
	private $_tname;		//Sender_name
	private $_tid;		//Sender_uniqueid
	private $_te;		//Sender_emailid
	private $_v;		//Viewed
	private $_nss;		//Notify_send_status
	private $_nl;		//Notify_link
	private $_nimg;		//Notify_img_name
	private $_nmess;		//Notify_message
	private $_decide;
	function __construct()
	{
		$this->_decide="secure";
		$this->_np="no";
		$this->_v="no";
		$this->_nss="Send";
		$this->_uni=md5(uniqid(rand(),true));
		$this->_uni= substr($this->_uni,0,30);
	}
	private function _trimer($data)
	{
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	/**********************************************************************************************************/
	public function set_sui($data)
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
			$this->_sui=$data;
			return $error;
		}
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
			$this->_emailid=$data;
			return $error;
		}
	}
	public function set_nc($data)
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
			$this->_nc=$data;
			return $error;
		}
	}
	public function set_nt($data)
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
			$this->_nt=$data;
			return $error;
		}
	}
	public function set_np($data)
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
			$this->_np=$data;
			return $error;
		}
	}
	public function set_ns($data)
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
			$this->_ns=$data;
			return $error;
		}
	}
	public function set_tname($data)
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
			$this->_tname=$data;
			return $error;
		}
	}
	public function set_tid($data)
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
			$this->_tid=$data;
			return $error;
		}
	}
	public function set_te($data)
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
			$this->_te=$data;
			return $error;
		}
	}
	public function set_v($data)
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
			$this->_v=$data;
			return $error;
		}
	}
	public function set_nss($data)
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
			$this->_nss=$data;
			return $error;
		}
	}
	public function set_nl($data)
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
			$this->_nl=$data;
			return $error;
		}
	}
	public function set_nimg($data)
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
			$this->_nimg=$data;
			return $error;
		}
	}
	public function set_nmess($data)
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
			$this->_nmess=$data;
			return $error;
		}
	}
	/********************************************************************************************/
	public function decide()
	{
		$error="";
			if($this->_decide=="insecure")
			{
				$error="Unauthorizes Access denied by our system...";
				$this->_decide="insecure";
				return $error;
			}
			elseif($this->_sui=="" || $this->_emailid=="" || $this->_uni=="" || $this->_nc=="" || $this->_nt=="" || $this->_np=="" || $this->_ns=="" || $this->_tname=="" || $this->_tid=="" || $this->_te=="" || $this->_nl=="" || $this->_nimg=="" || $this->_nmess=="")
			{
				$error="Please fill all the details...";
				$this->_decide="insecure";
				return $error;
			}
			elseif($this->_decide=="secure")
			{
				//it will either return 'added' or 'not added'
				include("connect.php");
				$notify_insert="INSERT INTO students_notification_info
				(
				S_uniqueid,
				Emailid,
				Notify_id,
				Notify_catogory,
				Notify_type,
				Notify_priority,
				Notify_subject,
				T_name,
				T_uniqueid,
				T_emailid,
				Notify_date,
				Notify_time,
				Viewed,
				Notify_send_status,
				Notify_link,
				Notify_img_name,
				Notify_message
				)
				VALUES
				(
				'$this->_sui',
				'$this->_emailid',
				'$this->_uni',
				'$this->_nc',
				'$this->_nt',
				'$this->_np',
				'$this->_ns',
				'$this->_tname',
				'$this->_tid',
				'$this->_te',
				 now(),
				 CURRENT_TIMESTAMP(),
				'$this->_v',
				'$this->_nss',
				'$this->_nl',
				'$this->_nimg',
				'$this->_nmess'
				)";
				if (!mysql_query($notify_insert,$con))
				{
					die('Error Occurred : TWE_NI01'. error_log("\n unable to add info to student notification table in class add student notifications.php - ".mysql_error(),3, "../logged errors/e.log"));
					return "not added";
				}
				else
					return "added";
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