<?php 
require '../../db/Conn.class.php';
require '../../db/Read.class.php';
$CodComanda = $_POST['comanda'];

$Read = new Read;
$Tabela = "servicos_comanda, servicos, profissionais";
$Colunas = "servicos.nome as nomeservico, profissionais.nome as nomeprof, servicos_comanda.valor";
$Where = "Where servicos_comanda.id_com = :id and servicos.id = servicos_comanda.id_serv and profissionais.id = servicos_comanda.id_prof";
$Valores = "id={$CodComanda}";
$Read->SetRead($Tabela, $Colunas, $Where, $Valores);
foreach ($Read->getResultado() as $key) {
	?>
	<tr>
		<td><?= $key['nomeservico'] ?></td>
		<td><?= $key['nomeprof'] ?></td>
		<td><?= 'R'.$key['valor'] ?></td>
		<td></td>
	</tr>
	<?php
}
?>