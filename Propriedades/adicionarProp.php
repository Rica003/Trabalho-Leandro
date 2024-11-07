<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="adicionarProp.php">
		Propriedade: <input type="text" name="propriedade" maxlength="60" placeholder="nome da propriedade">
		<br/><br/>
		Nome do Proprietario: <input type="text" name="proprietario" maxlength="60" placeholder="digite o nome">
		<br/><br/>
		Area m²: <input type="text" name="area" maxlength="6" placeholder="digite o tamanho da area(nº)">
		<br/><br/>
		Cultura: <input type="text" name="cultura" maxlength="60" placeholder="digite a cultura do seu agronegocio">
		<br/><br/>	
		<input type="submit" value="salvar" name="botao">
	</form>

</body>
</html>

<?php 
if(isset($_POST["botao"])){

	require("conecta.php");

	//$nome=$_POST["nome"];
	$propriedade=htmlentities($_POST["propriedade"]);	
	$nomedono=htmlentities($_POST["proprietario"]);
	$area=htmlentities($_POST["area"]);	
	$cultura=htmlentities($_POST["cultura"]);

	// gravando dados
	$mysqli->query("insert into propriedades values('', '$propriedade', '$nomedono', '$area', '$cultura')");
	echo $mysqli->error;

	if($mysqli->error == ""){

		echo "<br />Inserido com sucesso<br /></br />";

		echo "<a href='propriedades.php'> Voltar</a>";
	}

}
?>