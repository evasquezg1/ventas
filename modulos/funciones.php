<?php 
    include("conn.php");
	function rutas($title){
		echo '<div class="row">'
    		.'<div class="col s12 m12 l12">'
        	.'<h5 class="breadcrumbs-title">'.$title.'</h5>'
    		  .'</div>'
			 .'</div>';
	}

    function estado($d,$id,$tabla){
        if($d=='1'){
            echo '<a onclick="estadom(&#39;0&#39;,&#39;'.$id.'&#39;,&#39;'.$tabla.'&#39;)"><span class="task-cat green" style="cursor:pointer;">Activo</span></a>';
        }else if($d==0){
            echo '<a onclick="estadom(&#39;1&#39;,&#39;'.$id.'&#39;,&#39;'.$tabla.'&#39;)"><span class="task-cat red" style="cursor:pointer;">Inactivo</span></a>';
        }
    }

    function reemplazar($valor,$tipo){
        $search = array("Á","É","Í","Ó","Ú","á","é","í","ó","ú","ñ","Ñ");
        $replace = array("&Aacute;","&Eacute;","&Iacute;","&Oacute;","&Uacute;","&Aacute;","&Eacute;","&Iacute;","&Oacute;","&Uacute;","&Ntilde;","&Ntilde;");
        if($tipo==1){
            return $dev = str_replace($search,$replace,$valor);
        }else if($tipo==2){
            return $dev = str_replace($replaces,$search,$valor);
        }
    }

    function estado_b($estado){
        if($estado==1){
            echo '<span class="task-cat green" style="cursor:pointer;">Activo</span>';
        }else{
            echo '<span class="task-cat red" style="cursor:pointer;">Inactivo</span>';
        }
    }

    function obtener_auto($tabla){
        $busqueda = mysql_query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA='sofpos' AND TABLE_NAME='$tabla'");
        $row = mysql_fetch_array($busqueda);
        return $row['AUTO_INCREMENT'];
    }
    function tipo_art($tipo){
        if($tipo==1){
            echo '<span class="task-cat orange">Producto</span>';
        }else if($tipo==2){
            echo '<span class="task-cat blue">Servicio</span>';
        }else{
            echo '<span class="task-cat purple">Combo</span>';
        }
    }

    function genera_codigofactura($longitud,$tabla,$campo){
        $cadena = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $longitudCadena=strlen($cadena);
     
        do{
            $cf = "";
            $longitudPass=$longitud;
     
            for($i=1 ; $i<=$longitudPass ; $i++){
                $pos=rand(0,$longitudCadena-1);
                $cf .= substr($cadena,$pos,1);
            }

            $d = mysql_query("SELECT $campo FROM $tabla WHERE $campo='$cf'");
            $row = mysql_num_rows($d);
        }while($row>0);

        return $cf.'<input type="hidden" name="cf" value="'.$cf.'" id="cf">';
    }
?>