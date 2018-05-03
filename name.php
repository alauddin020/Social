<?php 
	$name = $_POST['name'];
	if (strlen($name)>4) 
	{
		# code...
		echo '
        <span class="form-control-feedback fa fa-check text-success"></span>';
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