<?php
	require_once "include/student_secure_header.php";
	if(!isset($_SESSION))
		session_start();
	require_once "classes/class_teacher_fetch_id.php";
	$obj=new teacher_fetch_id();
	$obj->fetch_id_primary($_GET['id']);
	$name=$obj->fetch_name();
 ?>
<html>
<head>
	<title>Tutor Pile | <?php echo htmlspecialchars($name);?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
	<link rel="stylesheet" href="style sheet/buttons.css" type="text/css">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<script src="style sheet/custom.js"></script>
	<style>
	
</style>
<script>
function loading_contents(id,divid,start,end)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById(divid).innerHTML=xmlhttp.responseText;
		}
	  }
	xmlhttp.open("GET","./short_pages/next_view_teacher_comments.php?id="+id+"&s="+start+"&e="+end,true);
	xmlhttp.send();
}
</script>
</head>
<body>
<?php	require_once("students_header_icon.php");	
		require_once("students_header_nav_online.php"); 
?>
<div class="container index page-height">
<?php 
	$emailid=$obj->fetch_emailid();
	$phno=$obj->fetch_phone();
	$sub1=$obj->fetch_subject1();
	$sub2=$obj->fetch_subject2();
	$pin=$obj->fetch_pincode();
	/*secondary fetching*/
	$obj->fetch_id_secondary($_GET['id']);
	$city=$obj->fetch_city();
	$state=$obj->fetch_state();
	$qual=$obj->fetch_qualifications();
	$pro=$obj->fetch_profession();
	$work=$obj->fetch_worksat();
	$exp=$obj->fetch_experience();
	$image="display/medium/".$obj->fetch_display_picture();
	
	/* boxes(batches) fetching*/
	$obj->fetch_id_stats($_GET['id']);
	$batches=$obj->fetch_batch();
	$students=$obj->fetch_students();
	
	/* stats bar*/
	include "classes/class_stud_stat.php";
	$bar=new stud_stat();
			
	/* Ratings part*/
	require_once "classes/class_stud_teacher_ratings.php";
	$rstat=new stud_teacher_ratings();
	if(isset($_POST["submit_ratings"]) AND $_SERVER["REQUEST_METHOD"]=="POST")
	{
		$rates_err=$rstat->set_rate($_POST['stars']);
		if($rates_err=="")
		{
			$rstat->submit_ratings($_GET['id'],$emailid);
		}
	}
?>
<div class="row" style="margin-top:40px;">
	<div class="col-xs-12 col-lg-2">
		<p><img src="<?php echo $image;?>"  class="dp-size" /></p>
		<p><strong> <?php echo htmlspecialchars($name);?></strong></p>
	</div>
	<div class="col-xs-12 col-lg-10">
		<?php 
		$bar->stats_bar($_GET['id']);
		echo "<br/><br/>";
		$rat=new stud_teacher_ratings();
		$rat->display_rating($_GET['id']);
		$description=$obj->fetch_description();
		if(!empty($description)) echo "<p><blockquote>".$description."</blockquote></p>";
		
		$obj->fetch_id_teacher_stats($_GET['id']);
		$final_rates=$obj->fetch_final_rates();
		?>
	
	</div>
</div>
<div class="row">
	<div>
		<div class="row">
			<div class="col-xs-3 col-lg-4 col-sm-4 col-md-4 box hvr-underline-from-left" style="">
				<div class="col-md-9 " style="">
					<h2><?php echo $batches; ?></h2>
					<h4>Batches</h4>
					<p></p>
				</div>
				<div class="col-md-3">
				</div>
			</div>
			<div class="col-xs-3 col-lg-4 col-sm-4 col-md-4 box hvr-underline-from-left">
				<div class="col-md-9" style="">
					<h2><?php if($exp==0) echo "unavailable"; else echo $exp." years"; ?></h2>
					<h4>Experience</h4>
					<p></p>
				</div>
				<div class="col-md-3">
				</div>
			</div>
			<div class="col-xs-6 col-lg-4 col-sm-4 col-md-4 box hvr-underline-from-left ">
				<div class="col-md-9" style="">
					<?php  
						$vottes=$obj->fetch_final_votes();
					if($final_rates>=4.0 && $vottes>=20 )
					{
								echo "<img style='height:100px;width:;' src='system img/like.png' />";		
								echo "<b>Very Good</b>";
					}	
					elseif($final_rates>=3.0 && $vottes>=10 )
					{
						echo "<img style='height:100px;width:;' src='system img/tick_ok2.gif' />";		
						echo "<b>  Good</b>";
					}	
					else
					{
						echo "<img style='height:100px;width:;' src='system img/tick.gif' />";		
						echo "<b> Ok</b>";
					}
						?>
					<p></p>
				</div>
				<div class="col-md-3">
				</div>
			</div>
			
		</div>
	</div>
