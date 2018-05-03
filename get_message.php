<?php 
     if(isset($_GET['c_id']))
    {
        $uid = $_COOKIE['uid'];
        $user_two = $_GET['c_id'];
        $con = mysqli_connect('localhost','root','','fa');
         $alal = mysqli_query($con,"SELECT * FROM messages WHERE (user_to='$user_two' AND user_from='$uid' ) OR (user_to='$uid' AND user_from='$user_two' ) ");
       while($row=mysqli_fetch_array($alal))
       { 

       		$c_id = $row['cid'];
       		$username = $row['username'];
       		$message = $row['message'];
       		$id = $row['user_to'];
       		if($c_id)
       		{ 
       			$cquery= mysqli_query($con,"SELECT id FROM conversation  WHERE id='$c_id' ");
            $fetch = mysqli_query($con,"SELECT uid,uphoto,uname,uusername FROM user WHERE uid = '$id'");
            $show = mysqli_fetch_array($fetch);
            if($id==$uid)
            {
       			?>
       				<div class="message me">
                <?php if($show['uphoto']!=''){ ?><a href="<?php echo''.$show['uusername'].'' ?>"  title="<?php echo''.$show['uname'].'' ?>"><img src="images/<?php echo''.$show['uphoto'].'' ?>" width="20" height="20"> <?php  } else { ?> <img src="images/demo.png" width="20" height="20" > <?php  }?></a>
        				<p class="content" style="background-color: #eee"><?php echo''.$message.'' ?>
        				</p>
              </div>
         <?php }
          else
          { ?>
              <div class="message">
                <?php if($show['uphoto']!=''){ ?><a href="<?php echo''.$show['uusername'].'' ?>"  title="<?php echo''.$show['uname'].'' ?>"><img src="images/<?php echo''.$show['uphoto'].'' ?>" width="20" height="20"> <?php  } else { ?> <img src="images/demo.png" width="20" height="20" > <?php  }?></a>
                <p class="content" style="background-color: #ddd"><?php echo''.$message.'' ?>
                </p>
              </div>
      <?php }
          }
     		}
      }


 
?>
<script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">