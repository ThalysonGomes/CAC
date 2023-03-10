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
					<a class="dropdown-toggle" onclick="modificaprof(<?= $Cod ?>)" href="#">
						<i class="fa fa-save text-primary-400"></i>
					</a>
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body" style="display: block;height: 460px;overflow: auto;">
				<div class="row">
					<?php 
					$Read = new Read;
					$Tabela = "categorias";
					$Colunas = "id, nome";
					$Where = "Where ativo = true order by nome";
					$Read->SetRead($Tabela, $Colunas, $Where);
					foreach($Read->getResultado() as $key){
						?>
						<div class="col-xl-3 col-lg-4">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary"><?= $key['nome']; ?></h6>
									<input style="cursor: pointer;" onclick="checkall(<?= $key['id']?>)" type="checkbox" id="checkall<?= $key['id']?>">
								</div>
								<!-- Card Body -->
								<div class="card-body" style="display: block;height: 320px;overflow: auto;">
									<input type="text" id="porcateg<?= $key['id'] ?>" class="form-control" placeholder="Porcentagem">
									<table>
										<?php 
										$Read2 = new Read;
										$Tabela2 = "servicos";
										$Colunas2 = "id, nome";
										$Where2 = "Where categoria = :categoria order by nome";
										$Valores2 = "categoria={$key['id']}";
										$Read2->SetRead($Tabela2, $Colunas2, $Where2, $Valores2);
										foreach($Read2->getResultado() as $key2){
											?>
											<tr>
												<td><input ng="<?= $key['id']?>" type="checkbox" name="addproced" value="<?= $key2['id']; ?>"> </td>
												<td width="200"><?= $key2['nome'] ?></td>
											</tr>
											<?php
										}
										?>
									</table>
								</div>
							</div>
						</div>
						<?php 
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function checkall(categ) {
		if($('#checkall'+categ).is(':checked') == true){
			$('input[ng="'+categ+'"]').prop("checked", "true");
			$('input[ng="'+categ+'"]').attr("checked", "true");

		}
		else{
			$('input[ng="'+categ+'"]').prop("checked", false);
			$('input[ng="'+categ+'"]').attr("checked", false);
			$('input[ng="'+categ+'"]').removeAttr("checked");
		}
	}
</script>