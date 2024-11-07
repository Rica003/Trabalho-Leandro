<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="adicionarCult.php">
		Cultura Utilizada: <input type="text" name="cultura" maxlength="60" placeholder="digite o nome da cultura">
		<br/><br/>
		Variedade de Plantação: <input type="text" name="variedade" maxlength="60" placeholder="digite a variedade da sua fazenda">
		<br/><br/>
		Ciclo: <input type="text" name="ciclo" maxlength="20" placeholder="digite o ciclo da sua fazenda">
		<br/><br/>
		Colheita: <input type="text" name="colheita" maxlength="20" placeholder="digite o tipo da colheita">
		<br/><br/>	
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("conectaCult.php");

	//$nome=$_POST["nome"];
	$cultura=htmlentities($_POST["cultura"]);	
	$variedade=htmlentities($_POST["variedade"]);
	$ciclo=htmlentities($_POST["ciclo"]);	
	$colheita=htmlentities($_POST["colheita"]);

	// gravando dados
	$mysqli->query("insert into culturas values('', '$cultura', '$variedade', '$ciclo', '$colheita')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='culturas.php'> Voltar</a>";
	}

}
?>