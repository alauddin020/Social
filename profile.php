<?php require_once 'class/class.php';
  require_once 'class/db.php';
  isLogged();
$uid=$_COOKIE['uid'];
  $ra = mysqli_query($con,"SELECT * FROM user WHERE uid='$uid' ");
  $view = mysqli_fetch_array($ra);
  $username = $view['uusername'];
  $q = mysqli_query($con,"select * from user");
  $fa1 = $_GET['fa'];
  $fa = str_replace('/','',$fa1);
  $q1 =mysqli_query($con,"SELECT * FROM user where uusername='$fa' ");
    $res = mysqli_fetch_array($q1);
    $user_two = $res['uid'];
    // conversation start
    if(isset($fa))
    {
        $select = mysqli_query($con,"SELECT * FROM conversation WHERE (user_two='$uid' AND user_one='$user_two') OR (user_two='$user_two' AND user_one='$uid') ");
        $new = mysqli_num_rows($select);
        //$concheck = mysqli_fetch_array($)
        if($user_two!=$uid)
        {
          if($new==0 && $user_two!=0) //
          {
            $q1 = mysqli_query($con, "INSERT INTO conversation(user_one,user_two) VALUES ('$user_two','$uid')");
            $q2 = mysqli_query($con, "INSERT INTO friendcheck(user_one,user_two) VALUES ('$user_two','$uid')");
          }
        }
    }
    //friend check
    if(isset($fa))
    {
        $select = mysqli_query($con,"SELECT * FROM friendcheck WHERE (user_two='$uid' AND user_one='$user_two') OR (user_two='$user_two' AND user_one='$uid') ");
        $new = mysqli_num_rows($select);
        //$concheck = mysqli_fetch_array($)
        if($user_two!=$uid)
        {
          if($new==0 && $user_two!=0) //
          {
            $q2 = mysqli_query($con, "INSERT INTO friendcheck(user_one,user_two) VALUES ('$user_two','$uid')");
          }
        }
    }
  $s = "profile";
  if ($fa =='' OR $s== $fa) 
  {
    header('location:../'.$username.'');
    
  }
  $me ="message";
