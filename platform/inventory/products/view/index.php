<div class="row">
	<div class="col s12 m12 l12">
		<div class="card-panel z-depth-2">
<?php 
    include("../../../../modulos/funciones.php");
    echo rutas("Productos");
?>

<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../font/font-awesome-4.7.0/css/font-awesome.css"/>
<style type="text/css">
    #productos-view{
        width:100%;
        height:400px;
        overflow: auto;
    }
</style>
<input type="text" id="buscar" name="" class="" autofocus placeholder="Buscar productos">
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
                                    <th>Marca</th>
                                    <th>Grupo</th>
                                    <th>Existencia</th>
                                    <th>P. Sugerido</th>
                                    <th>P. M&iacute;nimo</th>
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th>Ubicaci&oacute;n</th>
                                </tr>
                            </thead>
                 
                            <tbody>
                                <?php 
                                    if(isset($_GET['inactivos'])){
                                        $p = mysql_query("SELECT * FROM articulos AS a INNER JOIN marcas AS m ON a.marca=m.id_marcas INNER JOIN grupos AS g ON a.grupo=g.id_grupos");
                                    }else{
                                        $p = mysql_query("SELECT * FROM articulos AS a INNER JOIN marcas AS m ON a.marca=m.id_marcas INNER JOIN grupos AS g ON a.grupo=g.id_grupos WHERE a.estado_articulos=1");
                                    }
                                    $i=0;
                                    $s=0;
                                    while($row=mysql_fetch_array($p)){
                                        $s=$row['id_articulos'];
                                ?>
                                        <tr role="row" class="even">
                                            <td onclick="selecc('<?php echo $s; ?>')" class="sorting_1 f<?php echo $s; ?>"><?php echo $row['codigobarras']; ?></td>
                                            <td onclick="selecc('<?php echo $s; ?>')" class="f<?php echo $s; ?>"><?php echo $row['descripcioncomercial']; ?></td>
                                            <td onclick="selecc('<?php echo $s; ?>')" class="f<?php echo $s; ?>"><?php echo $row['nombre_marcas']; ?></td>
                                            <td onclick="selecc('<?php echo $s; ?>')" class="f<?php echo $s; ?>"><?php echo $row['nombre_grupos']; ?></td>
                                            <td onclick="selecc('<?php echo $s; ?>')" class="f<?php echo $s; ?>" style="text-align:center;">
                                                <?php 
                                                    if($row['existencia']==0){
                                                        echo '0';
                                                    }else{
                                                        echo $row['existencia'];
                                                    }
                                                ?>
                                            </td>
                                            <td style="text-align: center;" onclick="selecc('<?php echo $s; ?>')" class="f<?php echo $s; ?> tooltipped" data-position="left" data-delay="50" data-tooltip="<?php echo $row['vlrcosto']; ?>"><?php echo number_format($row['precioventa']); ?></td>
                                            <td style="text-align: center;" onclick="selecc('<?php echo $s; ?>')" class="f<?php echo $s; ?>"><?php echo number_format($row['preciominimo']); ?></td>
                                            <td style="text-align: center;" onclick="selecc('<?php echo $s; ?>')" class="f<?php echo $s; ?>"><?php echo tipo_art($row['tipo']); ?></td>
                                            <td id="estado_articulos_<?php echo $row['id_articulos']; ?>" class="f<?php echo $s; ?>" style="text-align:center;"><?php echo estado($row['estado_articulos'],$row['id_articulos'],'articulos'); ?></td>
                                            <td onclick="selecc('<?php echo $s; ?>')" class="f<?php echo $s; ?>"><?php echo $row['ubicacion']; ?></td>
                                        </tr>
                                <?php  
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

<div class="fixed-action-btn click-to-toggle">
    <a class="btn-floating btn-large #ffca28 amber darken-1">
      <i class="large fa fa-archive"></i>
    </a>
    <ul>
      <li><a href="#inventory/products/add/" onclick="cargar('inventory/products/add/')" class="btn-floating green"><i class="mdi-content-add"></i></a></li>
      <li><a class="btn-floating blue" id="editar"><i class="mdi-content-create"></i></a></li>
      <li><a class="btn-floating red darken-1"><i class="mdi-action-delete"></i></a></li>
      <li><a href="#inventory/products/view/inactivos" onclick="cargar('inventory/products/view/?inactivos')" class="btn-floating tooltipped purple darken-1" data-position="left" data-delay="50" data-tooltip="Ver productos inactivos"><i class="mdi-communication-dnd-on"></i></a></li>
    </ul>
  </div>
 </div>
</div>
</div>

<script>
    var selec = 0;
    function selecc(id){
        if(selec==0){
            selec=id;
            $(".f"+id).css("background-color","#F7F8AB");
        }else{
            $(".f"+id).css("background-color","#F7F8AB");
            $(".f"+selec).css("background-color","#fff");
            selec=id;
        }
        $("#editar").attr("onclick","cargar('inventory/products/edit/?id="+selec+"')");
        $("#editar").attr("href","#inventory/products/edit/?id="+selec);
    }

    function estadom(estado,id,tabla){
    $.ajax({
      url: '../modulos/consultas.php',
      type: 'get',
      data: 'actualizaest=ok&tabla='+tabla+"&id="+id+"&estado="+estado,
      success: function(dato){
        if(estado==0){
          $("#estado_"+tabla+"_"+id).html('<a onclick="estadom(&#39;1&#39;,&#39;'+id+'&#39;,&#39;'+tabla+'&#39;)"><span class="task-cat red" style="cursor:pointer;">Inactivo</span></a>');
        }else{
          $("#estado_"+tabla+"_"+id).html('<a onclick="estadom(&#39;0&#39;,&#39;'+id+'&#39;,&#39;'+tabla+'&#39;)"><span class="task-cat green" style="cursor:pointer;">Activo</span></a>');
        }
        
      }
    });
  }

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

<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/data-tables-script.js"></script>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>