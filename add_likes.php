<?php
$uid =$_COOKIE['uid'];
$postid = $_POST["id"];
if(!empty($postid)) {
$con = mysqli_connect("localhost","root","","fa");
$select = mysqli_query($con,"SELECT * FROM likes WHERE (lpid='$postid' AND luid='$uid')");
        $new = mysqli_num_rows($select);
        $new1 = mysqli_fetch_array($select);
		if($new==0 AND $new1['luid']!=$uid)
		{
			switch($_POST["action"]){
			case "like":
			$query = "INSERT INTO likes (lpid,luid) VALUES ('$postid','$uid')";
			$res = mysqli_query($con,$query);
			if(!empty($res)) {
				$query ="UPDATE userpost SET likes = likes + 1 WHERE pid='$postid'";	
				$res = mysqli_query($con,$query);			
			}			
			break;
			}
		}
		else
		{
			switch($_POST["action"]){
			case "unlike":
			$query = "DELETE FROM likes WHERE lpid = '$postid' and luid = '$uid'";
			$res = mysqli_query($con,$query);
			if(!empty($res)) {
				$query ="UPDATE userpost SET likes = likes - 1 WHERE pid='$postid' and likes > 0";
				$res = mysqli_query($con,$query);
			}
				
		break;
		}
		}		
				
	}
?>