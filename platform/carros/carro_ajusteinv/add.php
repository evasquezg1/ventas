<?php 
	session_start();
	extract($_REQUEST);

	if(isset($_SESSION['carro_inv'])){
		$carro=$_SESSION['carro_inv'];
	}

	$carro[$id]=array('id_productos'=>$id,'cantidad'=>$cantidad,'producto'=>$nombre,'tipo'=>$tipo,'concepto'=>$concepto,'existencia'=>$existencia,'nuevaexis'=>$nuevaexis);
	$_SESSION['carro_inv'] = $carro;
?>