<?php
require '../../db/Conn.class.php';
require '../../db/Read.class.php';
$Cod = $_POST['cod'];

$Read = new Read;
$Tabela = "profissionais";
$Colunas = "nome";
$Where = "Where id = :cod";
$Valores = "cod={$Cod}";
$Read->SetRead($Tabela, $Colunas, $Where, $Valores);
foreach($Read->getResultado() as $key){
	$Nome = $key['nome'];
}
?>
<div class="row">
	<div class="col-xl-12 col-lg-12">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary"><?= $Nome; ?></h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" onclick="modificaprof()" href="#">
						<i class="fa fa-save text-primary-400"></i>
					</a>
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body" style="display: block;height: 460px;">
				
			</div>
		</div>
	</div>
</div>