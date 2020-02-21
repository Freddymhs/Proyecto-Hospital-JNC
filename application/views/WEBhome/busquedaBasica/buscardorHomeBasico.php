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








<div class="card">
	<table id="example" class="align-self-center table  table-bordered table-responsive" cellspacing="0" style="width:100%">

		<thead class="bg bg-primary text-white">
			<tr>

				<th class="one border border border-dark">ID</th>  
				<th class="one border border border-dark border-right-0">Nombre Usuario</th>
				<th class="one border border border-dark border-left-0">Anexo</th>
				<th class="one border border border-dark">Unidad</th>
				<th class="one border border border-dark">IP v4</th>
				<th class="one border border border-dark border-right-0">Direccion - MAC </th>
				<th class="one border border border-dark border-right-0 border-left-0">Modelo Pc</th>
				<th class="one border border border-dark border-right-0 border-left-0">NETBIOS</th>
				<th class="one border border border-dark border-right-0 border-left-0">Fin Arriendo</th>
				<th class="one border border border-dark border-left-0">Serial PC</th>
				<th class="one border border border-dark border-right-0">Modelo Monitor</th>
				<th class="one border border border-dark border-right-0 border-left-0">Fin Arriendo</th>
				<th class="one border border border-dark border-left-0">Serial Monitor</th>
				<th class="one border border border-dark border-right-0">Modelo Impresora</th>
				<th class="one border border border-dark border-right-0 border-left-0">Fin Arriendo</th>
				<th class="one border border border-dark border-left-0">Serial Impresora</th>
				<th class="one border border border-dark border-right-0">Modelo UPS</th>
				<th class="one border border border-dark border-left-0">Serial UPS</th>
				<th class="one border border border-dark">Red</th>


			</tr>
		</thead>


		<tbody>

			<?php foreach ($r as $qt) : ?>
				<?php $rutaPerfilPC = base_url("index.php/controllerComputador/informacion/{$qt->SERIALCOMPUTADOR}"); ?>
				<?php $rutaPerfilMonitor = base_url("index.php/controllerMonitor/informacion/{$qt->SERIALMONITOR}"); ?>
				<?php $rutaPerfilImpresora = base_url("index.php/controllerImpresora/informacion/{$qt->SERIALIMPRESORA}"); ?>
				<?php $rutaPerfilUPS = base_url("index.php/controllerUps/informacion/{$qt->SERIALUPS}"); ?>
				<?php $UPDATEFILA = base_url("index.php/controllerInventarioHJNC/viewRow/{$qt->ID_INVENTARIO}"); ?>
				<tr>
					<td>
						<button type="button" class="btn btn-outline-white">
							<a class="btn-outline-white" href="<?= $UPDATEFILA ?>" type="text"><b><?= $qt->ID_INVENTARIO ?></b></a>
						</button>
					</td>
					<?php if (strlen($qt->NOMBRES) > 0) : ?>

						<?php if ($qt->dispEMpleados == 1): ?>
							<!-- xx -->
							<?php $ruta = base_url("index.php/controllerEmpleados/informacion/{$qt->RUT}");  ?>
							<td><?= $qt->NOMBRES ?></td>
							<!-- xx -->
							
							<?php else: ?>
								<?php if ($qt->dispEMpleados == 0): ?>
									<td >
										<a style="background-color: #ff6969" class=" bg rounded  text-white around" > <?= $qt->NOMBRES  ?></a>
									</td> 


								<?php endif ?>
							<?php endif ?>

							<?php else : ?>
								<td></td>
							<?php endif ?>

							<?php if (strlen($qt->NROANEXO) > 0) : ?>


								<?php if ($qt->dispTelefono == 1): ?>
									<td>
										<!-- x -->

										<?php $ruta = base_url("index.php/controllerTelefono/informacion/{$qt->NROANEXO}");  ?>
										<?= $qt->NROANEXO ?>
										<!-- x -->

									</td>

									<?php else: ?>
										<?php if ($qt->dispTelefono == 0): ?>
											<td >

												<a style="background-color: #ff6969" class=" bg rounded  text-white around" > <?= $qt->NROANEXO  ?></a>
											</td> 
										<?php endif ?>
									<?php endif ?>


									<?php else : ?>
										<td></td>
									<?php endif ?>


									<td><?= $qt->NOMBREUNIDAD ?></td>
									<td><?= $qt->DIRECCIONIPV4 ?></td>
									<td><?= $qt->DIRECCIONMAC ?></td>

									<?php if (strlen($qt->MODELOCOMP) > 0) : ?>
										<!-- //kz -->
										<td><?= $qt->MODELOCOMP ?></td>
										<?php else : ?>
											<td></td>

										<?php endif ?>
										<td><?= $qt->NETBIOS ?></td> <!-- done -->



										<?php if ($qt->FINARRIENDOPC != "0000-00-00" && $qt->FINARRIENDOPC  != "") : ?>

											<td> <?= $qt->FINARRIENDOPC  ?> </td>
											<?php else : ?>
												<td>N/A</td>

											<?php endif ?>
											<?php if (strlen($qt->SERIALCOMPUTADOR) > 0) : ?>

												<td> 

													<?php if ($qt->dispPC == 1): ?>
														<?= $qt->SERIALCOMPUTADOR ?> 
														<?php else: ?>
															<?php if ($qt->dispPC == 0): ?>

																<a  style="background-color: #ff6969" class=" bg rounded  text-white around" > <?= $qt->SERIALCOMPUTADOR  ?></a>

															<?php endif ?>
														<?php endif ?>

													</td>
													<?php else : ?>
														<td></td>
													<?php endif ?>



													<?php if ($qt->MODELOMON != null || strlen($qt->MODELOMON) > 0) : ?>
														<td><?= $qt->MODELOMON ?></td>
														<?php else : ?>
															<td></td>
														<?php endif ?>




														<?php if ($qt->FINARRIENDOMONITOR != "0000-00-00" && $qt->FINARRIENDOMONITOR  != "") : ?>
															<td><?= $qt->FINARRIENDOMONITOR ?></td>
															<?php else : ?>
																<td>N/A </td>
															<?php endif ?>


															<?php if ($qt->SERIALMONITOR != null  && $qt->SERIALMONITOR  != "") : ?>


																<?php if ($qt->dispMonitor == 1): ?>
																	<td><?= $qt->SERIALMONITOR ?> </td>

																	<?php else: ?>
																		<?php if ($qt->dispMonitor == 0): ?>

																			<td> 


																				<a  style="background-color: #ff6969" class=" bg rounded  text-white around" > <?= $qt->SERIALMONITOR  ?></a>

																			</td>

																		<?php endif ?>

																	<?php endif ?>




																	<?php else : ?>
																		<td></td>

																	<?php endif ?>



																	<?php if ($qt->MODELOIMP != null 	||  strlen($qt->MODELOIMP) > 0) : ?>
																		<td><?= $qt->MODELOIMP ?></td>
																		<?php else : ?>
																			<td></td>

																		<?php endif ?>



																		<?php if ($qt->FINARRIENDOIMP != "0000-00-00" && $qt->FINARRIENDOIMP  != "") : ?>

																			<td> <?= $qt->FINARRIENDOIMP ?> </td>

																			<?php else : ?>

																				<td> N/A</td>

																			<?php endif ?>
																			<?php if ($qt->SERIALIMPRESORA  != null) : ?>
																				<?php if ($qt->disIMPR == 1): ?>
																					<td><?= $qt->SERIALIMPRESORA ?></td>
																					<?php else: ?>
																						<?php if ($qt->disIMPR == 0): ?>
																							<td>
																								<a    style="background-color: #ff6969" class=" bg rounded  text-white around" > <?= $qt->SERIALIMPRESORA  ?></a>
																							</td>

																						<?php endif ?>
																					<?php endif ?>
																					<?php else : ?>
																						<td></td>
																					<?php endif ?>



																					<?php if ($qt->MODELOUPS  != null) : ?>
																						<td><?= $qt->MODELOUPS ?></td>
																						<?php else : ?>
																							<td></td>
																						<?php endif ?>

																						<?php if (strlen($qt->SERIALUPS) > 0) : ?>


																							<?php if ($qt->disUPS == 1): ?>
																								<td> <?= $qt->SERIALUPS ?></td>
																								<?php else: ?>
																									<?php if ($qt->disUPS == 0): ?>
																										<td> 

																											<a   style="background-color: #ff6969" class=" bg rounded  text-white around" > <?= $qt->SERIALUPS  ?></a>
																										</td>
																									<?php endif ?>
																								<?php endif ?>

																								<?php else : ?>
																									<td></td>
																								<?php endif ?>


																								<td><?= $qt->RED ?></td>
																							</tr>
																						<?php endforeach ?>
																					</tbody>
																				</table>

																			</div>