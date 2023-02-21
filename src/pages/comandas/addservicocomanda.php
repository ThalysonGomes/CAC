<?php  
require '../../db/Conn.class.php';
require '../../db/Create.class.php';

$adserv = $_POST['adserv'];
$prof = $_POST['prof'];
$valor = $_POST['valor'];
$comanda = $_POST['comanda'];

$Create = new Create;
$Tabela = "servicos_comanda";
$Dados = array(
	"id_com"=>$comanda,
	"id_prof"=>$prof,
	"id_serv"=>$adserv,
	"valor"=>$valor,
	"pago_prof"=>"false"
);
$Create->setCreate($Tabela, $Dados);
echo "Serviço Adicionado";
?>