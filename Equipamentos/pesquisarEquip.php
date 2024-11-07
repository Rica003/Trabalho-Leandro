<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="pesquisarEquip.php">
		Equipamento: <input type="text" name="equipamento" maxlength="60" placeholder="digite o nome do Equipamento">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("conectaEquip.php");
		$equipamento=htmlentities($_POST["equipamento"]);

			// pesquisando dados
		$query = $mysqli->query("select * from equipamentos where equipamento like '%$equipamento%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='400'>
		<tr>
		<th>IDEquipamento</th>
		<th>Equipamento</th>
		<th>Localizacao</th>
		<th>Custo</th>
		<th>MarcaModelo</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[idequipe]</td>
			<td align='center'>$tabela[equipamento]</td>
			<td align='center'>$tabela[localizacao]</td>
			<td align='center'>$tabela[custo]</td>
			<td align='center'>$tabela[marcamodelo]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='equipamentos.php'> Voltar</a>
</body>
</html>