<?php require_once 'class/class.php';
  require_once 'class/db.php';
if($_POST) 
{ 
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') 
	{ 
		die(); 
	} 

	if(isset($_POST["message"]) && strlen($_POST["message"])>0) 
	{
        $message = mysqli_real_escape_string($con, $_POST['message']);
        $user_form = mysqli_real_escape_string($con, $_POST['user_two']);//otheruser
        $user_to = mysqli_real_escape_string($con, $_POST['user_one']);//me 
        $username = $_POST['fa'];
        //$uid $_COOKIE['uid'];
        $ip = $_SERVER['REMOTE_ADDR'];
        //insert into `messages`
        $select = mysqli_query($con,"SELECT * FROM conversation WHERE (user_two='$user_to' AND user_one='$user_form') OR (user_two='$user_form' AND user_one='$user_to') ");
        $new = mysqli_num_rows($select);
        if($new!=0)
        {
            while($res=mysqli_fetch_array($select))
           {
              $cid =$res['id'];
              $q = mysqli_query($con, "INSERT INTO messages(username,user_from,user_to,message,cid,ip) VALUES ('$username','$user_form','$user_to','$message','$cid','$ip')");
              $a = mysqli_query($con,"UPDATE conversation SET status='yes' WHERE (user_two='$user_to' AND user_one='$user_form') OR (user_two='$user_form' AND user_one='$user_to')");
           }
            
        }
        else
        {
            while($res=mysqli_fetch_array($select))
           {
                $cid =$res['id'];
                $q = mysqli_query($con, "INSERT INTO messages(username,user_from,user_to,message,cid,ip) VALUES ('$username','$user_form','$user_to','$message','$cid','$ip')");
                $a = mysqli_query($con,"UPDATE conversation SET status='yes' WHERE (user_two='$user_to' AND user_one='$user_form') OR (user_two='$user_form' AND user_one='$user_to')");
            }
        }

    }
}