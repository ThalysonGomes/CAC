<div class="col-xl-11" id="modcomprof" style="position: absolute;top: 12%;left: 7%; display: inline;z-index: 100000;">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">COMISSÕES</h6>
			<div class="dropdown no-arrow">
				<a class="dropdown-toggle" id="closepagfunc" href="#">
					<i class="fa fa-close text-primary-400"></i>
				</a>
			</div>
		</div>
		<!-- Card Body -->
		<div class="card-body" style="display: block;height: 460px;overflow: auto;">
			<div class="form-group" style="height:250px;overflow:auto;">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<th>CLIENTE</th>
						<th>SERVIÇO</th>
						<th>VALOR</th>
						<th><input type="checkbox" onclick="checkallservpag()" id="checkallservs"></th>
					</thead>
					<tbody>
						<?php 
						require '../../db/Conn.class.php';
						require '../../db/Read.class.php';

						$Prof = $_POST['prof'];

						$Read = new Read;
						$Tabela = "servicos_comanda, comandas, regraspagamento, servicos, profissionais, clientes, caixa";
						$Colunas = "servicos_comanda.id, clientes.nome as nomecliente, servicos.nome as nomeservico, (servicos_comanda.valor / 100 * regraspagamento.valor) as valorpagamento, caixa.tppagamento";
						$Where = "Where profissionais.id = :idprof and profissionais.id = servicos_comanda.id_prof and servicos_comanda.id_serv = servicos.id and servicos_comanda.id_com = comandas.id and caixa.comanda = comandas.id and regraspagamento.id_prof = profissionais.id and comandas.cliente = clientes.id and regraspagamento.id_serv = servicos.id and servicos_comanda.pago_prof = :pagoprof";
						$Valores = "idprof={$Prof}&pagoprof=false";
						$Read->SetRead($Tabela, $Colunas, $Where, $Valores);
						foreach($Read->getResultado() as $key){
							?>
														<tr>
								<td><?= $key['nomecliente'] ?></td>
								<td><?= $key['nomeservico'] ?></td>
								<td><?= $key['valorpagamento'] . ($key['tppagamento'] == 5 ? " <small>(PENDENTE)</small>" : "")  ?></td>
								<td><input onclick="loadvalorestot()" value="<?php  echo explode("$", $key['valorpagamento'])[1] ?>" type="checkbox" name="ckservprof" id="<?= $key['id'] ?>"></td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="form-group">
				<label>VALOR SERVICOS: <i id="totalcalcservs"></i></label>
			</div>
			<div class="form-group">
				<button class="btn btn-success" onclick="salvapagamantoprof(<?= $Prof ?>)">PAGAR</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function checkallservpag() {
		if($('#checkallservs').is(':checked') == true){
			$('input[name="ckservprof"]').prop("checked", "true");
			$('input[name="ckservprof"]').attr("checked", "true");
			loadvalorestot()

		}
		else{
			$('input[name="ckservprof"]').prop("checked", false);
			$('input[name="ckservprof"]').attr("checked", false);
			$('input[name="ckservprof"]').removeAttr("checked");
		}
	}
</script>