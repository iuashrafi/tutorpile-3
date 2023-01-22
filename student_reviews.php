<?php
	require_once "include/student_secure_header.php";
?>
<html>
<head>
	<title>Tutor Pile | Reviews </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<link href="css/w3.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link href="css/font-awesome.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
	<script>
		function stud_review_deletion(id,divid)
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
			xmlhttp.open("GET","short_pages/delete_student_review.php?id="+id,true);
			xmlhttp.send();
		}
		function loading_stud_contents(divid,start,end)
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
			xmlhttp.open("GET","short_pages/next_student_comments.php?s="+start+"&e="+end,true);
			xmlhttp.send();
		}
		
	</script>
</head>
<body>
<?php
	include("students_header_icon.php");
	include("students_header_nav_online.php");
?>
<div class="container index page-height" >
	<div class="row" style="margin-top:10px;">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li><i class="fa fa-tachometer" ></i>&nbsp;<a href="student_profile.php">Dashboard</a></li>
				<li><span class="glyphicon glyphicon-pencil" ></span>&nbsp;Student reviews</li>
			</ol>
		</div>
	</div>
	<div class="row">					
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="title_of_page" style="margin-top:30px;"><h3><strong>Reviews on teachers</strong></h3><hr/></div>
	</div>
	<div class="col-lg-12 col-xs-12 " id="change_reviews">
		<?php 
			require_once "classes/class_stud_reviews.php";
			$ob=new stud_reviews();
			$ob->display_next_comments($_SESSION['emailid'],0,5);	
		?>
	</div>
	</div>
</div>	
<?php include_once "./include/footer.php"; ?>
</body>
</html>