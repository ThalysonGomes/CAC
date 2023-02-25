<div class="row" id="menufin">
	<div class="col-xl-12 col-lg-12">
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Financeiro</h6>
				<div class="dropdown no-arrow">
					<a class="dropdown-toggle" onclick="addcomanda()" href="#">
						Nova Comanda <i class="fa fa-plus text-primary-400"></i>
					</a>
				</div>
			</div>
			<!-- Card Body -->
			<div class="card-body" style="display: block;height: 460px;overflow: auto;">
				<div class="row">
					<div class="col-md-3 mb-4">
						<div class="card border-primary hover h-100 py-2">
							<div class="card-body" onclick="caixa()" style="cursor: pointer;">
								<div class="row no-gutters" align="center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
											Caixa 
										</div>
										<div class="col-auto">
											<i class="fa fa-money fa-2x text-gray-30"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 mb-4" onclick="comandasabertas()">
						<div class="card border-primary hover h-100 py-2">
							<div class="card-body" onclick="" style="cursor: pointer;">
								<div class="row no-gutters" align="center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
											Comandas Abertas 
										</div>
										<div class="col-auto">
											<i class="fa fa-usd fa-2x text-gray-30"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 mb-4">
						<div class="card border-primary hover h-100 py-2">
							<div class="card-body" onclick="comandasfechadas()" style="cursor: pointer;">
								<div class="row no-gutters" align="center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
											Comandas Encerradas 
										</div>
										<div class="col-auto">
											<i class="fa fa-archive fa-2x text-gray-30"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 mb-4">
						<div class="card border-primary hover h-100 py-2">
							<div class="card-body" onclick="comissoespendentes()" style="cursor: pointer;">
								<div class="row no-gutters" align="center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
											Comissões Pendentes
										</div>
										<div class="col-auto">
											<i class="fa fa-address-card-o fa-2x text-gray-30"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12" id="contentcomand">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalcomanda" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalcomandaLabel">Adicionar Comanda</h5>
				<button class="btn btn-close" id="closemodal" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close "></i></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xl-8">
						<label>Cliente</label>
						<div class="input-group">
							<input style="text-transform: uppercase;" onkeyup="buscacliente(this, event)" type="text" id="nomecliente" class="form-control">
							<div class="input-group-append">
								<button class="btn btn-primary" type="button">
									<i class="fa fa-search fa-sm"></i>
								</button>
							</div>                      
						</div>
						<div class="dropdown shadow bg-white mb-4" style="position: absolute;width: 88%;z-index: 100;display: none;background-clip: padding-box;border: 1px solid #d1d3e2;border-radius: .35rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;padding: .375rem .75rem;" id="listsearch"></div>
					</div>
					<div class="col-xl-3">
						<label>Data Comanda</label>
						<input type="text" id="datacomanda" class="form-control" value="<?= date('d/m/Y'); ?>">
					</div>
					<div class="col-xl-1" style="margin-top: 8px;">
						<br/>
						<button onclick="opencomanda()" class="btn btn-primary"><i class="fa fa-plus"></i></button>
					</div>
				</div>
			</div>
			<div class="modal-footer"><button id="closemodal2" class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
				<button class="btn btn-primary" onclick="salvarprofissional()" type="button">Salvar</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalcadsimp" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalcadsimpLabel">Adicionar Comanda</h5>
				<button class="btn btn-close" id="closemodal" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close "></i></button>
			</div>
			<div class="modal-body">
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#datacomanda').datepicker();
	comandasabertas();
</script>