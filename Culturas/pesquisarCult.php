<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="pesquisarCult.php">
		Cultura: <input type="text" name="cultura" maxlength="60" placeholder="digite o nome da Cultura">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("conectaCult.php");
		$cultura=htmlentities($_POST["cultura"]);

			// pesquisando dados
		$query = $mysqli->query("select * from culturas where cultura like '%$cultura%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='400'>
		<tr>
		<th>IDCultura</th>
		<th>Cultura</th>
		<th>Variedade</th>
		<th>Ciclo</th>
		<th>Colheita</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[idcultura]</td>
			<td align='center'>$tabela[cultura]</td>
			<td align='center'>$tabela[variedade]</td>
			<td align='center'>$tabela[ciclo]</td>
			<td align='center'>$tabela[colheita]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='culturas.php'> Voltar</a>
</body>
</html>