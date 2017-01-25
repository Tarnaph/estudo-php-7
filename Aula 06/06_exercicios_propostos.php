<?php

/***************
* Exercício 01 *
***************/
echo "Exercício 01: ";

function copia_arquivo($origem, $destino) {

	$arquivoOrigem = fopen($origem, "r");
	$arquivoDestino = fopen($destino, "w");

	while($buffer = fread($arquivoOrigem, 2)) 
	{
		fwrite($arquivoDestino, $buffer);
	}

	fclose($arquivoOrigem);
	fclose($arquivoDestino);

}
echo copia_arquivo("C:/teste.txt", "C:/testeCOPY.txt");

echo "<BR><BR>";



/***************
* Exercício 02 *
***************/
echo "Exercício 02: ";

function lista_arquivos($diretorio) 
{
	$dir = opendir($diretorio);

	while(false !== ($file = readdir($dir))) 
	{
		echo $file . "<BR>";
	}

	closedir($dir);

}
lista_arquivos("C:/");

echo "<BR><BR>";



/***************
* Exercício 03 *
***************/
echo "Exercício 03: ";

function loga_informacao($string) 
{
	$arquivoDeLog = fopen("C:/log.txt", "a+");

	fwrite($arquivoDeLog, date("d/m/Y H:m:s") . " " . $string . "\r\n");
}
loga_informacao("Olá mundo!");

echo "<BR><BR>";



/***************
* Exercício 04 *
***************/
echo "Exercício 04: ";

function carrega_propriedades($origem) 
{
	$propriedades = array();

  /*
  * Para carregar um arquivo de propriedades de forma mais simples, abra o 
  * arquivo por meio do comando 'file' para poder navegar em suas linhas de
  * uma forma mais direta, como em um array.    
  */  
	$arquivo = file($origem);
	for($x=0; $x<count($arquivo); $x++) 
	{
		$chave = substr($arquivo[$x], 0, strpos($arquivo[$x], "="));
		$valor = substr($arquivo[$x], strpos($arquivo[$x], "=") + 1);
		$propriedades[$chave] = $valor;
	}

	return $propriedades;
}
print_r(carrega_propriedades("C:/fileproperties.txt"));

?>
