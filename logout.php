<?php

	//session_destroy();
	setcookie("uid", "", time()+(10 * 365 * 24 * 60 * 60));

     header("location:../a/");
?>