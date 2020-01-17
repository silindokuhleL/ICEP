<?php
	session_start();
	
	$_SESSION["role"] = "";
	$_SESSION["stNumber"] = "";
	$_SESSION["name"] = "";
	$_SESSION["lastname"] = "";
	$_SESSION["gender"] = "";
	$_SESSION["cellNumber"] = "";
	$_SESSION["email"] = "";
	header("Location:index.php");
	
?>