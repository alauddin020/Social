<?php 
    $con = mysqli_connect("localhost","root","","fa");
    $username = $_POST['username'];
  if(preg_match('/^[a-z][a-z0-9]{4,20}$/',$username)){
    $q = mysqli_query($con,"SELECT uusername FROM user WHERE uusername='$username'");
     $res = mysqli_fetch_array($q);
    if($res) {
        echo '<span class="form-control-feedback fa fa-times text-warning" aria-hidden="true" "></span>';
    }
    else
    {
    # code...
    echo '
        <span class="form-control-feedback fa fa-check text-success"></span>';
    }
}
  else
  {
    echo '<span class="form-control-feedback fa fa-exclamation-triangle text-danger"></span>';
  }
?>
<style type="text/css">
    
  .form-control-feedback {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 2;
  display: block;
  width: 34px;
  height: 34px;
  line-height: 34px;
  text-align: center;
  pointer-events: none;
}
  </style>