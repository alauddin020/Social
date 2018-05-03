<?php include("class/class.php");
	isLogin();
	//isLogged();
	if(isset($_POST['login']))
	{
        $username = $_POST["username"];
        $password = md5($_POST["password"]);
       // $remember = $_POST['remember'];
        $pass = $_POST["password"];
        login($username,$password,$pass);
        //$con = mysqli_connect("localhost","root","","a_contact");
       
    }
    if (isset($_POST['register'])) 
    {
    	# code...
    	$name = $_POST["name"];
    	$user = $_POST["username"];
    	$email = $_POST["email"];
    	$pass1 = $_POST["password"];
      register($name,$user,$email,$pass1);

    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
	<?php require_once 'link.php'; ?>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
    function checkAvailability() {
          $("#loaderIcon").show();
          jQuery.ajax({
          url: "username.php",
          data:'username='+$("#username").val(),
          type: "post",
          success:function(data){
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
          },
          error:function (){}
          });
        }

    function checkEmail(){
      $("#loaderIcon").show();
      jQuery.ajax({
          url: "email.php",
          data:'email='+$("#email").val(),
          type: "post",
          success:function(data){
            $("#user-availability").html(data);
            $("#loaderIcon").hide();
          },
          error:function (){}
          });

    	}
    	function checkName(){
      jQuery.ajax({
          url: "name.php",
          data:'name='+$("#fname").val(),
          type: "post",
          success:function(data){
            $("#lname").html(data);
            $("#loaderIcon").hide();
          },
          error:function (){}
          });

    	}
    	function checkPass(){
      jQuery.ajax({
          url: "password.php",
          data:'pass='+$("#pass1").val(),
          type: "post",
          success:function(data){
            $("#userPass").html(data);
            $("#loaderIcon").hide();
          },
          error:function (){}
          });

    	}
    	function passRecover() {
          jQuery.ajax({
          url: "recover.php",
          data:'remail='+$("#remail").val(),
          type: "post",
          success:function(data){
            $("#userRemail").html(data);
            $("#loaderIcon").hide();
          },
          error:function (){}
          });
        }
    	$(document).ready(function() 
		{
			//$('.register').hide();	
			$('#username ').on('keypress', function(key) 
			{
				if((key.charCode < 48 || key.charCode > 57) && (key.charCode < 97 || key.charCode > 122)  && (key.charCode != 45)) 
				{
					return false;	
				}
			});
			$('#fname ').on('keypress', function(key) 
			{
				if((key.charCode < 65 || key.charCode > 90) && (key.charCode < 97 || key.charCode > 122)  && (key.charCode != 45)) 
				{
					return false;	
				}
			});
		});
    </script>
</head>
<body style="background: #ddd;">
<div class="container">
<div class="login">
	<div class="row " style="margin-left: 15%;margin-top: 7%;max-width: 600px;">
		<div>
			<div class="card" style="width: 350px;">
				<div class="card-header">
					<strong>   Enter Details To Login </strong>
					<?php
					if(isset($_SESSION['login_error'])){
					echo '
					<h4 class="card-title text-danger">'.$_SESSION['login_error'].'</h4>
					';
					unset($_SESSION['login_error']);
					}
					?>
				</div>
				<div class="card-body">
					<form role="form" action="" method="POST">
						<br />
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
							<input type="text" name="username" id="name" value = "<?php if(ISSET($_COOKIE['username'])){echo $_COOKIE['username'];}?>" class="form-control" placeholder="Your Username " />
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
							<input type="password" name="password" value = "<?php if(ISSET($_COOKIE['password'])){echo $_COOKIE['password'];}?>" class="form-control"  placeholder="Your Password" />
						</div>
						<div class="form-group">
							<label class="checkbox-inline">
							<input type="checkbox" name = "remember" <?php if(ISSET($_COOKIE['username'])){echo 'checked';}?> /> Remember me
							</label>
							<span class="pull-right">
							<a data-toggle="modal" href="index.php#myModal"> Forgot Password?</a>

							</span>
						</div>
						<div class="form-group">
							<input type="submit" style="width: 105px;float: left;" value="Login Now" name="login" class="btn btn-primary btn-xs">
						</div><br/>
						<hr />
					</form>
					<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#exampleModalLong">
  						Register</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Button trigger modal -->
<!-- Modal For Forgot Password -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Forgot Password ?</h4>
                  </div>
                  <form action="" method="POST">
                  <div class="modal-body">
                      <p>Enter your e-mail address below to reset your password.</p>
                      <input type="text"  id="remail" placeholder="Email" class="form-control" onBlur="passRecover()" />
                      <span id="userRemail"></span>

                  </div>
                  <div class="modal-footer">
                      <button data-dismiss="modal" class="btn btn-default btn-xs" type="button">Cancel</button>
                      <!-- <a href="index.php#alal"> -->
                      <button class="btn btn-info btn-xs" 
                      name="reset" type="submit">Submit</button>
                  </div>
                  </form>
              </div>
          </div>
        </div>
<!-- Modal End For Password -->
<!-- Modal for Registration -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Registration</h5>
       <!--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-header">
        <div class="card-body">
					<form role="form" action="" method="POST">
						<div class="form-row">
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-user"  ></i></span>
							<input type="text" name="name" id="fname"  class="form-control" placeholder="Minimum 5 Letter of your Name" onBlur="checkName()"/>
							<span id="lname"></span>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-at"  ></i></span>
							<input type="text"  name="username" id="username"  class="form-control" placeholder="Minimum 5 Letter of your Username " onBlur="checkAvailability()"/>
                            <span id="user-availability-status"></span>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"  ></i></span>
							<input type="email" name="email" id="email"  class="form-control" placeholder="Your Email " onBlur="checkEmail()"/>
                            <span id="user-availability"></span>
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-key fa-fw"  ></i></span>
							<input type="password" name="password"  class="form-control"  placeholder="Minimum 8 Letter Password" id="pass1" onBlur="checkPass()"/>
							<span id="userPass"></span>
						</div>
						<div class="modal-footer">
				        <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Cancel</button>
				        <button type="submit" class="btn btn-primary btn-xs" name="register">Register</button>
	      				</div>
	      			</div>
	      			</form>
      </div>
    </div>
    </div>
  </div>
</div>
<?php require_once 'linkj.php'; ?>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</body>
</html>