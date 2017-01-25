<?php 
	try
	{	
		$connection = new PDO("mysql::host=raphaelmorales.com;dbname=exerc08",sqlroot123,sqlroot123);
		$connection->exec("set names utf8");
	}
	catch(PDOException $e)
	{
		echo "Falha:" .$e->getMessage();
		exit();
	}

	if(isset($_REQUEST["excluir"]) && $_REQUEST["excluir"] == true)
	{
		$stmt = $connection->prepare("DELETE FROM usuarios WHERE id = ?");
		$stmt->bindParam(1, $_REQUEST["id"]);
		$stmt->execute();

		if($stmt->errorCode() != "00000")
		{
			echo "Erro código " .$stmt->errorCode() .": ";
			echo implode(", ", $stmt->errorInfo());
		}
		else
		{
			echo "Sucesso usuário removido com sucesso <br>";
		}
	}

	$rs = $connection->prepare("SELECT * FROM usuarios");

	if($rs->execute())
	{
		while($registro = $rs->fetch(PDO::FETCH_OBJ))
		{
			echo "<tr>";
				echo "<td>" .$registro->nome ."</td>";
				echo "<td>" .$registro->email ."</td>";
				echo "<td>" .$registro->telefone ."</td>";
				// echo "<td>" .$registro->dia ."</td>";
				// echo "<td>" .$registro->mes ."</td>";
				// echo "<td>" .$registro->ano ."</td>";
				// echo "<td>" .$registro->conheceu ."</td>";
				// echo "<td>" .$registro->sexo ."</td>";
				// echo "<td>" .$registro->newsletter ."</td>";
				// echo "<td>" .$registro->ui_dsg ."</td>";
				// echo "<td>" .$registro->ux_dsg ."</td>";
				// echo "<td>" .$registro->gui_dsg ."</td>";
				// echo "<td>" .$registro->html5 ."</td>";
				// echo "<td>" .$registro->css3 ."</td>";
				// echo "<td>" .$registro->javascript ."</td>";
				// echo "<td>" .$registro->php7 ."</td>";
				// echo "<td>" .$registro->swift ."</td>";
				// echo "<td>" .$registro->senha ."</td>";
				echo "<td>";
					echo "<button class= ' row waves-effect waves-light btn grey darken-3 '> <a href='?excluir=true&id=" .$registro->id ."'>Excluir </a> </button>";
					echo "<button class= ' row waves-effect waves-light btn grey darken-3 '> <a href=edit.php?id=" .$registro->id .">Editar </a> </button>";
					echo "<button class= ' row waves-effect waves-light btn grey darken-3 '> <a href='editpass.php?id=" .$registro->id ."'>Senha</a> </button>";
				echo "</td>";
			echo "</tr>";
		}
	}
	else
	{
		echo "Falha na selecão de usuários. <br>";
	}
?>