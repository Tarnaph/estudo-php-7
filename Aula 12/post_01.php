<!-- Título da page -->
<h5>Aula 12.1 - Web Services - Válidações</h5>

<!--  -->
<h6>Web Service</h6>

<!-- Web Service -->
<p>
<form action="?numero" method="GET">
	<input type="number" name="numero" value="<?php echo $_REQUEST['numero'] ?>">
	<input type="submit" value="Enviar">
</form>
</p>

<!-- PHP -->
<?php 
	$numero = $_REQUEST["numero"];
	echo "$numero <br>";

	// Conectando ao webservices
	$xml = simplexml_load_file
	("http://localhost:8888/Aula 12/WebService_ParImparService.php?numero=" .$numero);

	// if
	if (isset($xml->informacao) && $numero != "") 
	{
		if ($xml->informacao == "Par") 
		{
			echo "Este número é par.";
		}
		elseif ($xml->informacao == "Ímpar") 
		{
			echo "Este número é ímpar.";
		}
		else
		{
			echo "Retorno inválido.";
		}
	}
	else
	{
		echo "⬆️ Este número inteiro é par ou ímpar? Escolha um.";
	}
?>

<!-- Code Pre-->	
<code><pre>
------------
Web Service
------------
header("content-type: text/xml");

$numero = $_REQUEST["numero"];
if ($numero % 2 == 0) 
{
	$informacao = "Par";
}
else
{
	$informacao = "Ímpar";
}

if ($numero == "") 
{
	echo "Escreva um número.";
}

//XML
$dom=new DOMDocument("1.0","UTF-8");
$dom->preserveWhiteSpace = FALSE;
$dom->formatOutput = TRUE;

$elementoinformacao = $dom->createElement("informacao",$informacao);
$elementoRoot = $dom->createElement("resposta");
$elementoRoot->appendChild($elementoinformacao);
$dom->appendChild($elementoRoot);
echo $dom->saveXML();

------------
HTML + PHP
------------
$numero = $_REQUEST["numero"];
echo "$numero <br>";

// Conectando ao webservices
$xml = simplexml_load_file
("http://localhost:8888/Aula 12/WebService_ParImparService.php?numero=" .$numero);

// if
if (isset($xml->informacao) && $numero != "") 
{
	if ($xml->informacao == "Par") 
	{
		echo "Este número é par.";
	}
	elseif ($xml->informacao == "Ímpar") 
	{
		echo "Este número é ímpar.";
	}
	else
	{
		echo "Retorno inválido.";
	}
}
else
{
	echo "Escolha um número para verificar se ele é Par ou Ímpar.";
}

</pre></code>