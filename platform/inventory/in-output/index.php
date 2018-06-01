<div class="row">
	<div class="col s12 m12 l12">
		<div class="card-panel z-depth-2">
			<?php 
				include("../../../modulos/funciones.php");
				echo rutas("Entradas y Salidas (Ajuste Inventario)");
			?>
			<div class="row">
				<div class="input-field col s2 m1 l1">
					Fecha:
				</div>
				<div class="input-field col s4 m2 l2 #4fc3f7 light-blue lighten-2 bck">
					<?php echo date("Y-m-d"); ?>
				</div>
				<div class="input-field col s2 m1 l1 offset-s2 offset-m1 offset-l2">
					N&uacute;mero:
				</div>
				<div class="input-field col s1 m1 l1 offset-s1 #4fc3f7 light-blue lighten-2 bck">
					<?php echo obtener_auto('movimientosinventario') ?>
				</div>
				<div class="input-field col s3 m1 l1 offset-m1 offset-l2">
					Acci&oacute;n #:
				</div>
				<div class="input-field col s4 m2 l1 #4fc3f7 light-blue lighten-2 bck">
					<?php echo genera_codigofactura('6','movimientosinventario','cod_movi'); ?>
				</div>
			</div>
			<div class="row"><br>
				<div class="input-field col s12 l4">
					<i class="fa fa-comments prefix"></i>
					<input type="text" name="nota" id="nota">
					<label class="">Notas</label>
				</div>
			</div>
			<div class="row">
                <div class="input-field col s4 m2 l2">
                   <i class="fa fa-search prefix" style="font-size:23px;" onclick="buscarpcombo('buscacombop')"></i>
                   <input type="text" id="buscacombop" autofocus autocomplete="off">
                   <label class="" id="buscacombopp">Codigo</label>
                </div>
                <div class="input-field col s4 m2 l3">
                   <input type="text" id="desccomercial" readonly>
                   <label class="active">Descripci&oacute;n Comercial</label>
                </div>
                <div class="input-field col s4 m2 l1">
                    <select onchange="tipo_inv()" id="tipo_inv">
                    	<option value="in" selected>ENTRADA</option>
                    	<option value="out">SALIDA</option>
                    </select>
                    <label class="">Tipo</label>
                </div>
                <div class="input-field col s4 m2 l2" id="entrada">
                    <select id="entradai">
                    	<option value="Sobrantes">Sobrantes</option>
                    	<option value="Promocion">Promoci&oacute;n</option>
                    	<option value="Donacion">Donaci&oacute;n</option>
                    	<option value="Inventario_Inicial">Inventario Inicial</option>
                    	<option value="Traslado">Traslado</option>
                    </select>
                    <label class="">Concepto</label>
                </div>
                <div class="input-field col s4 m2 l2" id="salida" style="display:none;">
                    <select id="salidai">
                    	<option value="Faltantes">Faltantes</option>
                    	<option value="Perdidas">Perdidas</option>
                    	<option value="Vencimientos">Vencimientos</option>
                    	<option value="Consumo">Consumo</option>
                    	<option value="Inventario_Inicial">Inventario Inicial</option>
                    	<option value="Traslado">Traslado</option>
                    	<option value="Costo_Consumo">Costo consumo</option>
                    	<option value="Gasto_Consumo">Gasto consumo</option>
                    	<option value="Otro">Otro</option>
                    </select>
                    <label class="">Concepto</label>
                </div>
                <div class="input-field col s4 m1 l1">
                	<input type="text" id="cantidad" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                    <label class="active">Cantidad</label>
                </div>
                <div class="input-field col s4 m1 l1">
                	<input type="text" id="existencia" readonly>
                    <label class="active">Existencia</label>
                </div>
                <div class="input-field col s4 m1 l1">
                	<input type="text" id="nuevaexis" readonly>
                    <label class="active">Nueva Exis.</label>
                </div>
                <div class="col s1 l1">
                    <a class="btn green" onclick="agregar();"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <div class="row">
            	<div class="col s12 l11" id="ajuste">
            		<script type="text/javascript">
            			$("#ajuste").load("carros/carro_ajusteinv/view.php");
            		</script>
            	</div>
              <div class="col s12 l1"><br>
                <a class="btn red" id="elimina_art_combo"><i class="fa fa-trash"></i></a>
              </div>
            </div>
            <div class="row">
            	<div class="col s12 l2 offset-l10">
            		<a class="btn btn-success green" onclick="save_inventory()"><i class="fa fa-save"></i> Guardar</a>
            	</div>
            </div>
		</div>
	</div>
