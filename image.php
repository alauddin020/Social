<?php
    if (isset($_POST['imagep'])) {
        
        # code...

      $id = $_COOKIE['uid'];
    $con = mysqli_connect("localhost","root","","fa");
        $post =$_POST['afa'];
        //$tim = time();
     $temp = explode(".",$_FILES["userImage"]["name"]);
        $newfilename = rand() . '.' . end($temp);
        
        move_uploaded_file($_FILES["userImage"]["tmp_name"], "./uploads/" . $newfilename);
        $photo = "./uploads/".$newfilename;
        $a = mysqli_query($con,"INSERT INTO image(image,privacy,uid)VALUES('$photo','$post','$id')");
        header("location:home");
    }

?>