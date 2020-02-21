

<!-- fin script -->
<div class="row" > 
	<!-- x -->
	<div class="col-12 bg-primary text-white align-self-center" >
		<p class="align-self-center" style="font-size: 15px;"><b>Fecha Final Arriendo Equipos</b></p>	
	</div>
	
	<div class="col-4">
		
		<div class="input-group mb-3 input-group">
			<div class="input-group-prepend">
				<div class="input-group-text">Monitor</div>
			</div>
			
			<?php if (isset($DATOSMINITOR[0]->FINARRIENDOMONITOR)): ?>
				<input  type="text" name="finarriendoMonitor" id="dateMonitor"  class="form-control" value="<?= null !=(set_value('finarriendoMonitor'))? set_value('finarriendoMonitor') : $DATOSMINITOR[0]->FINARRIENDOMONITOR?>">
				<button type="button" class="close " aria-label="Close" onclick="fM()">
					<span aria-hidden="true"><b>&times;</b></span>
				</button>
				<?php else: ?>
					<input  type="text" name="finarriendoMonitor" id="dateMonitor"  class="form-control" value="<?= null !=(set_value('finarriendoMonitor'))? set_value('finarriendoMonitor') : '' ?>">					
					<button type="button" class="close " aria-label="Close" onclick="fM()">
						<span aria-hidden="true"><b>&times;</b></span>
					</button>
				<?php endif ?>
			</div>
			<div class="input-group mb-3 input-group">
				<!-- formerrror -->
			</div>
		</div>
		<!-- x -->
		<div class="col-4">
			
			<div class="input-group mb-3 input-group">
				<div class="input-group-prepend">
					<div class="input-group-text">Computador</div>
				</div>

				<?php if ( isset($DATOSPC[0]->FINARRIENDOPC)): ?>
					<input  type="text" name="finarriendoPC" id="datePC"  class="form-control" value="<?= null !=(set_value('finarriendoPC'))? set_value('finarriendoPC') : $DATOSPC[0]->FINARRIENDOPC?>">
					<button type="button" class="close " aria-label="Close" onclick="fP()">
						<span aria-hidden="true"><b>&times;</b></span>
					</button>
					<?php else: ?>
						<input  type="text" name="finarriendoPC" id="datePC"  class="form-control" value="<?= null !=(set_value('finarriendoPC'))? set_value('finarriendoPC') : '' ?>">					
						<button type="button" class="close " aria-label="Close" onclick="fP()">
							<span aria-hidden="true"><b>&times;</b></span>
						</button>
					<?php endif ?>

				</div>
				<div class="input-group mb-3 input-group">
					<!-- formerrror -->
				</div>
			</div>
			<div class="col-4">
				
				<div class="input-group mb-3 input-group">
					<div class="input-group-prepend">
						<div class="input-group-text">Impresora</div>
					</div>

					<?php if (isset($DATOSIMP[0]->FINARRIENDOIMP)): ?>
						<input  type="text" name="finarriendoImpresora" id="dateImpresora"  class="form-control" autocomplete="off" value="<?= null !=(set_value('finarriendoImpresora'))? set_value('finarriendoImpresora') : $DATOSIMP[0]->FINARRIENDOIMP?>">
						<button type="button" class="close " aria-label="Close" onclick="fI()">
							<span aria-hidden="true"><b>&times;</b></span>
						</button>
						<?php else: ?>
							<input  type="text" name="finarriendoImpresora" id="dateImpresora"  class="form-control" autocomplete="off" value="<?= null !=(set_value('finarriendoImpresora'))? set_value('finarriendoImpresora') : ''?>">
							<button type="button" class="close " aria-label="Close" onclick="fI()">
								<span aria-hidden="true"><b>&times;</b></span>
							</button>
						<?php endif ?>
					</div>
					<div class="input-group mb-3 input-group">
						<!-- formerrror -->
					</div>
				</div>
				<!-- x -->
			</div>

