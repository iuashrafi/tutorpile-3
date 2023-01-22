<?php
class teacher_stud_link
{
	public function display_linked_students($id)
	{
		$select=mysql_query("SELECT * FROM students_stats_info WHERE T_uniqueid='$id' AND ( Request_status='accepted' OR Request_status='yes' ) ");
		$ct=0;
		while($row=mysql_fetch_array($select))
		{
			$ct++;
				require_once "class_stud_fetch_id.php";
				$under=new stud_fetch_id();
				$under->fetch_id_primary($row['S_uniqueid']);
				$did=uniqid();
		?>
		<div id="<?php echo $did; ?>">
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
					<div class="panel panel-default">
					  <div class="panel-heading "><strong><?php echo $under->fetch_name();?></strong></div>
					  <div class="panel-body alert-info">
						<div class="row">
							<div class="col-xs-12 col-lg-12 "style="margin-top:5px;">
							<?php 
								if($row['Request_status']=='yes')
								{
									echo "Accept request?";
								}
							?>
							</div>
							<div id="<?php $did='rs'.$ct; echo $did;?>" class="col-xs-12 col-lg-12 "style="margin-top:5px;">
								<?php 
								if($row['Request_status']=='yes')
								{
								?>
						<a class="btn btn-success btn-sm" onclick="onacepptingrequest('<?php echo $row['S_uniqueid']; ?>','<?php echo $did;?>')"  
									style="float:left;margin-left:5px;"> 
									<span class='glyphicon glyphicon-ok'></span> 
								</a>
								<a class="btn btn-danger btn-sm" onclick="onrejectingrequest('<?php echo $row['S_uniqueid']; ?>','<?php echo $did;?>')"  
								style="float:left;margin-left:5px;">
								<span class='glyphicon glyphicon-remove'></span> 
								</a>
								<?php 
								}
								?>
							</div>
							<div class="col-xs-12 col-lg-12 "style="margin-top:5px;">
							
							<a disabled class='btn btn-primary btn-sm' href="view_student_profile.php?id=<?php echo $row['S_uniqueid'];?>" style='float:right;margin-left:5px;'>
							&nbsp;<span class='glyphicon glyphicon-info-sign'></span>&nbsp;
							</a>
							<a class="btn btn-danger btn-sm" onclick="delete_student('<?php echo $row['S_uniqueid'];?>','<?php echo $did; ?>')" style="float:right;margin-left:5px;">
							&nbsp;<span class='glyphicon glyphicon-trash'></span>&nbsp;
							</a>
							</div>
						</div>
					  </div>
					</div>
		</div>
		</div>
		<?php 
		}
		if($ct==0)
		{
			echo "<p>No students to display.</p>";
			
		}
	}
	public function delete_stud_link($id)
	{
		@session_start();
		$update="UPDATE students_stats_info SET Request_status='no' WHERE S_uniqueid='$id' AND T_uniqueid='$_SESSION[teacher_id]' ";
		if(!mysql_query($update))
		{
			error_log("\nerror->Unable to delete student link in class teacher student link -> delete_stud_link() ".mysql_error(),3,"../logged errors/e.log");
		}
	}
}
?>