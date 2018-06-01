<?php 
	session_start();
	include("funciones.php");
	extract($_GET);
	$hoy = date("Y-m-d");
	$usr_name = $_SESSION['usuario'];

	if(isset($buscar)){
		$g = mysql_query("SELECT id_$buscar,nombre_$buscar FROM $buscar WHERE estado_$buscar='1' ORDER BY nombre_$buscar ASC");
		$d = mysql_num_rows($g);
		if($d>0){
			while($row=mysql_fetch_array($g)){
				echo '>> <a class="sele" onclick="choose(&#39;'.$row['nombre_'.$buscar].'&#39;,&#39'.$buscar.'&#39;,&#39;'.$row['id_'.$buscar].'&#39;)">'.$row['nombre_'.$buscar].'</a><br>';
			}
		}else{
			echo 'No existen grupos';
		}
	}

	if(isset($guardar)){
		$valor = strtoupper($valor);
		$d = mysql_query("INSERT INTO $guardar VALUES(NULL,'$valor','1')");
		if($d){
			echo 'si';
		}else{
			echo 'no';
		}
	}

	if(isset($actualizag)){
		$dato = strtoupper($dato);
		$r = mysql_query("UPDATE $tabla SET nombre_$tabla='$dato' WHERE id_$tabla='$id'");
		if($r){
			echo "Actualizado";
		}
	}

	if(isset($actualizaest)){
		$r = mysql_query("UPDATE $tabla SET estado_$tabla='$estado' WHERE id_$tabla='$id'");
		if($r){
			echo "Actualizado";
		}
	}

	if(isset($guardararticulo)){
		$descart = reemplazar(strtoupper($descart),1);
		$notas = reemplazar(strtoupper($notas),1);
		$ubicacion = reemplazar(strtoupper($ubicacion),1);
		$d = mysql_query("SELECT id_articulos FROM articulos WHERE codigobarras='$codigoart'");
		if(mysql_num_rows($d)>0){
			echo 'existe';
		}else{
			if($tipo==1){
				$r = mysql_query("INSERT INTO articulos VALUES(NULL,'$cantminima','$codigoart','$descart','0',NULL,NULL,'$notas','$precioventa','$preciominimo','$porcentajeminimo','$porcentajeventa','$tipo',NULL,'$preciocompra','$ocultogrupos','$ocultomarcas','$ocultobodegas','1','19%','$ubicacion')");
				echo ($r==true) ? 'si' : 'no';
			}else if($tipo==3){
				if(isset($_SESSION['carro'])){
					$r = mysql_query("INSERT INTO articulos VALUES(NULL,'$cantminima','$codigoart','$descart','0',NULL,NULL,'$notas','$precioventa','$preciominimo','$porcentajeminimo','$porcentajeventa','$tipo',NULL,'$preciocompra','$ocultogrupos','$ocultomarcas','$ocultobodegas','1','19%','$ubicacion')");
					if($r){
						$carro = $_SESSION['carro'];
						foreach($carro as $k => $v){
							$cantidad = $v['cantidad'];
							$id_art = $v['id_productos'];
							$d = mysql_query("INSERT INTO articuloscombo VALUES(NULL,'$codigoart','$cantidad','$id_art')");
						}
						unset($_SESSION['carro']);
						echo 'si';
					}
				}
			}
		}
	}

	if(isset($buscarcombop)){
		$r = mysql_query("SELECT * FROM articulos WHERE codigobarras='$buscarcombop' AND tipo='1'");
		if(mysql_num_rows($r)>0){
			$row = mysql_fetch_array($r);
			if($inventory=='inout'){
				echo $row['descripcioncomercial'].'/'.$row['existencia'];
			}else if($inventory=='add'){
				echo $row['descripcioncomercial'].'/'.$row['vlrcosto'];
			}
		}else{
			echo 'no';
		}
	}

	if(isset($buscarpcombo)){
?>

<input type="text" id="buscar" name="" class="" autofocus placeholder="Buscar productos">
<div class="container busquedacombo">
    <div class="section">
        <div class="divider"></div>    
        <div id="table-datatables">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div id="productos-view">
                        <table class="responsive-table display dataTable" cellspacing="0" cellpadding="0" role="grid" id="tabla" style="cursor:pointer;">
                            <thead>
                                <style type="text/css">
                                    th, td{
                                        text-align: center;
                                    }
                                </style>
                                <tr>
                                    <th>C&oacute;digo</th>
                                    <th>Descripci&oacute;n</th>
                                </tr>
                            </thead>                 
                            <tbody>
                                <?php
                                	$r = mysql_query("SELECT descripcioncomercial,codigobarras FROM articulos WHERE tipo='1' AND estado_articulos='1'");
                                	while($row=mysql_fetch_array($r)){
                                		echo '<tr>';
                                		echo '<td onclick="elegircombo(&#39;'.$row['codigobarras'].'&#39;)">'.$row['codigobarras'].'</td>';
                                		echo '<td onclick="elegircombo(&#39;'.$row['codigobarras'].'&#39;)">'.$row['descripcioncomercial'].'</td>';
                                		echo '</tr>';
                                	}                                		
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>

<script type="text/javascript">
	var busqueda = document.getElementById('buscar');
   	var table = document.getElementById("tabla").tBodies[0];

    buscaTabla = function(){
      texto = busqueda.value.toLowerCase();
      var r=0;
      while(row = table.rows[r++])
      {
        if ( row.innerText.toLowerCase().indexOf(texto) !== -1 )
          row.style.display = null;
        else
          row.style.display = 'none';
      }
    }

    busqueda.addEventListener('keyup', buscaTabla);
</script>
<?php
	}

	if(isset($save_inventory)){
		if(isset($_SESSION['carro_inv'])){
			$carro = $_SESSION['carro_inv'];
			if(count($carro)==0)
				echo 'No existen articulos para modificacion';
			else
				$r = mysql_query("INSERT INTO movimientosinventario VALUES(NULL,'$hoy','$cf','$nota','$usr_name')");
				if($r){
					foreach($carro as $k => $v){
						$id_p = $v['id_productos'];
						$tipo = $v['tipo'];
						$cantidad = $v['cantidad'];
						$conc = $v['concepto'];
						$nueva = $v['nuevaexis'];
						mysql_query("INSERT INTO articulosinventario VALUES(NULL,'$cf','$id_p','$tipo','$conc','$cantidad')");
						mysql_query("UPDATE articulos SET existencia='$nueva' WHERE codigobarras='$id_p'");
					}
					unset($_SESSION['carro_inv']);
					echo 'si';
				}
		}else{
			echo 'No existen articulos para modificacion';
		}
	}
?>