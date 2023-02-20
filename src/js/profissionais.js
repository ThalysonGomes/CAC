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
		$('#modalprof').modal('toggle');
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

function loadprofser(t, input){
	$.post("src/pages/profissionais/loadprofissionais.php", {'servico': $(t).val()}, function(data){
		$('#'+input).html(data);
	})
}

function modificaprof(cod){
	for (i = 0; i < $('input[name="addproced"]').length; i++) {
		var inps = $('input[name="addproced"]')[i];
		if ($(inps).is(':checked') == true) {
			var categ = $(inps).attr('ng');
			var porc = $('#porcateg'+categ).val();
			var servico = $(inps).val();
			$.post("src/pages/profissionais/servicosprofissionais.php", {porc, servico, cod}, function(data){
				console.log(data);
			})
		}
	}
}