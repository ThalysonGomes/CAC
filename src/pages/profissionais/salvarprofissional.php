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
$Read->SetRead($Tabela, $Colunas, $Where, $Valores);
if($Read->getNumLinhas() > 0){
	die("Profissional já cadastrado!");
}

$Create = new Create;
$Dados = array(
	"nome"=>$Nome,
	"telefone"=>$Telefone
);
$Create->SetCreate($Tabela, $Dados);

$CodProfissional = $Create->getResultado();
$Tabela = "profissionais_funcoes";
$Dados = array(
	"id_prof"=>$CodProfissional,
	"id_func"=>$Funcao
);

$Create = new Create;
$Create->SetCreate($Tabela, $Dados);

echo "Profissional Cadastrado!";

?>