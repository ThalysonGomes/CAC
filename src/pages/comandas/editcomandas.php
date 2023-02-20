<?php 
require '../../db/Conn.class.php';
require '../../db/Read.class.php';
$CodComanda = $_POST['comanda'];
$Read = new Read;
$Tabela = "comandas, clientes";
$Colunas = "clientes.nome, comandas.datacomanda";
$Where = "Where comandas.id = :idcomanda and comandas.cliente = clientes.id";
$Valores = "idcomanda={$CodComanda}";
$Read->SetRead($Tabela, $Colunas, $Where, $Valores);
foreach ($Read->getResultado() as $key) {
	$Cliente = $key['nome'];
	$Data = $key['datacomanda'];
}
?>
<div class="form-group">
	<label>Cliente: <?= $Cliente ?></label>
	<br/>
	<label>Data :<?= date('d/m/Y',strtotime($Data)) ?></label>
	<input type="hidden" id="comandaselected" value="<?= $CodComanda ?>">
</div>
<div class="form-group">
	<div class="col-xl-12 col-lg-12">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Serviços</h6>
				<div class="text-primary" style="cursor: pointer;">
					<a onclick="newserv(<?= $CodComanda ?>)" >
						<i class="fa fa-plus text-primary-400"></i>
					</a>
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body" style="display: block;">
				<div id="newscomands"></div>
				<table class="table table-hover" id="servscoms">
				</table>
				<div class="offset-xl-11">
					<button class="btn btn-primary">Receber</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	loadservicoscomanda(<?= $CodComanda ?>)
</script>