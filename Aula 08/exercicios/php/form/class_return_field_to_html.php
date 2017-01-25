<?php 
// Funcões recuperar campo preenchido
function rtText($value) 
{
	if (isset($_POST["$value"] ) ) 
	{
		echo "value='" .$_POST["$value"] ."'";		
	}
}

// Funcão recuperar valor checked
function rtChecked($name, $value) 
{
	if (isset($_POST["$name"]) && $_POST["$name"] == "$value") 
	{
		echo "checked";		
	}
}

// Funcão recuperar valor checbox
function rtChebox($name) 
{
	if (isset($_POST["$name"])) 
	{
		echo "checked";		
	}
}

// Funcão recuperar valor selected
function rtSelected($name, $value) 
{
	if (isset($_POST["$name"]) && $_POST["$name"] == "$value") 
	{
		echo "selected";		
	}
}

// Função recuperar arquivo para enviar.
?>