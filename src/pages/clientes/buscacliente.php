<?php  
require '../../db/Conn.class.php';
require '../../db/Read.class.php';

$Nome = strtoupper($_POST['nome']);

$Read = new Read;
$Tabela = "clientes";
$Colunas = "id, nome, telefone";
$Where = "Where nome like :nome";
$Valores = "nome=%{$Nome}%";
$Read->SetRead($Tabela, $Colunas, $Where, $Valores);
if($Read->getNumLinhas() < 1){
	?>
	<h4>Não encontrado! <button class="btn btn-primary" onclick="cadsimple('<?= $Nome; ?>')">Cadastrar Cliente</button></h4>
	<?php
}
else{
	?>
	<table>
		<tbody>
			<?php
			foreach ($Read->getResultado() as $key) {
				?>
				<tr style="cursor: pointer;" onclick="loadcliente(<?= $key['id']; ?>, '<?= $key['nome']; ?>')">
					<td><?= $key['nome']; ?></td>
					<td><?= $key['telefone']; ?></td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
	<?php
}
?>