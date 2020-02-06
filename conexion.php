<?php 
	$conexion = pg_connect("host=localhost dbname=crud user=postgres password=root")
    or die('No se ha podido conectar: ' . pg_last_error());
?>