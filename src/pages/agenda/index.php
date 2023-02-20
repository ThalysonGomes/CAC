<?php 
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>
<div class="row">
	<div class="col-xl-8 col-lg-7">
	    <div class="card shadow mb-4">
	        <!-- Card Header - Dropdown -->
	        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	            <h6 class="m-0 font-weight-bold text-primary">Agenda</h6>
	            <div class="dropdown no-arrow">
	                <a class="dropdown-toggle" onclick="addagenda()" href="#">
	                    <i class="fa fa-plus text-primary-400"></i>
	                </a>
	            </div>
	        </div>
	        <!-- Card Body -->
	        <div class="card-body" style="display: block;height: 460px;overflow: auto;">
	            <div>
	            	<h3>
	            		<?= strftime('%d de %B de %Y', strtotime('today')); ?>
	            	</h3>
	            	<h4>
	          			<?= strftime('%A', strtotime('today')); ?>
	            	</h4>
	            	<div class="input-group">
                        <input type="text" class="form-control small" placeholder="Pesquisar">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div id="agendaclientes"></div>
	            </div>
	        </div>
	    </div>
	</div>	
	<div class="col-xl-4 col-lg-5">
	    <div class="card shadow mb-4">
	        <!-- Card Header - Dropdown -->
	        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	            <h6 class="m-0 font-weight-bold text-primary">Calendario</h6>
	            <div class="dropdown no-arrow">
	                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
	                </a>
	                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
	                    <div class="dropdown-header">Dropdown Header:</div>
	                    <a class="dropdown-item" href="#">Action</a>
	                    <a class="dropdown-item" href="#">Another action</a>
	                    <div class="dropdown-divider"></div>
	                    <a class="dropdown-item" href="#">Something else here</a>
	                </div>
	            </div>
	        </div>
	        <!-- Card Body -->
	        <div class="card-body">
	            <div id='calenday'></div>
	        </div>
	    </div>
	</div>
</div>
<div class="modal fade bd-example-modal-lg" id="modalagenda" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalagendaLabel">Adicionar Cliente</h5>
                <button class="btn btn-close" id="closemodal" type="button" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close "></i></button>
            </div>
            <div class="modal-body">
            	<div class="form-group">
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
            </div>
            <div class="modal-footer"><button id="closemodal2" class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-primary" type="button">Salvar</button></div>
        </div>
    </div>
</div>
<script type="text/javascript">
	$('#calenday').datepicker();
</script>