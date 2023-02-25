<div class="row">
	<div class="col-xl-3">
		<div id="datadia"></div>
	</div>
	<div class="col-xl-9" style="height: 250px;overflow: auto;">
		<ul class="list-group list-group-numbered">
			<?php 
			require '../../db/Conn.class.php';
			require '../../db/Read.class.php';
			if(!empty($_POST['data'])){
				$Data = $_POST['data'];
			}
			else{
				$Data = date('d/m/Y');
			}
			$Read = new Read;
			$Tabela = "tipopagamento";
			$Colunas = "id, nome";
			$Read->SetRead($Tabela, $Colunas);
			foreach($Read->getResultado() as $key){
				if($key['id'] == 2 or $key['id'] == 3){
					?>
					<li class="list-group-item">
						<div class="ms-2 me-auto">
							<?= $key['nome']; ?>
						</div>
						<ul class="list-group list-group-numbered">
							<?php 
							$Read2 = new Read;
							$Tabela2 = "caixa";
							$Colunas2 = "bandeira, SUM(valorpago) as valortotal";
							$Where2 = "Where tppagamento = :tppag and datapagamento = :datapag group by bandeira";
							$Valores2 = "tppag={$key['id']}&datapag={$Data}";
							$Read2->SetRead($Tabela2, $Colunas2, $Where2, $Valores2);
							foreach($Read2->getResultado() as $key2){
								if($key2['valortotal'] == 0){
									$ValorTipo = "$0.00";
								}else{
									$ValorTipo = $key2['valortotal'];
								}
								?>
								<li class="list-group-item">
									<div class="ms-2 me-auto">
										<?= $key2['bandeira']; ?>
									</div>

									<span class="badge badge-primary rounded-pill">R<?= $ValorTipo ?></span>
								</li>
								<?php
							}
							?>
						</ul>
					</li>
					<?php
				}
				else{
					?>
					<li class="list-group-item">
						<div class="ms-2 me-auto">
							<?= $key['nome']; ?>
						</div>
						<?php 
						$Read2 = new Read;
						$Tabela2 = "caixa";
						$Colunas2 = "SUM(valorpago) as valortotal";
						$Where2 = "Where tppagamento = :tppag and datapagamento = :datapag";
						$Valores2 = "tppag={$key['id']}&datapag={$Data}";
						$Read2->SetRead($Tabela2, $Colunas2, $Where2, $Valores2);
						if($Read2->getResultado()[0]['valortotal'] == 0){
							$ValorTipo = "$0.00";
						}else{
							$ValorTipo = $Read2->getResultado()[0]['valortotal'];
						}
						?>
						<span class="badge badge-primary rounded-pill">R<?= $ValorTipo ?></span>
					</li>
					<?php
				}
			}
			?>
		</ul>
	</div>
	<div class="col-xl-12">
		<label class="alert alert-info">
			<?php
			$Read2 = new Read;
			$Tabela2 = "caixa";
			$Colunas2 = "SUM(valorpago) as valortotal";
			$Where2 = "Where datapagamento = :datapag and tppagamento <> :pen";
			$Valores2 = "datapag={$Data}&pen=5";
			$Read2->SetRead($Tabela2, $Colunas2, $Where2, $Valores2);
			if($Read2->getResultado()[0]['valortotal'] == 0){
				$ValorTotal = "$0.00";
			}else{
				$ValorTotal = $Read2->getResultado()[0]['valortotal'];
			}
			echo "TOTAL DIA: R".$ValorTotal;
			?>
		</label>
	</div>
</div>

<script type="text/javascript">
	$("#datadia").datepicker({
		dateFormat: 'dd/mm/yy',
		dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
		dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
		dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
		monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
		monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
		nextText: 'Próximo',
		prevText: 'Anterior',
		changeMonth: false,
		autoSize: true,
		changeYear: false,
		onSelect: function(date) {

			$.post('src/pages/caixa/caixa.php', {
				data: date,
			}, function(data) {
				$('#contentcomand').html(data);
			})
			$('#calendar').toggle('fast')
		}
	});
</script>