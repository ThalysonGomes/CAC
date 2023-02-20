<?php  
require '../../db/Conn.class.php';
require '../../db/Create.class.php';

$porc = $_POST['porc'];
$servico = $_POST['servico'];
$cod = $_POST['cod'];

$Create = new Create();
$Tabela = "profissionais_servicos";
$Dados = array(
	"id_prof"=>$cod,
	"id_serv"=>$servico
);
$Create->setCreate($Tabela, $Dados);


$Create = new Create;
$Tabela = "regraspagamento";
$Dados = array(
	"id_serv"=>$servico,
	"id_prof"=>$cod,
	"tipopagamento"=>"P",
	"valor"=>$porc
);
$Create->setCreate($Tabela, $Dados);
?>