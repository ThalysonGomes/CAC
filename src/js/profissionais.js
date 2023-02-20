function addprofissional(){
	$('#modalprof').modal();
	$('#closemodal').click(function(){
		$('#modalprof').modal('toggle');
	});
	$('#closemodal2').click(function(){
		$('#modalprof').modal('toggle');
	});
}

function salvarprofissional(){
	var nomeprof = $('#nomeprof').val();
	var telefone = $('#telefone').val();
	var funcao = $('#funcao').val(); 
	$.post("src/pages/profissionais/salvarprofissional.php", {nomeprof, telefone,funcao}, function(data){
		console.log(data)
		$('.container-fluid').load("src/pages/profissionais/index.php")
	})
}

function excluiprof(cod){
	$.post("src/pages/profissionais/desativaprof.php", {cod}, function(data){
		console.log(data)
		$('.container-fluid').load("src/pages/profissionais/index.php")
	})
}

function editprof(cod){
	$.post("src/pages/profissionais/profissionaisconfig.php", {cod}, function(data){
		$('.container-fluid').html(data)
	})
}