if($fa==$me)
  {
    header('location:'.$username.'');
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>
    <?php 
    if($res['uusername']!=$fa OR $res['ustatus']=="Deactivate" OR $res['ustatus']=="Block")
    {
      echo'Page Not Found';
    } 
    else
    {
      echo''.$res["uname"].'';
    } 
    ?>
  </title>
	<link rel="shortcut icon" href="assets/aicon/png/32/heart.png" type="image/x-icon">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/profilechat.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">

.caption1{
    position: absolute;
    top: 70%;
    left: 20%;
    width: 35%;
    color: #FFF;
}
.caption2 {
    position: absolute;
    top: 74%;
    left: 70%;
    color: #FFF;
}
.img-thumbnail:hover 
{
  /*opacity: .5;*/
  cursor: pointer;
}
.friendpic
{
  text-align: center;
  position: relative;
  width: 92px;
  float: left;
}
  .friendpic img
{
  width: 85px;
  height: 85px;
  margin-bottom: 4px;
}
.ownpic
{
  text-align: center;
  position: relative;
  width: 140px;
  float: left;
  }
  .ownpic img
{
  width: 132px;
  height: 132px;
}
  </style>
  <script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body style="background: #ddd;
font-family: Verdana, Arial, Helvetica, sans-serif;">
	<?php require_once 'model/dash.php'; 
  if($res['uusername'] ==$fa && $res['ustatus']!="Deactivate" && $res['ustatus']!="Block")
  {  ?>
	<div style="margin-top: 35px;" id="aalal">
    <div class="card upper" style="margin-left: 6%;max-width: 840px;">
      <?php

        if ($res["ucover"]=="" and $res["uphoto"]=="") 
        { ?>
          <img class=" img-1" src="images/alal.jpg" width="838" height="350" alt="Cover Photo">
          <img class="img-thumbnail" src="images/demo.png" style="position: absolute;
  top: 75%;left: 10%;width: 150px;height: 150px;transform: translate(-50%, -50%);" width="150" height="150" >
          <?php }
          else
          { ?>
            <img class=" img-1" src="images/alal.jpg" width="838" height="350" alt="Nature">
            <img class="img-thumbnail" src="images/<?php echo''.$res['uphoto'].'' ?>" style="position: absolute;
  top: 75%;left: 10%;width: 150px;height: 150px;transform: translate(-50%, -50%);" width="150" height="150" >
        <?php  } ?>
        <div class="caption1">
            <p><?php echo'<h2>'.$res["uname"].'' ?>
              <?php
               if($res['verified']==1)
              {
                echo '<img  src="assets/fa/var.png" width="20" height="20" style="cursor: pointer;" data-toggle="tooltip" data-placement="top" title="Verified">';
              } echo' </h2></p>'; ?>
        </div>
    <div class="caption2" style="left: 60%;">
      <?php if($user_two==$uid)
        {  ?>
              <button type="button"  class="btn btn-light btn-sm btn-flat">
          <img src="assets/fa/add.png" height="16">Edit Info</button>
        <button type="button"  style="margin-left: " class="btn btn-light btn-sm btn-flat">
          <img src="assets/fa/email.png" height="16">Activity</button>
     <?php   }
        else
        {  
            $select1 = mysqli_query($con,"SELECT * FROM friendcheck WHERE (user_two='$uid' AND user_one='$user_two') OR (user_two='$user_two' AND user_one='$uid') ");
            while($showrequest = mysqli_fetch_array($select1))
            {
            if($showrequest['relation']=="Add Friend")
          {
          ?>
          <button type="button"  class="btn btn-light btn-sm btn-flat friendreq">
          <img src="assets/fa/add.png" height="16"><?php echo''.$showrequest['relation'].''; ?></button>
          <?php }
          elseif((($showrequest['send_id']==$uid AND $showrequest['rec_id']==0) AND $showrequest['relation']=="Friend Request Send") OR ($showrequest['rec_id']!=0  AND $showrequest['relation']=="Friend"))
          { ?>
              <button type="button"  class="btn btn-light btn-sm btn-flat cancel">
          <img src="assets/fa/add.png" height="16" ><?php echo''.$showrequest['relation'].''; ?></button>
            <?php } 
            else
              { ?>
                <button type="button"  class="btn btn-primary btn-sm btn-flat confirm">
          <img src="assets/fa/add.png" height="16">Confirm Friend</button>
         <?php   } }
            ?>
        <button type="button"  style="margin-left: " class="btn btn-light btn-sm btn-flat cmessage">
          <img src="assets/fa/email.png" height="16">Message</button>
      <?php  } ?>
      </div>
       <button type="button"  class="btn btn-light btn-sm ">
          <img src="assets/fa/add.png" height="16"> Add Friend</button>
        <button type="button"  style="margin-left: " class="btn btn-light btn-sm">
          <img src="assets/fa/email.png" height="16">Message</button>
</div>
		<div class="left" style="margin-left: 6%;border-radius: 10px;width: 328px;">
			 <div class="card">
          <div class="card-header">
            <b><?php echo'@'.$res['uusername'].'' ?></b>
          </div>
          <div class="card-body">
            <h4 class="card-title"><?php echo''.$res['uname'].'' ?></h4>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
          <div class="card-footer text-muted">
            2 days ago
          </div>
        </div>
        <p></p>
        <div class="card">
          <div class="card-header">
            <i class="fa fa-globe"> intro</i>
          </div>
          <div class="card-body">
            <?php
              $info = mysqli_query($con,"SELECT * FROM pinformation P,user U  WHERE U.uusername='$fa' AND P.uid=U.uid ORDER BY iid ASC");
              while($showinfo = mysqli_fetch_array($info))
              {
              if($showinfo['study']!='' && $showinfo['studyw']!='')
              {
                ?>
                <p class="card-text small"><i class="fa fa-book"></i>&nbspStudied <?php echo''.$showinfo['study'].'' ?> at <a href="#"> <?php echo''.$showinfo['studyw'].'' ?></a></p>
            <?php  } 
            if($showinfo['live']!='')
            {
              ?>
              <p class="card-text small"><i class="fa fa-home"></i>&nbspLives in <a href=""> <?php echo''.$showinfo['live'].'' ?></a></p>
          <?php  }
            if ($showinfo['relation']!='') 
            {
              # code...
              ?>
              <p class="card-text small"><i class="fa fa-heart"></i>&nbsp<?php echo''.$showinfo['relation'].'' ?></p>
          <?php  
            }
            if(($showinfo['relation']=='') && ($showinfo['live']=='') && ($showinfo['study']=='') && ($showinfo['studyw']==''))
            {
              echo'<p class="card-text small"><i class="fa fa-eye-slash">Nothing Share</i>&nbsp</p>';
            }
      } ?>
            <!--   &&  -->
          </div>
        </div>
        <p></p>
        <div class="card">
          <div class="card-header">
            <i class="fa fa-camera"> Photo</i>
          </div>
          <div class="card-body">
            <!-- <div class="ownpic">
              <img class="card-img-top img-thumbnail" src="mages/<?php //echo''.$res["uphoto"].''?>" alt="Card image cap">
            </div> -->
            <?php
                $info = mysqli_query($con,"SELECT pimage FROM userpost P,user U  WHERE U.uusername='$fa' AND P.uid=U.uid ORDER BY RAND() LIMIT 6  ");
              while($showinfo = mysqli_fetch_array($info))
              { if($showinfo['pimage']!='')
                { ?>
                    <div class="ownpic">
              <img class="card-img-top img-thumbnail" src="<?php echo''.$showinfo["pimage"].''?>" alt="Card image cap" data-toggle="tooltip" data-placement="top" title="<?php echo''.$res['uname'].''?> ">
            </div>
              <?php  }
               }
            ?>
          </div>
        </div>
          <?php 
            if($uid===$user_two)
            {
              // incomingFriendRequest($uid);
              incomingFriendRequestSee($uid);
            }
           ?>
        <br/>
        <div class="card">
          <div class="card-header">
            <img  src="assets/fa/users.png" width="24" height="24">
            <?php 
              if($uid===$user_two)
                  {
                    totalFriend($uid);
                  }
                  else
                  {
                    otherUserFriend($user_two);
                  }
              ?>
          </div>
          <div class="card-body">
           <?php    
                 //login user friend
                  if($uid===$user_two)
                  {
                    getFriend($uid);
                  }
                  else
                  {
                    otherFriend($user_two);
                  }
                ?>
          </div>
        </div>
		</div>
	<div class="pmid" style="width: 500px;margin-left: 1%;">
	<?php require_once 'profile/profilepost.php'; ?>
  
	<div style="height: 10px;"></div>

<script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
      <div id="timelineView">
        <?php 
        //require_once 'profiletimeline.php';
        //timelineView($user_two);
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
                <span class="align-baseline"><a class="profile" data-id="'.$row3['uid'].'" href="'.$row3['uusername'].'" data-toggle="tooltip" data-placement="top" title="'.$row3['uname'].'" style="font-weight:bold;font-size:15px;color:#36538D;">'.$row3['uname'].'</a>&nbsp&nbsp&nbsp';if($row3['pimage']!='')
              echo '<i class="small text-muted">Added a new Photo</i><br/>
        </span>
         <p class="date small" style="">';
        $time_ago = $row3['pdate']; 
        $changetime = $row3['cdate'];
        $pid = $row3['pid'];
       echo'<a class="time" style="font-size:13px;margin-left:8%;color:#000" href="#" title="'.$changetime.'" style="color:#000"><time>' .timeAgo($time_ago,$changetime).'</time></a>&nbsp&nbsp'; 
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
            <a class="dropdown-item del"   href="#" id="'.$row3['pid'].'" style="border-bottom: 1px solid #eee;"><i class="fa fa-trash">Delete Post</i></a>
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
      <p class="text-left text-capitalize">'.htmlentities($row3["pcontent"]).'</p>';
      if($row3['pimage']!='')
      {
        echo'<img src="'.$row3['pimage'].'" width="460">';
      }
      ?>
    </div>
    <div  id="commentView">
              <?php $pid = $row3['pid']; commentview($pid); ?>
          </div>
          <div class="card-footer">
              <div class="row">
                  <div class="col-md-1">
                       <img src="images/<?php echo''.$res['uphoto'].'' ?>" width="30" height="30" style="border-radius: 50%">
                  </div>
                  <div class="col-md-11">
                    <form action="model/addcomment.php" method="POST">
                      <input type="hidden" value="<?php echo''.$row3['pid'].''?>" name="postid" id="postid">
                      <input type="text" class="form-control" id="comment" placeholder="press enter" name="post">
                      <input type="submit" name="commentp" class="btn btn-default btn-sm" value="comment">
                    </form>   
                  </div>
              </div>
          </div>
        </div>
    <div style="height: 10px;"></div>

        
    <?php   }

        ?>
      </div>
	</div>
	<?php 
} //end first if
    elseif($res['ustatus']=="Deactivate" OR $res['ustatus']=="Block")
      {  ?>
        <!-- Deactive -->
        <style type="text/css">
          .show
          {
            border: 1px solid #ccc;
            margin-top: 10%;
            margin-left: 40%;
            background: #fff;
            border-radius: 4px;
          }
          .show h4,p
          {
            margin-left: 32px;
          }
        </style>
        <div id="card" style="width: 900px;">
          <div class="card-body show">
            <h5><i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>Sorry, this content isn't available right now</h5><hr/>
            <p>The link you followed may have expired, or the page may only be visible to an audience you're not in.</p>
          </div>
        </div>
        <?php
      }
      else
      {  ?>
        <!-- Not Found -->
        <style type="text/css">
          .notA
          {
            margin-top: 10%;
            margin-left: 20%;
            color: #000;
          }
        </style>
        <div class="notA">
          <h2 style="margin-left: 8%;">This page isn't available</h2><p></p>
          <h5>The link you followed may be broken, or the page may have been removed.</h5>
          <img src="images/not.png" width="282" height="250" style="margin-left: 8%;">
        </div>
  <?php    }
  require_once 'chatbar.php'; 
  ?>
  
  <section class="conversation" style="display: none;right: 240px;width: 291px;">
    <?php 
  $b = mysqli_query($con,"SELECT * FROM user WHERE uusername ='$fa'");
        while ($re1 = mysqli_fetch_array($b))
        { 
          if($re1['uid']!=$uid)
          {
          ?>
  <header class="card" style="border-radius: 0px;padding: 2px;
    background-color: #386B96;">
    <span class=""><?php if($re1['uphoto']!=''){ ?> <img  src="images/<?php echo''.$re1['uphoto'].'' ?>" style="border-radius: 10%;border: 1px solid #fff" width="25" height="25" > <?php } ?></span>
    <div class="chating-with"><?php echo''.$re1['uname'].'' ?></div>
    <button class="icon minimize" title="Minimize"></button>
    <button class="icon close" title="Close"></button>
  </header>
  
  <div class="messages" id="messages" style="background-color: #fff;
  border-bottom: 1px solid #ddd;overflow-x: hidden;"></div>
  
  <form class="say" method="POST" style="background-color: #fff;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);">
    <button class="add-emoticon" title="Add emoticon"></button>
    <button class="add-attachment" title="Add image"></button>
    <textarea  id="chatm" placeholder="type message" style="width: 283px; border: none;
     resize: none;
      overflow: auto;
      outline: none;

      -webkit-box-shadow: none;
      -moz-box-shadow: none;
      box-shadow: none;
      text-decoration:none;overflow-x: hidden;background-color: #fff;"></textarea>
    <!-- <input type="hidden" id="conversation" value="<?php //echo''.$conversation_id.'' ?>"> -->
      <input type="hidden" id="user_one" name="user_one" value="<?php echo''.$uid.'' ?>">
    <input type="hidden" id="user_two" name="user_two" value="<?php echo''.$re1['uid'].'' ?>">
  </form>
  <?php } } ?>
