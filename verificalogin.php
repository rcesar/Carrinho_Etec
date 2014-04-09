<?php 
if(session_id()==''){
session_start();
}
	if(!isset($_SESSION["login"]["nome"])){
		header("Location: login.php");
	}
 ?>