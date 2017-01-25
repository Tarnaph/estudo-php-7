<!-- Título da page -->
<h5>Aula 11.3 ZIP</h5>

<!-- Zip -->
<h6>Criando Arquivos Zip</h6>

<!-- Text -->
<p>
1) Crie um zip <code>new ZipArchive();</code>. <br>
2) Defina o endereço para uma $var. <br>
3) Verifique se foi aberto e criado o arquivo. <br>
4) Se positivo compacte <code>$seuzip->addFile()</code>
</p>

<!-- CODE PRE PHP Criando ZIP -->	
<code><pre>
// Criando um novo Zip
$meuZip = new ZipArchive();
// Pegando o endereço 
$filename = "Extra_ZipExemplo.zip";
// If Válidando se o arquivo foi criado
if($meuZip->open($filename, ZipArchive::CREATE)!= TRUE)
{
	echo "Falha na abertura e/ou criação do arquivo" .$filename;
}
else
{	
	// Compactando um arquivo zip
	$meuZip->addFile("Extra_ZipArquivoExemplo.txt");
	echo "Arquivo <b>" .$filename ." </b>criado com sucesso:";

	// Criando um arquivo diretamente dentro do arquivo zip
	$meuZip->addFromString("teste.txt","Conteúdo de teste.txt");

	// Criando diretório
	$meuZip->addEmptyDir("Diretorio");
	$meuZip->addFromString("Diretorio/Teste2.txt","Conteúdo 2");

	// Fehcar o arquivo
	$meuZip->close();
}
</pre></code>

<!-- PHP Criando ZIP -->
<?php 
	// Criando um novo Zip
	$meuZip = new ZipArchive();
	// Pegando o endereço 
	$filename = "Extra_ZipExemplo.zip";
	// If Válidando se o arquivo foi criado
	if($meuZip->open($filename, ZipArchive::CREATE)!= TRUE)
	{
		echo "Falha na abertura e/ou criação do arquivo" .$filename;
	}
	else
	{	
		// Compactando um arquivo zip
		$meuZip->addFile("Extra_ZipArquivoExemplo.txt");
		echo "Arquivo <b>" .$filename ." </b>criado com sucesso:";

		// Criando um arquivo diretamente dentro do arquivo zip
		$meuZip->addFromString("teste.txt","Conteúdo de teste.txt");

		// Criando diretório
		$meuZip->addEmptyDir("Diretorio");
		$meuZip->addFromString("Diretorio/Teste2.txt","Conteúdo 2");

		// Fehcar o arquivo
		$meuZip->close();
	}
?>

<!--  extracTo() -->
<h6> extracTo()</h6>

<!-- Text -->
<p>
1) Pegue o endereço do zip. <br>
2) Verifique se foi aberto. <br>
3) Extraia-o <code>extractTo();</code>. <br>
4) Feche o arquivo zip.
</p>

<!-- CODE PRE PHP extractTo  -->	
<code><pre>
// Pegando o endereço
$filename="Extra_ZipExemplo.zip";
// Criando um novo zip
$meuZip=new ZipArchive();
// Verificando se zip foi aberto
if($meuZip->open($filename) === TRUE)
{
	//Extraindo os arquivos zip
	$meuZip->extractTo("./Extra_ZipExtracted/");
	// Fechando o zip
	$meuZip->close();
	echo "Arquivo descompactado com sucesso.";
}
else
{
	echo "Falha na abertura do arquivo.";
}
</pre></code>

<!-- PHP extractTo -->
<?php 
	// Pegando o endereço
	$filename="Extra_ZipExemplo.zip";
	// Verificando se zip foi aberto
	if($meuZip->open($filename) === TRUE)
	{
		//Extraindo os arquivos zip
		$meuZip->extractTo("./Extra_ZipExtracted/");
		// Fechando o zip
		$meuZip->close();
		echo "Arquivo descompactado com sucesso. <br><br>";
	}
	else
	{
		echo "Falha na abertura do arquivo.";
	}
?>

<!-- Propriedades Zip -->
<h6>Propriedades Zip</h6>

<!-- Text -->
<p>
Codigos novos/revisão: <br>
1) <code>zip_open();</code>. <br>
2) <code>zip_read();</code>. <br>
3) <code>zip_entry_name();</code>. <br>
4) <code>zip_entry_fileszise;</code>. <br>
5) <code>zip_entry_compressionmethod();</code>. <br>
6) <code> new ZipArchive();</code>. <br>
7) <code>->extractTo();</code>. <br>
8) <code>->close();</code>. <br>
9) <code>->addFile("Arquivo para ser add");</code>. <br>
10) <code>->addEmptyDir("nome");</code>. <br>
11) <code>->addFromString("arquivo","texto novo");</code>. <br>

</p>

<!-- CODE PRE Propriedades Zip -->	
<code><pre>
// Pegando o enredeço do arquivo
$filename = "Extra_ZipExemplo.zip";
// Abrindo o arquivo zip
$meuZip = zip_open($filename);
// Se tivar algo setado no zip
if($meuZip) 
{
	// Com while para navegar em todos os arquivos
	while($zipEntry = zip_read($meuZip))
	{
		// Nome
		echo "Nome: " .zip_entry_name($zipEntry);
		// Tamanho Antes
		echo "Tamanho: " .zip_entry_filesize($zipEntry);
		// Tamanho Depois
		echo "Tamanho comprimido: " .zip_entry_compressedsize($zipEntry);
		// Tipo do zip aplicado
		echo "Método de compressão: " .zip_entry_compressionmethod($zipEntry);
	}
}
else
{
	echo "Falha na abertura do arquivo zip.";
}
</pre></code>

<!-- Propriedades Zip -->
<?php 
	// Pegando o enredeço do arquivo
	$filename = "Extra_ZipExemplo.zip";
	// Abrindo o arquivo zip
	$meuZip = zip_open($filename);
	// Se tivar algo setado no zip
	if($meuZip) 
	{
		// Com while para navegar em todos os arquivos
		while($zipEntry = zip_read($meuZip))
		{
			// Nome
			echo "Nome: " .zip_entry_name($zipEntry);
			// Tamanho Antes
			echo "<br>Tamanho: " .zip_entry_filesize($zipEntry);
			// Tamanho Depois
			echo "<br>Tamanho comprimido: " .zip_entry_compressedsize($zipEntry);
			// Tipo do zip aplicado
			echo "<br>Método de compressão: " .zip_entry_compressionmethod($zipEntry);
			echo "<br><br>";
		}
	}
	else
	{
		echo "Falha na abertura do arquivo zip.";
	}
?>
<br>
<center>🐢</center>