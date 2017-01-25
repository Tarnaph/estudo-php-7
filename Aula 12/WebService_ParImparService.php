<?php 
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
?>