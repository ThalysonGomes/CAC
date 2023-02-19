<div class="row">
	<div class="col-xl-12 col-lg-12">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Profissionais</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" onclick="addprofissional()" href="#">
						<i class="fa fa-plus text-primary-400"></i>
					</a>
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body" style="display: block;height: 460px;overflow: auto;">
				<table class="table table-striped">
					<thead>
						<th>Profissional</th>
						<th>Função</th>
						<th></th>
						<th></th>
					</thead>
					<tbody>
						<?php
						require '../../db/Conn.class.php';
						require '../../db/Read.class.php';
						$Tabela = "profissionais, funcoes, profissionais_funcoes";
						$Colunas = "profissionais.id, profissionais.nome as nomeprof, funcoes.nome as nomefunc";
						$Where = "Where profissionais_funcoes.id_prof = profissionais.id and profissionais_funcoes.id_func = funcoes.id and profissionais.ativo = true";
						$Read = new Read;
						$Read->SetRead($Tabela, $Colunas, $Where);
						foreach($Read->getResultado() as $key){
							echo "<tr>";
							echo "<td>{$key['nomeprof']}</td>";
							echo "<td>{$key['nomefunc']}</td>";
							echo "<td onclick='editprof(\"{$key['id']}\")'><span style='cursor:pointer;' class='fa fa-cog'></span><td>";
							echo "<td class='text-danger' onclick='excluiprof(\"{$key['id']}\")'><span style='cursor:pointer;' class='fa fa-trash'></span><td>";
							echo "</tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>	
</div>
<div class="modal fade" id="modalprof" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalprofLabel">Adicionar Profissional</h5>
				<button class="btn btn-close" id="closemodal" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close "></i></button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Nome</label>
					<input type="text" id="nomeprof" class="form-control" placeholder="NOME">
				</div>
				<div class="form-group">
					<label>Telefone</label>
					<input type="text" id="telefone" class="form-control" placeholder="TELEFONE">
				</div>
				<div class="form-group">
					<label>Função</label>
					<select class="form-control" id="funcao">
						<?php 
						$Read = new Read;
						$Tabela = "funcoes";
						$Read->SetRead($Tabela);
						foreach($Read->getResultado() as $key){
							echo "<option value='{$key['id']}'>{$key['nome']}</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="modal-footer"><button id="closemodal2" class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
				<button class="btn btn-primary" onclick="salvarprofissional()" type="button">Salvar</button>
			</div>
		</div>
	</div>
</div>
