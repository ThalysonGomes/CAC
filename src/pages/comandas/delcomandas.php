<?php 
require '../../db/Conn.class.php';
require '../../db/Delete.class.php';

$Id = $_POST['id'];

$Delete = new Delete;
$Tabela = "servicos_comanda";
$Where = "Where id_com = :idcom";
$Valores = "idcom=".$Id;
$Delete->SetDelete($Tabela, $Where, $Valores);

$Delete = new Delete;
$Tabela = "caixa";
$Where = "Where comanda = :idcom";
$Valores = "idcom=".$Id;
$Delete->SetDelete($Tabela, $Where, $Valores);

$Delete = new Delete;
$Tabela = "comandas";
$Where = "Where id = :idcom";
$Valores = "idcom=".$Id;
$Delete->SetDelete($Tabela, $Where, $Valores);


echo "Comanda Excluída!";


?>