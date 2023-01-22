<div style="min-width:275px;">
	<div class="container-fluid bg_col1" style="height:55px;">
		<div class="row" style="height:55px;">
			<div class="col-xs-0 col-sm-1 col-md-1 col-lg-1 clearfix visible-sm clearfix visible-md clearfix visible-lg bg_col1" style="float:left;height:55px;">
			</div>
			<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" style="float:left;height:55px;">
				<div class="row">
					<div class="col-xs-0 col-sm-12 col-md-12 col-lg-12 clearfix visible-sm clearfix visible-md clearfix visible-lg" style="float:left;height:55px;">
						<div class="row">
							<div class="col-xs-0 col-sm-6 col-md-6 col-lg-6 clearfix visible-sm clearfix visible-md clearfix visible-lg" style="height:55px;">
								<div class="row">
									<div class="col-xs-0 col-sm-3 col-md-3 col-lg-3 clearfix visible-sm clearfix visible-md clearfix visible-lg" style="height:55px;">
										<img src="system img/logo.png" style="height:55px; width:100%;">
									</div>
									<div class="col-xs-0 col-sm-9 col-md-9 col-lg-9 clearfix visible-sm clearfix visible-md clearfix visible-lg site_name">
										<p>Tutor Pile</p>
									</div>
								</div>
							</div>
							<div class="col-xs-0 col-sm-6 col-md-6 col-lg-6 clearfix visible-sm clearfix visible-md clearfix visible-lg" style="float:right;height:55px;">
								<div class="row">
									<div class="col-xs-0 col-sm-12 col-md-12 col-lg-12 clearfix visible-sm clearfix visible-md clearfix visible-lg" style="float:left;height:55px;">
										<p style="color:#FFC90E;line-height:20px;float:right;margin-top:15px;"><b><?php echo " " . $_SESSION['name'] . " "; ?></b></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-0 col-md-0 col-lg-0 clearfix visible-xs" style="float:left;height:55px;background-color:#232323">
						<div class="row">
							<nav class="navbar navbar-default" role="navigation" style="float:left;width:100%;background-color:#232323;border:none;z-index:10;">
								<div class="navbar-header" style="float:left;margin-left:3px;">
									<div class="site_name" style="float:right;">
										&nbsp;Tutor Pile
									</div>
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
										<span style="background-color:white;" class="sr-only"></span>
										<span style="background-color:white;" class="icon-bar"></span>
										<span style="background-color:white;" class="icon-bar"></span>
										<span style="background-color:white;" class="icon-bar"></span>
									</button>
								</div>
			<div class="collapse navbar-collapse" id="example-navbar-collapse" style="float:left;width:100%;background-color:#232323">
			<ul class="nav navbar-nav">
			<li><a href="student_profile.php" id="n_view"><i class="fa fa-tachometer"></i>&nbsp;Dashboard</a></li>
			<li><a href="search_teachers.php" id="n_view"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Search Tutors</a></li>
				<li><a href="student_notifications.php" id="n_view"><span class="glyphicon glyphicon-bell"></span>&nbsp;Notifications</a></li>
				<li><a href="student_settings.php" id="n_view"><span class="glyphicon glyphicon-wrench"></span>&nbsp;Settings</a></li>
				<li><a href="student_logout.php" id="n_view"><span class="glyphicon glyphicon-off"></span>&nbsp;Turn off [<?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?>] </a></li>
				<li><a href="feedback.php" id="n_view"><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;Feedback</a></li>
				<li><a href="help.php"  id="n_view"><span class="glyphicon glyphicon-question-sign"></span>&nbsp;Help</a></li>
			</ul> 
			</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-0 col-sm-1 col-md-1 col-lg-1 clearfix visible-sm clearfix visible-md clearfix visible-lg bg_col1" style="float:right;height:55px;">
			</div>
		</div>
	</div>
</div>