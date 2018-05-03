<?php include_once("class/class.php");
	include'class/db.php';
  isLogged();
  $user_id=$_COOKIE['uid'];
	$ra = mysqli_query($con,"SELECT * FROM user WHERE uid='$user_id' ");
	$view = mysqli_fetch_array($ra);
	$username = $view['uusername'];
  $q = mysqli_query($con,"select * from user");
  $fa = $_GET['fa'];
  //$fa= preg_match('/^[a-z][a-z0-9]$/',$fs);

  $q1 =mysqli_query($con,"SELECT uname,uusername,uphoto,ustatus FROM user where uusername='$fa' ");
		$res = mysqli_fetch_array($q1);
  $s = "profile";
  if ($fa =='' OR $s== $fa) 
  {
  	header('location:'.$username.'');
  	
  }
		$q2 =mysqli_query($con,"SELECT uname,uusername,uphoto,ustatus FROM user where uusername='$fa' ");
		$re = mysqli_fetch_array($q2);

		if (isset($_POST['add'])) 
	 	{
		date_default_timezone_set("Asia/Dhaka");
			$text = $_POST["text"];
			$select = "Public";//$_POST["select"];
			$time = date('h:i:s A');
			$date = date('d-m-Y');
			//connect_db();
			$q = mysqli_query($con,"insert into post(post_title,post_view,post_time,post_date,post_name,user_username,added,user_photo)values('$text','$select','$time','$date','$name','$username','$fa','$photo')");
			if($q)
			{
				header('location:'.$fa.'');
			}
		}
  
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php 
		if($re['uusername']!=$fa OR $re['ustatus']=="Deactivate" OR $re['ustatus']=="Block")
		{
			echo'Page Not Found';
		} 
		else
		{
			echo''.$re["uname"].'';
		}	
		?>
			
		</title>
		<?php
			if($re['ustatus']=="Deactivate" OR $re['ustatus']=="Block")
			{
				?>
				
		<?php	}
		else
		{
			?>
			<link rel="icon" href="<?php echo'images/'.$re["uphoto"].''?>" class="circle">
			<?php
		}
		?>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<?php require 'linkj.php'; ?>
    
    </head>
    <body>

	<?php
		require_once 'model/dash.php';
		//$s = $a['user_username'];
		if ($res['uusername'] ==$fa && $res['ustatus']!="Deactivate" && $res['ustatus']!="Block")
		{
	?>
	<div class="row">
	<div class="col-md-1">
		<p></p>
	</div>
		<div class="col-md-8">
		<div id="view" style="margin: 0px;padding: 0px;">
			<div class="pro">
			<?php
				if ($res["uphoto"]=="") 
				{
					# code...
					echo'

					<img src="images/alal.jpg">';
				}
				else
				{
					echo'<img src="images/alal.jpg">';
				}
			?>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="pic">
						<?php
						if ($res["uphoto"]=="") 
						{
							# code...
							echo'<img src="images/demo.png">';
						}
						else
						{
							echo'<img class="img-thumbnail" src="images/'.$res["uphoto"].'">';
						}
					?>
					</div>
				</div>
				<div class="col-sm-9">
					<?php
						if($username!=$fa)
						{
					?>
						<div  style="margin-left: 50%;">
							<a class="btn btn-default" href="#" role="button">Add Friend</a>
							<button class="btn btn-default" type="submit">Follow</button>
							<input class="btn btn-default message" type="button" value="Messsage">
						</div>
					<?php	}
					else
					{
						?>
						<a style="margin-left: 60%;" class="btn btn-default" href="#" role="button">Edit Info</a>
				<?php	} ?>
					
				</div>
			</div><p></p>
		</div>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-md-1">
			<p></p>
		</div>
		<div class="col-md-3">
			<div class="card card-primary">
				<div class="card-heading">
					<strong><?php echo''.$res["uname"].''?></strong>
				</div>
				<div class="card-body">
					
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<!-- <h2 class="panel panel-info">Alauddin</h2> -->
			<div id="post">
				<?php require_once 'model/timeline.php'; ?>
			</div>
			<br/>

			<div id="pview">
					<?php
					 	$getposts = mysqli_query($con,"SELECT * FROM userpost WHERE uid='$fa' ORDER BY pid DESC") or die(mysqli_error());
						while ($row = mysqli_fetch_assoc($getposts)) {
												$id = $row['pid'];
												$body = $row['pcontent'];	
												$date_added = $row['pdate'];
						          $get = mysqli_query($con,"SELECT * FROM user WHERE uid='$user_posted_to'");
						          $info = mysqli_fetch_assoc($get);
						          $other = $info['uname'];
						          if ($row['uid']==$user_posted_to OR $row['uusername']==$fa ) {
						          // $profilepic_info = "img/default_pic.jpg";
						          	?>
						          	<div id="view" style="max-width: 544.58px">
				<div class="row">
					<div class="col-md-10">
						<div class="col-md-2" style="margin-left: -20px;">
							<img src="images/<?php echo''.$info['uphoto'].'';?>" style="width:50px;height:50px;border:1px solid #ddd;">
						</div>
						<div class="col-md-10">
						</div>
					</div>
          <style>
            .dropdown-menu>li>a:hover
            {
              background-color: #176cb5;
              color: #FFF;
            }
          </style>
					<div class="col-md-2">
						<div class="dropdown pull-right">
						  <span class="glyphicon glyphicon-chevron-down" data-toggle="dropdown" style="cursor: pointer;"></span>
						  <ul class="dropdown-menu pull-right">
						   <li><a href="#" type="button" name="view" value="Edit" id="3" class="edit_data">Edit</a></li>
						   <li class="divider"></li>
                 <li> <a href="#" type="button" name="view" value="Delete" id="3" class="delete_data">Delete</a></li>
						  </ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						 <p style="margin-top:-20px;margin-left:62px;">Post Time:-&nbsp;
						 <?php echo''.$date_added.' &nbsp '.$time.'';?>
						 </p>
					</div>
				</div>
				<div class="row">
					<div class="panel-body">
				 		<?php echo'<h4>'.$body.'</h4> '; ?>
				 </div>
				</div>
				<style type="text/css">
					.as a
					{
						display: inline-block;
					}
				</style>
				<div class="row">
					<div class="col-md-12 as">
						<a href="#">Like</a>
						<a href="#">Comment</a>
					</div>
				</div>
			</div>
		</div>
		<br/>
						           <!--  echo "
						              <div style='float: left;'>
						              <img src='images/$profilepic_info' height='40' width='40'>
						              </div>
						              <div class='posted_by'>
						              <a href='$added_by'>$alal</a> on $date_added</div>
						              <br /><br />
						              <div  style='max-width: 600px;'>
						              $body<br /><p /><p />
						              </div>
						              <hr />
						            "; -->
						        <?php  }
						          elseif($username==$fa)
						          {
						           //$profilepic_info = "userdata/profile_pics/".$profilepic_info;
						          


											?>
						              <div class="row">
					<div class="col-md-12">
						 <p style="margin-top:-20px;margin-left:62px;">
						 </p>
					</div>
				</div>
				<div class="row">
					<div class="panel-body">
				 		<!-- POst content -->
				 </div>
				</div>
							<?php					
						          }
						}
			         ?>
				<?php  } 
			elseif($res['user_status']=="Deactivate" OR $res['user_status']=="Block")
			{ ?>
				<style>
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
				<div id="pview" style="width: 900px;">
					<div class="show">
						<h4><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Sorry, this content isn't available right now</h4><hr/>
						<p>The link you followed may have expired, or the page may only be visible to an audience you're not in.</p>
					</div>
				</div>

				
			<?php }
			else
			{ ?>
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
					<h4>The link you followed may be broken, or the page may have been removed.</h4>
					<img src="images/not.png" width="282" height="250" style="margin-left: 8%;">
				</div>
			<?php }
			?>
		</div>
	</div>
	<section id="start">
		<div id="chatbar" style="width: 235px;float: left;">
			<?php include 'chatbar.php'; ?>
		</div>
		<section id="">
		<div class="">
			<div  id="">
			<?php 
				$b = mysqli_query($con,"SELECT * FROM user WHERE uusername ='$fa'");
				while ($res = mysqli_fetch_array($b))
			          {
			          	?>
			
				<div class="shout_box" style="display: none;"> 
					<div class="header"><?php echo''.$res['uname'].'' ?><div class="close_btn"></div></div> 
					<div class="toggle_chat"> 
						<div class="message_box"> 
							
						</div> 
						<div class="user_info"> 
							<input name="shout_username"  type="hidden" id="id" value="<?php echo''.$res['uid'].'' ?>"/>  
							<input  id="shout_message" type="text" placeholder="Type Message Hit Enter" maxlength="100" / style="height: 50px"> 
						</div> 
					</div> 
					<?php } ?>
				</div> 
				
			</div>
		</div>
	</section>
		<div class="chatbox-flex-wrapper" style="display: none;">
    		<?php
	            $q = mysqli_query($con,"select * from user");
	            while ($res= mysqli_fetch_array($q)) 
	            {
	                 echo'
	                  <div style="" class="chatbox" data-user-id="'.$res['uid'].'">
	                    <div class="chatbox-header">
	                      <button class="chatbox-close" data-user-id="'.$res['uid'].'">&#x2716;</button>
	                      <span>'.$res['uname'].'</span>
	                   </div>
		                  <div class="chattexts">
		                      <span class="chattext-from"></span>
		                      <span class="chattext-for"></span>
		                  </div>
		                  <div>
	                  		<textarea class="chattext-input" placeholder="Send a message..."></textarea>
	                  		</div>
	                </div>';
	            }
    		?>
	</div>
	</section>

	<div id="dataModal" class="modal fade">  
      <div class="modal-dialog" style="margin-top:5%;height: 300px;">  
           <div class="modal-content" style="height: 408px;">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Edit Confirmation?</h4>  
                </div>  
                <div class="modal-body" id="edit">  
                </div> 
           </div>  
      </div>  
 </div>
<div id="dell" class="modal fade bs-example-modal-sm">  
      <div class="modal-dialog" style="margin-top:15%;height: 100px;">  
           <div class="modal-content" style="height: 150px;width: 300px">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Delete Confirmation?</h4>  
                </div>  
                <div class="modal-body" id="di">  
                </div> 
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){ 
      $('.edit_data').click(function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"edit.php",
                method:"post",  
                data:{id:id},  
                success:function(data){  
                     $('#edit').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });
      $('.delete_data').click(function(){  
           var id = $(this).attr("id");  
           $.ajax({  
                url:"del.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                     $('#di').html(data);  
                     $('#dell').modal("show");  
                }  
           });  
      });
 });  
 </script>
</body>
</html>