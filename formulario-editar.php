<?php 
	@include("conexion.php");
	$codigo = $_POST["codigo"];
	$consulta = pg_query($conexion,"SELECT * FROM roles WHERE codigo=$codigo");
	$valores = pg_fetch_assoc($consulta);
?>
	<form id="frmEditarRol">
		<input type="hidden" name="modalEditarTxtCodigo" value="<?php echo $valores['codigo']; ?>">
		<div class="modal fade" id="modalEditarRol" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismisss="modal">&times;</button>
						<h4 class="modal-title">Editar <?php echo $valores["rol"]; ?></h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Nombre del Rol:</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
										<input type="text" name="modalEditarTxtRol" id="modalEditarTxtRol" class="form-control" placeholder="Ingrese el nombre del rol..." value="<?php echo $valores['rol']; ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" onclick="editar();">
							<i class="glyphicon glyphicon-floppy-disk"></i> Guardar
						</button>
						<button type="button" class="btn btn-default" onclick="$('#frmEditarRol').trigger('reset');" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>
	</form>