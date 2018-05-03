<?php include_once 'class/class.php';
  $con = mysqli_connect("localhost","root","","fa");
  $uid = $_COOKIE['uid'];
  $commentpic = mysqli_fetch_array(mysqli_query($con,"SELECT uphoto,uname FROM user WHERE uid='$uid'"));
  $acomment = $commentpic['uphoto'];
  $a = mysqli_query($con,"SELECT * FROM userpost P,user U  WHERE P.uid=U.uid ORDER BY pid DESC");
  while($row0 = mysqli_fetch_array($a))
  { ?>
      <div class="card">
          <div class="card-body">
              <?php echo''.htmlentities($row0['pcontent']).''; ?>
          </div>
          <div class="card" id="commentView">
              
          </div>
          <div class="card-footer">
              <div class="row">
                  <div class="col-md-1">
                       <img src="images/<?php echo''.$acomment.'' ?>" width="30" height="30" style="border-radius: 50%">
                  </div>
                  <div class="col-md-11">
                      <input type="hidden" value="<?php echo''.$row0['pid'].''?>" id="postid">
                      <input type="text" class="form-control" id="comment" placeholder="press enter" name="">
                  </div>
              </div>
          </div>
      </div><p></p>
  <?php  }
    ?>
   <script type="text/javascript" src="assets/js/jquery.js"></script>