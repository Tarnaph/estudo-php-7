<!-- Título da page -->
<h5>Aula 11.1 XML</h5>

<!-- Lendo Arquivos XML -->
<h6>Lendo Arquivos XML</h6>

<!-- Text -->
<p>
..text
</p>


<!-- CODE PRE -->	
<code><pre>
...code
</pre></code>

<!-- PHP-->
<?php 
$dom = new DOMDocument();
$dom->load("Extra_XML.xml");

$estados = $dom->getElementsByTagName("OBJECT");

foreach ($estados as $estado)
{
	echo $estado->getElementsByTagName("ID")->item(0)->nodeValue ."<br>";
	echo $estado->getElementsByTagName("ID")->item(0)->getAttribute("Sul") ."<br>";

	echo $estado->getElementsByTagName("DESCRIPTION")->item(0)->nodeValue ."<br>";
	echo "<br>";
}
?>



