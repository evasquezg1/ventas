<?php 
	session_start();
	include("../../../modulos/conn.php");
?>

<div class="container" style="height:290px;">
    <div class="section">
        <div class="divider"></div>    
        <div id="table-datatables" style="height:250px;overflow:auto;">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div id="productos-view">
                        <table class="responsive-table display dataTable" cellspacing="0" role="grid" id="tabla" style="cursor:pointer;">
                            <thead>
                                <style type="text/css">
                                    th, td{
                                        text-align: center;
                                    }
                                </style>
                                <tr>
                                    <th>C&oacute;digo</th>
                                    <th>Descripci&oacute;n Comercial</th>
                                    <th>Tipo</th>
                                    <th>Concepto</th>
                                    <th>Cantidad</th>
                                    <th>Existencia</th>
                                    <th>Nueva Exis.</th>
                                </tr>
                            </thead>                 
                            <tbody>
                                <?php 
                                   if(isset($_SESSION['carro_inv'])){
										$carro = $_SESSION['carro_inv'];
	                                    $suma=0;
    	                                foreach($carro as $k => $v){
                                            $tipoi = ($v['tipo']=="in") ? 'ENTRADA' : 'SALIDA';
            	                            echo '<tr>';
                	                        echo '<td id="marcar_elim_'.$v['id_productos'].'" onclick="marcar_elim(&#39;'.$v['id_productos'].'	&#39;)">'.$v['id_productos'].'</td>';
	                                        echo '<td onclick="marcar_elim(&#39;'.$v['id_productos'].'&#39;)">'.$v['producto'].'</td>';
    	                                    echo '<td onclick="marcar_elim(&#39;'.$v['id_productos'].'&#39;)">'.$tipoi.'</td>';
                                            echo '<td onclick="marcar_elim(&#39;'.$v['id_productos'].'&#39;)">'.$v['concepto'].'</td>';
        	                                echo '<td onclick="marcar_elim(&#39;'.$v['id_productos'].'&#39;)">'.$v['cantidad'].'</td>';
            	                            echo '<td onclick="marcar_elim(&#39;'.$v['id_productos'].'&#39;)">'.$v['existencia'].'</td>';
                                            echo '<td onclick="marcar_elim(&#39;'.$v['id_productos'].'&#39;)">'.$v['nuevaexis'].'</td>';
                	                        echo '</tr>';
                    	                }
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

<script>
    selec = 0;
    function marcar_elim(id){
        if(selec==0){
            selec=id;
            $("#marcar_elim_"+id).css("background-color","#F7F8AB");
        }else{
            $("#marcar_elim_"+id).css("background-color","#F7F8AB");
            $("#marcar_elim_"+selec).css("background-color","#fff");
            selec=id;
        }
        $("#elimina_art_combo").attr("onclick","elimina_art_combo('"+id+"')")
    }

    function elimina_art_combo(id){
        $.ajax({
            url: 'carros/carro_ajusteinv/delete.php',
            type: 'get',
            data: 'id='+id,
            success: function(){
                $("#ajuste").load("carros/carro_ajusteinv/view.php");
            }
        })
    }
</script>