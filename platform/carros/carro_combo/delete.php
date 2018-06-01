<?php
	session_start();
	extract($_REQUEST);

	$carro = $_SESSION['carro'];
	unset($carro[$id]);

	$_SESSION['carro']=$carro;
?>