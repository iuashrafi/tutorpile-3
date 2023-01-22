<?php
	require_once "include/student_secure_header.php";
?>
<html>
<head>
	<title>Tutor Pile | Search</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<link href="css/bootstrap.min.css" rel="stylesheet"> 
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style sheet/style.css" type="text/css">
	<link rel="stylesheet" href="style sheet/buttons.css" type="text/css">
	<script src="style sheet/custom.js"></script> 
</head>
<body>
<?php
	include("students_header_icon.php");
	include("students_header_nav_online.php");
?>
	<div class="container-fluid index alert" style="background-color:#FFB800;margin-top:3px;">
	<div class="container  " style="background-color:;">
		<div class="row" style="background-color:;">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " style="background-color:;">
				<div style="margin-top:40px">
							<div class="row"> 
								<div class="col-xs-12 col-lg-8 col-md-10 col-sm-10 col-lg-offset-2 col-md-offset-1 col-sm-offset-1 fade in">
								<form autocomplete="on">
								<div class="col-sm-4">
									<div class="form-group"> 
										<label>Subject&nbsp;<span class="glyphicon glyphicon-book" ></span></label>
										<select class="form-control" name="subo" id="category" required="required"> 
										<option value="" selected >Subject</option>
										<?php 										
											$options=mysql_query("SELECT Subject FROM subject ORDER BY Subject ASC");
											while($row_option=mysql_fetch_array($options))
											{
											?>
											<option value="<?php echo $row_option['Subject']; ?>"><?php echo $row_option['Subject'];?></option>
											<?php
											}
										?>
									
										</select> 
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>City&nbsp;<span class="glyphicon glyphicon-map-marker" ></span></label>	
										<input id="city" list="city_list" class="form-control" type="text" onkeyup="" placeholder="City(optional)" />
										<datalist id="city_list">
											<?php  
											$options=mysql_query("SELECT City FROM teachers_secondary_info ");
											while($row=mysql_fetch_array($options))
											{
												?>
												<option label="<?php echo $row['City']; ?>" value="<?php echo $row['City']; ?>" />
												<?php 
											}
											?>
											</datalist>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">
										<label>Pin code</label>	
										<input id="pin" list="pin_list" class="form-control" type="text" placeholder="Pincode(optional)"/>
											<datalist id="pin_list">
											<?php  
											$options=mysql_query("SELECT Pincode FROM teachers_primary_info ");
											while($row=mysql_fetch_array($options))
											{
												?>
												<option label="<?php echo $row['Pincode']; ?>" value="<?php echo $row['Pincode']; ?>" />
												<?php 
											}
											?>
											</datalist>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group" style="margin-top:27px;">
										<button style="background-color:#FF8900;" type="button" onclick="search_tutors()" title="Search" class="btn btn-action btn-smit">
										<span class="glyphicon glyphicon-search"></span>
										</button>
									</div>
								</div>
								</form>
							</div>
							</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="Display_teachers_list"></div>
			</div>
		</div>
	</div>
</body>
</html>