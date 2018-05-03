<?php
//action.php
include('class/db.php');
include('class/class.php');
$uid = $_COOKIE['uid'];
if($_POST)
{
  if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') 
  { 
    die(); 
  }

if(isset($_POST["action"]))
{
 if($_POST["action"] == "update_time")
 {
  $time = time();
      $uid = $_COOKIE["uid"];
  $time_check = time()-14;
  $sql="SELECT * FROM login_details WHERE loginId='$uid'";
  $result=mysqli_query($con,$sql);

  $count=mysqli_num_rows($result);
  if($count=="0"){

  $sql1="INSERT INTO login_details(loginId, time,active)VALUES('$uid', '$time','1')";
  $result1=mysqli_query($con,$sql1);
  }

  else {
  $sql2="UPDATE login_details SET time='$time',active='1' WHERE loginId = '$uid'";
  $result2=mysqli_query($con,$sql2);
  }
 $sql4="DELETE FROM login_details WHERE time<$time_check";
  $result4=mysqli_query($con,$sql4);
  // if over 10 minute, delete session 
   $query = mysqli_query($con,"SELECT  U.uusername,U.uid,U.uname,U.uphoto,L.loginId,L.active FROM login_details L,user U WHERE L.loginId=U.uid ");
  while ($res = mysqli_fetch_assoc($query)) 
  {
    # code...
     if($res['uid']!=$uid)
     {
       echo'
    <a href="'.$res['uusername'].'" style="text-decoration:none;color:#000;"><div class="sidebar-name" data-user-id="'.$res['uid'].'">
         <img src="images/../images/'.$res['uphoto'].'" style="width:30px;height:30px;border-radius:50%">'.$res['uname'].'
    </div></a>
              ';
     }
  }
 } 
  if($_POST["action"] == "fetch_data")
 {
  $time_check = time()-14;
  
  $sql4="DELETE FROM login_details WHERE time<$time_check";
  $result4=mysqli_query($con,$sql4);
 }
}
}
?>
