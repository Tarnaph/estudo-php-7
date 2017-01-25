<?php 
// Validadores
$erro = null;
$valido = false;
if (isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true ) // verifica se o ?validar foi setado  
{
	if (strlen(utf8_decode($_POST["nome"])) < 5) // validador do nome
	{
		$erro .= "Seu nome deve ter pelo menos 5 letras. <br>";
	}
	else if (strlen(utf8_decode($_POST["email"])) < 6) // validador de email
	{
		$erro .= "Email deve ter pelo menos 6 letras. <br>";
	}
	else if (is_numeric($_POST["idade"]) == false) // validador idade
	{
		$erro .= "Idade inválida, preencha corretamente com números. <br>";
	}
	else if($_POST["sexo"] != "M" && $_POST["sexo"] != "F") // validador sexo
	{
		$erro .= "Selecione o campo sexo corretamente. <br>";
	}
  else if($_POST["estadocivil"] != "Solteiro" && // validador estado civil
	$_POST["estadocivil"] != "Casado" &&
	$_POST["estadocivil"] != "Divorciado" &&
	$_POST["estadocivil"] != "Viúvo")
	{
		$erro .= "Selecione o campo de estado civil corretamente.";
	}
	else
	{
		$valido = true;
		// Cadastrar no banco de dados - START
		try
		{	
			// conectando com o sql
			$connection = new PDO("mysql::host=localhost;dbname=cursophp","root","root");
			// garantido uft8 no banco
			$connection->exec("set names utf8");
		}
		catch(PDOException $e)
		{
			echo "Falha:" .$e->getMessage();
			exit();
		}

		// Inserindo no banco
		// Cada ? faz referencia ao campos(nome,...) 
		$sql = "INSERT INTO usuarios
		(nome, email, idade, sexo, estado_civil, humanas, exatas, biologicas, senha)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";		

		// Prepara o sql para ser executado - definindo os ?
		$stmt = $connection->prepare($sql);

		$stmt->bindParam(1, $_POST["nome"]);
		$stmt->bindParam(2, $_POST["email"]);
		$stmt->bindParam(3, $_POST["idade"]);
		$stmt->bindParam(4, $_POST["sexo"]);
		$stmt->bindParam(5, $_POST["estadocivil"]);

		// SHORT IF para definir 0 ou 1 por causa checkBox
		$checkHumanas = isset($_POST["humanas"]) ? 1 : 0;
		$stmt->bindParam(6, $checkHumanas);

		$checkExatas = isset($_POST["exatas"]) ? 1 : 0;
		$stmt->bindParam(7, $checkExatas);

		$checkBiologicas = isset($_POST["biologicas"]) ? 1 : 0;
		$stmt->bindParam(8, $checkBiologicas);

		// Senha - com crypt
		$passwordHash = md5($_POST["senha"]);
		$stmt->bindParam(9,$passwordHash);

		// Inserindo no banco
		$stmt->execute();
		// Se der erro mostrar o erro no banck
		if ($stmt->errorCode() != "00000") 
		{
			$valido = false;
			$erro = "Erro código " .$stmt->errorCode() .": ";
			$erro .= implode(", ", $stmt->errorInfo());
		}
	}	
}

// Funcões recuperar campo preenchido
function returnText($value) 
{
	if (isset($_POST["$value"] ) ) 
	{
		echo "value='" .$_POST["$value"] ."'";		
	}
}

// Funcão recuperar valor checked
function returnChecked($name, $value) 
{
	if (isset($_POST["$name"]) && $_POST["$name"] == "$value") 
	{
		echo "checked";		
	}
}

// Funcão recuperar valor checbox
function returnChebox($name) 
{
	if (isset($_POST["$name"])) 
	{
		echo "checked";		
	}
}

// Funcão recuperar valor selected
function returnSelected($name, $value) 
{
	if (isset($_POST["$name"]) && $_POST["$name"] == "$value") 
	{
		echo "selected";		
	}
}
?>