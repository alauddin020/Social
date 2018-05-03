<?php
$con = mysqli_connect("localhost","root","","fa");
$email = $_POST['email'];
  if(preg_match('/^([a-zA-Z0-9_\.\-\+]{5,40})+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{3,5})+$/',$email))
  {
    $q = mysqli_query($con,"SELECT uemail FROM user WHERE uemail='$email'");
    $res = mysqli_fetch_array($q);//($con,$q);
    if($res['uemail']==$email ) 
    {
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