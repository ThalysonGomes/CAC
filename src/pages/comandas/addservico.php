<?php 
require '../../db/Conn.class.php';
require '../../db/Read.class.php';

$CodRandom = rand(5,100);
?>
<div class="form-group text-dark" id="<?= $CodRandom ?>">
	<div class="row">
		<div class="col-xl-4">
			<label>Serviço</label>
			<select onchange="loadprofser(this, 'prof<?= $CodRandom ?>');$('#valor<?=$CodRandom?>').val($(this).val().split('|')[1])" class="form-control" id="adserv<?= $CodRandom ?>">
				<option value=""></option>
				<?php  
				
				$Read = new Read;
				$Tabela = "categorias";
				$Colunas = "id, nome";
				$Where = "Where ativo = :ativo";
				$Valores = "ativo=true";
				$Read->setRead($Tabela, $Colunas, $Where, $Valores);
				foreach ($Read->getResultado() as $key) {
					echo "<optgroup label='{$key['nome']}'>";
					$Read2 = new Read;
					$Tabela2 = "servicos";
					$Colunas2 = "id, nome, valor::numeric::float as valor";
					$Where2 = "Where categoria = :categ and ativo = :ativoser";
					$Valores2 = "categ={$key['id']}&ativoser=true";
					$Read2->setRead($Tabela2, $Colunas2, $Where2, $Valores2);
					foreach ($Read2->getResultado() as $key2) {
						echo "<option value='{$key2['id']}|{$key2['valor']}'>{$key2['nome']}</option>";
					}
					echo "</optgroup>";
				}
				?>
			</select>
		</div>
		<div class="col-xl-3">
			<label>Profissional</label>
			<select class="form-control" id="prof<?= $CodRandom ?>"></select>
		</div>
		<div class="col-xl-3">
			<label>Valor</label>
			<input type="text" id="valor<?= $CodRandom ?>" class="form-control">
		</div>
		<div class="col-xl-2" style="margin-top: 2.8%">
			<button onclick="salvaradserv(<?= $CodRandom ?>)" class="btn btn-success"><i class="fa fa-save"></i></button>
			<button onclick="$('#'+<?= $CodRandom ?>).remove()" class="btn btn-danger"><i class="fa fa-trash"></i></button>
		</div>
	</div>
</div>