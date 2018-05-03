<?php 
    $con = mysqli_connect("localhost","root","","fa");
    $username = $_POST['username'];
  if(preg_match('/^[a-z][a-z0-9]{5,20}$/',$username)){
    $q = mysqli_query($con,"SELECT uusername FROM user WHERE uusername='$username'");
     $res = mysqli_fetch_array($q);
    if($res) {
        echo '<span class="form-control-feedback glyphicon glyphicon-remove text-warning"></span>';
    }else{
        echo '
        <span class="form-control-feedback glyphicon glyphicon-ok text-success"></span>';
    }
}
else{
      echo '<span class="form-control-feedback glyphicon glyphicon-warning-sign text-danger"></span>';
}
?>