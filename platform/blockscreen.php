<?php 
	session_start();
	$_SESSION['bloqueo'] = "ok";

	echo "Sesion bloqueada.";
	header("Location: logout.php");
?>