</section>
	</div>
	<?php  require_once 'linkj.php'; ?>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<div class="p-tooltip"></div>
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
    setTimeout(function(){  
      $('.p-tooltip').fadeOut("slow");  
        }, 3000); 
    //alert('working');
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
    $('#imageup').click(function()
    {
      $('#imageup1').click();
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
<script>
  $(document).ready(function()
  {
    $('.cmessage,.close').click(function()
    {
      $('.conversation').toggle();
      $("#chatm").focus();
      $(".messages").animate({"scrollTop": $('.messages')[0].scrollHeight}, "slow");
    });
    
    $('.minimize,.chating-with').click(function()
    {
      $('.conversation').toggleClass('collapsed');
    });
    $('.friendreq').click(function()
    {
      var friend = 'Friend Request Send';
      var fa = '<?php echo''.$fa.''?>';
      var outgoing = '<?php echo''.$uid.''?>';//me
      var incoming = '<?php echo''.$user_two.''?>';//otheruser
      //alert(friend);
      //alldata = {'request':friend,'fa':fa, 'outgoing':outgoing,'incoming':incoming}; 
       $.ajax({  
             url:"model/friend.php",  
             method:"post",  
             data:{
              "request":friend,
              "fa":fa,
              "outgoing":outgoing,
              "incoming":incoming
            },  
             dataType:"text",  
             success:function(data)  
             {
              $('.friendreq').html('<img src="assets/fa/add.png" height="16">Friend Request Send');
              $('.friendreq').prop('disabled', true);
             }
           });
    });
    $('.confirm').click(function()
    {
      var friend1 = 'Friend';
      var fa1 = '<?php echo''.$fa.''?>';
      var outgoing1 = '<?php echo''.$uid.''?>';//me
      var incoming1 = '<?php echo''.$user_two.''?>';//otheruser
      //alert(friend);
      //alldata = {'request':friend,'fa':fa, 'outgoing':outgoing,'incoming':incoming}; 
       $.ajax({  
             url:"model/accept.php",  
             method:"post",  
             data:{
              "request":friend1,
              "fa":fa1,
              "outgoing":outgoing1,
              "incoming":incoming1
            },  
             dataType:"text",  
             success:function(data)  
             {
              $('.confirm').html('<img src="assets/fa/add.png" height="16">Friend');
              $('.confirm').prop('disabled', true);
             }
           });
    });
$("#chatm").focus(); 
  $('<audio id="chatAudio"><source src="notify.ogg" type="audio/ogg"><source src="notify.mp3" type="audio/mpeg"><source src="notify.wav" type="audio/wav"></audio>').appendTo('body');
$("#chatm").keypress(function(evt) { 
  $(".messages").animate({"scrollTop": $('.messages')[0].scrollHeight}, "slow");
if(evt.which == 13) 
// { if(!evt.shiftKey)
var message = $('#chatm').val().trim();
if(message.length > 0){
var user_two = $('#user_two').val(); 
var user_one  = $('#user_one').val();
// var conversation  = $('#conversation').val();
var fa = '<?php echo''.$fa.''?>'; 
post_data = {'message':message,'user_two':user_two, 'user_one':user_one,'fa':fa}; 

//send data to "chat_process.php" using jQuery $.post() 
$.post('post_message.php', post_data, function(data) { 
  $('#chatm').val('');
//append data into messagebox with jQuery fade effect! 
$(data).hide().appendTo('.messages').fadeIn(); 

//keep scrolled to bottom of chat! 
// $(".messages").scrollTop($(".messages")[0].scrollHeight);
$(".messages").animate({"scrollTop": $('.messages')[0].scrollHeight}, "slow");
      $('#chatAudio')[0].play();

//reset value of message box  

}).fail(function(err) { 

//alert HTTP server error 
alert(err.statusText); 
}); 
} 
});
var c_id = $('#user_two').val();
load_data = {'fetch':1}; 
window.setInterval(function(){ 
$.post('get_message.php?c_id='+c_id, load_data, function(data) { 
$('.messages').html(data);
 
$(".messages").animate({"scrollTop": $('.messages')[0].scrollHeight}, "slow");
// $('#chatAudio')[0].play();

}); 
}, 2000);

      // $('#chatAudio')[0].play();
// $(".messages").scrollTop($(".messages")[0].scrollHeight);
  });
</script>
<script type="text/javascript" src="model/fa.js"></script>
</body>
</html>