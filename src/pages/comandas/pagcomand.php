<?php 
require '../../db/Conn.class.php';
require '../../db/Read.class.php';
$Comanda = $_POST['comanda'];
$Read2 = new Read;
$Tabela2 = "servicos_comanda";
$Colunas2 = "SUM(valor::numeric::float) as valorcomanda";
$Where2 = "Where id_com = :idcom";
$Valores2 = "idcom={$Comanda}";
$Read2->SetRead($Tabela2, $Colunas2, $Where2, $Valores2);
if(!is_null($Read2->getResultado()[0]['valorcomanda'])){
	$Sum = $Read2->getResultado()[0]['valorcomanda'];
}
else{
	$Sum = "$0.00";
}

?>
<div id="modpag" style="position: absolute;top: 11%;left: 30%;width: 50%; display: inline;z-index: 100000;" tabindex="0">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Pagamento Comanda</h6>
			<div class="dropdown no-arrow">
				<a class="dropdown-toggle" onclick="$('#modpag').remove()" id="closecadsimp" href="#">
					<i class="fa fa-close text-primary-400"></i>
				</a>
			</div>
		</div>
		<!-- Card Body -->
		<div class="card-body" style="display: block;height: 320px;overflow: auto;">
			<div id="formspag">
			</div>
		</div>
		<div class="card-footer">
			<div class="row">
				<div class="col-xl-10">
					<label class="text-primary">VALOR TOTAL: R$<?= number_format($Sum, 2) ?></label> 
					<button onclick="$('input[ng=\'valorpag\']').val('<?= number_format($Sum, 2) ?>')" class="btn btn-primary"><i class="fa fa-bank"></i></button> 
				</div>
				<div class="col-xl-2">
					<button onclick="pagarcomanda(<?= $Comanda ?>)" class="btn btn-success">Finalizar</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	addformpag()
</script>