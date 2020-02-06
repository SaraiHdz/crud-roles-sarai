<?php 
	include("conexion.php");

	$case = $_REQUEST["case"];
	switch ($case) {
		case 'AGREGAR-ROL':
			$rol = $_POST["modalTxtRol"];
			$agregar = pg_query($conexion,"INSERT INTO roles (rol) VALUES ('$rol')");
			echo "1";
		break;

		case 'EDITAR-ROL':
			$codigo = $_POST["modalEditarTxtCodigo"];
			$rol = $_POST["modalEditarTxtRol"];
			$editar = pg_query($conexion,"UPDATE roles SET rol='$rol' WHERE codigo=$codigo");
			echo "1";
		break;

		case 'ELIMINAR-ROL':
			$codigo = $_POST["codigo"];
			$eliminar = pg_query($conexion,"DELETE FROM roles WHERE codigo=$codigo");
			echo "1";
		break;
		
		default:
			# code...
		break;
	}
?>