<!-- Título da page -->
<h5>Aula 11.1 XML</h5>

<!-- XML -->
<h6>DOMDocumente();</h6>

<!-- Class e New Básicos -->
<p>
Crie um novo documento: <code>DOMDocument</code>, de refina alguns
dos seus parâmetros como <code>->preserveWhiteSpace</code> e <code>->formatOutput</code>. <br>
<code> $dom = new DOMDocument("1.0","UFT-8");</code> <br>
<code> $dom->preserveWhiteSpace = FALSE;</code> <br>
<code> $dom->formatOutput = TRUE; </code> <br>

<b>Crie o root</b><br>
$root = $dom->createElement("OBJECTS");

</p>


<!-- Exemplo Class e New Básicos -->	
<code><pre>
$states = array("PR","RS","SC","SP","RJ");
$statesSouth = array("PR","RS","SC");

$dom = new DOMDocument("1.0","UTF-8");
$dom->preserveWhiteSpace = FALSE;
$dom->formatOutput = TRUE;

$root = $dom->createElement("OBJECTS");
$idFicticio = 1;

//criar cada elemento
foreach($states as $state)
{
  $estadoElemento = $dom->createElement("OBJECT");
  $sulAtributo = $dom->createAttribute("Sul");

	if(in_array($state, $statesSouth))
	{
	    $sulAtributo->value = "Sim";
	}
	else
	{
	    $sulAtributo->value = "Não";
	}

	$idElemento = $dom->createElement("ID", $idFicticio);
	$idElemento->appendChild($sulAtributo);
	$idFicticio++;

	$descricaoElemento = $dom->createElement("DESCRIPTION", $state);

  $estadoElemento->appendChild($idElemento);
  $estadoElemento->appendChild($descricaoElemento);
  $root->appendChild($estadoElemento);
}

$dom->appendChild($root);
$dom->save("Extra_XML.xml");
</pre></code>

<!-- Class e New Básicos -->
<?php 
$states = array("PR","RS","SC","SP","RJ");
$statesSouth = array("PR","RS","SC");

$dom = new DOMDocument("1.0","UTF-8");
$dom->preserveWhiteSpace = FALSE;
$dom->formatOutput = TRUE;

$root = $dom->createElement("OBJECTS");
$idFicticio = 1;

//criar cada elemento
foreach($states as $state)
{
  $estadoElemento = $dom->createElement("OBJECT");
  $sulAtributo = $dom->createAttribute("Sul");

	if(in_array($state, $statesSouth))
	{
	    $sulAtributo->value = "Sim";
	}
	else
	{
	    $sulAtributo->value = "Não";
	}

	$idElemento = $dom->createElement("ID", $idFicticio);
	$idElemento->appendChild($sulAtributo);
	$idFicticio++;

	$descricaoElemento = $dom->createElement("DESCRIPTION", $state);

  $estadoElemento->appendChild($idElemento);
  $estadoElemento->appendChild($descricaoElemento);
  $root->appendChild($estadoElemento);
}

$dom->appendChild($root);
$dom->save("Extra_XML.xml");
?>



