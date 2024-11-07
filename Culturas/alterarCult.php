<?php 
	require("conectaCult.php");
    $cultura="";
	$variedade="";
	$ciclo="";
	$colheita="";

	// GET - leitura - parametro idcli passado pela url
	if(isset($_GET["alterarCult"])){
		$idcultura = htmlentities($_GET["alterarCult"]);
		$query=$mysqli->query("select * from culturas where idcultura = '$idcultura'");
		$tabela=$query->fetch_assoc();
		$cultura=$tabela["cultura"];		
		$variedade=$tabela["variedade"];
		$ciclo=$tabela["ciclo"];		
		$colheita=$tabela["colheita"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="alterarCult.php">
		<input type="hidden" name="idcultura" value="<?php echo $idcultura ?>">
		Cultura Utilizada: <input type="text" name="cultura" value="<?php echo $cultura ?>">
		<br/><br/>			
		Variedade: <input type="text" name="variedade" value="<?php echo $variedade ?>">
		<br/><br/>			
		Ciclo: <input type="text" name="ciclo" value="<?php echo $ciclo ?>">
		<br/><br/>			
		Colheita: <input type="text" name="colheita" value="<?php echo $colheita ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="culturas.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idcultura=htmlentities($_POST["idcultura"]);
		$cultura=htmlentities($_POST["cultura"]);	
		$variedade=htmlentities($_POST["variedade"]);
		$ciclo=htmlentities($_POST["ciclo"]);	
		$colheita=htmlentities($_POST["colheita"]);

		$mysqli->query("update culturas set cultura = '$cultura', variedade='$variedade', ciclo = '$ciclo', colheita = '$colheita' where idcultura = '$idcultura'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>