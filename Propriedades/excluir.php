<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
	// GET - leitura - parametro idcli passado pela url
	if(isset($_GET["excluir"])){

		$idprop = htmlentities($_GET["excluir"]);
		require("conecta.php");
		$mysqli->query("delete from propriedades where idprop = '$idprop'");
		echo $mysqli->error;
		if ($mysqli->error==""){
			echo "Excluido com Sucesso<br />";
			echo "<a href='propriedades.php'>Voltar</a>";
		}
	}
	?>
</body>
</html>