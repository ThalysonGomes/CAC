<div id="modcadsimp" style="position: absolute;top: 10%;left: 25%;width: 50%; display: inline;z-index: 100000;" tabindex="0">
	<div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			<h6 class="m-0 font-weight-bold text-primary">Cadastro Simples</h6>
			<div class="dropdown no-arrow">
				<a class="dropdown-toggle" id="closecadsimp" href="#">
					<i class="fa fa-close text-primary-400"></i>
				</a>
			</div>
		</div>
		<!-- Card Body -->
		<div class="card-body" style="display: block;height: 460px;overflow: auto;">
			<div class="form-group">
				<label>Nome</label>
				<input type="text" id="nomeclientesimp" class="form-control" value="<?= $_POST['nome'];?>">
			</div>
			<div class="form-group">
				<label>Telefone</label>
				<input type="text" id="telefonesimp" class="form-control">
			</div>
			<div class="form-group">
				<button class="btn btn-success" onclick="salvacadsimp()">SALVAR</button>
			</div>
		</div>
	</div>
</div>

