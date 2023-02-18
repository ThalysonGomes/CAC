<table class="table table-bordered table-striped text-dark">
	<thead>
		<th>CLIENTE</th>
		<th>DATA</th>
		<th>VALOR</th>
		<th></th>
	</thead>
	<tbody>
		<?php 
		require '../../db/Conn.class.php';
		require '../../db/Read.class.php';

		$Read = new Read;
		$Tabela = "comandas, clientes";
		$Colunas = "comandas.id, clientes.nome, comandas.datacomanda";
		$Where = "Where clientes.id = comandas.cliente and situacao = :situacao";
		$Valores = "situacao=O";
		$Read->SetRead($Tabela, $Colunas, $Where, $Valores);
		foreach ($Read->getResultado() as $key) {
			$Read2 = new Read;
			$Tabela2 = "servicos_comanda";
			$Colunas2 = "SUM(valor) as valorcomanda";
			$Where2 = "Where id_com = :idcom";
			$Valores2 = "idcom={$key['id']}";
			$Read2->SetRead($Tabela2, $Colunas2, $Where2, $Valores2);
			if(!is_null($Read2->getResultado()[0]['valorcomanda'])){
				$Sum = $Read2->getResultado()[0]['valorcomanda'];
			}
			else{
				$Sum = "0.00";
			}
			?>
			<tr>
				<td><?= $key['nome'] ?></td>
				<td><?= date('d/m/Y', strtotime($key['datacomanda'])); ?></td>
				<td><?= 'R$'.$Sum ?></td>
				<td><i class="fa fa-pencil text-primary" onclick="editcomand(<?= $key['id']?>)" style="cursor: pointer;"></i> <i class="fa fa-trash text-danger" onclick="delcomand(<?= $key['id']?>)" style="cursor: pointer;"></i></td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>