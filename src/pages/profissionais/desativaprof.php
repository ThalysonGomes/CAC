<?php 
require '../../db/Conn.class.php';
require '../../db/Update.class.php';

$Cod = $_POST['cod'];

$Update = new Update;
$Tabela = "profissionais";
$Dados = array(
	"ativo"=>"false"
);
$Where = "Where id = :cod";
$Valores = "cod={$Cod}";
$Update->SetUpdate($Tabela, $Dados, $Where, $Valores);
echo "Profissional Desativado!";
?>