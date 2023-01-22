<?php 
	require_once "include/teacher_secure_header.php";
?>
<html>
<head>
	<title>Tutors Pile | Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>    <!---remove this page and search for an alternative---->
	<script src="js/bootstrap.min.js"></script>		<!---remove this page and search for an alternative---->
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
	<?php include_once "include/include_meta.php"; ?>
</head>
<body>
<?php
	include("teachers_header_icon.php");
	include("teachers_header_nav_online.php"); 
	require_once "classes/class_teacher_fetch_id.php";
	// No. of ratings
	$obj=new teacher_fetch_id();
	$obj->fetch_id_teacher_stats($_SESSION["teacher_id"]);
	$final_rates=$obj->fetch_final_rates();
	
	require_once "classes/class_front_page_teachers_fetch.php";
	$front=new front_page_teachers_fetch();
	$no_of_notifications=$front->fetch_no_of_notifications($_SESSION["teacher_id"]);

?>
<div class="container page-height index">
	<div class="row">
		<div class="col-lg-12">
			<?php 
			if(isset($_SESSION["WELCOME"]) && $_SESSION["WELCOME"]==1)
			{
				?>
				<div id="welcome"><?php echo "Welcome ".$_SESSION["name"]; ?></div>
				<?php 
				unset($_SESSION["WELCOME"]);
			}
			?>
		<br/>
			<ol class="breadcrumb"><li><i class="fa fa-tachometer"></i>&nbsp;<a href="teacher_profile.php">Dashboard</a></li></ol>
		</div>
	</div>
	<!---------------------------------------------------------------->
	<div class="row">
		<div class="col-xs-11 col-sm-8 col-md-8 col-lg-8" style="background-color:white; float:left;">
			<div class="row col-xs-11 col-sm-5 col-md-4 col-lg-4 p_box" style="background-color:;">
				<p>
				<?php 
					require_once "classes/class_image_upload.php";
					$ob=new image_upload();
					$image_path="./display/medium/".$ob->get_image();
				?>
				<div style="height:175px;width:175px;box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);margin:auto;"><img src="<?php if(isset($image_path)) echo $image_path; else echo "./img/a01.JPEG"; ?>" alt="Display picture" style="height:175px;width:175px;"></div>
				</p>
				<hr/>
				<p style="text-align:center;">
					<strong><?php
						echo $_SESSION['name']."<br/>";
						echo "( ".$_SESSION['emailid']." )<br/>";
					?></strong>
				</p>
			</div>
			<div class="row col-xs-11 col-sm-6 col-md-7 col-lg-7 p_box" style="background-color:;">
				<?php
					$display_info = mysql_query("SELECT * FROM teachers_stats_info WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid = '$_SESSION[teacher_id]'");
						$rat=$ratno=$nob=$nos="unavailable";
						while($row84= mysql_fetch_array($display_info))
						{
							if(!empty($row84['Rating']))
								$rat = $row84['Rating'];
							if(!empty($row84['Total_People_Rated']))
								$ratno = $row84['Total_People_Rated'];
							if(!empty($row84['No_Of_Batches']))
								$nob = $row84['No_Of_Batches'];
							if(!empty($row84['No_Of_Students']))
								$nos = $row84['No_Of_Students'];
						}
					$display_info2 = mysql_query("SELECT Emailid,T_uniqueid,Qualifications,City,Worksat,Experience FROM teachers_secondary_info WHERE Emailid = '$_SESSION[emailid]' AND T_uniqueid = '$_SESSION[teacher_id]'");
						$qual=$wrk=$exp=$cyt="unavailable";
						while($row848= mysql_fetch_array($display_info2))
						{
							if(!empty($row848['Qualifications']))
								$qual = $row848['Qualifications'];
							if(!empty($row848['City']))
								$cyt = $row848['City'];
							if(!empty($row848['Worksat']))
								$wrk = $row848['Worksat'];
							if(!empty($row848['Experience']))
								$exp = $row848['Experience'];
						}
				?>
				<table class="table table-hover">
					<tr>
						<td>name </td>
						<td><?php echo $_SESSION["name"];?></td>
					</tr>
					<tr>
						<td>Rating</td>
						<td><?php 
						if($ratno==0)
						{
							$ratno=1;
						}
						$i=($rat/$ratno);
						if($i!=0 &&$i!="")
						{
							for($r=1;$r<=$i;$r++)
								echo "<span style='color:orange;' class='glyphicon glyphicon-star'></span>";
							for($r=$i;$r<5;$r++)
								echo "<span style='color:grey;' class='glyphicon glyphicon-star'></span>";
							echo " ($ratno votes)";
						}
						else{
							echo "not rated";
						}
						?></td>
					</tr>
					<tr>
						<td>No.of batch</td>
						<td><?php echo $nob;?></td>
					</tr>
					<tr>
						<td>No. of student</td>
						<td><?php echo $nos;?></td>
					</tr>
					<tr>
						<td>Experience</td>
						<td><?php echo $exp;?></td>
					</tr>
					<tr>
						<td>City</td>
						<td><?php echo $cyt;?></td>
					</tr>
					<tr>
						<td>Work at</td>
						<td><?php echo $wrk;?></td>
					</tr>
				</table>
			</div>
			<div class="row col-xs-11 col-sm-5 col-md-5 col-lg-5 p_box" style="background-color:;">
				<br/>
				<p style="text-align:justify;">The Ultimate Plateform to manage, moniter your record and progress.</p>
				<hr/>
				<p>
					<a href="search_teachers.php" target="blank"><img src="system img/search.gif" style="height:250px;width:100%;"/></a>
				</p>
			</div>
			<div class="row col-xs-11 col-sm-6 col-md-6 col-lg-6 p_box" style="background-color:;">
				<br/>
				<p style="text-align:justify;">We provide built in feature to create, modify and maintain the record of Batch, Student and your stats along with their Payment and contact details.</p>
				<!--<p style="text-align:center;"><strong>Largest students community.</strong></p>-->
				<hr/>
				<p>
					<img src="system img/student.jpg" style="height:230px;width:100%;"/>
				</p>
			</div>
		</div>
		<div class=" col-xs-10 col-sm-3 col-md-3 col-lg-3 p_box" style="background-color:; float:left;">
			<br/>
			<p style="text-align:center;">Our teachers <strong style="color:darkgreen;">ranking</strong> system.</p>
			<hr/>
			<table  style="text-align:center; width:100%;">
				<tr style="width:100%;">
					<td><img style="height:100px;width:;" src="system img/like.png" /><hr/><td/>
					<td><strong>Very Good</strong><td/>
				</tr>
				<tr>
					<td><img style="height:100px;width:;" src="system img/tick_ok2.gif" /><hr/><td/>
					<td><strong>Good</strong><td/>
				</tr>
				<tr>
					<td><img style="height:100px;width:;" src="system img/tick2.gif" /><hr/><td/>
					<td><strong>Ok</strong><td/>
				</tr>
			</table>
		</div>
		<div class="row col-xs-10 col-sm-3 col-md-3 col-lg-3 p_box" style="background-color:#F6F6F6;">
			<br/>
			<p style="text-align:center;"><strong><h3 style="text-align:center;">Like it, Share it!</h3></strong></p>
			<p>
				<table style="width:100%; text-align:center;">
					<tr>
						<td><a href="www.facebook.com">Facebook</a></td>
						<td><a href="www.google.com">Google+</a></td>
					</tr>
					<tr>
						<td><a href="www.twitter.com">Twitter</a></td>
						<td><a href="www.youtube.com">youtube</a></td>
					</tr>
				</table>
			</p>
		</div>
	</div>
	<!---------------------------------------------------------------->
	<!--<div class="row" style="margin-top:20px;">	
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<div class="col-xs-10 col-xs-offset-1 col-md-9 col-lg-10 col-lg-offset-1 box hvr-underline-from-left" style="">
						<h2>150</h2>
						<h4>Batches</h4>
						<p>Other hand, we denounce</p>
				</div>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
				<div class="col-xs-10 col-xs-offset-1 col-md-9 col-lg-10 col-lg-offset-1 box hvr-underline-from-left" style="">
						<h2>150</h2>
						<h4>Batches</h4>
						<p>Other hand, we denounce</p>
				</div>
		
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
				<div class="col-xs-10 col-xs-offset-1 col-md-9 col-lg-10 col-lg-offset-1 box hvr-underline-from-left" style="">
						<h2>150</h2>
						<h4>Batches</h4>
						<p>Other hand, we denounce</p>
				</div>
		</div>
	</div>-->
	<div class="row">	
		<div class="col-lg-12 col-md-12 col-xs-0 col-sm-12 clearfix visible-lg visible-md visible-sm ">
				<hr/>
				<div class="b_img" style="float:left;">
					<a href="teacher_notifications.php">
						<i class="fa fa-bell" style="width:185;height:160; display: block; padding:;font-size:55px;margin-top:30px;"></i>
						<div class="b_desc">Notifications&nbsp;<?php if(!empty($no_of_notifications) && $no_of_notifications!=0 )
										echo "<span class='badge'>$no_of_notifications</span>";
							?></div>
					</a>
				</div>
				<div class="b_img" style="float:left;">
					<a href="teacher_ratings.php">
						<i class="fa fa-star " style="width:185;height:160; display: block; padding:;font-size:55px;margin-top:30px;"></i>
						<div class="b_desc">Ratings<?php 
							if(!empty($final_rates))
							{
							if(!empty($final_rates))echo "&nbsp;<span class='badge'>".round($final_rates)."</badge>";
							}  ?>
						</div>
					</a>
				</div>
				<div class="b_img" style="float:left;">
					<a href="teacher_reviews.php">
						<i class="fa fa-comments " style="width:185;height:160; display:block;font-size:55px;margin-top:30px;"></i>
						<div class="b_desc">Reviews</div>
					</a>
				</div>
				<div class="b_img" style="float:left;">
					<a href="teacher_link_students.php">
						<i class="fa fa-link" style="width:185;height:160; display: block; padding:;font-size:55px;margin-top:30px;"></i>
						<div class="b_desc">Linked students</div>
					</a>
				</div>
				<div class="b_img" style="float:left;">
					<a href="teachers_Batches.php">
						<i class="fa fa-users" style="width:185;height:160; display: block; padding:;font-size:55px;margin-top:30px;"></i>
						<div class="b_desc">Batches</div>
					</a>
				</div>
				<div class="b_img" style="float:left;">
					<a href="teachers_students.php">
						<i class="fa fa-list" style="width:185;height:160; display: block; padding:;font-size:55px;margin-top:30px;"></i>
						<div class="b_desc">Students list</div>
					</a>
				</div>
				<!--<div class="b_img" style="float:left;">
					<a href="#">
					<i class="fa fa-rupee" style="width:185;height:160; display: block; padding:;font-size:55px;margin-top:30px;"></i>
						<div class="b_desc">Payments</div>
					</a>
				</div>-->
				<div class="b_img" style="float:left;">
					<a  href="teacher_settings.php">
						<i class="fa fa-cogs" style="width:185;height:160;display:block;padding:;font-size:55px;margin-top:30px;"></i>
						<div class="b_desc">Settings</div>
					</a>
				</div>
				<div class="b_img" style="float:left;">
					<a href="teacher_privacy.php">
						<span class="glyphicon glyphicon-eye-close" style="width:185;height:160; display: block; padding:;font-size:55px;margin-top:30px;"></span>
						<div class="b_desc">Privacy</div>
					</a>
				</div>
				<div class="b_img" style="float:left;">
					<a href="teacher_logout.php">
						<span class="glyphicon glyphicon-off" style="width:185;height:160;display: block;font-size:55px;margin-top:30px;"></span>
						<div class="b_desc">Turn out</div>
					</a>
				</div>
		</div>
		<div class="col-xs-12 col-sm-0 col-md-0 col-lg-0 clearfix visible-xs">
				<div class="img" style="float:left;">
					<a href="teacher_notifications.php">
						<i class="fa fa-bell" style="display: block; padding:;font-size:50px;margin-top:30px;"></i>
						<div class="desc">Notifications<?php if(!empty($no_of_notifications) && $no_of_notifications!=0 )
										echo "<span class='badge'>$no_of_notifications</span>";
							?></div>
					</a>
				</div>
				<div class="img" style="float:left;">
					<a href="teacher_ratings.php">
						<i class="fa fa-star " style="display: block; padding:;font-size: 50px;margin-top:30px;"></i>
						<div class="desc">Ratings<?php if(!empty($final_rates))
								{
								if(!empty($final_rates))echo "&nbsp;<span class='badge'>".round($final_rates)."</badge>";
								}  ?></div>
					</a>
				</div>
				<div class="img" style="float:left;">
					<a href="teacher_reviews.php">
						<i class="fa fa-comments" style="display:block;font-size:50px;margin-top:30px;"></i>
						<div class="desc">Reviews</div>
					</a>
				</div>
				<div class="img" style="float:left;">
					<a href="teacher_link_students.php">
						<i class="fa fa-link" style="display:block;font-size:50px;margin-top:30px;"></i>
						<div class="desc">Linked students</div>
					</a>
				</div>
				<div class="img" style="float:left;">
					<a href="teachers_Batches.php">
						<i class="fa fa-users" style="display:block;font-size: 50px;;margin-top:30px;"></i>
						<div class="desc">Batches</div>
					</a>
				</div>
				<div class="img" style="float:left;">
					<a href="teachers_students.php">
						<i class="fa fa-list" style="display:block; padding:;font-size:50px;margin-top:30px;"></i>
						<div class="desc">Students</div>
					</a>
				</div>
				<div class="img" style="float:left;">
					<a  href="teacher_settings.php">
						<i class="fa fa-cogs" style="display:block;font-size:50px;margin-top:30px;"></i>
						<div class="desc">Settings</div>
					</a>
				</div>
				<div class="img" style="float:left;">
					<a  href="teacher_privacy.php">
						<span class="glyphicon glyphicon-eye-close" style="display:block;font-size: 50px;margin-top:30px;"></span>
						<div class="desc">Privacy</div>
					</a>
				</div>
				<div class="img" style="float:left;">
					<a  href="teacher_logout.php">
						<span class="glyphicon glyphicon-off" style="display:block;font-size:50px;margin-top:30px;"></span>
						<div class="desc">Turn off</div>
					</a>
				</div>
		</div>	
	</div>
	<!--<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-12 ">
			<div class="panel panel-default">
				<div class="panel-heading">
				RSS News feed
				</div>
				<div class="panel-body">
				This website has become an important part of my life.We have created it.It is very enjoyable to share our personal information with you.This website has all the information about us and our Ideas.We would like it to share it with you. We will regularly upload our information like photos, videos, thoughts and personal information.I hope it will be an enjoyable experience to know about me and my friends.
				</div>
			</div>
		</div>
	</div>-->
</div>	
<script type="text/javascript">
$(document).ready(function(){
	welcome_message();
});
function welcome_message() {
    var x = document.getElementById("welcome")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>				
<?php include_once "./include/footer.php"; ?>
</body>
</html>