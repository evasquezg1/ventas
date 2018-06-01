<?php 
  include("../../../modulos/funciones.php");  
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

<div class="row">
  <div class="col s12 m12 l6">
    <?php echo rutas("Grupos"); ?><br>
    <a class="btn green" onclick="nuevo('grupos')"><i class="fa fa-plus"></i> Nuevo Grupo</a>
    <div class="container">
    <div class="section">
        <div class="divider"></div>    
        <div id="table-datatables">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div id="productos-view">
                      <table id="data-table-simple" class="responsive-table display dataTable" cellspacing="0" role="grid" aria-describedby="data-table-simple_info">
                        <thead>
                            <tr>
                              <th rowspan="1" colspan="1">ID</th>
                              <th rowspan="1" colspan="1">NOMBRE</th>
                              <th rowspan="1" colspan="1" style="text-align:center;">ESTADO</th>
                            </tr>
                        </thead>
                 
                        <tbody>
                        <?php 
                          $g = mysql_query("SELECT * FROM grupos ORDER BY nombre_grupos ASC");
                          $i=0;
                          while($row=mysql_fetch_array($g)){
                            if($i==0){
                        ?>
                          <tr role="row" class="odd"">
                                <td class="sorting_1"><?php echo $row['id_grupos']; ?></td>
                                <td class="" id="grupos_<?php echo $row['id_grupos']; ?>" onclick="gruposact('grupos','<?php echo $row['id_grupos']; ?>')"><?php echo $row['nombre_grupos']; ?></td>
                                <td style="text-align:center;" id="estado_grupos_<?php echo $row['id_grupos']; ?>"><?php echo estado($row['estado_grupos'],$row['id_grupos'],'grupos'); ?></td>
                            </tr>
                        <?php 
                            $i=1;
                            }else{
                        ?>
                            <tr role="row" class="even">
                                <td class="sorting_1"><?php echo $row['id_grupos']; ?></td>
                                <td class="" id="grupos_<?php echo $row['id_grupos']; ?>" onclick="gruposact('grupos','<?php echo $row['id_grupos']; ?>')"><?php echo $row['nombre_grupos']; ?></td>
                                <td style="text-align:center;" id="estado_grupos_<?php echo $row['id_grupos']; ?>"><?php echo estado($row['estado_grupos'],$row['id_grupos'],'grupos'); ?></td>
                            </tr>
                          <?php 
                              $i=0;
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
  </div>

  <div class="col s12 m12 l6">
    <?php echo rutas("Marcas"); ?><br>
    <a class="btn green" onclick="nuevo('marcas')"><i class="fa fa-plus"></i> Nueva Marca</a>
    <div class="container">
    <div class="section">
        <div class="divider"></div>    
        <div id="table-datatables">
            <div class="row">
                <div class="col s12 m12 l12">
                    <div id="productos-view">
                      <table id="data-table-simple" class="responsive-table display dataTable" cellspacing="0" role="grid" aria-describedby="data-table-simple_info">
                        <thead>
                            <tr>
                              <th rowspan="1" colspan="1">ID</th>
                              <th rowspan="1" colspan="1">NOMBRE</th>
                              <th rowspan="1" colspan="1" style="text-align:center;">ESTADO</th>
                            </tr>
                        </thead>
                 
                        <tbody>
                        <?php 
                          $g = mysql_query("SELECT * FROM marcas ORDER BY nombre_marcas ASC");
                          $i=0;
                          while($row=mysql_fetch_array($g)){
                            if($i==0){
                        ?>
                          <tr role="row" class="odd">
                                <td class="sorting_1"><?php echo $row['id_marcas']; ?></td>
                                <td class="" id="marcas_<?php echo $row['id_marcas']; ?>" onclick="gruposact('marcas','<?php echo $row['id_marcas']; ?>')"><?php echo $row['nombre_marcas']; ?></td>
                                <td style="text-align:center;" id="estado_marcas_<?php echo $row['id_marcas']; ?>"><?php echo estado($row['estado_marcas'],$row['id_marcas'],'marcas'); ?></td>
                            </tr>
                        <?php 
                            $i=1;
                            }else{
                        ?>
                             <tr role="row" class="even">
                                <td class="sorting_1"><?php echo $row['id_marcas']; ?></td>
                                <td class="" id="marcas_<?php echo $row['id_marcas']; ?>" onclick="gruposact('marcas','<?php echo $row['id_marcas']; ?>')"><?php echo $row['nombre_marcas']; ?></td>
                                <td style="text-align:center;" id="estado_marcas_<?php echo $row['id_marcas']; ?>"><?php echo estado($row['estado_marcas'],$row['id_marcas'],'marcas'); ?></td>
                            </tr>
                          <?php 
                              $i=0;
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
  </div>

</div>

<style type="text/css">
   #busqueda{
             width: 100%;
             max-width: 100%;
            height: 100%;
            background: rgba(255,255,255,.7);
             outline: 1px solid #000;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 99999;
         }

         .datos{   
            width: 30%;
            padding: 10px;
            margin: 100px auto;
            height: auto;
            background: #fff;
            font-family: 'Philosopher-BoldItalic',sans-serif;
            color: #000;
         }

         .consultas{
            height:130px;
            overflow: auto;
         }

         .sele:hover{
            background-color: #ccc;
            padding:5px;
            padding-right:40px;
            border-radius:10px;
         }

         .sele{
            transition-duration: .3s;
            color: #000;
            cursor:pointer;
         }
</style>

<div id="busqueda" style="display: none;">
   <div class="datos z-depth-2">
      
   </div>
</div>

<script type="text/javascript">
  function gruposact(tabla,id){
    $("#"+tabla+"_"+id).html("<input type='text' value='"+$("#"+tabla+"_"+id).text()+"' id='nuevor' style='text-transform:uppercase;'/><a class='task-cat green' onclick='actualizag(&#39;"+id+"&#39;,&#39;"+tabla+"&#39;)'><i class='fa fa-check'></i></a>");
    $("#"+tabla+"_"+id).removeAttr('onclick');
  }

  function actualizag(id,tabla){
    d = $("#nuevor").val();
    $.ajax({
      url: '../modulos/consultas.php',
      type: 'get',
      data: 'actualizag=ok&tabla='+tabla+"&id="+id+"&dato="+d,
      success: function(dato){
        $("#"+tabla+"_"+id).attr("onclick","gruposact('"+tabla+"','"+id+"')");
        d = d.toUpperCase();
        $("#"+tabla+"_"+id).text(d);
        Materialize.toast('Registro Actualizado', 4000,'');
      }
    });
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

   function nuevo(na){
      $("#busqueda").css({"display":"block"});
      $(".datos").html("<h5 class='btn orange' style='text-transform:uppercase;'>AGREGAR "+na+"</h5><sup> (Esc para salir)</sup><br><br>");
      $(".datos").append("<input type='hidden' id='obt' value='"+na+"'/><input type='text' id='newp' placeholder='Agregar' style='text-transform:uppercase;'/><br><sub>(Tecla <b>Enter</b> para guardar)</sub>");
   }

   $(document).bind('keydown',function(e){
      if ( e.which == 27 ) {
         $("#busqueda").css({"display":"none"});
      };
   });

   $(document).keyup(function (e) {
      if ($("#newp").is(":focus") && (e.keyCode == 13)) {
         na = $("#obt").val();
         valor = $("#newp").val();
         $.ajax({
            url: '../modulos/consultas.php',
            type: 'get',
            data: 'guardar='+na+"&valor="+valor,
            success: function(dato){
               if(dato=='si'){
                  Materialize.toast('Registro Almacenado', 4000,'');
                  location.reload();
               }else{
                  alert("Error durante el registro, intente de nuevo");
               }
            }
         })
      }
});
</script>