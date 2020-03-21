<?php 
	session_start();
	unset($_SESSION['value']);
	session_destroy();
	header("location: Login.php");


 ?>