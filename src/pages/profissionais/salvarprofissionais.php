<?php  
require '../../db/Conn.class.php';
require '../../db/Create.class.php';
require '../../db/Read.class.php';


$Nome = $_POST['nomeprof'];
$Telefone = $_POST['telefone'];
$Funcao = $_POST['funcao'];

$Read = new Read;
$Tabela = "profissionais";
$Colunas = "id";
$Where = "Where nome = :nome and telefone = :telefone";
$Valores = "nome={$Nome}&telefone={$Telefone}";

?>