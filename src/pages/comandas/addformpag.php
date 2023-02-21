<?php  
$R = rand(4, 1000);
?>
<div class="row" id="<?= $R ?>">
	<div class="col-xl-4">
		<select ng="formpag" cr="<?= $R ?>" onchange="validaformcard()" class="form-control">
			<?php  
			require '../../db/Conn.class.php';
			require '../../db/Read.class.php';
			$Read = new Read;
			$Tabela = "tipopagamento";
			$Colunas = "id, nome";
			$Read->SetRead($Tabela, $Colunas);
			foreach ($Read->getResultado() as $key) {
				echo "<option value='{$key['id']}'>{$key['nome']}</option>";
			}
			?>
		</select>
	</div>
	<div class="col-xl-3">
		<input type="text" ng="descontopag" class="form-control" placeholder="Desconto %">
	</div>
	<div class="col-xl-3">
		<input type="text" ng="valorpag" class="form-control" placeholder="Valor">
	</div>
	<div class="col-xl-2">
		<button class="btn btn-primary" onclick="addformpag()"><i class="fa fa-plus"></i></button>
		<button class="btn btn-danger" onclick="$('#<?= $R ?>').remove()"><i class="fa fa-trash"></i></button>
	</div>
</div>
<hr>
<script>
	function validaformcard() {
		$('#cartao<?= $R ?>').remove()
		for (i = 0; i < $('select[ng="formpag"][cr="<?= $R ?>"]').length; i++) {
			var inps = $('select[ng="formpag"][cr="<?= $R ?>"]')[i];
			if($(inps).val() == 2 || $(inps).val() == 3){
				$.post("src/pages/comandas/formcard.php", {cod: '<?= $R ?>', 'tipo': $(inps).val()}, function(data){
					$('#<?= $R ?>').append(data)
				});
				
			}
			else{
				$('#cartao<?= $R ?>').remove()
			}
		}
	}
</script>