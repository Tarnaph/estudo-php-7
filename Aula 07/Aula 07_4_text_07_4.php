<p>
	<h5>Formulário Upload</h5>
	1) Construa o html. <br>
	2) Em <code>form</code> deve conter <code>enctype="multipart/form-data"</code>. <br>
	3) Com os campos: <code>< input type="file" name="campoArquivo" ></code>. <br>
	4) Confira a url para saber se o arquivo foi enviado.
<code><pre>
if (isset($_REQUEST["envio"]) && $_REQUEST["envio"] == "true") 
{
	# code...
}</code></pre>
	5) Construa outro if com a supervariável <code>$_FILES</code>.
<code><pre>
if (isset($_FILES["campoArquivo"])) 
{
	# validações
}	
</pre></code>
	6) Construa o erro =0 no inicio do código, um bloco if para verificar se ele é 
	diferente de 0, se for algo deu errado. <br>
	7) Para acessar as supervariáveis do $_FILES:
<code><pre>
$arquivoNome = $_FILES["campoArquivo"]["name"];
$arquivoTipo = $_FILES["campoArquivo"]["type"];
$arquivoSize = $_FILES["campoArquivo"]["size"];
$arquivoNomeTemp = $_FILES["campoArquivo"]["tmp_name"];
$erro = $_FILES["campoArquivo"]["error"];	
</pre></code>
	8) Validações e código final: 
<code><pre>
if(isset($_REQUEST["envio"]) && $_REQUEST["envio"] == "true")
{
  $erro = 0;
  
  if(isset($_FILES["campoArquivo"]))
  {
    $arquivoNome = $_FILES["campoArquivo"]["name"];
    $arquivoTipo = $_FILES["campoArquivo"]["type"];
    $arquivoTamanho = $_FILES["campoArquivo"]["size"];
    $arquivoNomeTemp = $_FILES["campoArquivo"]["tmp_name"];
    $erro = $_FILES["campoArquivo"]["error"];
    
    if($erro == 0)
    {
        if(is_uploaded_file($arquivoNomeTemp))
        {
            if(move_uploaded_file($arquivoNomeTemp, "uploads/".$arquivoNome))
            {
                echo "Sucesso! ";
                            
                echo "Nome original: " . $arquivoNome";
                echo "Tipo: " . $arquivoTipo";
                echo "Tamanho: " . $arquivoTamanho";
                echo "Nome temporário: " . $arquivoNomeTemp";
            }
            else
            {
                $erro = "Falha ao mover o arquivo.";
            }
        }
        else
        {
            $erro = "Erro no envio: arquivo não recebido com sucesso.";
        }
    }
    else
    {
        $erro = "Erro no envio: " . $erro;
    }
  }
  else
  {
      $erro = "Arquivo enviado não encontrado.";
  }
  
  if($erro !== 0)
  {
      echo $erro;
  }
}	
</pre></code>
</p>