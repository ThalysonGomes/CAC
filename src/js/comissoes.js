function comissoespendentes() {
	$('#contentcomand').load("src/pages/comissoes/comissoes.php")
}

function loadcomissoespendentes(){
	$('#comissoesprofissionais').load("src/pages/comissoes/comissoespendentes.php");
}

function pagarcomissao(prof){
	$.post("src/pages/comissoes/pagacomissoes.php", {prof}, function(data){
		$('body').append(data);
		$('#closepagfunc').click(function(){
			$('#modcomprof').remove()
		})
		
	});
}

function loadvalorestot(){
	var total = 0;
	for (i = 0; i < $('input[name="ckservprof"]').length; i++) {
		var inps = $('input[name="ckservprof"]')[i];
		if ($(inps).is(':checked') == true) {
			var valores = $(inps).val();
			total = total + parseFloat(valores);
		}
	}
	$('#totalcalcservs').html("R$" + total.toFixed(2));
}

function salvapagamantoprof(prof){
	for (i = 0; i < $('input[name="ckservprof"]').length; i++) {
		var inps = $('input[name="ckservprof"]')[i];
		if ($(inps).is(':checked') == true) {
			var servicocomanda = $(inps).attr("id");
			var valor = $(inps).val();
			$.post('src/pages/comissoes/fechacomissoesprof.php', {prof, servicocomanda, valor}, function(data){
				console.log(data);
			})
		}
	}
}