<?php
	require_once "include/student_secure_header.php";
?>
<html>
<head>
	<title>Tutor Pile | Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
</head>
<body>
<?php
	include("students_header_icon.php");
	include("students_header_nav_online.php");
?>
<div class="container index page-height">
	<div class="row">
		<div class="col-xs-12 col-lg-12">
			<br/>
			<?php 
			if(isset($_SESSION["WELCOME"]) && $_SESSION["WELCOME"]==1)
			{
				?>
				<div id="welcome"><?php echo "Welcome ".$_SESSION["name"]; ?></div>
				<?php 
				unset($_SESSION["WELCOME"]);
			}
			?>
			<ol class="breadcrumb">
				<li><i class="fa fa-tachometer"></i>&nbsp;<a href="student_profile.php">Dashboard</a></li>
			</ol>
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
					$display_info = mysql_query("SELECT Institute,Institute_address,Standard,Address,City,Image_name FROM students_secondary_info WHERE Emailid = '$_SESSION[emailid]' AND S_uniqueid = '$_SESSION[student_id]'");
						$inst=$inst_adr=$stn=$adr=$cty=$pimg="unavailable";
						while($row84= mysql_fetch_array($display_info))
						{
							if(!empty($row84['Institute']))
								$inst = $row84['Institute'];
							if(!empty($row84['Institute_address']))
								$inst_adr = $row84['Institute_address'];
							if(!empty($row84['Standard']))
								$stn = $row84['Standard'];
							if(!empty($row84['Address']))
								$adr = $row84['Address'];
							if(!empty($row84['City']))
								$cty = $row84['City'];
							if(!empty($row84['Image_name']))
								$pimg ="available";
						}
				?>
				<table class="table table-hover">
					<tr>
						<td>name </td>
						<td><?php echo $_SESSION["name"];?></td>
					</tr>
					<tr>
						<td>profile pic</td>
						<td><?php echo $pimg;?></td>
					</tr>
					<tr>
						<td>Institute</td>
						<td><?php echo $inst;?></td>
					</tr>
					<tr>
						<td>Institute_address</td>
						<td><?php echo $inst_adr;?></td>
					</tr>
					<tr>
						<td>Standard</td>
						<td><?php echo $stn;?></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><?php echo $adr;?></td>
					</tr>
					<tr>
						<td>City</td>
						<td><?php echo $cty;?></td>
					</tr>
				</table>
			</div>
			<div class="row col-xs-11 col-sm-5 col-md-5 col-lg-5 p_box" style="background-color:;">
				<br/>
				<p>Search for the best, leave the rest. Pleanty, of tutors to choose from all around the world.</p>
				<hr/>
				<p>
					<a href="search_teachers.php" target="blank"><img src="system img/search.gif" style="height:250px;width:100%;"/></a>
				</p>
			</div>
			<div class="row col-xs-11 col-sm-6 col-md-6 col-lg-6 p_box" style="background-color:;">
				<br/>
				<p style="text-align:center;"><strong>Largest students community.</strong></p>
				<hr/>
				<p>
					<img src="system img/student.jpg" style="height:270px;width:100%;"/>
				</p>
			</div>
		</div>
		<div class=" col-xs-10 col-sm-3 col-md-3 col-lg-3 p_box" style="background-color:; float:left;">
			<br/>
			<p>Find best tutors around you.Select tutors based upon there our <strong>ranking</strong> system.</p>
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
	<div class="row">
			<div class="col-xs-0 col-sm-11 col-md-11 col-lg-11 clearfix visible-lg visible-md visible-sm  p_box" >
				
				<div class="b_img" style="float:left; background-color:;">
					<a href="search_teachers.php">
						<i class="fa fa-eye" style="width:140;height:130; display: block;font-size:38px;margin-top:30px;"></i>
						<div class="b_desc">Search for Teachers</div>
					</a>
				</div>
				<div class="b_img" style="float:left; background-color:;">
					<a href="student_notifications.php">
						<i class="fa fa-bell " style="width:140;height:130; display: block; font-size:38px ;margin-top:30px;"></i>
						<div class="b_desc">Notifications&nbsp;</div>
					</a>
				</div>
				<div class="b_img" style="float:left; background-color:;">
					<a href="student_ratings.php">
						<i class="fa fa-star " style="width:185;height:160; display: block;font-size:38px;margin-top:30px;"></i>
						<div class="b_desc">Ratings</div>
					</a>
				</div>
				<div class="b_img" style="float:left; background-color:;">
					<a href="student_reviews.php">
						<i class="fa fa-comments " style="width:185;height:160; display: block;font-size:38px;margin-top:30px;"></i>
						<div class="b_desc">Reviews</div>
					</a>
				</div>
				<div class="b_img" style="float:left; background-color:;">
					<a  href="student_settings.php">
						<i class="fa fa-cogs " style="width:185;height:160; display: block;font-size:38px ;margin-top:30px;"></i>
						<div class="b_desc">Settings</div>
					</a>
				</div>
				<div class="b_img" style="float:left; background-color:;">
					<a href="student_privacy.php">
						<span class="glyphicon glyphicon-eye-close" style="width:185;height:160;display: block;font-size:38px ;margin-top:30px;"></span>
						<div class="b_desc">Privacy</div>
					</a>
				</div>
				<div class="b_img" style="float:left; background-color:;">
					<a href="student_logout.php">
					<span class="glyphicon glyphicon-off" style="width:185;height:160; display: block; font-size:38px ;margin-top:30px;"></span>
						<div class="b_desc">Turn off</div>
					</a>
				</div>
			</div>
			
		<div class="col-xs-11 col-sm-0 col-md-0 col-lg-0 clearfix visible-xs">
				<div class="img" style="float:left;">
					<a href="search_teachers.php">
						<i class="fa fa-eye" style="display: block;font-size:50px;margin-top:30px;"></i>
						<div class="desc">Search</div>
					</a>
				</div>
				<div class="img" style="float:left;">
					<a href="student_repute.php">
						<i class="fa fa-star " style="display:block; font-size: 50px;  line-height: ;margin-top:30px;"></i>
						<div class="desc">ratings</div>
					</a>
				</div>
				<div class="img" style="float:left;">
					<a href="student_notifications.php">
						<i class="fa fa-bell" style="display: block;font-size: 50px;margin-top:30px;"></i>
						<div class="desc">Notifications</div>
					</a>
				</div>
				
				<div class="img" style="float:left;">
					<a href="student_reviews.php">
						<i class="fa fa-comments" style="display:block;font-size: 50px;margin-top:30px;"></i>
						<div class="desc">Reviews</div>
					</a>
				</div>
				
				<div class="img" style="float:left;">
					<a  href="student_settings.php">
						<i class="fa fa-cogs" style="display:block;font-size:50px;margin-top:30px;"></i>
						<div class="desc">Settings</div>
					</a>
				</div>
				<div class="img" style="float:left;">
					<a  href="student_privacy.php">
						<span class="glyphicon glyphicon-eye-close" style="display:block;font-size:50px;margin-top:30px;"></span>
						<div class="desc">Privacy</div>
					</a>
				</div>
				<div class="img" style="float:left;">
					<a  href="student_logout.php">
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