



<style type="text/css" media="screen">
	/*.pdfButton {background-color: red !important; 		}
	.pdfButton:hover {font-size:15px;color: white;	border-color: white;}
	.excelButton {		background-color: green !important;		}
	.excelButton:hover {font-size:15px;color: white;	border-color: white;}
	.copyButton {		background-color: blue !important;		}
	.copyButton:hover {font-size:15px;color: white;	border-color: white;}
	.imprimirButton {		background-color: cyan !important;		color:white;		}
	.imprimirButton:hover {font-size:15px;color: white;	border-color: white;}*/
	th {
		white-space: nowrap;
		font-family: sans-serif;
	}

	#example {
		height: 50vh;
	}
</style>



<script type="text/javascript">
	$(document).ready(function() {
		document.title = 'Datos del Inventario';
		$('#example').DataTable({ //INICIALIZANDO  DATATABLE
			"lengthChange": true, //cantidad paginas
			"searching": true, //buscador
			"processing": true, //animacion
			"select": true, //marca
			"autoWidth": true, // ancho
			"pagingType": "full_numbers",
			"order": [
			[0, "desc"]
			], // orden
			"autoWidth": true,

			language: {
				buttons: {
					print: "IMPRIMIR",
					copyTitle: 'Copia Completada ',
					copySuccess: {
						_: 'se copiaron %d filas',
						"1": 'solo 1  linea'
					}
				},
				"decimal": "",
				"copyKeys": 'mensaj',
				"emptyTable": "No hay información",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
				"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
				"infoFiltered": "(Filtrado de _MAX_ total entradas)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Entradas",
				"loadingRecords": "Cargando... datos",
				"processing": "Procesando... datos",
				"search": "Buscar:",
				"zeroRecords": "No se encontro Informacion :(",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			},




			"buttons": [

				// badge badge-pill

				{
					extend: 'excel',
					className: 'excelButton btn-sm btn-outline-success '
				},
				{
					extend: 'pdf',
					className: 'pdfButton btn-sm btn-outline-danger '
				},
				{
					extend: 'print',
					className: 'imprimirButton btn-sm btn-outline-dark'
				}
				],




				"dom": '<"dt-buttons"Bf><"clear">lrtp'


			});
	});
</script>






<div class="card align-self-center">
	<table id="example" class="align-self-center table  table-bordered table-responsive" cellspacing="0" style="width:100%">
		
		<thead class="bg bg-primary text-white">
			<tr>
				<th>Rut</th>
				<th>Usuario</th>
				<th>Correo</th>
				<th>disponibilidad</th>
			</tr>
		</thead>
		<tbody>
			
			<?php foreach ($r as $qt): ?>
				<tr>
					<tD><?= $qt->RUT?></tD>
					<tD><?= $qt->NOMBRES?></tD>
					<tD><?= $qt->CORREOELECTRONICO?></tD>
					<?php if ($qt->DISPONIBILIDAD == "1"): ?>
						<td>si</td>	
						<?php else: ?>
							<td>no</td>		
						<?php endif ?>
						
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>

