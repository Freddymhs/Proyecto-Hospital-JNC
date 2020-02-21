

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
			<input class="form-control" id="dateMonitor"  readonly name="finarriendoMonitor" autocomplete="off" value="<?php echo set_value('finarriendoMonitor'); ?>" type="text"/>
			<button type="button" class="close " aria-label="Close" onclick="fM()">
				<span aria-hidden="true"><b>&times;</b></span>
			</button>
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
			<input class="form-control" id="datePC"  readonly name="finarriendoPC" autocomplete="off"  value="<?php echo set_value('finarriendoPC'); ?>" type="text"/>
			<button type="button" class="close " aria-label="Close" onclick="fP()">
				<span aria-hidden="true"><b>&times;</b></span>
			</button>
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
			<input class="form-control" id="dateImpresora"  readonly name="finarriendoImpresora" autocomplete="off"  value="<?php echo set_value('finarriendoImpresora'); ?>" type="text"/>
			<button type="button" class="close " aria-label="Close" onclick="fI()">
				<span aria-hidden="true"><b>&times;</b></span>
			</button>
		</div>
		<div class="input-group mb-3 input-group">
			<!-- formerrror -->
		</div>
	</div>
	<!-- x -->
</div>

