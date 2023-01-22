<?php 
class view_teacher_comments
{
	private $_review;
	private function _trimer($data)
		{
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
	public function fetch_review() {
		return $this->_review;
	}
	public function get_comment($data)
	{
		$error="";
		if(empty($data))
			return $error="Required";
		else 
		{
			$tmp=$this->_trimer($data);
			if(empty($tmp))
			{
				return $error="Required";
			}
			else 
			{
				$this->_review=$tmp;
				return $error;
			}
		}
	}
	public function add_review($id,$name)
	{
		$insert="INSERT INTO students_comments ( 
			S_uniqueid,
			Emailid,
			S_Name,
			T_Name,
			T_uniqueid,
			Comment_status,
			T_display,
			S_display,
			Comment,
			C_Date,
			C_Time
		) VALUES(
			'$_SESSION[student_id]',
			'$_SESSION[emailid]',
			'$_SESSION[name]',
			'$name',
			'$id',
			'true',
			'1',
			'1',
			'$this->_review',
			now(),
			CURRENT_TIMESTAMP()
		)";
		if(!mysql_query($insert))
		{
			error_log("\nerror -> class view_teacher_comments -> add_review() -> operation = Unable to insert student's comment ".mysql_error(),3, "../logged errors/e.log");
		}
		else 
		{
			return "true";
		}
	}
	public function display_comments_teacher($id,$start,$end) /* from stud view */
	{
		$end=$end+1;
		$ct=0;
		$select=mysql_query("SELECT * FROM students_comments WHERE T_uniqueid='$id' AND Comment_status='true' AND T_display='1' ORDER BY Sid DESC LIMIT $start,$end");
		while($row=mysql_fetch_array($select))
		{
				if($ct==5)
				{
					$did=uniqid();
					?>
					<div id="<?php echo $did;?>">
						<a onclick="loading_contents('<?php echo $id; ?>','<?php echo $did;?>','<?php echo ($end-1);?>','<?php echo ($end+4);?>')">Load more</a><br/><br/>
					</div>		
					<?php 
					break;
				}
				
				echo "<div><strong>".$row['S_Name']."</strong><br/>".$row['Comment']."<br/>".$row['C_Date']."&nbsp;".$row['C_Time'];
				echo "<hr/></div>";
				$ct++;}
		if($ct==0)
		{
			echo "<p style='padding:10px;'>No reviews to display</p>";
		}
	}
	public function display_teacher_comments($id,$start,$end)
	{
		$end=$end+1;
	$select=mysql_query("SELECT * FROM students_comments WHERE T_uniqueid='$id' AND Comment_status='true' AND T_display='1' ORDER BY Sid DESC LIMIT $start,$end");
			$ct=0;
			//echo "start=".$start."and end=".$end;
			while($row=mysql_fetch_array($select))
			{
				if($ct==5)
				{
					$did=uniqid();
					?>
					<div id="<?php echo $did;?>">
						<a onclick="loading_contents('<?php echo $did;?>','<?php echo ($end-1);?>','<?php echo ($end+4);?>')">Load more</a><br/><br/>
					</div>		
					<?php 
					break;
				}
				$divid="div".uniqid();	
				echo "<div id='".$divid."'><strong>".$row['S_Name']."</strong><br/>".$row['Comment']."<br/>".$row['C_Date']."&nbsp;".$row['C_Time'];
				?>
				<a style='padding:5px;' onclick="review_deletion('<?php echo $row['Sid'];?>','<?php echo $divid;?>')"><span class="glyphicon glyphicon-trash"></span></a>
				<?php 
				echo "<hr/></div>";
				$ct++;
			}				
			if($ct==0)
			{
				echo "<p>No reviews to display</p>";
			}
	}
	public function no_of_comments($id)
	{
		$select=mysql_query("SELECT * FROM students_comments WHERE T_uniqueid='$id' AND Comment_status='true' AND T_display='1' ");
		$ct=0;
		while($row=mysql_fetch_array($select))
		{
			$ct++;
		}	
		return $ct;
		
	}
	public function delete_review($id)
	{
		$update="UPDATE students_comments SET T_display='0' WHERE Sid='$id' ";
		if(!mysql_query($update))
		{
			echo "Unable to delete review";
			error_log("\nerror -> class view_teacher_comments -> add_review() -> operation =Unable to delete review ".mysql_error(),3, "../logged errors/e.log");
		}
	}
}
?>