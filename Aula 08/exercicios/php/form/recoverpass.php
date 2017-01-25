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
	
	$rs = $connection->prepare("SELECT id FROM usuarios WHERE email = ?");
	$rs->bindParam(1, $_POST["email"]);

	if($rs->execute())
	{
		while($registro = $rs->fetch(PDO::FETCH_OBJ))
		{
			setcookie("visitante", "visitante", time() + 3600,"/php7/Aula%2008/exercicios/editpass.php");
			header("location: editpass.php?id=" .$registro->id);
		}
	}
	else
	{
		echo "Falha na selecão de usuários. <br>";
	}
?>
