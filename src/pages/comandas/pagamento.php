<?php 
require '../../db/Conn.class.php';
require '../../db/Read.class.php';
require '../../db/Create.class.php';
require '../../db/Update.class.php';

$tppagamento = $_POST['tppagamento'];
$bandeira = $_POST['bandeira'];
$parcela = $_POST['parcela'];
$descontopag = (empty($_POST['descontopag']) ? 0 :$_POST['descontopag'] );
$valorpag = $_POST['valorpag'];
$comanda = $_POST['comanda'];

$Read = new Read;
$Tabela = "caixa";
$Colunas = "transacao";
$Where = "Where comanda = :comanda";
$Valores = "comanda={$comanda}";
$Read->SetRead($Tabela, $Colunas, $Where, $Valores);
if($Read->getNumLinhas() > 0){
	$Transacao = $Read->getResultado()[0]["transacao"];
}
else{
	$Transacao = "C".$comanda.date('dmY');
}

$Create = new Create;
$Dados = array(
	"comanda"=>$comanda,
	"valorpago"=>$valorpag,
	"desconto"=>$descontopag,
	"tipodesconto"=>"P",
	"tppagamento"=>$tppagamento,
	"bandeira"=>$bandeira,
	"parcelas"=>$parcela,
	"datapagamento"=>date('d/m/Y'),
	"horapagamento"=>date('H:i:s'),
	"transacao"=>$Transacao
);

$Create->SetCreate($Tabela, $Dados);

$Update = new Update;
$Tabela = "comandas";
$Dados = array(
	"situacao"=>"C",
	"transacao"=>$Transacao
);
$Where = "Where id = :id";
$Valores = "id={$comanda}";
$Update->SetUpdate($Tabela, $Dados, $Where, $Valores);

echo "demandasalva!";
?>