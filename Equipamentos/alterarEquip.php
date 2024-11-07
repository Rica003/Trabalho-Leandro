<?php 
	require("conectaEquip.php");
    $equipamento="";
	$localizacao="";
	$custo="";
	$marcamodelo="";

	// GET - leitura - parametro idcli passado pela url
	if(isset($_GET["alterarEquip"])){
		$idequipe = htmlentities($_GET["alterarEquip"]);
		$query=$mysqli->query("select * from equipamentos where idequipe = '$idequipe'");
		$tabela=$query->fetch_assoc();
		$equipamento=$tabela["equipamento"];		
		$localizacao=$tabela["localizacao"];
		$custo=$tabela["custo"];		
		$marcamodelo=$tabela["marcamodelo"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="alterarEquip.php">
		<input type="hidden" name="idequipe" value="<?php echo $idequipe ?>">
		Equipamento Utilizada: <input type="text" name="equipamento" value="<?php echo $equipamento ?>">
		<br/><br/>			
		localizacao: <input type="text" name="localizacao" value="<?php echo $localizacao ?>">
		<br/><br/>			
		Custo: <input type="text" name="custo" value="<?php echo $custo ?>">
		<br/><br/>			
		MarcaModelo: <input type="text" name="marcamodelo" value="<?php echo $marcamodelo ?>">
        <br/><br/>
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="equipamentos.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$idequipe=htmlentities($_POST["idequipe"]);
		$equipamento=htmlentities($_POST["equipamento"]);	
		$localizacao=htmlentities($_POST["localizacao"]);
		$custo=htmlentities($_POST["custo"]);	
		$marcamodelo=htmlentities($_POST["marcamodelo"]);

		$mysqli->query("update equipamentos set equipamento = '$equipamento', localizacao='$localizacao', custo = '$custo', marcamodelo = '$marcamodelo' where idequipe = '$idequipe'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>