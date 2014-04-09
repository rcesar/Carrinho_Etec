<?php 
	session_start();
	unset($_SESSION["loginadm"]);
	header("Location:index.php");
 ?>