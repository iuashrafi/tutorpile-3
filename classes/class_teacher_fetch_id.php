<?php 
class teacher_fetch_id
{
	private $_name;
	private $_emailid;
	private $_qualifications;
	private $_profession;
	private $_worksat;
	private $_experience;
	private $_city;
	private $_state;
	private $_descript;
	private $_suba;
	private $_subb;
	private $_pin;
	private $_dp;
	private $_main_emailid;
	private $_main_phoneno;
	private $_phno;
	public function fetch_name(){ return $this->_name;	}
	public function fetch_phone(){ return $this->_phno;	}
	public function fetch_emailid(){ return $this->_emailid;	}
	public function fetch_pincode(){ return $this->_pin;	}
	public function fetch_qualifications(){ return $this->_qualifications;	}
	public function fetch_profession(){ return $this->_profession;	}
	public function fetch_worksat(){ return $this->_worksat;	}
	public function fetch_experience(){ return $this->_experience;	}
	public function fetch_city(){ return $this->_city;	}
	public function fetch_state(){ return $this->_state;	}
	public function fetch_description(){ return $this->_descript;	}
	public function fetch_subject1(){ return $this->_suba;	}
	public function fetch_subject2(){ return $this->_subb;	}
	public function fetch_display_picture(){ return $this->_dp; }
	public function fetch_maintain_emailid(){ return $this->_main_emailid;}
	public function fetch_maintain_phoneno(){ return $this->_main_phoneno;}
	public function fetch_id_primary($id)
	{
		require_once "connect.php";
		$select=mysql_query("SELECT Firstname,Lastname,Emailid,Phonenumber,Subject1,Subject2,Pincode FROM teachers_primary_info WHERE T_uniqueid='$id' ");
		$row=mysql_fetch_array($select);
		$this->_name=$row['Firstname']." ".$row['Lastname'];
		$this->_emailid=$row['Emailid'];
		$this->_phno=$row['Phonenumber'];
		$this->_suba=$row['Subject1'];
		$this->_subb=$row['Subject2'];
		$this->_pin=$row['Pincode'];
	}
	public function fetch_id_secondary($id)
	{
		require_once "connect.php";
		$select=mysql_query("SELECT Maintain_phonenumber,Maintain_emailid,Qualifications,Profession,Worksat,Experience,City,STATE,Description,Image_name FROM teachers_secondary_info WHERE T_uniqueid='$id' ");
		$row=mysql_fetch_array($select);
		$this->_qualifications=$row['Qualifications'];
		$this->_profession=$row['Profession'];
		$this->_worksat=$row['Worksat'];
		$this->_experience=$row['Experience'];
		$this->_city=$row['City'];
		$this->_state=$row['STATE'];
		$this->_descript=$row['Description'];
		$this->_dp=$row['Image_name'];
		$this->_main_emailid=$row["Maintain_emailid"];
		$this->_main_phoneno=$row["Maintain_phonenumber"];
		
	}
	private $_batches;
	private $_students;
	public function fetch_batch(){ return $this->_batches; }
	public function fetch_students(){ return $this->_students; }
	public function fetch_id_stats($id)
	{
		require_once "connect.php";
		$select=mysql_query("SELECT No_Of_Batches,No_Of_Students FROM teachers_stats_info WHERE T_uniqueid='$id' ");
		$row=mysql_fetch_array($select);
		$this->_batches=$row['No_Of_Batches'];
		$this->_students=$row['No_Of_Students'];
	}
	private $_final_rates;
	private $_votes;
	public function fetch_final_rates(){ return $this->_final_rates; }
	public function fetch_final_votes(){ return $this->_votes; }
	public function fetch_id_teacher_stats($id)
	{
		$select=mysql_query("SELECT Total_People_Rated,Rating FROM teachers_stats_info WHERE T_uniqueid='$id' ");
		$row=mysql_fetch_array($select);
		$this->_votes=$row['Total_People_Rated'];
		if($this->_votes!=0)
		$this->_final_rates=$row['Rating']/$row['Total_People_Rated'];
		else 
			$this->_final_rates=$row['Rating'];
	}
}
?>