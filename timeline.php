<?php include_once 'class/class.php';
$con = mysqli_connect("localhost","root","","fa");
  $uid = $_COOKIE['uid'];
  $commentpic = mysqli_fetch_array(mysqli_query($con,"SELECT uphoto,uname FROM user WHERE uid='$uid'"));
  $acomment = $commentpic['uphoto'];
  $a = mysqli_query($con,"SELECT * FROM userpost P,user U  WHERE P.uid=U.uid ORDER BY pid DESC");
      while($row = mysqli_fetch_array($a))
  { ?>

    <div class="card" id="tutorial-<?php echo''.$row['pid'].'' ?>">
    <input type="hidden" id="likes-<?php echo $row["pid"]; ?>" value="<?php echo $row["likes"]; ?>">
    <div class="card-title">
      <div class="row">
        <div class="col float-left" style="margin-top: 12px;margin-left: 10px;">
          <span class="align-baseline"><a data-id="<?php echo''.$row['uid'].'' ?>" href="<?php echo''.$row['uusername'].'' ?>" class="profile"><img src="images/<?php echo''.$row['uphoto'].'' ?>" height="30" width="30" style="border-radius: 50%"></a></span>
      <span class="align-baseline"><a class="profile" data-id="<?php echo''.$row['uid'].'' ?>" href="<?php echo''.$row['uusername'].'' ?>" data-toggle="tooltip" data-placement="top" title="<?php echo''.$row['uname'].'' ?>" style="
  font-weight:bold;
  font-size:15px;
  color:#36538D;"><?php echo''.$row['uname'].'' ?></a>
        <?php
          if($row['pimage']!='')
            echo '<i class="small text-muted">Added a new Photo</i>';
        ?>
      </span>
       <p class="date small" style="margin-left: 9%;margin-top: -2%;">   
        <?php 
      $time_ago = $row['pdate']; 
      $changetime = $row['cdate'];
      $pid = $row['pid'];
     echo'<a class="time" href="#" title="'.$changetime.'" style="color:#000"><time>' .timeAgo($time_ago,$changetime).'</time></a>&nbsp&nbsp'; 
                  if($row['pprivacy']=="Friends")
                  {
                    echo '<i class="fa fa-users" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Friends"></i>';
                  }
                 else if($row['pprivacy']=="Public")
                  {
                    echo '<i class="fa fa-globe" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Public"></i>';
                  }
                  else if($row['pprivacy']=="OnlyMe")
                  {
                    echo '<i class="fa fa-lock" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="OnlyMe"></i>';
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
          <a class="dropdown-item del"   href="#" id="<?php echo''.$row['pid'].'' ?>" style="border-bottom: 1px solid #eee;"><i class="fa fa-trash">Delete Post</i></a>
          <a class="dropdown-item hide" href="#" id="<?php echo''.$row['pid'].'' ?>"><i class="fa fa-eye"></i>Hide from Timeline</a>
            <?php 
            }
            else
            {
              ?>
              <a class="dropdown-item" href="#"><i class="fa fa-eye"></i>Report Post</a>
              <a class="dropdown-item hide" href="#" id="<?php echo''.$row['pid'].'' ?>"><i class="fa fa-eye"></i>Hide from Timeline</a>
              <?php
            }  ?>
        </div>
      </div>
    </a>
        </div>
      </div>
    </div>
    <div class="card-body" style="margin-top: -45px;max-width: 495px;">
      <p class="text-left">
        <?php 
       $string = $row["pcontent"];
       $readmore = "Readmore";
          if (strlen($string) > 500) 
          {
            $trimstring = substr($string, 0, 500);
            echo''.htmlentities($trimstring).'&nbsp&nbsp<a href="#" class="imgview" id="'.$row['pid'].'">'.$readmore.'</a>';
          } 
          else 
          {
            $trimstring = $string;
            echo''.htmlentities($trimstring).'';
          }
        ?>
        
      </p>
     <?php if($row['pimage']!='')
      {
        echo'<a href="#" class="imgview" id="'.$row['pid'].'"> <img src="'.$row['pimage'].'"  width="460"></a>';
      } ?>
    </div> 
        <div class="align-baseline">
          <div class="btn-likes">
          <?php 
            $query =mysqli_query($con,"SELECT * FROM likes WHERE lpid = '" . $row["pid"] . "' and luid = '$uid'");
          $check = mysqli_fetch_array($query);
          $count = mysqli_num_rows($query);
          $str_like = "like";
          if(!empty($count)) {
          $str_like = "unlike";
            }
            if($check['lpid']==$row['pid'] AND $check['luid']==$uid)
        { ?>
              <input type="button" id="Likeu<?php echo $row["pid"]; ?>" title="<?php echo ucwords($str_like); ?>" class="<?php echo $str_like; ?> btn btn-warning btn-sm" onClick="addLikes(<?php echo $row["pid"]; ?>,'<?php echo $str_like; ?>')" value="You like this"/>
      <?php }
      else
      { ?>
        <input type="button" id="Likeu<?php echo $row["pid"]; ?>" title="<?php echo ucwords($str_like); ?>" class="<?php echo $str_like; ?> btn btn-primary btn-sm" onClick="addLikes(<?php echo $row["pid"]; ?>,'<?php echo $str_like; ?>')" value="Like"/>
      <?php }
      ?>
    </div>
      <div class="label-likes"><?php if(!empty($row["likes"])) { echo $row["likes"] . " Like(s)"; } ?>
      </div>
      <input type="hidden" id="likes-<?php echo $row["pid"]; ?>" value="<?php echo $row["likes"]; ?>">
  </div>
  <?php $newcheck = mysqli_query($con,"SELECT * FROM postcomment p,userpost u WHERE p.postid=u.pid");
  $viewpost= mysqli_fetch_array($newcheck);

    $me = $viewpost['commentuid'];
  $ownview = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user WHERE uid ='$me' "));

?>
<div class="card">
    <div  id="commentView" class="card-footer">
              <?php $pid = $row['pid']; commentview($pid); ?>
      </div>
              <div class="row">
                  <div class="col-md-1">
                       <img src="images/<?php echo''.$acomment.'' ?>" width="30" height="30" style="border-radius: 50%">
                  </div>
                  <div class="col-md-10">
                    <form action="model/addcomment.php" method="POST">
                      <input type="hidden" value="<?php echo''.$row['pid'].''?>" name="postid" id="postid">
                      <input type="text" class="form-control" id="comment" placeholder="press enter" name="post" autocomplete="off">
                      <input type="submit" style="display: none;" name="commentp" class="btn btn-default btn-sm" value="comment">
                      <p></p>
                    </form>   
                  </div>
              </div>
        </div>
  </div>
  <div style="height: 10px"></div>
  <?php 

} 
?>

