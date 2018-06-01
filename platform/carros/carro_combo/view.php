<?php 
	session_start();
    if(isset($_SESSION['carro'])){
	$carro = $_SESSION['carro'];
?>

<div class="container">
    <div class="section">
        <div class="divider"></div>    
        <div id="table-datatables">
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
                                    <th>Descripci&oacute;n</th>
                                    <th>Cantidad</th>
                                    <th>Precio Costo</th>
                                    <th>Precio Parcial</th>
                                </tr>
                            </thead>                 
                            <tbody>
                                <?php 
                                    $suma=0;
                                    foreach($carro as $k => $v){
                                        $suma += $v['preciop'];
                                        echo '<tr>';
                                        echo '<td id="marcar_elim_'.$v['id_productos'].'" onclick="marcar_elim(&#39;'.$v['id_productos'].'&#39;)">'.$v['id_productos'].'</td>';
                                        echo '<td onclick="marcar_elim(&#39;'.$v['id_productos'].'&#39;)">'.$v['producto'].'</td>';
                                        echo '<td onclick="marcar_elim(&#39;'.$v['id_productos'].'&#39;)">'.$v['cantidad'].'</td>';
                                        echo '<td onclick="marcar_elim(&#39;'.$v['id_productos'].'&#39;)">'.$v['precioc'].'</td>';
                                        echo '<td onclick="marcar_elim(&#39;'.$v['id_productos'].'&#39;)">'.$v['preciop'].'</td>';
                                        echo '</tr>';
                                    }
                                    echo '<script>$("#preciocompra").val("'.$suma.'");</script>';
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
            url: 'carros/carro_combo/delete.php',
            type: 'get',
            data: 'id='+id,
            success: function(){
                $("#combosview").load("carros/carro_combo/view.php");
            }
        })
    }
</script>

<?php 
    }
?>