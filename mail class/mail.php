<?php
	class send_mail
	{
		private $_to;			// this is the Email address of recever
		private $_subject;			//subject of the email
		private $_message;			//message to be sent to the recever
		private $_header;			//message to be sent to the recever
		private $_decide;
		function __construct()
		{
			$this->_decide="secure";
			$this->_header = "MIME-Version: 1.0" . "\r\n";
			$this->_header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$this->_header .= 'From: <support@tutorpile.tk>' . "\r\n";
			$this->_header .= 'Cc: support@tutorpile.tk' . "\r\n";
		}
		public function set_to($data)
		{
			$error="";
			$data=trim($data);
			if(empty($data))
			{
				$error=" recevers address required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_to=$data;
			}
		}
		public function set_subject($data)
		{
			$error="";
			$data=trim($data);
			if(empty($data))
			{
				$error=" subject required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_subject=$data;
			}
		}
		public function set_message($data)
		{
			$error="";
			if(empty($data))
			{
				$error=" mesage required";
				$this->_decide="insecure";
				return $error;
			}
			else
			{
				$this->_message=$data;
			}
		}
		public function set_decide()
		{
			$error="";
			if($this->_decide=="insecure")
			{
				$error="Unauthorizes email denied by our system...";
				$this->_decide="insecure";
				return $error;
			}
			elseif($this->_decide=="secure")
			{
				if(mail($this->_to,$this->_subject,$this->_message,$this->_header))	//send mail
				{
					return "send";
				}
				else
				{
					return "not send";
				}
			}
			else
			{
				$error="email request denied by our system.";
				$this->_decide="insecure";
				return $error;
			}
		}
	}
?>