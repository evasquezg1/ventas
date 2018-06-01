<?php 
	session_start();
	extract($_REQUEST);

	if(isset($_SESSION['carro'])){
		$carro=$_SESSION['carro'];
	}

	$carro[$id]=array('id_productos'=>$id,'cantidad'=>$cantidad,'producto'=>$nombre,'precioc'=>$precioc,'preciop'=>$preciop);
	$_SESSION['carro'] = $carro;
?>