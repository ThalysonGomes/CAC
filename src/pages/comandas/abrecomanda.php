<?php  
require '../../db/Conn.class.php';
require '../../db/Create.class.php';

$client = $_POST['client'];
$datacomanda = $_POST['datacomanda'];

$Create = new Create;
$Tabela = "comandas";
$Dados = array(
	"cliente"=>$client,
	"datacomanda"=>$datacomanda,
	"situacao"=>"O",
	"pago_prof"=>"false"
);
$Create->SetCreate($Tabela, $Dados);
echo $Create->getResultado();

?>