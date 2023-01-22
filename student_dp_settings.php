<?php 
		require_once "classes/class_image_upload.php";
		$ob=new image_upload();
		if(isset($_POST["display_pic"]) && isset($_FILES["image_upload"]) && $_SERVER["REQUEST_METHOD"]=="POST" )
		{
			$ob->validate_image();
			header("location:student_settings.php");
		}
		$image_path="./display/medium/".$ob->get_image();
?>
<div class="tab-pane fade in active" id="DP"> 
	<div class="row">
	<div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
	<h4>Display pic [Edit]</h4>
	<hr/>
	</br>
	</div>
	<div class="col-xs-12 col-sm-10 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
		<div class="panel panel-default" style="min-width:220px;">
			<div class="panel-body">
			 <form enctype="multipart/form-data" action="<?php echo htmlspecialchars('student_settings.php');?>" method="post" >
				<p><strong><?php echo $_SESSION['name'];?></strong><p>
				<div style="height:150px;width:150px;"><img src="<?php if(isset($image_path)) echo $image_path; else echo "./img/a01.JPEG"; ?>" alt="Display picture" style="height:150px;width:150px;"></div>
				<div id="choose">
				<input  style="color:green;" type="file" accept="image/*" name="image_upload" id="image_upload" />
				</div>
				<br/>
				<input class="btn btn-action btn-smit" type="submit" name="display_pic" value="Save" />
			  </form>	
			</div>
		</div>
	</div>
	</div>
</div>