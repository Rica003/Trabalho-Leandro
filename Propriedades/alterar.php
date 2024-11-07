<?php 
	require("conecta.php");
	$propriedade="";
	$nomedono="";
	$area="";
	$cultura="";

	// GET - leitura - parametro idcli passado pela url
	if(isset($_GET["alterar"])){
		$idprop = htmlentities($_GET["alterar"]);
		$query=$mysqli->query("select * from propriedades where idprop = '$idprop'");
		$tabela=$query->fetch_assoc();
		$propriedade=$tabela["propriedade"];		
		$nomedono=$tabela["proprietario"];
		$area=$tabela["area"];		
		$cultura=$tabela["cultura"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="alterar.php">
		<input type="hidden" name="idprop" value="<?php echo $idprop ?>">
		Propriedade: <input type="text" name="propriedade" value="<?php echo $propriedade ?>">
		<br/><br/>			
		Nomedono: <input type="text" name="proprietario" value="<?php echo $nomedono ?>">
		<br/><br/>			
		Area m²: <input type="text" name="area" value="<?php echo $area ?>">
		<br/><br/>			
		Cultura: <input type="text" name="cultura" value="<?php echo $cultura ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="propriedades.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idprop=htmlentities($_POST["idprop"]);
		$propriedade=htmlentities($_POST["propriedade"]);	
		$nomedono=htmlentities($_POST["proprietario"]);
		$area=htmlentities($_POST["area"]);	
		$cultura=htmlentities($_POST["cultura"]);

		$mysqli->query("update propriedades set propriedade = '$propriedade', proprietario='$nomedono', area = '$area', cultura = '$cultura' where idprop = '$idprop'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>