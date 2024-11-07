<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>Cadastro de Culturas dos Clientes</h2>
	<a href="adicionarCult.php"><button>Adicionar</button></a>
	<a href="pesquisarCult.php"><button>Pesquisar</button></a>
	<a href="../Propriedades/propriedades.php"><button>Propriedades</button></a>
	<a href="../Equipamentos/equipamentos.php"><button>Equipamentos</button></a>
	<br />
	<table border="1" width="400">
		<tr>
			<th>IdCultura</th>
			<th>Cultura</th>
			<th>Variedade</th>
			<th>Ciclo</th>
			<th>Colheita</th>
			<th>Ação</th>
		</tr>
		
		<?php 
			// conexao com o banco de dados
			require("conectaCult.php");
		
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from culturas");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idcultura]</td>
				<td align='center'>$tabela[cultura]</td>
				<td align='center'>$tabela[variedade]</td>
				<td align='center'>$tabela[ciclo]</td>
				<td align='center'>$tabela[colheita]</td>
			

				<td width='120'><a href='excluirCult.php?excluirCult=$tabela[idcultura]'>[excluir]</a>
				<a href='alterarCult.php?alterarCult=$tabela[idcultura]'>[alterar]</a></td>
				</tr>
			";}
		?>
	</table>
</body>
</html>