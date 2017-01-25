<?php
$erro = null;
$valido = false;

if (isset($_REQUEST["cadastrar"]) && $_REQUEST["cadastrar"] == true) 
{
	// Validacão NOME
	if (strlen(utf8_decode($_POST["nome"])) < 3 || strlen(utf8_decode($_POST["nome"])) > 64 ) 
	{
		$erro .= "Seu nome deve ter pelemenos 3 letras e no máximo 64 letras. <br>";
	}

	// Validacão EMAIL
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) 
	{
  	$erro .= "Email inválido. <br>";
	}	
	else
	{
		// Validacão EMAIL no Banco de dados
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

		$rs = $connection->prepare("SELECT * FROM usuarios");

		$rs->execute();

		while($registro = $rs->fetch(PDO::FETCH_OBJ))
		{
			$buffer = $registro->email;
			if ($buffer == $_POST["email"]) 
			{
				$erro .= "Email já cadastrado. <br>";
				break;
			}
		}		
	}


	// Validação TELEFONE
	if (!is_numeric($_POST["telefone"]) || strlen($_POST["telefone"]) < 8) 
	{
		$erro .= "Número de telefone errado. <br>";
	}

	// Validacão NASCIMENTO DIA
	if (!is_numeric($_POST["dia"]) || $_POST["dia"] < 1 || $_POST["dia"] > 31) 
	{
		$erro .= "Dia errado. <br>";
	}

	// Validacão NASCIMENTO MÊS
	if (!is_numeric($_POST["mes"]) || $_POST["mes"] < 1 || $_POST["mes"] > 12) 
	{
		$erro .= "Mês inválido.<br>";
	}

	// Validacão NASCIMENTO ANO
	if (!is_numeric($_POST["ano"]) || strlen($_POST["ano"]) < 4) 
	{
		$erro .= "Ano inválido.<br>";
	}

	// Validacão CONHECEU
	if (!isset($_POST["conheceu"])) 
	{
		$erro .= "Conheceu onde?<br>";
	}

	// Validacão SEXO
	else if ($_POST["sexo"] != "M" && $_POST["sexo"] != "F")
	{
		$erro .= "Escolha um sexo.<br>";
	}

	// Validação NEWSLETTER
	if (!isset($_POST["newsletter"]) && isset($_POST["newsletter"])) 
	{
		$erro .= "Erro código: newsletter incoerente, não gravar no banco.<br>";
	}

	// Validação senha
	if (isset($_POST["senha"]) && strlen($_POST["senha"]) < 5) 
	{
		$erro .= "Senha incorreta.<br>";
	}
	// Se validado, cadastrar
	if (!isset($erro))
	{
		$valido = true;
	}
}
?>