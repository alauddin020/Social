<link rel="stylesheet" type="text/css" href="model/img.css">
<div class="post expand">
		<div class="up">
		
		</div>
		<div class="mid ">
			<div class="pleft">
				<img src="images/<?php echo''.$view['uphoto'].'' ?>" height="40px" width="40px" style="border-radius: 50%" />
			</div>

      <form class="frmUpload" action="" method="post">
			<div class="pright">
				<textarea id="text" class="expand" placeholder="What's on Your Mind?"></textarea>
        <div id="response"></div> 
			<div class="img-preview"></div>
        <div class="upload-msg"></div>
      <div class="down">
        
      <div class="downL">
        <span class="align-baseline" style="display: none"><input type="file" name="userImage" id="userImage" class="user-image" required /></span>
         <span class="align-baseline"><a href="#" id="uploadTrigger" name="post_image"><i class="fa fa-camera text-secondary"></i></a></span>&nbsp&nbsp&nbsp
         <span class="align-baseline"><a href="#"><i class="fa fa-user text-secondary"></i></a></span>&nbsp&nbsp&nbsp
         <span class="align-baseline"><a href="#"><i class="fa fa-map-marker text-secondary"></i></a></span>
      </div>
      <div class="downR"> 
        <div class="dropdown">
          <?php 
          $id = $_COOKIE['uid'];
            $con = mysqli_connect("localhost","root","","fa");
          $a =mysqli_query($con,"SELECT * FROM user where uid='$id' ");
          $res = mysqli_fetch_array($a);
          $alal = $res['privacy']; ?>
  <button class="btn btn-default btn-sm dropdown-toggle privacy" id="select" value="<?php echo''.$alal.'' ?>" style="cursor: pointer; width: 80px;margin-right: 15px;width: 100px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

  </button>

      <input type="submit" class="btn btn-primary" name="" id="spost" value="post">
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="btn btn-lg btn-light btn-block disabled"  role="button" href="#" style="border-bottom: 1px solid #eee"><p style="font-size: 15px">Who would see this</p></a>
    <a class="dropdown-item" id="fa1" href="#" style="border-bottom: 1px solid #eee;"><i class="fa fa-globe"></i>Public
      <input type="hidden" value="Public" id="pub" name=""><p class="small" ">Anyone can See this</p>
    </a>
    <a class="dropdown-item" id="fa2" href="#" style="border-bottom: 1px solid #eee;"><i class="fa fa-users"></i>Friends
      <input type="hidden" value="Friends" id="fri" name=""><p class="small" ">Your Friend can See this</p></a>
    <a class="dropdown-item" id="fa3" href="#"><i class="fa fa-lock"></i>OnlyMe
      <input type="hidden" value="OnlyMe" id="my" name=""><p class="small" ">Only You  See this</p></a>
  </div>
</div>
      </div>
    </div>
		</div>
  </form>
		</div>
	</div>