<?php
	$con = mysqli_connect('localhost','root', '','fa');
		$id = $_GET['id'];
		$uid = $_COOKIE['uid'];
		$q = mysqli_query($con,"SELECT * FROM user WHERE uid='$id'");
			$row = mysqli_fetch_array($q);
			//output the html
			?>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
			<style type="text/css">
		.p-tooltip{
		background: #fafbfb;
		border: 1px solid #BFBFBF;
		width: 320px;
		/*margin: 0 auto;*/
		top: 0;
		border-radius: 5px;
		position: absolute;
		position:fixed;
		display: none;
		padding: 0 0 10px 0;
	}
	.p-tooltip-cover img{
		width: 100%;
		height: 120px;
	}
	.p-tooltip-avatar{
		text-align: left;
		margin-top: -45px;
		margin-left: 10px;
	}
	.p-tooltip-avatar img{
		height: 75px;
		width: 75px;
		padding: 4px;
		background: #fff;
		border: 1px solid #ccc;
		cursor: pointer;
	}
	.p-tooltip-info{
		text-align: left;
	}
	.p-tooltip-info .p-username{
	float: none;
	margin-top: -70px;
	margin-left: 100px;
	font-size: 14px;
	font-weight: bold;
	color: white;
		}
		.p-tooltip-info .p-headline{
			float: none;
	margin-top: 6px;
	margin-left: 100px;
	font-size: 12px;
	color: black;
	}
	.p-tooltip-button{
		float: right;
		margin-top: 5px;
		/*min-height: 40px;*/
	}
	.p-tooltip-button button{
		cursor: pointer;
	}
			</style>
		<div class="p-tooltip-cover">
			<img src="images/alal.jpg">
		</div>
		<div class="p-tooltip-avatar">
			<img src="images/<?php echo ''.$row['uphoto'].''?>" />
		</div>
		<div class="p-tooltip-info">
			<a target="_blank" href="<?php echo''.$row['uusername'].'' ?>" style="text-decoration:none;">
				<div class="p-username"><?php echo ''.$row['uname'].'' ?></div>
			</a>
		</div>
		<div class="p-tooltip-button">
			<?php
			$uinfo = mysqli_query($con,"SELECT * FROM pinformation WHERE uid='$id'");
					$showinfo = mysqli_fetch_array($uinfo);
						if($showinfo['study']!='' && $showinfo['studyw']!='')
		              {
		                ?>
		                <div class="card-body"><br/>
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
							<?php }
			?>
			<p></p>
		</div>
		</div>