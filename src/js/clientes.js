function buscacliente(i, e){
	if($(i).val().length > 2){
		$('#listsearch').show("fast");
		$.post('src/pages/clientes/buscacliente.php', {'nome': $(i).val()}, function(data){
			$('#listsearch').html(data);
		})
	}
	else{
		$('#listsearch').hide("fast")
	}
}

function cadsimple(nome = ""){
	$.post('src/pages/clientes/cadsimple.php', {nome}, function(data){
		$('.modal.show').append(data);
		$('#closecadsimp').click(function(){
			$('#modcadsimp').remove()
		})
	})
	
}

function salvacadsimp(){
	var nomecliente = $('#nomeclientesimp').val();
	var telefone = $('#telefonesimp').val();

	$.post('src/pages/clientes/salvacadsimp.php', {nomecliente, telefone}, function(data){
		localStorage.setItem('comand_client', data);
		// const cat = localStorage.getItem('myCat'); #GET ITEM STORAGE
		$('#modcadsimp').remove();
		$('#listsearch').css('display','none');
	})
}

function loadcliente(id, nome){
	localStorage.setItem('comand_client', id);
	// const cat = localStorage.getItem('myCat'); #GET ITEM STORAGE
	$('#modcadsimp').remove();
	$('#listsearch').css('display','none');
	$('#nomecliente').val(nome)
}