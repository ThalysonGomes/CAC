function addcomanda(){
	$('#modalcomanda').modal();
	$('#closemodal').click(function(){
		$('#modalcomanda').modal('toggle');
	});
	$('#closemodal2').click(function(){
		$('#modalcomanda').modal('toggle');
	});
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
	})
}