<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD Roles</title>
	<link href="librerias/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-8 col-md-2">
				<button type="button" class="btn btn-primary btn-block" onclick="$('#modalAgregarRol').modal({backdrop:false});">
					<i class="glyphicon glyphicon-plus"></i> Nuevo Rol
				</button>
			</div>
		</div>
		<div class="table-responsive">
			<div id="divConsultarRoles">
				
			</div>
		</div>
	</div>

	<form id="frmAgregarRol">
		<div class="modal fade" id="modalAgregarRol" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismisss="modal">&times;</button>
						<h4 class="modal-title">Agregar Nuevo Rol</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Nombre del Rol:</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
										<input type="text" name="modalTxtRol" id="modalTxtRol" class="form-control" placeholder="Ingrese el nombre del rol...">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" onclick="agregar();">
							<i class="glyphicon glyphicon-plus"></i> Agregar
						</button>
						<button type="button" class="btn btn-default" onclick="$('#frmAgregarRol').trigger('reset');" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<div id="divFormularioEditar"></div>
</body>
    <script src="librerias/js/jquery-1.11.3.min.js"></script>
    <script src="librerias/js/bootstrap.min.js"></script>
    <script>
    	window.onload = consultar();

    	let chk = (inp) => ($(`#${inp}`).val()==''||$(`#${inp}`).val()==0?0:1);

		function consultar() {
	        var url = 'tablaroles.php';
	        $.ajax({
	          	type: "POST",
	          	url: url,
	          	data:{x:'x'},
	          	success: function (data){
	            	$("#divConsultarRoles").html(data);
	          	}
	        });	
		}

		function agregar() {
			if(chk('modalTxtRol')=='') {
				alert("Ingrese el nombre del rol");
			} else {
		        var url = 'crud.php?case=AGREGAR-ROL';
		        $.ajax({
		          	type: "POST",
	          		url: url,          
		          	data:$('#frmAgregarRol').serialize(),
		          	success: function (data){
		          		if(data==1) {
		          			$('#modalAgregarRol').modal("hide");
		          			$('#frmAgregarRol').trigger("reset");
			          		consultar();		          			
		          		} else {
		          			//alert(data);
		          		}
		          	}
		        });			
			}
		}

		function formularioeditar(codigo) {
	        var url = 'formulario-editar.php';
	        $.ajax({
	          	type: "POST",
          		url: url,          
	          	data:{codigo:codigo},
	          	success: function (data){
	          		$('#divFormularioEditar').html(data);
	          		$('#modalEditarRol').modal("show");
	          	}
	        });				
		}

		function editar() {
			if(chk('modalEditarTxtRol')=='') {
				alert("Ingrese el nombre del rol");
			} else {
		        var url = 'crud.php?case=EDITAR-ROL';
		        $.ajax({
		          	type: "POST",
	          		url: url,          
		          	data:$('#frmEditarRol').serialize(),
		          	success: function (data){
		          		if(data==1) {
		          			$('#modalEditarRol').modal("hide");
		          			$('#frmEditarRol').trigger("reset");
			          		consultar();		          			
		          		} else {

		          		}
		          	}
		        });			
			}
		}

		function eliminar(codigo) {
			let aviso = confirm("¿Está seguro que desea eliminar este rol?");
			if(aviso) {
		        var url = 'crud.php?case=ELIMINAR-ROL';
		        $.ajax({
		          	type: "POST",
	          		url: url,          
		          	data:{
		          		codigo: codigo
		          	},
		          	success: function (data){
		          		if(data==1) {
			          		consultar();		          			
		          		} else {

		          		}
		          	}
		        });
		    } else {
		    }
		}
    </script>
</html>