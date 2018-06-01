<?php 
	include("../../../../modulos/funciones.php");
	echo rutas("<a class='btn-floating waves-effect waves-light'><i class='green fa fa-plus'></i></a> Nuevo Producto");
?>

<div class="row">
   <div class="col s12 m12 l12">
      <div class="card-panel z-depth-2">
         <div class="row">
            <form class="col s12">
               <div class="row">
                  <div class="input-field col s12 l2">       
                     C&oacute;digo Interno              
                     <span class="#ffca28 amber darken-1 bck">
                        <?php echo obtener_auto('articulos'); ?>
                     </span>
                  </div>
               </div>
               <div class="row"><br>
                  <div class="input-field col s12 l3">
                     <i class="fa fa-edit prefix"></i>
                     <input id="descart" name="descart" type="text" autofocus style="text-transform: uppercase;" maxlength="40">
                     <label for="descripcion" class="">Descripci&oacute;n Comercial</label>
                  </div>
                  <div class="input-field col s12 l3">
                     <i class="fa fa-barcode prefix"></i>
                     <input type="text" name="codigoart" id="codigoart">
                     <label for="first_name" class="">C&oacute;digo</label>
                  </div>
                  <div class="input-field col s12 l2">
                     <select name="tipoart" id="tipo" onchange="ver()">
                        <option value="1" selected>Producto</option>
                        <option value="3">Combo</option>
                     </select>
                     <label>Tipo</label>
                  </div>
                  <div class="input-field col s12 l2">
                     <i class="fa fa-dropbox prefix" onclick="nuevo('grupos')"></i>
                     <input type="text" name="codigoart" readonly style="text-transform:uppercase;" autocomplete="off" onclick="cargadatos('grupos')" id="grupos">
                     <input type="hidden" id="ocultogrupos" value="">
                     <label for="first_name" class="" id="gruposa">Grupo</label>
                  </div>
                  <div class="input-field col s12 l2">
                     <i class="fa fa-tag prefix" onclick="nuevo('marcas')"></i>
                     <input type="text" name="codigoart" readonly style="text-transform:uppercase;" autocomplete="off" onclick="cargadatos('marcas')" id="marcas">
                     <input type="hidden" id="ocultomarcas" value="">
                     <label for="first_name" class="" id="marcasa">Marca</label>
                  </div>
               </div>
               <div class="row">
                  <div class="col l12"><br>
                     <a class="btn blue" onclick="muestra('datos_basicos')">datos b&aacute;sicos</a>
                     <a class="btn purple combom" onclick="muestra('combo')" style="display:none;">combo</a>
                  </div>
               </div>
               <div class="row">

                  <div class="col l12 datos_basicos p_1"><br>
                     <div class="row">
                        <div class="col s12 m12 l4">
                           <fieldset>
                              <legend>Precio</legend>
                              <div class="input-field col s12 l12">
                                 <i class="mdi-editor-attach-money prefix"></i>
                                 <input id="preciocompra" type="text" style="text-transform: uppercase;" value="0">
                                 <label for="descripcion" class="active">Precio Compra + IVA</label>
                              </div>
                              <div class="input-field col s6 l6">
                                 <i class="mdi-editor-attach-money prefix"></i>
                                 <input id="precioventa" type="text" style="text-transform: uppercase;" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" onkeyup="ganancia('precioventa','porcentajeventa')">
                                 <label for="descripcion" class="">Precio Sugerido</label>
                              </div>
                              <div class="input-field col s6 l6">
                                 <i class="fa fa-percent prefix" style="font-size:23px;"></i>
                                 <input id="porcentajeventa" type="text" style="text-transform: uppercase;" readonly maxlength="3">
                                 <label for="descripcion" class="active">Utilidad</label>
                              </div>
                               <div class="input-field col s6 l6">
                                 <i class="mdi-editor-attach-money prefix"></i>
                                 <input id="preciominimo" type="text" style="text-transform: uppercase;" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" onkeyup="ganancia('preciominimo','porcentajeminimo')">
                                 <label for="descripcion" class="">Precio M&iacute;nimo</label>
                              </div>
                              <div class="input-field col s6 l6">
                                 <i class="fa fa-percent prefix" style="font-size:23px;"></i>
                                 <input id="porcentajeminimo" type="text" style="text-transform: uppercase;" readonly maxlength="3">
                                 <label for="descripcion" class="active">Utilidad</label>
                              </div>
                           </fieldset>
                        </div>
                        <div class="col s12 m12 l4">
                           <fieldset>
                              <legend>Existencia</legend>
                              <div class="input-field col s12 l12">
                                 <i class="fa fa-angle-down prefix"></i>
                                 <input id="cantminima" type="text" style="text-transform: uppercase;">
                                 <label for="descripcion" class="">Cantidad M&iacute;nima</label>
                              </div>
                              <div class="input-field col s12 l12">
                                 <i class="fa fa-bars prefix"></i>
                                 <input id="ubicacion" type="text" style="text-transform: uppercase;">
                                 <label for="descripcion" class="">Ubicaci&oacute;n</label>
                              </div>
                           </fieldset>
                        </div>
                        <div class="col s12 m12 l4">
                           <fieldset>
                              <legend>Observaciones</legend>
                              <div class="input-field col s12 l12">
                                 <i class="fa fa-inbox prefix" onclick="nuevo('bodegas')"></i>
                                 <input type="text" name="" readonly style="text-transform:uppercase;" autocomplete="off" onclick="cargadatos('bodegas')" id="bodegas">
                                 <input type="hidden" id="ocultobodegas" value="">
                                 <label for="first_name" class="" id="bodegasa">Bodega</label>
                              </div>
                              <div class="input-field col s12 l12">
                                 <i class="fa fa-comments prefix"></i>
                                 <input id="notas" type="text" style="text-transform: uppercase;">
                                 <label for="descripcion" class="">Notas</label>
                              </div>                              
                           </fieldset>
                        </div>
                     </div>                     
                  </div>                

                  <div class="col l12 combo p_1" style="display:none;"><br>
                     <div class="row">
                        <div class="input-field col s2 l2">
                           <i class="fa fa-search prefix" style="font-size:23px;" onclick="buscarpcombo('buscacombop')"></i>
                           <input type="text" id="buscacombop">
                           <label class="" id="buscacombopp">Codigo</label>
                        </div>
                        <div class="input-field col s3 l3">
                           <input type="text" id="buscacombonombre" readonly>
                           <label class="active">Descripci&oacute;n Comercial</label>
                        </div>
                        <div class="input-field col s2 l2">
                           <input type="text" id="buscacombocantidad" onkeyup="preciocombo()">
                           <label class="active">Cantidad</label>
                        </div>
                        <div class="input-field col s2 l2">
                           <input type="text" id="buscacombocosto" readonly>
                           <label class="active">Precio Compra</label>
                        </div>
                        <div class="input-field col s2 l2">
                           <input type="text" id="buscacomboparcial" readonly>
                           <label class="active">Precio Parcial</label>
                        </div>
                        <div class="col s1 l1">
                           <a class="btn green" onclick="agregar();"><i class="fa fa-plus"></i></a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col s12 l11" id="combosview">
                           <script type="text/javascript">
                              $("#combosview").load("carros/carro_combo/view.php");
                           </script>
                        </div>
                        <div class="col s12 l1"><br>
                           <a class="btn red" id="elimina_art_combo"><i class="fa fa-trash"></i></a>
                        </div>
                     </div>
                  </div>

                  <div class="col offset-l10 offset-s8 s3 l2">
                     <br>
                     <a class="btn green" onclick="guardararticulos()"><i class="mdi-content-save"></i> Guardar</a>
                  </div>
               </div>
            </form>
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

         .busquedacombo{
            height: 200px;
            overflow: scroll;
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
   $('select').material_select();

   function agregar(){
      codigo = $("#buscacombop").val();
      nombre = $("#buscacombonombre").val();
      cantidad = $("#buscacombocantidad").val();
      precioc = $("#buscacombocosto").val();
      preciop = $("#buscacomboparcial").val();
      if(codigo=='' || nombre=='' || cantidad=='' || cantidad<=0 || precioc=='' || preciop==''){
         alert("Existen valores incorrectos");
      }else{
         $.ajax({
            url: 'carros/carro_combo/add.php',
            type: 'get',
            data: 'id='+codigo+'&cantidad='+cantidad+'&nombre='+nombre+'&precioc='+precioc+'&preciop='+preciop,
            success: function(dato){
               Materialize.toast("Articulo agregado",4000,'');
               codigo = $("#buscacombop").val("");
               nombre = $("#buscacombonombre").val("");
               cantidad = $("#buscacombocantidad").val("");
               precioc = $("#buscacombocosto").val("");
               preciop = $("#buscacomboparcial").val("");
               $('#combosview').load("carros/carro_combo/view.php");
            }
         })
      }
   }

   function cargadatos(na){
      $("#busqueda").css({"display":"block"});
      $(".datos").html("<h5 class='btn green' style='text-transform:uppercase;'>"+na+"</h5><sup> (Esc para salir)</sup><div class='consultas'></div>");
      $.ajax({
         url: '../modulos/consultas.php',
         type: 'get',
         data: 'buscar='+na,
         success: function(dato){
            $(".consultas").html(dato);
         }
      });
   }
   
   function choose(dato,grupo,id_s){
      $("#"+grupo).val(dato);
      $("#"+grupo+"a").addClass("active");
      $("#oculto"+grupo).val(id_s);
      $("#busqueda").css({"display":"none"});
   }

   function preciocombo(){
      $("#buscacomboparcial").val(($("#buscacombocantidad").val()*$("#buscacombocosto").val()));
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
                  $("#"+na).val($("#newp").val());
                  $("#"+na+"a").addClass("active");
                  $("#busqueda").css({"display":"none"});
                  Materialize.toast('Registro Almacenado', 4000,'');
               }else{
                  alert("Error durante el registro, intente de nuevo");
               }
            }
         })
      }

      if($("#buscacombop").is(":focus") && (e.keyCode == 13)){
         na = $("#buscacombop").val();
         $.ajax({
            url: '../modulos/consultas.php',
            type: 'get',
            data: 'buscarcombop='+na+'&inventory=add',
            success: function(dato){
               if(dato=='no'){
                  alert("Codigo de barras no encontrado");
               }else{
                  s = dato.split("/");
                  $("#buscacombonombre").val(s[0]);
                  $("#buscacombocosto").val(s[1]);
                  $("#buscacombocantidad").val("");
                  $("#buscacomboparcial").val("");
                  $("#buscacombocantidad").focus();
               }
            }
         })
      }
   });

   function muestra(id){
      $(".p_1").css({"display":"none"});
      $("."+id).css({"display":"block"});
   }

   function ver(){
      d = $("#tipo").val();
      if(d==3){
         $(".combom").removeAttr("style");
         $("#cantminima").attr("readonly","");
         $("#preciocompra").attr("readonly","");
      }else{
         $(".combom").attr("style","display:none");
         $(".combo").attr("style","display:none");
         $("#cantminima").removeAttr("readonly");
         $("#preciocompra").removeAttr("readonly");
         $(".datos_basicos").removeAttr("style");
      }
   }

   function guardararticulos(){
      descart = $("#descart").val();
      codigoart = $("#codigoart").val();
      tipo = $("#tipo").val();
      ocultogrupos = $("#ocultogrupos").val();
      ocultomarcas = $("#ocultomarcas").val();
      preciocompra = $("#preciocompra").val();
      precioventa = $("#precioventa").val();
      porcentajeventa = $("#porcentajeventa").val();
      preciominimo = $("#preciominimo").val();
      porcentajeminimo = $("#porcentajeminimo").val();
      cantminima = $("#cantminima").val();
      ubicacion = $("#ubicacion").val();
      ocultobodegas = $("#ocultobodegas").val();
      notas = $("#notas").val();

      if(descart=='' || codigoart=='' || ocultogrupos=='' || ocultomarcas=='' || preciocompra=='' || precioventa=='' || preciominimo==''){
         alert("Existen campos sin completar");
      }else{
         $.ajax({
            url: '../modulos/consultas.php',
            type: 'get',
            data: 'guardararticulo=ok&cantminima='+cantminima+'&codigoart='+codigoart+'&descart='+descart+'&notas='+notas+'&precioventa='+precioventa+'&preciominimo='+preciominimo+'&tipo='+tipo+'&ocultogrupos='+ocultogrupos+'&ocultomarcas='+ocultomarcas+'&ocultobodegas='+ocultobodegas+'&ubicacion='+ubicacion+'&preciocompra='+preciocompra+'&porcentajeventa='+porcentajeventa+'&porcentajeminimo='+porcentajeminimo,
            success: function(dato){
               if(dato=="si"){
                  Materialize.toast('Articulo creado', 4000,'');
                  location.reload();
               }else if(dato=="existe"){
                  alert("El codigo de barras que ha indicado ya existe");
               }else{
                  Materialize.toast('Ha ocurrido un error', 4000,'');
               }
            }
         })
      }
   }

   function ganancia(precio,ganancia){
      compra = $("#preciocompra").val();
      pventa = $("#"+precio).val();
      total = ((pventa-compra)/compra)*100;
      $("#"+ganancia).val(total.toFixed(2));
   }

   $(document).ready(function(){
      $("#precioventa").blur(function(){
         preciov = $("#porcentajeventa").val();
         if(preciov < 0){
            alert("El Precio Sugerido debe ser mayor al Precio de Compra");
         }
      });

      $("#preciominimo").blur(function(){
         preciov = $("#porcentajeminimo").val();
         if(preciov < 0){
            alert("El Precio Minimo debe ser mayor al Precio de Compra");
         }
      });
   });

   function buscarpcombo(id){
      $("#busqueda").css("display","block");
      $(".datos").css("width","450px");
      $.ajax({
         url: '../modulos/consultas.php',
         type: 'get',
         data: 'buscarpcombo=ok',
         success: function(datos){
            $(".datos").html(datos);
         }
      })
   }

    function elegircombo(id){
      $("#busqueda").css({"display":"none"});
      $("#buscacombop").val(id);
      $("#buscacombopp").addClass("active");
    }
</script>
