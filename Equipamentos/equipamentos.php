<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>Cadastro de Equipamentos no Galpão</h2>
	<a href="adicionarEquip.php"><button>Adicionar</button></a>
	<a href="pesquisarEquip.php"><button>Pesquisar</button></a>
	<a href="../Propriedades/propriedades.php"><button>Propriedades</button></a>
	<a href="../Culturas/culturas.php"><button>Culturas</button></a>
	<br />
	<table border="1" width="400">
		<tr>
			<th>IdEquipe</th>
			<th>Equipamento</th>
			<th>Localização</th>
			<th>Custo</th>
			<th>MarcaModelo</th>
			<th>Ação</th>
		</tr>
		
		<?php 
			// conexao com o banco de dados
			require("conectaEquip.php");
		
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from equipamentos");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idequipe]</td>
				<td align='center'>$tabela[equipamento]</td>
				<td align='center'>$tabela[localizacao]</td>
				<td align='center'>$tabela[custo]</td>
				<td align='center'>$tabela[marcamodelo]</td>
			

				<td width='120'><a href='excluirEquip.php?excluirEquip=$tabela[idequipe]'>[excluir]</a>
				<a href='alterarEquip.php?alterarEquip=$tabela[idequipe]'>[alterar]</a></td>
				</tr>
			";}
		?>
	</table>
</body>
</html>