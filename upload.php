<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["userImage"]["type"])){
	$msg = '';
	$ip = $_SERVER['REMOTE_ADDR'];
	//$image = rand();
	$time = time();
	$a = $_COOKIE['uid'];
	$uploaded = FALSE;
	$extensions = array("jpeg", "jpg", "png"); // file extensions to be checked
	$fileTypes = array("image/png","image/jpg","image/jpeg"); // file types to be checked
	$file = $_FILES["userImage"];
	$file_extension = strtolower(end(explode(".", $file["name"])));
	//file size condition can be included here   -- && ($file["size"] < 100000)
	if (in_array($file["type"],$fileTypes) && in_array($file_extension, $extensions)) {
		if ($file["error"] > 0)
		{
			$msg = 'Error Code: ' . $file["error"];
		}
		else
		{
			if (file_exists("upload/" . $file["name"])) {
				$msg = $file["name"].' already exist.';				
			}
			else
			{
				$sourcePath = $file['tmp_name']; //  source path of the file
				$targetPath = 'uploads/'.$file['name']; // Target path where file is to be stored
				move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
				// $msg = 'Image Uploaded Successfully...!!';
				$con = mysqli_connect("localhost","root","","fa");
				$q = mysqli_query($con,"INSERT INTO alal(pimage,pdate,ip,uid)VALUES('$targetPath','$time','$ip','$a')");
				$uploaded = TRUE;
			}
		}
	}
	else
	{
		$msg = '***Invalid file Size or Type***';
	}
	echo ($uploaded ? $msg : '<span class="msg-error">'.$msg.'</span>');
}

die();
?>