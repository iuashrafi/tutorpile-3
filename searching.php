<?php
	require_once "include/student_secure_header.php";
?>
<div id="" class="" style="margin-top:30px;">
			<div class="panel-body">		
				<header class="panel-heading"><h4><b>Search Results</b></h4><hr/></header>
			</div>	
<?php
require_once("classes/connect.php");
if(!isset($_SESSION))
	session_start();
$found=0;
if(!empty($_GET['pin']) && !empty($_GET['city'])  && !empty($_GET['category']) )
{
//$search=new search_teacher();
//$search->IFallisentered($_GET['pin'],$_GET['city'],$_GET['category']);
//Everything  
$select=mysql_query("SELECT teachers_primary_info.Emailid,teachers_primary_info.Firstname,teachers_primary_info.Lastname,teachers_primary_info.Subject1,teachers_primary_info.Subject2,teachers_primary_info.Subject3,teachers_secondary_info.City,teachers_primary_info.Pincode,teachers_primary_info.T_uniqueid,teachers_secondary_info.Experience
FROM teachers_primary_info JOIN teachers_secondary_info
ON teachers_primary_info.Emailid=teachers_secondary_info.Emailid WHERE (teachers_primary_info.Subject1='$_GET[category]' OR teachers_primary_info.Subject2='$_GET[category]' OR teachers_primary_info.Subject3='$_GET[category]') AND teachers_primary_info.Pincode='$_GET[pin]' AND City LIKE '%$_GET[city]%' ORDER BY Firstname ASC ");
$found=1;
}
else if(!empty($_GET['pin']) && !empty($_GET['category']) && empty($_GET['city']))
{
//Pin and categ are filled 
$select=mysql_query("SELECT teachers_primary_info.Emailid,teachers_primary_info.Firstname,teachers_primary_info.Lastname,teachers_primary_info.Subject1,teachers_primary_info.Subject2,teachers_primary_info.Subject3,teachers_primary_info.Pincode,teachers_primary_info.T_uniqueid,teachers_secondary_info.City,teachers_secondary_info.Experience
FROM teachers_primary_info JOIN teachers_secondary_info
ON teachers_primary_info.Emailid=teachers_secondary_info.Emailid WHERE (teachers_primary_info.Subject1='$_GET[category]' OR teachers_primary_info.Subject2='$_GET[category]' OR teachers_primary_info.Subject3='$_GET[category]') AND teachers_primary_info.Pincode='$_GET[pin]' ORDER BY Firstname ASC ");
$found=1;
}
else if(!empty($_GET['city']) && !empty($_GET['category']))
{
	//City and Category
$select=mysql_query("SELECT teachers_primary_info.Emailid,teachers_primary_info.Firstname,teachers_primary_info.Lastname,teachers_primary_info.Subject1,teachers_primary_info.Subject2,teachers_primary_info.Subject3,teachers_primary_info.Pincode,teachers_secondary_info.City,teachers_primary_info.T_uniqueid,teachers_secondary_info.Qualifications,teachers_secondary_info.Experience,teachers_primary_info.Phonenumber
FROM teachers_primary_info JOIN teachers_secondary_info
ON teachers_primary_info.Emailid=teachers_secondary_info.Emailid WHERE (teachers_primary_info.Subject1='$_GET[category]' OR teachers_primary_info.Subject2='$_GET[category]' OR teachers_primary_info.Subject3='$_GET[category]') AND City LIKE '%$_GET[city]%' ORDER BY Firstname ASC ");
	$found=1;
}	
else if(!empty($_GET['category']) && empty($_GET['pin']) && empty($_GET['city']))
{
//category
$select=mysql_query("SELECT teachers_primary_info.Emailid,teachers_primary_info.Firstname,teachers_primary_info.Lastname,teachers_primary_info.Subject1,teachers_primary_info.Subject2,teachers_primary_info.Subject3,teachers_primary_info.Phonenumber,teachers_secondary_info.City,teachers_primary_info.Pincode,teachers_secondary_info.Qualifications,teachers_secondary_info.Experience,teachers_primary_info.T_uniqueid FROM teachers_primary_info JOIN teachers_secondary_info 
ON teachers_primary_info.Emailid=teachers_secondary_info.Emailid WHERE teachers_primary_info.Subject1='$_GET[category]' OR teachers_primary_info.Subject2='$_GET[category]' OR teachers_primary_info.Subject3='$_GET[category]' ORDER BY Firstname ASC ");
$found=1;
}
elseif(empty($_GET['category']) && empty($_GET['category']) && empty($_GET['city']) )
{
	$found=0;
}
if($found==1)
{	
	$count=0;
	require_once "classes/class_stud_stat.php";
	while($row=mysql_fetch_array($select))
	{
		require_once "classes/class_teacher_fetch_id.php";
		?>
		<div class='row'>
			<div class='col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1'>
				<div class='row' style='background-color:#F8F8F8;border:;'>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 " >
								<div class="row">
									<div class="col-xs-12 col-lg-12 col-sm-12 col-md-12">
									<h4><strong><?php 
								$ob=new teacher_fetch_id;
								$ob->fetch_id_primary($row['T_uniqueid']);
								
								echo $ob->fetch_name();?></strong></h4>
									</div>
									<div class="col-xs-12 col-lg-12 col-sm-12 col-md-12">
									<?php $ob->fetch_id_secondary($row['T_uniqueid']);
										 if($ob->fetch_qualifications()!="")
											 echo "Qualifications:".$ob->fetch_qualifications()."&nbsp;&nbsp;&nbsp;&nbsp;";
										
										 if($ob->fetch_city()!="")
											 echo "City:".$ob->fetch_city()."&nbsp;&nbsp;&nbsp;&nbsp;";
									?>	<br/><br/>
									</div>
								</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
							<br/>
							<a class="btn btn-tw tw-mosaic" href="view_teacher.php?id=<?php echo $row['T_uniqueid'];?>" >
							<span class="glyphicon glyphicon-eye-open"></span>&nbsp;View profile</a>
							<?php 
							$bar=new stud_stat();
							$bar->stats_bar($row['T_uniqueid']);
							?>
						</div>
				</div>
			</div>
		</div>
		
	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<?php			
		$count++;
	}
		if($count==0)
		{
			echo "
			<div class='row'>
			<div class='col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1' style='height:50px;' >
			No search results found
			</div>
			</div>";
		}
		if($count>0)
		{
			echo "
			<div class='row'>
			<div class='col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1' style='height:50px;' >
			No more search results
			</div>
			</div>";
		}
}
else if($found=0)
{
	echo "
	<div class='row'>
	<div class='col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1' style='height:50px;' >
	Fill up the details to search
	</div>
	</div>";
}
?>
</div>