<?php 
class stud_reviews 
{
	public function display_next_comments($id,$start,$end) 
	{
		$end=$end+1;
	$select=mysql_query("SELECT * FROM students_comments WHERE Emailid='$id' AND Comment_status='true' AND S_display='1' ORDER BY Sid DESC LIMIT $start,$end");
	$ct=0;
	while($row=mysql_fetch_array($select))
		{
			@session_start();
			$divid="div".$ct;
			if($ct==5)
			{
				$did=uniqid();
			?>
				<div id="<?php echo $did;?>">
				<a onclick="loading_stud_contents('<?php echo $did;?>','<?php echo ($end-1);?>','<?php echo ($end+4);?>')">Load more</a><br/><br/>
				</div>		
				<?php 
				break;
			}
			 ?>
			  <div class="col-lg-12 col-xs-12 " id="<?php echo $divid;?>">
			  <p>
			  <strong><?php echo $row['T_Name']; ?> </strong>
			  </p>
			  <p>
				<?php echo $row['Comment'];?>
			  </p>
			  <p style="font-size:12px;">
				<?php echo $row['C_Date']."&nbsp;&nbsp;".$row['C_Time']; ?>
				<a onclick="stud_review_deletion('<?php echo $row['Sid'];?>','<?php echo $divid;?>')" style="padding:5px;"><span class="glyphicon glyphicon-trash" title="Delete"></span> </a><hr/>
			 </p>
			  </div>
			
		<?php 
		$ct++;
		}
		if($ct==0)
		{
			echo "<p>No comments to display</p>";
		}
		
	}
	public function no_of_comments($id)
	{
		$select=mysql_query("SELECT * FROM students_comments WHERE Emailid='$id'  AND Comment_status='true' AND S_display='1'  ");
	$ct=0;
	while($row=mysql_fetch_array($select))
		{
			$ct++;
		}
		return $ct;
	}
	public function first_comment_id($id)//desc order
	{
		$select=mysql_query("SELECT * FROM students_comments WHERE Emailid='$id'  AND Comment_status='true' AND S_display='1' ORDER BY Sid DESC ");
		$ct=0;
		while($row=mysql_fetch_array($select))
		{
			$ct++;
			break;	
		}
		if($ct>0)
			return($row['Sid']);
		else 
			return 0;
	}
	public function delete_review($id)
	{
		$update="UPDATE students_comments SET S_display='0' WHERE Sid='$id' ";
		if(!mysql_query($update))
		{
			error_log("\nerror->Unable to delete review in  class stud_reviews -> delete_review() ".mysql_error(),3, "../logged errors/e.log");
		}
	}
}
?>