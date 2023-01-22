<?php 
class image_upload
{
	public function get_image()
	{
		if(!isset($_SESSION))
		session_start();
		if($_SESSION['catogory']=="student")
		$select=mysql_query("SELECT Image_name FROM students_secondary_info WHERE Emailid='$_SESSION[emailid]' AND S_uniqueid='$_SESSION[student_id]' ");
		else if($_SESSION['catogory']=="teacher")
		$select=mysql_query("SELECT Image_name FROM teachers_secondary_info WHERE Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]' ");
		$row=mysql_fetch_array($select);
		return $row['Image_name'];
	}
	public function validate_image()
	{
		$output['status']=FALSE;
		$allowedImageType = array("image/gif",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );
		if ($_FILES["image_upload"]["error"] > 0)
		  {
			$output['Error']=$_FILES["image_upload"]["error"];
		  }
		else if(!in_array($_FILES["image_upload"]["type"],$allowedImageType))
		{
			$output['Error']= "You can only upload JPG, PNG or GIF file";
		}
		elseif (round($_FILES['image_upload']["size"] / 1024) > 4096) {
			$output['Error']= "You can upload file size up to 4 MB";
		}
		else
		  {
			define('IMAGE_SMALL_DIR', './display/small/');
			define('IMAGE_SMALL_SIZE', 50);
			define('IMAGE_MEDIUM_DIR', './display/medium/');
			define('IMAGE_MEDIUM_SIZE', 250);
			$path[0] = $_FILES['image_upload']['tmp_name'];
			$file = pathinfo($_FILES['image_upload']['name']);
			$fileType = $file["extension"];
			$desiredExt='jpg';
			$fileNameNew = rand(333, 999) . time() . ".$desiredExt";
			$path[1] = IMAGE_MEDIUM_DIR . $fileNameNew;
			$path[2] = IMAGE_SMALL_DIR . $fileNameNew;
			if($this->createThumbnail($path[0], $path[1], $fileType, IMAGE_MEDIUM_SIZE, IMAGE_MEDIUM_SIZE,IMAGE_MEDIUM_SIZE))
			{
				if($this->createThumbnail($path[1], $path[2],"$desiredExt", IMAGE_SMALL_SIZE, IMAGE_SMALL_SIZE,IMAGE_SMALL_SIZE)) {
				$output['status']=TRUE;
				$output['image_medium']= $path[1];
				$output['image_small']= $path[2];
				// submit file name i.e. $fileNameNew 
				$this->update_imagename($fileNameNew);
				}
			}
		  }
	}
	private function createThumbnail($path1, $path2, $file_type, $new_w, $new_h, $squareSize = '')
	{
			$source_image = FALSE;
			if (preg_match("/jpg|JPG|jpeg|JPEG/", $file_type)) {
				$source_image = imagecreatefromjpeg($path1);
			}
			elseif (preg_match("/png|PNG/", $file_type)) {
				
				if (!$source_image = @imagecreatefrompng($path1)) {
					$source_image = imagecreatefromjpeg($path1);
				}
			}
			elseif (preg_match("/gif|GIF/", $file_type)) {
				$source_image = imagecreatefromgif($path1);
			}		
			if ($source_image == FALSE) {
				$source_image = imagecreatefromjpeg($path1);
			}
			$orig_w = imageSX($source_image);
			$orig_h = imageSY($source_image);
			
			if ($orig_w < $new_w && $orig_h < $new_h) {
				$desired_width = $orig_w;
				$desired_height = $orig_h;
			} else {
				$scale = min($new_w / $orig_w, $new_h / $orig_h);
				$desired_width = ceil($scale * $orig_w);
				$desired_height = ceil($scale * $orig_h);
			}
					
			if ($squareSize != '') {
				$desired_width = $desired_height = $squareSize;
			}
			
			/* create a new, "virtual" image */
			$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
			// for PNG background white----------->
			$kek = imagecolorallocate($virtual_image, 255, 255, 255);
			imagefill($virtual_image, 0, 0, $kek);
			
			if ($squareSize == '') {
				/* copy source image at a resized size */
				imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $orig_w, $orig_h);
			} else {
				$wm = $orig_w / $squareSize;
				$hm = $orig_h / $squareSize;
				$h_height = $squareSize / 2;
				$w_height = $squareSize / 2;
				
				if ($orig_w > $orig_h) {
					$adjusted_width = $orig_w / $hm;
					$half_width = $adjusted_width / 2;
					$int_width = $half_width - $w_height;
					imagecopyresampled($virtual_image, $source_image, -$int_width, 0, 0, 0, $adjusted_width, $squareSize, $orig_w, $orig_h);
				}

				elseif (($orig_w <= $orig_h)) {
					$adjusted_height = $orig_h / $wm;
					$half_height = $adjusted_height / 2;
					imagecopyresampled($virtual_image, $source_image, 0,0, 0, 0, $squareSize, $adjusted_height, $orig_w, $orig_h);
				} else {
					imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $squareSize, $squareSize, $orig_w, $orig_h);
				}
			}
			
			if (@imagejpeg($virtual_image, $path2, 90)) {
				imagedestroy($virtual_image);
				imagedestroy($source_image);
				return TRUE;
			} else {
				return FALSE;
			}
	}
	private function update_imagename($filename)
	{
		if(!isset($_SESSION))
		session_start();
		if($_SESSION['catogory']=="student")
		$upload_img="UPDATE students_secondary_info SET Image_name='$filename' WHERE Emailid='$_SESSION[emailid]' AND S_uniqueid='$_SESSION[student_id]' ";
		 if($_SESSION['catogory']=="teacher")
		$upload_img="UPDATE teachers_secondary_info SET Image_name='$filename' WHERE Emailid='$_SESSION[emailid]' AND T_uniqueid='$_SESSION[teacher_id]' ";
		if(!mysql_query($upload_img))
		{
			echo "Error uploading image in update_imagename() ".mysql_error();
		}
		
	}
}
?>