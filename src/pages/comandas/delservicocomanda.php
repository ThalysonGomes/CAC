<?php 
require '../../db/Conn.class.php';
require '../../db/Delete.class.php';

$Id = $_POST['id'];
$Delete = new Delete;
$Tabela = "servicos_comanda";
$Where = "Where id = :id";
$Valores = "id={$Id}";
$Delete->SetDelete($Tabela, $Where, $Valores);
echo "Serviço Removido!";

?>