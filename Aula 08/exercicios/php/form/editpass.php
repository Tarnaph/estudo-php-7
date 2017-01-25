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

if(isset($_POST["senha"]) && isset($_POST["repetesenha"]))
{
	if($_POST["senha"] === $_POST["repetesenha"] && strlen($_POST["senha"]) >= 4)
	{
		$valido = true;
	}
	else
	{
		$erro .= "Erro na senha, digite novamente.<br>";
		$valido = false;
	}	
}


if ($valido == true && isset($_REQUEST["editpass"]) && $_REQUEST["editpass"] == true) 
{	
	$sql = "UPDATE usuarios SET email = ?, senha = ? WHERE id = ?";
	$stmt = $connection->prepare($sql);
	$stmt->bindParam(1, $_POST["email"]);
	$passwordHash = md5($_POST["senha"]);
	$stmt->bindParam(2, $passwordHash);
	$stmt->bindParam(3, $_POST["id"]);
	$stmt->execute();	
	
	if ($stmt->errorCode() !== "00000") 
	{
		$valido = false;
		$erro = "Erro código " .$stmt->errorCode() .": ";
		$erro .= implode(", ", $stmt->errorInfo());
	}
	
	if (isset($_SESSION["usuario"])) 
	{
		header("Location: lista.php");
	}
	else
	{
		header("Location: index.php");	
	}
}
else
{
	$rs = $connection->prepare("SELECT * FROM usuarios WHERE id = ?");
	$rs->bindParam(1, $_REQUEST["id"]);

	if($rs->execute())
	{
		if($registro = $rs->fetch(PDO::FETCH_OBJ))
		{
			$_POST["nome"] = $registro->nome;		
			$_POST["email"] = $registro->email;		
		}
		else
		{
			$erro = "Registro não encotrado.";
		}
	}
	else
	{
		$erro = "Falha na captura do registro.";
	}
}
?>