<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Roles</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			@include("conexion.php");

			$consulta = pg_query($conexion,"SELECT * FROM roles ORDER BY codigo");
			$n = 0;
			while($valores = pg_fetch_assoc($consulta)) {
				$n+=1;
		?>
				<tr>
					<td><?php echo $n; ?></td>
					<td><?php echo $valores["rol"]; ?></td>
					<td>
						<button type="button" class="btn btn-primary btn-xs" onclick="formularioeditar(<?php echo $valores["codigo"]; ?>);">
							<i class="glyphicon glyphicon-pencil"></i>
						</button>
						<button type="button" class="btn btn-danger btn-xs" onclick="eliminar(<?php echo $valores["codigo"]; ?>);">
							<i class="glyphicon glyphicon-trash"></i>
						</button>
					</td>
				</tr>
		<?php 
			}
		?>
	</tbody>
</table>