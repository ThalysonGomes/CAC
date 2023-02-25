<?php 
require '../../db/Conn.class.php';
require '../../db/Read.class.php';

$Read = new Read;
$Tabela = "servicos_comanda, profissionais, regraspagamento, servicos";
$Colunas = "profissionais.id, profissionais.nome, SUM(servicos_comanda.valor / 100 * regraspagamento.valor) as valorcomissao";
$Where = "Where profissionais.id = servicos_comanda.id_prof and servicos.id = servicos_comanda.id_serv and profissionais.id = regraspagamento.id_prof and regraspagamento.id_serv = servicos.id and regraspagamento.id_prof = servicos_comanda.id_prof and servicos_comanda.pago_prof = :pagoprof group by profissionais.nome, profissionais.id order by profissionais.nome";
$Valores = "pagoprof=false";
$Read->SetRead($Tabela, $Colunas, $Where, $Valores);
foreach ($Read->getResultado() as $key) {
	?>
	<tr>
		<td><?= $key['nome']; ?></td>
		<td><?= 'R'.$key['valorcomissao']; ?></td>
		<td width="200"><button class="btn btn-success" onclick="pagarcomissao(<?= $key['id'] ?>)">PAGAR COMISSÃO</button></td>
	</tr>
	<?php
}

?>