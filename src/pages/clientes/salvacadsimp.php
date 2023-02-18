<?php  
require '../../db/Conn.class.php';
require '../../db/Read.class.php';
require '../../db/Create.class.php';

$nomecliente = $_POST['nomecliente'];
$telefone = $_POST['telefone'];

$Read = new Read;
$Tabela = "clientes";
$Colunas = "id";
$Where = "Where nome = :nome and telefone = :telefone";
$Valores = "nome={$nomecliente}&telefone={$telefone}";
$Read->SetRead($Tabela, $Colunas, $Where, $Valores);
if($Read->getNumLinhas() > 0){
	foreach ($Read->getResultado as $key) {
		echo $key['id'];
	}
}
else{
	$Create = new Create;
	$Dados = array(
		"nome"=>$nomecliente,
		"telefone"=>$telefone
	);
	$Create->SetCreate($Tabela, $Dados);
	echo $Create->getResultado();
}
?>