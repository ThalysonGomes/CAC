<?php
$Cod = $_POST['cod'];
$Tp = $_POST['tipo'];
?>
<div class="col-xl-12" id="cartao<?= $Cod ?>">
	<hr>
	<div class="row">
		<div class="col-xl-4">
			<select class="form-control" ng="bandeira" id="bandeira$<?= $R ?>">
				<option>ELO</option>
				<option>Mastercard</option>
				<option>Visa</option>
			</select>
		</div>
		<?php 
		if($Tp == 2){
			?>
			<div class="col-xl-4">
				<select class="form-control" ng="parcelas" id="parcelas$<?= $R ?>">
					<?php 
					for ($i=1; $i < 13; $i++) { 
						echo "<option value='{$i}'>{$i}X</option>";
					}
					?>
				</select>
			</div>
			<?php 
		} 
		?>
	</div>
</div>