<?php 
class stud_teacher_ratings
{
	private $_rate;
	public function display_rated_students($id)
	{
		require_once "class_stud_fetch_id.php";
		$select_studs=mysql_query("SELECT * FROM students_stats_info WHERE T_uniqueid='$id' AND Rating_status='yes' ");
		$ct=0;
		
		while($row=mysql_fetch_array($select_studs))
		{
			$ct++;
			$ob=new stud_fetch_id();
			$ob->fetch_id_primary($row['S_uniqueid']);
			?>
			<tr>
			<td><?php echo $ob->fetch_name();?></td>
			<td><?php 
				for($i=1;$i<=$row['Rate'];$i++)
					echo "<span class='glyphicon glyphicon-star star-color'></span>";
				for($i=$row['Rate'];$i<5;$i++)
					echo "<span class='glyphicon glyphicon-star un-star-color'></span>";
			?></td>
			<td><a disabled id="remove-all" class="btn btn-primary btn-sm" href="" style="float:right;margin-left:5px;">
			&nbsp;<span class='glyphicon glyphicon-eye-open'></span>&nbsp;
			</a></td>
			</tr>
			<?php
		}
		if($ct==0)
		{
			echo "No ratings to display.";
		}
	}
	public function display_rated_teachers($id)
	{
		require_once "class_teacher_fetch_id.php";
		$select_teachers=mysql_query("SELECT * FROM students_stats_info WHERE S_uniqueid='$id' AND Rating_status='yes' ");
		while($row=mysql_fetch_array($select_teachers))
		{
			$ob=new teacher_fetch_id();
			$ob->fetch_id_primary($row['T_uniqueid']);
		?>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
				<section class="panel panel-default">
				  <div class="panel-heading "><strong><?php echo $ob->fetch_name();?></strong></div>
				  <div class="panel-body alert-info">
					
					<div style="margin-top:5px;">
						<a id="remove-all" class="btn btn-danger btn-sm" onclick=""  
						style="float:left;margin-left:5px;">
						 
						<?php
							for($i=1;$i<=$row['Rate'] && $i<=5;$i++)
							{
								echo "	<span class='glyphicon glyphicon-star'></span> ";
							}
						?>
						
						</a>
						<a id='remove-all' class="btn btn-primary btn-sm" href="view_teacher.php?id=<?php echo $row['T_uniqueid']?>" style='float:right;margin-left:5px;'>
						&nbsp;<span class='glyphicon glyphicon-eye-open'></span>&nbsp;
						</a>
						<!--<a id='remove-all' class='btn btn-primary btn-sm' href='#edit' style='float:right;margin-left:5px;'>
						&nbsp;<span class='glyphicon glyphicon-pencil'></span>&nbsp;
						</a> -->
					</div>
				  </div>
				</section>
			</div>
		<?php 
		}
		
	}
	function display_rating($id)
	{
		$select_rstat=mysql_query("SELECT * FROM students_stats_info WHERE T_uniqueid='$id' AND S_uniqueid='$_SESSION[student_id]' AND Rating_status='yes' ");	
		$row_rstat=mysql_fetch_array($select_rstat);
		if(empty($row_rstat['Rating_status']) || $row_rstat['Rating_status']=='no' )
		{
			//show bttn
			?>
			<a class="btn btn-action btn-smit" data-toggle="modal" data-target="#myModal" >
			<span class='glyphicon glyphicon-star'></span>&nbsp;Rate</a>
			<?php 
		}
		/*
		else if($row_rstat['Rating_status']=='yes' )
		{
			//echo "show ratings".$row_rstat['Rate'];
			for($i=1;$i<=$row_rstat['Rate'];$i++)
			{
				?><span style="color:#FFC90E;" class='glyphicon glyphicon-star'></span><?php 
			}
			
		}
		*/
		?>
		 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			 <div class="modal-dialog"> 
			 <div class="modal-content"> 
				 <div class="modal-header mod-design"> 
					<div class="row" style="height:40px">
							<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 clearfix visible-lg clearfix visible-md clearfix visible-sm clearfix visible-xs">
							<img src="system img/logo.png" style="height:40px; width:100%;">
							</div>
							<div class="col-lg-8 col-sm-8 col-md-8 col-xs-8 clearfix visible-lg clearfix visible-md clearfix visible-sm clearfix visible-xs">
							<h4 class="modal-title site_name" id="myModalLabel" style="color:#ffc90e;">TutorsWeb</h4>
							</div>
							<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 clearfix visible-lg clearfix visible-md clearfix visible-sm clearfix visible-xs">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
							</div>
					</div> 
				 </div> 
				<div class="modal-body">
					Rate <strong><?php echo "Teacher name"; ?></strong><br/>
						<form method="post" action="<?php echo htmlspecialchars("view_teacher.php").'?id='.$_GET['id']; ?>">
							<div class="form-group">
							<label>Select stars</label>
							<select class="form-control" name="stars">
								<option value="" <?php if($row_rstat['Rate']==0) echo 'selected';?>>Rate</option>
								<option value="1" <?php if($row_rstat['Rate']==1) echo 'selected';?> >1 Star</option>
								<option value="2" <?php if($row_rstat['Rate']==2) echo 'selected';?>>2 Stars</option>
								<option value="3" <?php if($row_rstat['Rate']==3) echo 'selected';?>>3 Stars</option>
								<option value="4" <?php if($row_rstat['Rate']==4) echo 'selected';?>>4 Stars</option>
								<option value="5" <?php if($row_rstat['Rate']==5) echo 'selected';?>>5 Stars</option>
							</select>
							</div>
							<div class="form-group">
							<input type="submit" name="submit_ratings" value="Save" class="btn btn-primary btn-sm" onclick="" value="Set" />
							</div>
						</form>
				</div>
				 <div class="modal-footer">
				 	<button type="button" style="float:left;" class="btn btn-default btn-sm" data-dismiss="modal">Close </button> 
				 </div>
			 </div>
			 </div>
		</div>
		<?php
	}
	function set_rate($data)
	{
		$error="";
		if(!empty($data))
		{
		$this->_rate=$data;
		return $error;
		}
		else 
			return $error="invalid";
	}
	function get_rate(){ return $this->_rate; }
	function submit_ratings($id,$eid)
	{
		$select=mysql_query("SELECT * FROM students_stats_info WHERE T_uniqueid='$id' AND S_uniqueid='$_SESSION[student_id]' ");
		$row=mysql_fetch_array($select);
		$notif=0;
		if(!$row) // returns true if row is present
		{
			$insert_rates="INSERT INTO students_stats_info (
				S_uniqueid,
				Emailid,
				T_Emailid,
				T_uniqueid,
				Rating_status,
				Rate
			)VALUES 
			(
				'$_SESSION[student_id]',
				'$_SESSION[emailid]',
				'$eid',
				'$id',
				'yes',
				'$this->_rate'
			)";
			if(!mysql_query($insert_rates))
			{
				error_log("\nClass stud teacher ratings -> submit_ratings(), Operation->unable to insert rates ".mysql_error(),3, "../logged errors/e.log");
			}
			else 
			$notif=1;
		}
		else
		{
			// update data
			$update_ratings="UPDATE students_stats_info SET Rate='$this->_rate',Rating_status='yes' WHERE T_uniqueid='$id' AND S_uniqueid='$_SESSION[student_id]' ";
			if(!mysql_query($update_ratings))
			{
				error_log("\nClass stud teacher ratings -> submit_ratings(), Operation->unable to update rates ".mysql_error(),3, "../logged errors/e.log");
			}
			else 
			$notif=1;
		}
		if($notif==1)
		{
			// add into teachers stats  
			$selecttoup=mysql_query("SELECT * FROM teachers_stats_info WHERE T_uniqueid='$id' ");
			$row=mysql_fetch_array($selecttoup);
			if($row)
			{
				$final=$row['Rating']+$this->_rate;
				$tpr=$row['Total_People_Rated']+1;
				$update_tstats="UPDATE teachers_stats_info SET Rating='$final',Total_People_Rated='$tpr' WHERE T_uniqueid='$id' ";
				if(!mysql_query($update_tstats))
				{
					error_log("Class stud teacher ratings -> unable to update teachers stats ",3,"../logged errors/e.log");
				}
			}
			
			//also add notification
			require_once("connect.php");
			require_once("class_teacher_notification.php");
			$test=new notification;
			$test->set_tui($id);
			$test->set_emailid($eid);
			$test->set_nc("Statistics");
			$test->set_nt("Ratings");
			$test->set_np("yes");
			$test->set_ns("Ratings");
			$test->set_sname($_SESSION["name"]);
			$test->set_sid($_SESSION["student_id"]);
			$test->set_se($_SESSION["emailid"]);
			$test->set_v("no");
			$test->set_nss("sending");
			$test->set_nl("www.w3schools.com");
			$test->set_nimg("a.jpg");
			$test->set_nmess("Yoy have been rated ".$this->_rate." stars");
			$test->decide();  
	
		}
		
	}
}
?>