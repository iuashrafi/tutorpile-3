<?php
class notification
{
	private $_tui;		//teacher unique id
	private $_emailid;
	private $_uni;		//unique notification id
	private $_nc;		//Notify_catogory
	private $_nt;		//Notify_type
	private $_np;		//Notify_priority
	private $_ns;		//Notify_subject
	private $_sname;		//Sender_name
	private $_sid;		//Sender_uniqueid
	private $_se;		//Sender_emailid
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
	public function set_tui($data)
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
			$this->_tui=$data;
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
	public function set_sname($data)
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
			$this->_sname=$data;
			return $error;
		}
	}
	public function set_sid($data)
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
			$this->_sid=$data;
			return $error;
		}
	}
	public function set_se($data)
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
			$this->_se=$data;
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
			elseif($this->_tui=="" || $this->_emailid=="" || $this->_uni=="" || $this->_nc=="" || $this->_nt=="" || $this->_np=="" || $this->_ns=="" || $this->_sname=="" || $this->_sid=="" || $this->_se=="" || $this->_nl=="" || $this->_nimg=="" || $this->_nmess=="")
			{
				$error="Please fill all the details...";
				$this->_decide="insecure";
				return $error;
			}
			elseif($this->_decide=="secure")
			{
				//it will either return 'added' or 'not added'
				include("connect.php");
				$notify_insert="INSERT INTO teachers_notification_info
				(
				T_uniqueid,
				Emailid,
				Notify_id,
				Notify_catogory,
				Notify_type,
				Notify_priority,
				Notify_subject,
				S_name,
				S_uniqueid,
				S_emailid,
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
				'$this->_tui',
				'$this->_emailid',
				'$this->_uni',
				'$this->_nc',
				'$this->_nt',
				'$this->_np',
				'$this->_ns',
				'$this->_sname',
				'$this->_sid',
				'$this->_se',
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
					die('Error Ocurered : TWE_NI01'. error_log("\n unable to add info to teacher notification table in class teacher notification.php - ".mysql_error(),3, "../logged errors/e.log"));
					return "not added";
				}
				else
				{
					return "added";
				}
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