<div class="p-tooltip"></div>
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog"  style="margin-top:9%">  
           <div class="modal-content" id="edit">
           </div>
    </div>
                  
</div>
<div id="dataModal1" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" id="img">
      ...
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
<script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
</script>
<script>
function addLikes(id,action) {
  $('#Likeu'+id+' li').click(function(index) {
    $(this).addClass('selected');
    $('#tutorial-'+id+' #rating').val((index+1));
    if(index == $('#tutorial-'+id+' li').index(obj)) {
      return false; 
    }
  });
  $.ajax({
  url: "add_likes.php",
  data:'id='+id+'&action='+action,
  type: "POST",
  beforeSend: function(){
    // $('#tutorial-'+id+' .btn-likes').html("<img src='LoaderIcon.gif' />");
  },
  success: function(data){
  var likes = parseInt($('#likes-'+id).val());
  switch(action) {
    case "like":
    $('#tutorial-'+id+' .btn-likes').html('<input type="button" class="btn  btn-sm btn-warning" value="You like this"" title="Unlike" class="unlike" onClick="addLikes('+id+',\'unlike\')" />');
    likes = likes+1;
    break;
    case "unlike":
    $('#tutorial-'+id+' .btn-likes').html('<input type="button" class="btn btn-primary btn-sm" value="Like" title="Like" class="like"  onClick="addLikes('+id+',\'like\')" />')
    likes = likes-1;
    break;
  }
  $('#likes-'+id).val(likes);
  if(likes>0) {
    $('#tutorial-'+id+' .label-likes').html(likes+" Like(s)");
  } else {
    $('#tutorial-'+id+' .label-likes').html('');
  }
  }
  });
}
</script>
<script>
  $(document).ready(function()
  {
    
    $('#commentpost').keypress(function(evt) 
    {
    if(evt.which == 13)
    {
      var textp = $('#commentpost').val().trim();
       // if(textp.lenght > 0)
       // {
        var postid =$('#postid').val();
        $.ajax({
          url:"model/addcomment.php",
          method:"POST",
          data:{
            "post":textp,
            "postid":postid
          },
          success:function(data){  
              $('#commentpost').val('');
              //commentView();
           }
        });
      //}
    }
    });
    // commentView();
    // function commentView()
    // {
    //   $.ajax
    //       ({
    //         url: "model/commentview.php",
    //         method: "POST",
    //         data: {

    //         },
    //         success: function(d)
    //         {
    //           $("#commentView").show('slow').html(d);
    //         }
    //       })
    // }
    $(".hide").click(function()
    {
    var element = $(this);
    var I = element.attr("id");
    $('div#tutorial-'+I).fadeOut('slow', function() {$(this).remove();}); 
    return false;
    });
    setTimeout(function(){  
      $('.p-tooltip').fadeOut("slow");  
        }, 3000); 
    //alert('working');
     $('.delcom').click(function(){  
           var id =  $(this).attr("id");  
           $.ajax({  
                url:"profile/deletecom.php",
                method:"post",  
                data:{id:id},  
                success:function(data){  
                      $('#edit').html(data);  
                     $('#dataModal').modal("show");
                      
                }  
           }); 
      });
    $('.editcom').click(function(){  
           var id =  $(this).attr("id");
           $.ajax({  
                url:"profile/editcom.php",
                method:"post",  
                data:{id:id},  
                success:function(data){  
                      $('#edit').html(data);  
                     $('#dataModal').modal("show");
                      
                }  
           });
      });
     $('.del').click(function(){  
           var id =  $(this).attr("id");  
           $.ajax({  
                url:"profile/delete.php",
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
                url:"profile/edit.php",
                method:"post",  
                data:{id:id},  
                success:function(data){  
                      $('#edit').html(data);  
                     $('#dataModal').modal("show");
                      
                }  
           });
      });
    $('.imgview').click(function(){  
           var id =  $(this).attr("id");
           $.ajax({  
                url:"profile/imgview.php",
                method:"post",  
                data:{id:id},  
                success:function(data){  
                      $('#img').html(data);  
                     $('#dataModal1').modal("show");
                      
                }  
           });
      });
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    function showProfileTooltip(e, id){
      var top = e.clientY + 20;
      var left = e.clientX - 10;

      $('.p-tooltip').css({
        'top':top,
        'left':left
      }).show();
      //send id & get info from get_profile.php
      $.ajax({
        url: 'get_profile.php?id='+id,
        beforeSend: function(){
          $('.p-tooltip').html('Loading..');
        },
        success: function(html){
          $('.p-tooltip').html(html);
        }
      });
    }

    function hideProfileTooltip(){
      $('.p-tooltip').hide('fast');
    }

    $('.profile').mouseover(function(e){
      var id = $(this).attr('data-id');
      showProfileTooltip(e, id);
      // setTimeout(function(){  
      //       // $('.p-tooltip').fadeOut("slow");  
      //       //   }, 3000); 
    });

    $('.p-tooltip,body').mouseleave(function(){
      hideProfileTooltip();
    });
  });
  </script>