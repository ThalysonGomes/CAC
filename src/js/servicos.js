function addservico(id, nome){
	$('#modalservico').modal();
	$('#closemodal').click(function(){
		$('#modalservico').modal('toggle');
		$('#codserv').val("");
	});
	$('#closemodal2').click(function(){
		$('#modalservico').modal('toggle');
		$('#codserv').val("");
	});
	$('#nomecateg').html(nome);
	$('#codserv').val(id);
}

function addcategoria(){
	$('#modalcategoria').modal();
	$('#closemodal').click(function(){
		$('#modalcategoria').modal('toggle');
	});
	$('#closemodal2').click(function(){
		$('#modalcategoria').modal('toggle');
	});
}

function salvarservico(){
	var nomeserv = $('#nomeserv').val();
	var codserv = $('#codserv').val();
	var valor = $('#valor').val();
}