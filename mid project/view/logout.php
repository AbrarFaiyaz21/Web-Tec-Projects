<?php 
	session_start();
	session_unset();
	session_destroy();

	header("LOCATION: ../view/login.php");
?>