<?php
	session_start();
	extract($_REQUEST);

	$carro = $_SESSION['carro_inv'];
	unset($carro[$id]);

	$_SESSION['carro_inv']=$carro;
?>