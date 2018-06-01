<?php 
	define('DB_USER','root');
	define('DB_SERVER','localhost');
	define('DB_PWD','');
	define('DB_NAME','sofpos');

	$con = mysql_connect(DB_SERVER,DB_USER,DB_PWD);
	mysql_select_db(DB_NAME,$con);
?>