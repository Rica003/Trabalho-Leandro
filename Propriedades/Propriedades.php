<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h2>Cadastro de Propriedades dos Clientes</h2>
	<a href="adicionarProp.php"><button>Adicionar</button></a>
	<a href="pesquisar.php"><button>Pesquisar</button></a>
	<a href="../Culturas/culturas.php"><button>Culturas</button></a>
	<a href="../Equipamentos/equipamentos.php"><button>Equipamentos</button></a>
	<br />
	<table border="1" width="400">
		<tr>
			<th>Id</th>
			<th>Propriedade</th>
			<th>Proprietario</th>
			<th>Area</th>
			<th>Cultura</th>
			<th>Ação</th>
		</tr>
		
		<?php 
			// conexao com o banco de dados
			require("conecta.php");
		
			// executar comandos sql
			// consulta registros da tabela
			$query = $mysqli->query("select * from propriedades");
			echo $mysqli->error;

			// carrega consulta de registros
			while ($tabela = $query->fetch_assoc()){
				echo "
				<tr><td align='center'>$tabela[idprop]</td>
				<td align='center'>$tabela[propriedade]</td>
				<td align='center'>$tabela[proprietario]</td>
				<td align='center'>$tabela[area]</td>
				<td align='center'>$tabela[cultura]</td>
			

				<td width='120'><a href='excluir.php?excluir=$tabela[idprop]'>[excluir]</a>
				<a href='alterar.php?alterar=$tabela[idprop]'>[alterar]</a></td>
				</tr>
			";}
		?>
	</table>
</body>
</html>