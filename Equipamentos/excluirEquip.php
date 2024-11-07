<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
	// GET - leitura - parametro idcli passado pela url
	if(isset($_GET["excluirEquip"])){

		$idequipe = htmlentities($_GET["excluirEquip"]);
		require("conectaEquip.php");
		$mysqli->query("delete from equipamentos where idequipe = '$idequipe'");
		echo $mysqli->error;
		if ($mysqli->error==""){
			echo "Excluido com Sucesso<br />";
			echo "<a href='equipamentos.php'>Voltar</a>";
		}
	}
	?>
</body>
</html>