</div>

<script type="text/javascript">
	   $('select').material_select();

	   var controladorTiempo = "";

	   function tipo_inv(){
	   	tipo = $("#tipo_inv").val();
	   	clearTimeout(controladorTiempo);
    	controladorTiempo = setTimeout(nuevacantidad, 250);
	   	if(tipo=='in'){
	   		$("#entrada").css("display","block");
	   		$("#salida").css("display","none");
	   	}else if(tipo=='out'){
	   		$("#entrada").css("display","none");
	   		$("#salida").css("display","block");
	   	}
	   }

	$(document).keyup(function(e){
		if($("#buscacombop").is(":focus") && (e.keyCode == 13)){
         na = $("#buscacombop").val();
         $.ajax({
            url: '../modulos/consultas.php',
            type: 'get',
            data: 'buscarcombop='+na+'&inventory=inout',
            success: function(dato){
               if(dato=='no'){
                  alert("Codigo de barras no encontrado o producto es de tipo combo");
               }else{
                  s = dato.split("/");
                  $("#desccomercial").val(s[0]);
                  $("#existencia").val(s[1]);
                  $("#cantidad").val("");
                  $("#cantidad").focus();
                  $("#nuevaexis").val("");
               }
            }
         })
      	}
	})

	$("#cantidad").on("keyup", function() {
    	clearTimeout(controladorTiempo);
    	controladorTiempo = setTimeout(nuevacantidad, 250);
	});

	function nuevacantidad(){
		cant = parseInt($("#cantidad").val());
		existencia = parseInt($("#existencia").val());
		if($("#tipo_inv").val()=='in'){
			total = (cant+existencia);
		}else if($("#tipo_inv").val()=='out'){
			total = (existencia-cant);
			if(total<0){
				alert("La cantidad digitada es mayor a la existencia");
				$("#cantidad").val($("#existencia").val());
				total = parseInt($("#cantidad").val())-parseInt($("#existencia").val());
			}
		}
		$("#nuevaexis").val(total);
	}

  function agregar(){
      codigo = $("#buscacombop").val();
      nombre = $("#desccomercial").val();
      tipo = $("#tipo_inv").val();
      concepto = (tipo=='in') ? 'entradai' : 'salidai';
      conceptoi = $("#"+concepto).val();
      cantidad = $("#cantidad").val();
      existencia = $("#existencia").val();
      nuevaexis = $("#nuevaexis").val();
      if(codigo=='' || nombre=='' || cantidad=='' || cantidad<=0){
         alert("Existen valores incorrectos o campos vacios");
      }else{
         $.ajax({
            url: 'carros/carro_ajusteinv/add.php',
            type: 'get',
            data: 'id='+codigo+'&cantidad='+cantidad+'&nombre='+nombre+'&tipo='+tipo+'&concepto='+conceptoi+'&existencia='+existencia+'&nuevaexis='+nuevaexis,
            success: function(dato){
               Materialize.toast("Articulo agregado",4000,'');
               $("#buscacombop").val("");
               $("#desccomercial").val("");
               $('#ajuste').load("carros/carro_ajusteinv/view.php");
            }
         })
      }
   }

   function save_inventory(){
    cf = $("#cf").val();
    nota = $("#nota").val();
    $.ajax({
      url: '../modulos/consultas.php',
      type: 'get',
      data: 'save_inventory=ok&cf='+cf+'&nota='+nota,
      success: function(dato){
        if(dato=='si'){
          Materialize.toast("Inventario modificado",4000,'');
          location.reload();
        }else{
          alert(dato);
        }
      }
    })
   }
</script>