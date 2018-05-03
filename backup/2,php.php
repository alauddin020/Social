v id="dview">
			<?php  
  				$commentpic = mysqli_fetch_array(mysqli_query($con,"SELECT uphoto,uname FROM user WHERE uid='$uid'"));
			$acomment = $commentpic['uphoto'];
		  $a = mysqli_query($con,"SELECT * FROM userpost P,user U  WHERE P.uid=U.uid ORDER BY pid DESC");
		  while($row0 = mysqli_fetch_array($a))
		  { ?>
      <div class="card" id="tutorial-<?php echo''.$row['pid'].'' ?>">
	      <div  style="margin-top: 3px;margin-left: 5px">
	      	  <div class="row">
	      		<div class="col-md-10">
	      			<a href="<?php echo''.$row0['uusername'].'' ?>"> <img src="images/<?php echo ''.$row0['uphoto'].''; ?>" height="30" width="30" style="border-radius: 50%"></a><a class="profile" data-id="<?php echo''.$row['uid'].'' ?>" href="<?php echo''.$row0['uusername'].'' ?>" data-toggle="tooltip" data-placement="top" title="<?php echo''.$row0['uname'].'' ?>" style="font-weight:bold;font-size:15px;color:#36538D;"><?php echo''.$row0['uname'].'' ?></a><?php if($row0['pimage']!='') 
	      			{echo '<i class="small text-muted">Added a new Photo</i>';}?>
	      			<div class="time" style="margin-left: 9%;margin-top: -2%;">
	      				<?php 
					      $time_ago = $row0['pdate']; 
					      $changetime = $row0['cdate'];
					      $privacy = $row0['pprivacy'];
					     echo'<a class="time" href="#" data-toggle="tooltip" data-placement="top" title="'.$changetime.'" ><time>
					 		' .timeAgo($time_ago,$changetime).'</time></a>'; 
					 		privacyPost($privacy);
					 		?>
	      			</div>
	      		</div>
	      		<div class="col-md-1 ">
	      			<a href=""><div class="dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			        <!-- <button class="btn btn-default btn-sm dropdown" type="button" > -->
			          <img src="assets/fa/more.png" data-toggle="tooltip" data-placement="top" title="Post Option
			          ">
			        <!-- </button> -->
			        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			          <?php 
			          if($row0['uid']==$uid)
			            { ?>
			          <a class="dropdown-item edit" href="#" id="<?php echo''.$row0['pid'].'' ?>" style="border-bottom: 1px solid #eee;">
			            <i class="fa fa-pencil">Edit Post</i>
			          </a>
			          <a class="dropdown-item del"   href="#" id="<?php echo''.$row0['pid'].'' ?>" style="border-bottom: 1px solid #eee;"><i class="fa fa-trash">Delete Post</i></a>
			          <a class="dropdown-item hide" href="#" id="<?php echo''.$row0['pid'].'' ?>"><i class="fa fa-eye"></i>Hide from Timeline</a>
			            <?php 
			            }
			            else
			            {
			              ?>
			              <a class="dropdown-item" href="#"><i class="fa fa-eye"></i>Report Post</a>
			              <a class="dropdown-item hide" href="#" id="<?php echo''.$row0['pid'].'' ?>"><i class="fa fa-eye"></i>Hide from Timeline</a>
			              <?php
			            }  ?>
			        </div>
			      </div>
			    </a>
	      		</div>
	      	</div>
	      </div>
		      <div class="card-body" style="max-width: 495px;">
		      <p><?php echo''.htmlentities($row0["pcontent"]).''?></p>
		     <?php if($row0['pimage']!='')
		      {
		        echo'<img src="'.$row0['pimage'].'" width="460">';
		      } ?>
    		</div> 
          <div  id="commentView">
              <?php $pid = $row0['pid']; commentview($pid); ?>
          </div>
          <div class="card-footer">
              <div class="row">
                  <div class="col-md-1">
                       <img src="images/<?php echo''.$acomment.'' ?>" width="30" height="30" style="border-radius: 50%">
                  </div>
                  <div class="col-md-11">
                  	<form action="model/addcomment.php" method="POST">
                  		<input type="hidden" value="<?php echo''.$row0['pid'].''?>" name="postid" id="postid">
                      <input type="text" class="form-control" id="comment" placeholder="press enter" name="post" autocomplete="off">
                      <input type="submit" name="commentp" class="btn btn-default btn-sm" value="comment">
                  	</form>   
                  </div>
              </div>
          </div>
      </div><p></p>
  <?php  }
    ?>
