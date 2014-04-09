<?php 
	if(session_id()==''){
session_start();
}
unset($_SESSION["login"]);
header("Location: index.php");
 ?>