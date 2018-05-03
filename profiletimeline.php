<?php require_once 'class/class.php';
function timelineView($user_two)
{
    //$user_two =$_GET['user_two'];
    $con = mysqli_connect("localhost","root","","fa");
    $uid = $_COOKIE['uid'];
    $a =mysqli_query($con,"SELECT * FROM userpost p,user u WHERE u.uid=p.uid and p.uid='$user_two' ORDER BY pid DESC ");
      while($row3 = mysqli_fetch_array($a))
      {  
          echo'
              <div class="card">
              <div class="card-title">
                <div class="row">
                  <div class="col float-left" style="margin-top: 12px;margin-left: 10px;">
                    <span class="align-baseline"><a data-id="'.$row3['uid'].'" href="'.$row3['uusername'].'" class="profile"><img src="images/'.$row3['uphoto'].'" height="30" width="30" style="border-radius: 50%"></a></span>
                      <span class="align-baseline"><a class="profile" data-id="'.$row3['uid'].'" href="'.$row3['uusername'].'" data-toggle="tooltip" data-placement="top" title="'.$row3['uname'].'" style="
                  font-weight:bold;
                  font-size:15px;
                  color:#36538D;">'.$row3['uname'].'</a>'; 
            if($row3['pimage']!='')
              echo '<i class="small text-muted">Added a new Photo</i>
        </span>
         <p class="date small" style="font-size:12px;margin-left: 19%;">';
        $time_ago = $row3['pdate']; 
        $changetime = $row3['cdate'];
        $pid = $row3['pid'];
       echo'<a class="time" href="#" title="'.$changetime.'" style="color:#000"><time>' .timeAgo($time_ago,$changetime).'</time></a>&nbsp&nbsp'; 
          if($row3['pprivacy']=="Friends")
          {
            echo '<i class="fa fa-users" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Friends"></i>';
          }
         else if($row3['pprivacy']=="Public")
          {
            echo '<i class="fa fa-globe" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Public"></i>';
          }
          else if($row3['pprivacy']=="OnlyMe")
          {
            echo '<i class="fa fa-lock" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="OnlyMe"></i>';
          }

          echo'</p>
          </div>
          <div class="float-right" style="margin-right: 30px;">
            <a href=""><div class="dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="assets/fa/more.png">
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
            if($row3['uid']==$uid)
              { 
            echo'<a class="dropdown-item edit" href="#" id="'.$row3['pid'].'" style="border-bottom: 1px solid #eee;">
              <i class="fa fa-pencil">Edit Post</i>
            </a>
            <a class="dropdown-item del"   href="#" id="'.$row3['pid'].'" style="border-bottom: 1px solid #eee;"><i class="fa fa-pencil">Delete Post</i></a>
            <a class="dropdown-item" href="#"><i class="fa fa-eye"></i>Hide from Timeline</a>';
              }
              else
              {
                echo'
                <a class="dropdown-item" href="#"><i class="fa fa-eye"></i>Report Post</a>
                <a class="dropdown-item" href="#"><i class="fa fa-eye"></i>Hide from Timeline</a> ';
              }
         echo' </div>
        </div>
      </a>
          </div>
        </div>
      </div>
      <div class="card-body" style="margin-top: -45px;max-width: 495px;">
        <p class="text-left text-capitalize">'.htmlentities($row3["pcontent"]).'</p>
      </div>
      <div class="card-footer text-muted">
        2 days ago
      </div>
    </div>
    <div style="height: 10px;"></div>

          ';
      }
    }
?>