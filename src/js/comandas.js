function addcomanda(){
	$('#modalcomanda').modal();
	$('#closemodal').click(function(){
		$('#modalcomanda').modal('toggle');
	});
	$('#closemodal2').click(function(){
		$('#modalcomanda').modal('toggle');
	});
	$('#nomecliente').val("")
}

function opencomanda(){
	const client = localStorage.getItem('comand_client');
	if(client == ""){
		alert("Cliente não selecionado!");
	}
	else{
		var datacomanda = $('#datacomanda').val();
		$.post("src/pages/comandas/abrecomanda.php", {client, datacomanda}, function(data){
			$('#modalcomanda').modal('toggle');
			editcomand(data);
			localStorage.removeItem('comand_client');
			console.log(data);
		})
	}
}

function editcomand(comanda){
	$.post('src/pages/comandas/editcomandas.php', {comanda}, function(data){
		$('#contentcomand').html(data)
	})
}

function comandasabertas(){
	$('#contentcomand').load("src/pages/comandas/comandasabertas.php");
}

function comandasfechadas(){
	$('#contentcomand').load("src/pages/comandas/comandasfechadas.php");
}

function loadservicoscomanda(comanda){
	$.post('src/pages/comandas/servicoscomandas.php', {comanda}, function(data){
		$('#servscoms').html(data)
	})
}

function newserv(comanda) {
	$.post('src/pages/comandas/addservico.php', {comanda}, function(data){
		$('#newscomands').append(data);
	})
}

function salvaradserv(codigo){
	var adserv = $('#adserv'+codigo).val().split('|')[0];
	var prof = $('#prof'+codigo).val();
	var valor = $('#valor'+codigo).val();
	var comanda = $('#comandaselected').val();
	$.post("src/pages/comandas/addservicocomanda.php", {adserv, prof, valor, comanda}, function(data){
		console.log(data);
		$('#'+codigo).remove();
		loadservicoscomanda(comanda);
	});
}

function pagcomand(comanda){
	$.post("src/pages/comandas/pagcomand.php", {comanda}, function(data){
		$('.container-fluid').append(data);
	})
}

function addformpag(){
	$.post("src/pages/comandas/addformpag.php", {ok:'ok'}, function(data){
		$('#formspag').append(data)
	});
}

function pagarcomanda(comanda){
	for (i = 0; i < $('select[ng="formpag"]').length; i++) {
		var inps = $('select[ng="formpag"]')[i];
		if($(inps).val() == 2){
			var bandeira = $('select[ng="bandeira"]')[i];
			var parcela = $('select[ng="parcelas"]')[i];
			var bandeira = $(bandeira).val()
			var parcela = $(parcela).val()
		}
		else if($(inps).val() == 3){
			var bandeira =$('select[ng="bandeira"]')[i];
			var bandeira = $(bandeira).val()
			var parcela = 0;
		}
		else{
			var bandeira = "";
			var parcela = 0;
		}
		var descontopag = $('input[ng="descontopag"]')[i];
		var valorpag = $('input[ng="valorpag"]')[i];
		var tppagamento = $(inps).val();
		var descontopag = $(descontopag).val()
		var valorpag = $(valorpag).val()

		$.post("src/pages/comandas/pagamento.php",{tppagamento, bandeira, parcela, descontopag, valorpag, comanda}, function(data){
			$('#modpag').remove()
			comandasabertas();
		})


	}
}

function exccomand(id){
	$.post("src/pages/comandas/delcomandas.php", {id}, function(data){
		alert(data);
	})
}

function delservico(id, t){
	$.post("src/pages/comandas/delservicocomanda.php", {id}, function(data) {
		console.log(data);
		$(t).parent('tr').remove();
	})
}