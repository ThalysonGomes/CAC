<option value="">Seleione...</option>
<?php 
require '../../db/Conn.class.php';
require '../../db/Read.class.php';

$Servico = explode("|", $_POST['servico'])[0];
$Read = new Read;
$Tabela = "profissionais, profissionais_servicos";
$Colunas = "profissionais.nome, profissionais.id";
$Where = "Where profissionais_servicos.id_serv = :idserv and profissionais_servicos.id_prof = profissionais.id";
$Valores = "idserv={$Servico}";
$Read->SetRead($Tabela, $Colunas, $Where, $Valores);
foreach ($Read->getResultado() as $key) {
	?>
	<option value="<?= $key['id'] ?>"><?= $key['nome'] ?></option>
	<?php
}


?>