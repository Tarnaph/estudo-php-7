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
	else if($_POST["sexo"] != "M" && $POST["sexo"] != "F") // validador sexo
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