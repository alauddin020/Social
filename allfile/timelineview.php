<?php include_once 'class/class.php';
$con = mysqli_connect("localhost","root","","fa");
  $uid = $_COOKIE['uid'];
  $a = mysqli_query($con,"SELECT * FROM userpost P,user U  WHERE P.uid=U.uid ORDER BY pid DESC");
      while($row = mysqli_fetch_array($a))
  {

  ?>

  <div class="card">
    <div class="card-title">
      <div class="row">
        <div class="col float-left" style="margin-top: 12px;margin-left: 10px;">
          <span class="align-baseline"><a href="<?php echo''.$row['uusername'].'' ?>"><img src="images/<?php echo''.$row['uphoto'].'' ?>" height="30" width="30" style="border-radius: 50%"></span>
      <span class="align-baseline"><a href="<?php echo''.$row['uusername'].'' ?>"><?php echo''.$row['uname'].'' ?></a>
        <?php
          if($row['pimage']!='')
            echo '<i class="small text-muted">Added a new Photo</i>';
        ?>
      </span>
       <p class="date small" style="margin-left: 9%;margin-top: -2%;">   
        <?php 
      $time_ago = $row['pdate']; 
      $pid = $row['pid'];
     echo'<time>' .timeAgo($time_ago).'</time>&nbsp&nbsp'; 
                  if($row['pprivacy']=="Friends")
                  {
                    echo '<i class="fa fa-users" aria-hidden="true"></i>';
                  }
                 else if($row['pprivacy']=="Public")
                  {
                    echo '<i class="fa fa-globe" aria-hidden="true"></i>';
                  }
                  else if($row['pprivacy']=="OnlyMe")
                  {
                    echo '<i class="fa fa-user" aria-hidden="true"></i>';
                  }

                  ?></p>
        </div>
        <div class="float-right" style="margin-right: 30px;">
          <a href=""><div class="dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <!-- <button class="btn btn-default btn-sm dropdown" type="button" > -->
          <img src="assets/fa/more.png">
        <!-- </button> -->
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <?php 
          if($row['uid']==$uid)
            { ?>
          <a class="dropdown-item edit" href="#" id="<?php echo''.$row['pid'].'' ?>" style="border-bottom: 1px solid #eee;">
            <i class="fa fa-pencil">Edit Post</i>
          </a>
          <a class="dropdown-item del"   href="#" id="<?php echo''.$row['pid'].'' ?>" style="border-bottom: 1px solid #eee;"><i class="fa fa-pencil">Delete Post</i></a>
          <a class="dropdown-item" href="#"><i class="fa fa-eye"></i>Hide from Timeline</a>
            <?php 
            }
            else
            {
              ?>
              <a class="dropdown-item" href="#"><i class="fa fa-eye"></i>Report Post</a>
              <a class="dropdown-item" href="#"><i class="fa fa-eye"></i>Hide from Timeline</a>
              <?php
            }  ?>
        </div>
      </div>
    </a>
        </div>
      </div>
    </div>
    <div class="card-body" style="margin-top: -45px;max-width: 495px;">
      <img src="images/<?php echo''.$row['pimage'].''?>" width="460">
      <p class="text-left text-capitalize"><?php echo''.htmlentities($row["pcontent"]).''?></p>
    </div>
  </div>
<div style="height: 10px;"></div>
  <?php 

} 
?>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog"  style="margin-top:9%">  
           <div class="modal-content" id="edit">
           </div>
    </div>
                  
</div>
<style type="text/css">
  .status {
  background-color: #fff;
  /*width: 500px;*/
  margin: 10px auto 0;
  border-top: 0;
  border-radius: 2px;
  padding: 12px;
}
</style>
<script>
  $(document).ready(function()
  {
    //alert('working');
     $('.del').click(function(){  
           var id =  $(this).attr("id");  
           $.ajax({  
                url:"model/delete.php",
                method:"post",  
                data:{id:id},  
                success:function(data){  
                      $('#edit').html(data);  
                     $('#dataModal').modal("show");
                      
                }  
           }); 
      });
    $('.edit').click(function(){  
           var id =  $(this).attr("id");
           $.ajax({  
                url:"model/edit.php",
                method:"post",  
                data:{id:id},  
                success:function(data){  
                      $('#edit').html(data);  
                     $('#dataModal').modal("show");
                      
                }  
           });
      });
  })
</script>