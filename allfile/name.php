<?php $name = $_POST['name'];
	if (strlen($name)>4) 
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