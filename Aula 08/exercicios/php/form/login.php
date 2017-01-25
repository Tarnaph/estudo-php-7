<?php
if (isset($_REQUEST["login"]) && $_REQUEST["login"] == true) 
	{
		$hasDaSenha = md5($_POST["senha"]);
		try 
		{
			$connection = new PDO("mysql:host=raphaelmorales.com; dbname=exerc08", sqlroot123, sqlroot123);
			$connection->exec("set names utf8");
		} 
		catch (PDOException $e) 
		{
			echo "Falha: " .$e->getMessage();
			exit();
		}
		$sql = "SELECT nome FROM usuarios WHERE email = ? and senha = ? ";
		$rs = $connection->prepare($sql);
		$rs->bindParam(1, $_POST["email"]);
		$rs->bindParam(2, $hasDaSenha);

		if ($rs->execute()) 
		{
			if($registro = $rs->fetch(PDO::FETCH_OBJ))
			{
				session_start();
				$_SESSION["usuario"] = $registro->nome;
				if (isset($_SESSION["usuario"])) 
				{
					header("location: lista.php");
				}
				else
				{
					$erro = "Sessão não iniciada.";
				}

			}
			else
			{
				$erro = "Dados inválidos";
			}
		}
		else
		{
			$erro = "Falha no acesso ao usúario.";
		}

	}
?>