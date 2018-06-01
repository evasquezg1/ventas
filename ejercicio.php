<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Creando un menu contextual mediante jQuery | Web.Ontuts</title>
	<style type="text/css">
		@CHARSET "UTF-8";
/*
Author: Adrian Mato
Author URI: http://www.yensdesign.com & http://web.ontuts.com
*/

/******* GENERAL RESET *******/
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em,
font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody,
 tfoot, thead, tr, th, td {
border:0pt none;
font-family:inherit;
font-size:100%;
font-style:inherit;
font-weight:inherit;
margin:0pt;
padding:0pt;
vertical-align:baseline;
}
body{
	line-height: 1em;
	font-size: 12px;
	background: #262626 url(img/bg.png) repeat scroll 0 0;
	font-family: Myriad Pro, Arial, Helvetica, sans-serif;
	margin: 0pt;
	cursor: default;
}
table{
	border-collapse: separate;
	border-spacing: 0pt;
}
strong{
	font-weight: 700;
}
caption, th, td{
	font-weight:normal;
	text-align:left;
}
blockquote:before, blockquote:after, q:before, q:after{
	content:"";
}
blockquote, q{
	quotes:"" "";
}
pre{
	font-family: Arial, Helvetica, sans-serif;
}
input{
	border: 0;
	margin: 0;
	font-family: Arial, Helvetica, sans-serif;
}
textarea{
	font-family: Arial, Helvetica, sans-serif;
	color: #888888;
	padding: 7px 3px 0 4px;
	font-size: 11px;
}
select{
	font-size: 11px;
	color: #888888;
	background: #fff;
	font-family: Arial, Helvetica, sans-serif;
	border: 1px solid #CAD2CE;
}
ul{
	list-style: none;
	list-style-type: none;
	list-style-position: outside;
}
a{
	cursor: pointer;
	color: #296ba5;
	text-decoration: none;
	outline: none !Important;
}
html,body{
	height:100%;
}
.clear{
	clear: both;
	height: 0;
	visibility: hidden;
	display: block;
	line-height: 0;
}
.clearfix{
	overflow: hidden;
}
.fleft{
	float: left;
}
.fright{
	float: right;
}
.italic{
	font-style: italic;
}
/******* /GENERAL RESET *******/

/******* CONTENT *******/
.wrapper{
	width: 800px;
	margin: 0pt auto;
	padding-top: 50px;
}
h1{
	color: #fff;
	font-size: 18px;
	line-height: 3em;
}
.section{
	margin-bottom: 25px;
}
/******* /CONTENT *******/

/******* MENU *******/
#menu{
	display: none;
	width: 165px;
	padding: 6px;
	background: #171717;
	border: 1px solid #3e3e3e;
	border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
	position: absolute;
}
#menu ul{
	font-family: Tahoma, Arial, Helvetica, sans-serif;
	color: #6d6d6d;
	background: #fff;
	border: 1px solid #171717;
	border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
}
#menu ul li{
	line-height: 1.5em;
	padding: 5px 5px 5px 25px;
	font-size: 11px;
	border-bottom: 1px solid #fff;
	border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
}
#menu ul li:hover{
	background-color: #fff8cc;
	border-bottom: 1px solid #ffe222;
	color: #000;
	cursor: pointer;
}
#menu ul li a{
	color: #6d6d6d;
	display: block;
}
#menu ul li.disabled, #menu ul li.disabled a{
	color: #bbbbbb;
	cursor: default;
}
#menu ul li.disabled:hover{
	background: #fff;
	border-bottom: 1px solid #fff;
}
#menu ul li{
	background-position: 3px 6px;
	background-repeat: no-repeat;
}
#menu ul li#menu_anterior{
	background-image: url(img/anterior.png);
}
#menu ul li#menu_recargar{
	background-image: url(img/refresh.png);
}
#menu ul li#menu_web{
	background-position: 3px 5px;
	background-image: url(img/web.png);
}
#menu ul li#menu_favoritos{
	background-image: url(img/fav.png);
}
/******* /MENU *******/
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="section">
			<h1>Utiliza el boton derecho del ratón para activar el menú contextual</h1>
		</div>
	</div>
	
	<div id="menu">
		<ul>
			<li id="menu_anterior">Anterior</li>
			<li id="menu_siguiente" class="disabled">Siguiente</li>
			<li id="menu_recargar">Recargar</li>
			<li id="menu_web"><a href="http://web.ontuts.com">Visitar web.ontuts</a></li>
			<li id="menu_favoritos">Agregar a favoritos...</li>
		</ul>
	</div>
	
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript">
		$(document).bind("contextmenu", function(e){
			//variables de control
var menuId = "menu";
var menu = $("#"+menuId);

//Control sobre las opciones del menu contextual
menu.click(function(e){
	//si la opcion esta desactivado, no pasa nada
	if(e.target.className == "disabled"){
		return false;
	}
	//si esta activada, gestionamos cada una y sus acciones
	else{
		switch(e.target.id){
			case "menu_anterior":
				history.back(-1);
				break;
			case "menu_siguiente":
				alert("ha seleccionado siguiente");
				break;
			case "menu_recargar":
				document.location.reload();
				break;
			case "menu_favoritos":
				var title = "Tutoriales de Desarrollo y Diseño Web | Web.Ontuts";
				var url = "http://web.ontuts.com";
				//para firefox
				if(window.sidebar)
					window.sidebar.addPanel(title, url, "");
				//para Internet Explorer
				else if(window.external)
					window.external.AddFavorite(url, title);
				break;
		}
		menu.css("display", "none");
	}
});
		});
	</script>
	<script>
window.oncontextmenu = function() {
return false;
} </script>
</body>
</html>