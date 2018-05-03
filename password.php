<?php
	$pass1 = $_POST['pass'];
	if (strlen($pass1)>7) 
	{
		# code...
		if($pass1=="12345678" || $pass1=="01234567" ||
			$pass1=="123456789" || $pass1=="012345678" ||
			$pass1=="12345678910" || $pass1=="012345679" ||
			$pass1=="1234567891011" 	|| $pass1=="012345678910" ||
			$pass1=="123456789101112" 	|| $pass1=="01234567891011" ||
			$pass1=="123456789101113" 	|| 
			$pass1=="1234567891011121314" || $pass1=="0123456789101112" ||
			$pass1=="123456789101112131415"|| $pass1=="012345678910111213" ||
			$pass1=="123456789101112131416"|| $pass1=="01234567891011121314" ||
			$pass1=="1234567891011121314151617"|| $pass1=="0123456789101112131415" ||
			$pass1=="123456789101112131415161718"|| $pass1=="012345678910111213141516" ||
			$pass1=="12345678910111213141516171819"|| $pass1=="01234567891011121314151617" ||				
			$pass1=="1234567891011121314151617181920"|| $pass1=="0123456789101112131415161718" ||				
			$pass1=="23456789"|| $pass1=="2345678910" ||
			$pass1=="02345678"|| $pass1=="01345678" ||
			$pass1=="01356789"|| $pass1=="66666666" ||				
			$pass1=="00000000"|| $pass1=="77777777" ||				
			$pass1=="11111111"|| $pass1=="88888888" ||
			$pass1=="22222222"|| $pass1=="99999999" ||
			$pass1=="33333333"|| $pass1=="10101010" ||
			$pass1=="44444444"|| $pass1=="20202020" ||
			$pass1=="55555555")
		{
		echo '<p class="text-danger text-small">try new one</p>';
		}
		else
		{
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