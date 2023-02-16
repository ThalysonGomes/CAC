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
	})
}