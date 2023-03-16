<?php 
require '../../db/Conn.class.php';
require '../../db/Update.class.php';

$prof = $_POST['prof'];
$servicocomanda = $_POST['servicocomanda'];
$valor = $_POST['valor'];

$Update = new Update;
$Tabela = "servicos_comanda";
$Dados = array(
	"pago_prof" => "true"
);
$Where = "Where id = :idserv";
$Valores = "idserv={$servicocomanda}";
$Update->SetUpdate($Tabela, $Dados, $Where, $Valores);
echo 1;
?>