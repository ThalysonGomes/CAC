function addservico(id, nome){
	$('#modalservico').modal();
	$('#closemodal').click(function(){
		$('#modalservico').modal('toggle');
		$('#codcateg').val("");
	});
	$('#closemodal2').click(function(){
		$('#modalservico').modal('toggle');
		$('#codcateg').val("");
	});
	$('#nomecateg').html(nome);
	$('#codcateg').val(id);
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
	var codcateg = $('#codcateg').val();
	var valor = $('#valor').val();

	$.post('src/pages/servicos/salvaservico.php', {nomeserv, codcateg, valor}, function(data){
		alert(data);
		$('#modalservico').modal('toggle');
		$('.container-fluid').load("src/pages/servicos/index.php");
	})

}