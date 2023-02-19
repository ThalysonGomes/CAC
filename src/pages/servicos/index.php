<div class="row">
	<div class="col-xl-12 col-lg-12">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Categorias</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" onclick="addcategoria()" href="#">
						<i class="fa fa-plus text-primary-400"></i>
					</a>
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body" style="display: block;height: 460px;overflow: auto;">
				<div class="row">
					<?php 
					require '../../db/Conn.class.php';
					require '../../db/Read.class.php';
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
									<div class="dropdown no-arrow">
										<a class="dropdown-toggle" onclick="addservico(<?= $key['id']; ?>, '<?= $key['nome']?>')" href="#">
											<i class="fa fa-plus text-primary-400"></i>
										</a>
									</div>
								</div>
								<!-- Card Body -->
								<div class="card-body" style="display: block;height: 320px;">
									<table>
										<?php 
										$Read2 = new Read;
										$Tabela2 = "servicos";
										$Colunas2 = "nome, valor";
										$Where2 = "Where categoria = :categoria order by nome";
										$Valores2 = "categoria={$key['id']}";
										$Read2->SetRead($Tabela2, $Colunas2, $Where2, $Valores2);
										foreach($Read2->getResultado() as $key2){
											?>
											<tr>
												<td><?= $key2['nome'] ?></td>
												<td><?= '--- R'.$key2['valor'] ?></td>
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
<div class="modal fade" id="modalservico" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalservicoLabel">Adicionar Serviço - <big id="nomecateg"></big></h5>
				<button class="btn btn-close" id="closemodal" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close "></i></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nome</label>
					<input type="text" id="nomeserv" class="form-control">
					<input type="hidden" id="codcateg">
				</div>
				<div class="form-group">
					<label>Valor</label>
					<input type="text" id="valor" class="form-control">
				</div>
			</div>
			<div class="modal-footer"><button id="closemodal2" class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
				<button class="btn btn-primary" onclick="salvarservico()" type="button">Salvar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalcategoria" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalcategoriaLabel">Adicionar Categoria</h5>
				<button class="btn btn-close" id="closemodal" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close "></i></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nome</label>
					<input type="text" id="nomecategoria" class="form-control">
				</div>
			</div>
			<div class="modal-footer"><button id="closemodal2" class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
				<button class="btn btn-primary" onclick="salvarservico()" type="button">Salvar</button>
			</div>
		</div>
	</div>
</div>
