<?php 
require '../../db/Conn.class.php';
require '../../db/Create.class.php';
require '../../db/Read.class.php';

$nomeserv = $_POST['nomeserv'];
$codcateg = $_POST['codcateg'];
$valor = $_POST['valor'];

$Read = new Read;
$Tabela = "servicos";
$Colunas = "id";
$Where = "Where nome = :nome and categoria = :categoria";
$Valores = "nome={$nomeserv}&categoria={$codcateg}";

$Read->SetRead($Tabela, $Colunas, $Where, $Valores);
if ($Read->getNumLinhas() > 0) {
	die('Serviço já cadastrado!');
}

$Create = new Create;
$Dados = array(
	"nome"=>$nomeserv,
	"valor"=>$valor,
	"categoria"=>$codcateg
);

$Create->setCreate($Tabela, $Dados);
echo "Serviço Cadastrado!";


?>
