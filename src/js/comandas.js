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