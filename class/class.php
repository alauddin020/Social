<?php 
	include 'db.php';
    function isLogged()
    {
        if (!isset($_COOKIE['uid'])) 
        {
            header("location:../a");
        }
    }
    // ALTER TABLE udetails ADD FOREIGN KEY(uid) REFERENCES user(uid)
    function isLogin()
    {
        if (isset($_COOKIE['uid'])) 
        {
            header("location:home");
        }
    }
	function login($username,$password,$pass)
	{
		# code...
		if(preg_match('/^[a-z][a-z0-9]{3,20}$/',$username))
       {
       	$con = mysqli_connect("localhost","root","","fa");
        $q = mysqli_query($con,"select * from user where uusername='$username' and upass='$password' or uusername='$username' and upass='$pass'");
       $res = mysqli_fetch_array($q);
        if($res)
        {
            if ($res['ustatus']=="Deactivate" or $res['ustatus']=="Active") 
            {
              $uid = setcookie("uid", $res['uid'], time()+(10 * 365 * 24 * 60 * 60));
              $a="Active";
              $alauddin=$res['uid'];
              $last_login = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));
               $logincheck = mysqli_query($con,"SELECT loginId FROM login_details WHERE loginId ='$alauddin'");
               $ulogin = mysqli_fetch_array($logincheck);
               $countu = mysqli_num_rows($logincheck);
               $time = time();
               if($countu ==0)
               {
                
                $insertquery = mysqli_query($con,"INSERT INTO  login_details(loginId,time) VALUES ('$alauddin','$time')");
               }
              
                    if($res['uid']==$uid)
                    {
                        
                        if(!empty($_POST['remember']))
                        {
                            setcookie("username", $_POST['username'], time()+(10 * 365 * 24 * 60 * 60));
                            setcookie("password", $_POST['password'], time()+(10 * 365 * 24 * 60 * 60));

                                    
                        }
                        else 
                        {

                            if(ISSET($_COOKIE['username']))
                            {
                                setcookie("username", "");
                            }
                            if(ISSET($_COOKIE['password']))
                            {
                                setcookie("password", "");
                            }
                            if(ISSET($_COOKIE['uid']))
                            {
                                setcookie("uid", "");
                            }
                        }
                                    # code...
                        header("location:home");
                    }
			}
            elseif($res['ustatus']=="")
		            {
		                $_SESSION['login_error'] = "<h5 class='label label-warning text-danger'>Account Not Active</h5>";
		            }
            elseif($res['ustatus']=="Block")
            {

                $_SESSION['login_error'] = "<h5 class='alert alert-danger text-danger'>Account is disable</h5>";
            }
        }

        else
        {
            $_SESSION['login_error'] = "<p class='alert alert-danger text-danger text-small'>Invalid information</p>";
        }
      }
      else
        {
            $_SESSION['login_error'] = "<div class='alert alert-danger text-danger'>Missing Field</div>";
        }
    }

    // Register
    function register($name,$user,$email,$pass1)
    {
        $con = mysqli_connect("localhost","root","","fa");
        if ($name && $user && $email && $pass1)
        {
            if(preg_match('/^[a-z][a-z0-9]{4,20}$/',$user)){
                  if(preg_match('/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',$email))
                  {
                  $remail = mysqli_query($con,"SELECT uemail from user where uemail ='$email'");
                  $checkemail = mysqli_num_rows($remail);

                  $rusername = mysqli_query($con,"SELECT uusername from user where uusername ='$user'");
                  $checkusername= mysqli_num_rows($rusername);

                  if ($checkemail !=0) 
                  {
                     $_SESSION['login_error'] ="Email Problem";
                    # code...
                  }
                  elseif($checkusername !=0)
                  {
                     $_SESSION['login_error'] ="Username Problem";
                  }
                  elseif($pass1=="12345678" || $pass1=="01234567" ||
      $pass1=="123456789" || $pass1=="012345678" ||
      $pass1=="12345678910" || $pass1=="012345679" ||
      $pass1=="1234567891011"   || $pass1=="012345678910" ||
      $pass1=="123456789101112"   || $pass1=="01234567891011" ||
      $pass1=="123456789101113"   || 
      $pass1=="1234567891011121314" || $pass1=="0123456789101112" ||
      $pass1=="123456789101112131415"|| $pass1=="012345678910111213" ||
      $pass1=="123456789101112131416"|| $pass1=="01234567891011121314" ||
      $pass1=="1234567891011121314151617"|| $pass1=="0123456789101112131415" ||
      $pass1=="123456789101112131415161718"|| $pass1=="012345678910111213141516" ||
      $pass1=="12345678910111213141516171819"|| $pass1=="01234567891011121314151617" ||       
      $pass1=="1234567891011121314151617181920"|| $pass1=="0123456789101112131415161718" ||       
      $pass1=="23456789"|| $pass1=="2345678910" ||
      $pass1=="02345678"|| $pass1=="01345678" ||
      $pass1=="01356789"|| $pass1=="66666666" ||        
      $pass1=="00000000"|| $pass1=="77777777" ||        
      $pass1=="11111111"|| $pass1=="88888888" ||
      $pass1=="22222222"|| $pass1=="99999999" ||
      $pass1=="33333333"|| $pass1=="10101010" ||
      $pass1=="44444444"|| $pass1=="20202020" ||
      $pass1=="55555555")
                  {
                    $_SESSION['login_error'] ="Password Problem";
                  }
                  else
                  {
                        if(strlen($name)>4 && strlen($user)>4 && strlen($pass1)>7)
                        {
                            $dataadd = mysqli_query($con,"INSERT INTO user(uname,uusername,uemail,upass)VALUES('$name','$user','$email','$pass1')");
                             $dataadd = mysqli_query($con,"SELECT uid FROM user WHERE uusername='$user'");
                            $reglogin = mysqli_fetch_array($dataadd);
                            $reglogin1 = $reglogin['uid'];
                            $uid = setcookie("uid", $reglogin1, time()+(10 * 365 * 24 * 60 * 60));
                            if($uid)
                            {
                              header("location:home");
                               $insertquery = mysqli_query($con,"INSERT INTO  login_details(loginId) VALUES ('$reglogin1')");
                            }
                            else
                            {
                              header("location:../a");
                            }
                            
                        }
                        else{
                        $_SESSION['login_error'] ="<h4 class='text-danger'>Registration Unsuccessful</h4>";
                      } 
                  }
                }
                 else{
                    $_SESSION['login_error'] ="<h4 class='text-danger'>Registration Unsuccessful</h4>";
                  }   
              }
               else{
                  $_SESSION['login_error'] = "<h4 class='text-danger'>Registration Unsuccessful</h4>";
              }
            }
            else{
                  $_SESSION['login_error'] = "<h4 class='text-danger'>Missing Field</h4>";
            }
    }

    function timeAgo($time_ago,$change)
        {
            
            $time_ago =  strtotime($time_ago) ? strtotime($time_ago) : $time_ago;
            $time  = time() - $time_ago;

        switch($time):
        // seconds
        case $time <=60;
        return 'Just now';
        // minutes
        case $time >= 60 && $time < 3600;
        return (round($time/60) == 1) ? '1 minute' : round($time/60).' minutes ';
        // hours
        case $time >= 3600 && $time < 86400;
        return (round($time/3600) == 1) ? '1 hour' : round($time/3600).' hours ';
        // days
        case $time >= 86400 && $time < 604800;
        return $change;//(round($time/86400) == 1) ? '1 day' : round($time/86400).' days ';
        // weeks
        case $time >= 604800 && $time < 2600640;
        return $change;//(round($time/604800) == 1) ? '1 week' : round($time/604800).' weeks ';
        // months
        case $time >= 2600640 && $time < 31207680;
        return $change;//(round($time/2600640) == 1) ? '1 month ' : round($time/2600640).' months ';
        // years
        case $time >= 31207680;
        return $change;//(round($time/31207680) == 1) ? '1 year' : round($time/31207680).' years ' ;

        endswitch;
        }
        

        function privacyPost($privacy)
        {
        if($privacy=="Friends")
        {
          echo '<a style="color:#000;" href="#"><i class="fa fa-users" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Friends"></i></a>';
        }
       else if($privacy=="Public")
        {
          echo '<a style="color:#000;" href="#"><i class="fa fa-globe" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Public"></i></a>';
        }
        else if($privacy=="OnlyMe")
        {
          echo '<a style="color:#000;" href="#"><i class="fa fa-lock" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="OnlyMe"></i></a>';
        }
        }
        function commentview($pid)
        {
          $con = mysqli_connect("localhost","root","","fa");
          $uid=$_COOKIE['uid'];
          
           $comment = mysqli_query($con,"select * from userpost u,postcomment c where u.pid=c.postid");
         while($see = mysqli_fetch_array($comment))
          {
          $view2 = $see['postid'];//comment postid
          $userother = $see['uid'];
          $view3 = $see['commentid'];
          $userpost1=$see['uid'];
          $text = $see['commenttext'];
          $view1 = $see['commentuid'];
          $select = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM user where uid ='$view1'"));
          if($pid==$view2)
          {
            $select1 = mysqli_fetch_array(mysqli_query($con,"SELECT uid FROM userpost where uid ='$uid'"));
            if($uid==$view1 Or($pid==$view2 AND $userpost1==$uid))
            {
              echo'<p>
              <div class="row">
              <div class="col-md-10">
                <img src="images/'.$select['uphoto'].'" height="30" width="30" style="border-radius:50%"><a href="'.$select['uusername'].'">'.$select['uname'].'</a>&nbsp&nbsp&nbsp'.$text.'
              </div>
              <div class="float-right col-md-2"><a href=""><div class="dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/fa/more.png">
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
               if($uid==$view1)
                { echo' <a class="dropdown-item editcom" href="#" id="'.$view3.'" style="border-bottom: 1px solid #eee;">
                <i class="fa fa-pencil">Edit Post</i>
              </a> ';
                }
            echo'
              <a class="dropdown-item delcom"   href="#" id="'.$view3.'" style="border-bottom: 1px solid #eee;"><i class="fa fa-trash">Delete Post</i></a>
                </div>
                </div>
              </a>
              </div>
              </div></p>';
            }
            else
            {
              echo'<p><img src="images/'.$select['uphoto'].'" height="30" width="30" style="border-radius:50%"><a href="'.$select['uusername'].'">'.$select['uname'].'</a>&nbsp&nbsp&nbsp'.$text.'</p>';
            }
          }
          }
        }
        function friendrequest($request,$fa,$outgoing,$incoming,$fcid)
        {
          $ip = $_SERVER['REMOTE_ADDR'];
          $con = mysqli_connect("localhost","root","","fa");
          $select = mysqli_query($con,"SELECT * FROM friendcheck WHERE (user_two='$outgoing' AND user_one='$incoming') OR (user_two='$incoming' AND user_one='$outgoing') ");
          $update = mysqli_fetch_array($select);
          $user_two =$update['user_two'];
          $user_one = $update['user_one'];
          if (($update['user_two']=$outgoing AND $update['user_one']=$incoming) OR ($update["user_two"]=$incoming AND $update["user_one"]=$outgoing)) 
          {
            # code...
            $newdata = mysqli_query($con,"UPDATE friendcheck SET relation='$request',ip='$ip',send_id='$outgoing' WHERE (user_two='$outgoing' AND user_one='$incoming') OR (user_two='$incoming' AND user_one='$outgoing')");
          }
        }
        function acceptFriend($request,$fa,$outgoing,$incoming,$fcid)
        {
          $ip = $_SERVER['REMOTE_ADDR'];
          $con = mysqli_connect("localhost","root","","fa");
          $add = mysqli_query($con,"INSERT INTO friend(uidme,user_two,user_one,fcid)VALUES('$outgoing','$outgoing','$incoming','$fcid')");
          $select = mysqli_query($con,"SELECT * FROM friendcheck WHERE (user_two='$outgoing' AND user_one='$incoming') OR (user_two='$incoming' AND user_one='$outgoing') ");
          $update = mysqli_fetch_array($select);
          $user_two =$update['user_two'];
          $user_one = $update['user_one'];
          if (($update['user_two']=$outgoing AND $update['user_one']=$incoming) OR ($update["user_two"]=$incoming AND $update["user_one"]=$outgoing)) 
          {
            # code...
            $newdata = mysqli_query($con,"UPDATE friendcheck SET relation='$request',ip='$ip',user_one='$incoming' WHERE (user_two='$outgoing' AND user_one='$incoming') OR (user_two='$incoming' AND user_one='$outgoing')");
          }
        }
        function totalFriend($uid)
        {
          $con = mysqli_connect('localhost','root','','fa');
            $post = mysqli_query($con,"SELECT * FROM friend WHERE user_one = '$uid' and  user_two!= '$uid' and relation = 'Friend'    OR user_two = '$uid' and user_one != '$uid' and relation = 'Friend'  ");
                
            $num_rows  =mysqli_num_rows($post);
            echo'Friends <span class="badge badge-info">'.$num_rows.'</span>';
        }
        function otherUserFriend($user_two)
        {
          $con = mysqli_connect('localhost','root','','fa');
            $post = mysqli_query($con,"SELECT * FROM friend WHERE user_one = '$user_two' and  user_two!= '$user_two' and relation = 'Friend'    OR user_two = '$user_two' and user_one != '$user_two' and relation = 'Friend'  ");
                
            $num_rows  =mysqli_num_rows($post);
            echo'Friends <span class="badge badge-info">'.$num_rows.'</span>';
        }
        function incomingFriendRequest($uid)
        {
          $con = mysqli_connect('localhost','root','','fa');
            $post = mysqli_query($con,"SELECT * FROM friend WHERE user_one = '$uid'  and relation = 'Friend Request Send'");

                $num_rows  =mysqli_num_rows($post);
                if ($num_rows != 0 )
                {
                  echo'<span class="badge badge-danger">'.$num_rows.'</span>';
                }
              
              
        }
        function incomingFriendRequestSee($uid)
        {
            $con = mysqli_connect('localhost','root','','fa');
            $post = mysqli_query($con,"SELECT * FROM friend WHERE user_one = '$uid' and relation = 'Friend Request Send'");
            while($pila=mysqli_fetch_array($post)){
                  
                  $fromhum=$pila['user_two'];
                  $post1 = mysqli_query($con,"SELECT * FROM user WHERE uid='$fromhum'");
                  $row = mysqli_fetch_array($post1);
                     echo'
                    <div class="row">
                          <div class="col-md-1">
                        <img src="images/'.$row['uphoto'].'" height="30" width="30" >
                        </div>
                        <div class="col-md-7">
                        <a href="'.$row['uusername'].'" style="color:#000"><b>'.$row['uname'].'</b>
                        </div>
                        <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-sm">Confirm</button></a>
                        </div>
                    </div>';
                  
                  
                }
        }
        function getFriend($uid)
        {
            $con = mysqli_connect('localhost','root','','fa');
            $post = mysqli_query($con,"SELECT * FROM friend WHERE user_one = '$uid' and  user_two!= '$uid' and relation = 'Friend'    OR user_two = '$uid' and user_one != '$uid' and relation = 'Friend'  ORDER BY RAND() DESC LIMIT 9");
                

                $num_rows  =mysqli_num_rows($post);
              
              if ($num_rows != 0 ){

                while($row = mysqli_fetch_array($post)){
        
                $myfriend = $row['user_two'];
                
                  if($myfriend == $uid){
                  
                    $myfriend1 = $row['user_one'];
                    $friends = mysqli_query($con,"SELECT * FROM user WHERE uid = '$myfriend1'");
                    $friendsa = mysqli_fetch_array($friends);
                  
                    echo '<div class="friendpic"><a href="'.$friendsa["uusername"].'">
                    <img src="images/'. $friendsa['uphoto'].'" data-toggle="tooltip" data-placement="top" title="'.$friendsa['uname'].'" class="img-thumbnail"></a>
                      
                    </div>';
                    
                  }else{
                    
                    $friends = mysqli_query($con,"SELECT * FROM user WHERE uid = '$myfriend' ");
                    $friendsa = mysqli_fetch_array($friends);
                    
                  echo '<div class="friendpic"><a href="'.$friendsa["uusername"].'">
                    <img src="images/'. $friendsa['uphoto'].'"  data-toggle="tooltip" data-placement="top" title="'.$friendsa['uname'].'" class="img-thumbnail"></a>
                    </div>';
                    
                  }
                }
              }
              else
              {
                  echo 'You don\'t have friends';
                }

                
        }

        function otherFriend($user_two)
        {
          $con = mysqli_connect('localhost','root','','fa');
            $post = mysqli_query($con,"SELECT * FROM friend WHERE user_one = '$user_two' and  user_two!= '$user_two' and relation = 'Friend'    OR user_two = '$user_two' and user_one != '$user_two' and relation = 'Friend'  ORDER BY RAND() DESC LIMIT 9");
                

                $num_rows  =mysqli_num_rows($post);
              
              if ($num_rows != 0 ){

                while($row = mysqli_fetch_array($post)){
        
                $myfriend = $row['user_two'];
                
                  if($myfriend == $user_two){
                  
                    $myfriend1 = $row['user_one'];
                    $friends = mysqli_query($con,"SELECT * FROM user WHERE uid = '$myfriend1'");
                    $friendsa = mysqli_fetch_array($friends);
                  
                    echo '<div class="friendpic"><a href="'.$friendsa["uusername"].'">
                    <img src="images/'. $friendsa['uphoto'].'"  data-toggle="tooltip" data-placement="top" title="'.$friendsa['uname'].'" class="img-thumbnail"> </a>

                    </div>';
                    
                  }else{
                    
                    $friends = mysqli_query($con,"SELECT * FROM user WHERE uid = '$myfriend'");
                    $friendsa = mysqli_fetch_array($friends);
                    
                  echo '<div class="friendpic"><a href="'.$friendsa["uusername"].'">
                    <img src="images/'. $friendsa['uphoto'].'"  data-toggle="tooltip" data-placement="top" title="'.$friendsa['uname'].'" class="img-thumbnail"></a>
                    </div>';
                    
                  }
                }
                }else{
                  echo 'You don\'t have friends';
                }
        }

        function getMessage($uid)
        {
            $con = mysqli_connect('localhost','root','','fa');
            $post = mysqli_query($con,"SELECT * FROM conversation WHERE user_one = '$uid' and  user_two!= '$uid' and status='yes'  OR user_two = '$uid' and user_one != '$uid' and status='yes'");
                

                $num_rows  =mysqli_num_rows($post);
              
              if ($num_rows != 0 ){

                while($row = mysqli_fetch_array($post)){
        
                $myfriend = $row['user_two'];
                
                  if($myfriend == $uid){
                  
                    $myfriend1 = $row['user_one'];
                    $friends = mysqli_query($con,"SELECT  uid,uusername,uphoto,uname FROM user WHERE uid = '$myfriend1'");
                    $friendsa = mysqli_fetch_array($friends);
                  
                    echo'
                    <div class="row">
                          <div class="col-md-1">
                        <img src="images/'.$friendsa['uphoto'].'" height="30" width="30" >
                        </div>
                        <div class="col-md-7">
                        <a href="'.$friendsa['uusername'].'" style="color:#000"><b>'.$friendsa['uname'].'</b>
                        </div>
                        <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-sm">Message</button></a>
                        </div>
                    </div>';
                    
                  }else{
                    
                    $friends = mysqli_query($con,"SELECT  uid,uusername,uphoto,uname FROM user WHERE uid = '$myfriend' ");
                    $friendsa = mysqli_fetch_array($friends);
                    
                  echo'
                    <div class="row">
                          <div class="col-md-1">
                        <img src="images/'.$friendsa['uphoto'].'" height="30" width="30" >
                        </div>
                        <div class="col-md-7">
                        <a href="'.$friendsa['uusername'].'" style="color:#000"><b>'.$friendsa['uname'].'</b>
                        </div>
                        <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-sm">Message</button></a>
                        </div>
                    </div>';
                    
                  }
                }
              }
              else
              {
                  echo 'You don\'t have any Message';
                }

                
        }
        function getMessage1($uid)
        {
            $con = mysqli_connect('localhost','root','','fa');
            $post = mysqli_query($con,"SELECT COUNT(id),user_from,user_to FROM messages WHERE user_to = '$uid' and  user_from!= '$uid'   OR user_from = '$uid' and user_to != '$uid' GROUP BY user_from");
                

                $num_rows  =mysqli_num_rows($post);
              
              if ($num_rows != 0 ){

                while($row = mysqli_fetch_array($post)){
        
                $myfriend = $row['user_from'];
                
                  if($myfriend == $uid){
                  
                    $myfriend1 = $row['user_to'];
                    $friends = mysqli_query($con,"SELECT  uid,uusername,uphoto,uname FROM user WHERE uid = '$myfriend1'");
                    $friendsa = mysqli_fetch_array($friends);
                  
                    echo'
                    <div class="row">
                          <div class="col-md-1">
                        <img src="images/'.$friendsa['uphoto'].'" height="30" width="30" >
                        </div>
                        <div class="col-md-7">
                        <a href="'.$friendsa['uusername'].'" style="color:#000"><b>'.$friendsa['uname'].'</b>
                        </div>
                        <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-sm">Message</button></a>
                        </div>
                    </div>';
                    
                  }else{
                    
                    $friends = mysqli_query($con,"SELECT  uid,uusername,uphoto,uname FROM user WHERE uid = '$myfriend' ");
                    $friendsa = mysqli_fetch_array($friends);
                    
                  echo'
                    <div class="row">
                          <div class="col-md-1">
                        <img src="images/'.$friendsa['uphoto'].'" height="30" width="30" >
                        </div>
                        <div class="col-md-7">
                        <a href="'.$friendsa['uusername'].'" style="color:#000"><b>'.$friendsa['uname'].'</b>
                        </div>
                        <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-sm">Message</button></a>
                        </div>
                    </div>';
                    
                  }
                }
              }
              else
              {
                  echo 'You don\'t have any Message';
                }

                
        }
        

?>