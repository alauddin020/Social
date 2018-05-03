<?php
	$pass1 = $_POST['pass'];
	if (strlen($pass1)>7) 
	{
		# code...
		echo '
        <span class="form-control-feedback glyphicon glyphicon-ok text-success"></span>';
	}
	else
	{
		echo '<span class="form-control-feedback glyphicon glyphicon-warning-sign text-danger"></span>';
	}
	
		
?>