</div>
<div class="row">
		<div class="col-xs-12 col-lg-9 col-sm-9 col-md-9" style="background-color:;">
				<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-md-12">
				
					
					   <div class="table-responsive">
						   <table class="table table-hover">
							  <tbody>
								<?php 
								if(!empty($final_rates))
								{
									echo "<br/>
								<tr>
								  <td>Ratings</td>
								  <td>";if(!empty($final_rates))
								  {
									  for($r=1;$r<=round($final_rates);$r++)
										  echo "<span style='color:orange;' class='glyphicon glyphicon-star'></span>";
									  for($r=round($final_rates);$r<5;$r++)
										  echo "<span style='color:grey;' class='glyphicon glyphicon-star'></span>";
									  
									  echo "&nbsp;&nbsp;".$vottes."votes<br/>";
									  
								  }
								echo "</td>         
								</tr>";
								}
								$privacy1=$obj->fetch_maintain_emailid();
								$privacy2=$obj->fetch_maintain_phoneno();
								if(!empty($emailid) && $privacy1=="no")	{ 
								echo "<br/>
								<tr>
								  <td>Emailid</td>
								  <td>";if((!empty($emailid)) && $privacy1=="no")	echo $emailid."<br/>";
								echo "</td>         
								</tr>";
								}
								if(!empty($phno) && $privacy2=="no")	{ 
								echo "<br/>
								<tr>
								  <td>Contact</td>
								  <td>";if(!empty($phno) && $privacy2=="no")	echo $phno."<br/>";
								echo "</td>         
								</tr>";
								}
								if(!empty($sub1) && !empty($sub1))
								{
								echo "<tr>
								  <td>Subjects</td>
								  <td>"; if(!empty($sub1) && !empty($sub1)) echo $sub1." ".$sub2."<br/>"; 
								  echo "</td>                                        
							  </tr>";
								}
								if(!empty($pro))
							  {
								echo "<tr>
								  <td>Profession</td>
								  <td>"; if(!empty($pro)) echo $pro."<br/>"; echo "</td>      
							  </tr>";
							  }
							  if(!empty($qual))
							  {
								echo "<tr>
								  <td>Qualifications</td>
								  <td>";if(!empty($qual)) echo $qual."<br/>";  echo "</td>
							  </tr>";
							  }
							  if(!empty($work))
							  {
								  echo "  <tr>
								  <td>Works at</td>
								  <td>"; if(!empty($work)) echo $work."<br/>"; echo "</td>   
							  </tr>";
							  }
							  
							  if(!empty($city))
							  {
								echo "<tr>
								  <td>Address</td>
								  <td>"; if(!empty($city)) echo $city." ".$state."<br/>"; echo "</td>
							  </tr>";
							  }
							  if(!empty($pin))
							  {
							  echo "<tr>
								  <td>Pin code</td>
								  <td>"; if(!empty($pin)) echo $pin."<br/>"; echo "</td>      
							  </tr>";
							  } ?>
						  </tbody>
						</table>
					</div>
				</div>
				</div>
		</div>
</div>
	<?php 
		require_once "classes/class_view_teacher_comments.php";
		$msg_err=$msg="";
		$ob=new view_teacher_comments();
		if(isset($_POST["add_review"]) && $_SERVER["REQUEST_METHOD"]=="POST")
		{
			$msg_err=$ob->get_comment($_POST['msg']);
			$msg=$ob->fetch_review();
			if($msg_err=="")
			{	//insert the comment
				$status=$ob->add_review($_GET['id'],$name);
				if($status=="true")
				{
					// add notification into teachers notification table
					include("classes/class_teacher_notification.php");
					$test=new notification;
					$test->set_tui($_GET['id']);
					$test->set_emailid($emailid);
					$test->set_nc("General");
					$test->set_nt("Comment");
					$test->set_np("yes");
					$test->set_ns("Comment");
					$test->set_sname($_SESSION['name']);
					$test->set_sid($_SESSION['student_id']);
					$test->set_se($_SESSION['emailid']);
					$test->set_v("no");
					$test->set_nss("sending");
					$test->set_nl("www.w3schools.com");
					$test->set_nimg("a.jpg");
					$test->set_nmess("There is a comment on you");
					$test->decide()."<br/>";
				}
			}
		}
	?>
	<div class="row">
		<div class="col-lg-6 col-md-9 col-sm-10 col-xs-12 " >
		<br/>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?id=".$_GET['id']);?>"	method="POST">
			<div class="row">
				<div class="col-sm-12 col-lg-12">
				<label>LEAVE A REVIEW<span class="text-danger">*<?php echo " ".$msg_err;?></span></label>
				<textarea placeholder="Review" class="form-control" name="msg"  rows="8" style="min-height:100px;max-height:100px;"><?php echo $msg; ?></textarea>
				</div>
			</div> <br/>
			<div class="row" >
				<div class="col-sm-12 col-lg-12">
					<input class="btn btn-action btn-smit" type="submit" name="add_review" value="Add Review" />
				</div>
			</div>
		</form>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " > 
		<br/>
		<h3>Reviews on this teacher</h3>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
		<?php 
			@session_start();
			$ob->display_comments_teacher($_GET['id'],0,5);
		?>
		</div>
	</div>
</div>
<?php include_once "./include/footer.php"; ?>
</body>
</html>