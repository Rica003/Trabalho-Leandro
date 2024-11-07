<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="pesquisar.php">
		Nome do Dono: <input type="text" name="proprietario" maxlength="40" placeholder="digite o nome">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("conecta.php");
		$nomedono=htmlentities($_POST["proprietario"]);

			// pesquisando dados
		$query = $mysqli->query("select * from propriedades where proprietario like '%$nomedono%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='400'>
		<tr>
		<th>ID</th>
		<th>Propriedade</th>
		<th>Nome do Dono</th>
		<th>Area</th>
		<th>Cultura</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[idprop]</td>
			<td align='center'>$tabela[propriedade]</td>
			<td align='center'>$tabela[proprietario]</td>
			<td align='center'>$tabela[area]</td>
			<td align='center'>$tabela[cultura]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='propriedades.php'> Voltar</a>
</body>
</html>