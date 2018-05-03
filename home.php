<?php require_once 'class/class.php';
  require_once 'class/db.php';
$uid=$_COOKIE['uid'];
isLogged();

//$privacy = mysqli_query($con,"select privacy from user where uid='$id'");
//$res = mysqli_fetch_assoc($privacy);
$ra = mysqli_query($con,"SELECT * FROM user WHERE uid='$uid' ");
$view = mysqli_fetch_array($ra);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="shortcut icon" href="assets/aicon/png/32/heart.png" type="image/x-icon">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Ubuntu);
		*{margin:0;padding:0;}
	#facebook{
	height:160px;
	width:250px;
	overflow:hidden;
	margin-left: 10px;
	border-top: 1px solid #ddd;
	}
	#facebook li{
	border:0; margin:0; padding:0; list-style:none;
	}
	#facebook li{
	height:60px;
	list-style:none;
	}
	#facebook a{
	color:#000000;
	text-decoration:none;
	}
	#facebook .user-title{
	display:block;
	font-weight:bold;
	margin-bottom:4px;
	font-size:11px;
	color:#36538D;
	}
	#facebook .addas{
	display:block;
	font-size:11px;
	color:#666666;
	}
	#facebook img{
	float:left;
	margin-right:14px;
	padding:4px;
	}
	#facebook .del
	{
	float:right; font-weight:bold; color:#666666
	}
	#facebook .del a
	{
	color:#000000;
	}
	#facebook .del a:hover
	{
	background-color:#36538D;
	padding-left:1px;
	padding-right:1px;
	color:#ffffff;
	}
	#copyright
	{
		font-family: 'Ubuntu';
		font-size: 11px;
		color: #999;
	}
	#copyright a
	{
		font-family: 'Ubuntu';
		font-size: 11px;
		color: #999;
	}
	#aalal
	{
		min-height: 768px;
		min-width: 1366px;
	}
	</style>
</head>
<body style="background: #ddd;
font-family: Verdana, Arial, Helvetica, sans-serif;">
	<?php require_once 'model/dash.php'; ?>
	<div style="margin-top: 35px;" id="aalal">
		<div class="left">
			<p class="form-control-feedback glyphicon glyphicon-remove text-warning"></p>
		</div>
	<div class="amid" style="width: 500px;">
		<?php require_once 'model/timeline.php'; ?>
		<div style="height: 10px;"></div>
		<div id="dview"></div>
	</div>
	<div  style="margin-top:10px;margin-left: 15px;width: 300px;float: left;">
		<div class="card">
			<p></p>
			<strong style="margin-left: 10px;font-size: 14px">Suggestion</strong>
				<ul id="facebook">
					<?php
					$knowyou = mysqli_query($con,"SELECT * FROM user GROUP BY RAND()");
					while($row=mysqli_fetch_array($knowyou))
					{
						if($row['uid']!=$uid)
						{
							$user_id=$row['uid'];
							$username=$row['uusername'];
							$user_name=$row['uname'];
							$user_image=$row['uphoto'];
							?>
							<li id="list<?php echo ''.$user_id.''?>">
							<a href="<?php echo $username;?>" ><img src="images/<?php echo $user_image; ?> " width="40" height="40" ></a>
							<span class="del"><a href="#" class="delete" id="<?php echo ''.$user_id.''; ?>">X</a></span>
							<a href="<?php echo $username;?>" class="user-title"><?php echo $user_name;?> </a>
							<span class="addas">Add as Friend</span>
							</li>
							<?php
						}
					}
					?>
					</ul>
		</div>
		<div class="p-tooltip"></div>
		<div id="dataModal" class="modal fade">  
		      <div class="modal-dialog"  style="margin-top:9%">  
		           <div class="modal-content" id="edit">
		           </div>
		    </div>
		</div>
		<p id="copyright"><a href="#"> Privacy</a> · <a href="#"> Terms</a> · <a href="#"> Advertising</a> · <a href="#"> Ad Choices</a> · <a href="#"> Cookies</a> · <a href="#"> More</a>
		<a href="alauddin020">Alauddin F-a </a> &copy <?php echo date('Y') ;?></p>
	</div>
	<?php require_once 'chatbar.php'; ?>
	</div>
	<?php require_once 'linkj.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" >
		$(function() 
		{
		$(".delete").click(function(){
		var element = $(this);
		var I = element.attr("id");
		$('li#list'+I).fadeOut('slow', function() {$(this).remove();}); 
		return false;
		});
		//setInterval()
		});
		</script>

<script type="text/javascript" src="model/fa.js"></script>
</body>
</html>