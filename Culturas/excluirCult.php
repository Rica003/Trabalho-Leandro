<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php 
	// GET - leitura - parametro idcli passado pela url
	if(isset($_GET["excluirCult"])){

		$idcultura = htmlentities($_GET["excluirCult"]);
		require("conectaCult.php");
		$mysqli->query("delete from culturas where idcultura = '$idcultura'");
		echo $mysqli->error;
		if ($mysqli->error==""){
			echo "Excluido com Sucesso<br />";
			echo "<a href='culturas.php'>Voltar</a>";
		}
	}
	?>
</body>
</html>