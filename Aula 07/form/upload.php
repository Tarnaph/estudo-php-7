<?php 
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
                echo "Sucesso! <BR>";
                            
                echo "Nome original: " . $arquivoNome . "<BR>";
                echo "Tipo: " . $arquivoTipo . "<BR>";
                echo "Tamanho: " . $arquivoTamanho . "<BR>";
                echo "Nome temporário: " . $arquivoNomeTemp . "<BR>";
            }
            else
            {
                $erro = "Falha ao mover o arquivo (permissão de acesso, caminho inválido)";
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
?>

<!-- Formulário Grid Right-->
<div class="mdl-grid mdl-shadow--8dp">

	<!-- Formulário Start -->
	<div class="mdl-grid">		
			<h5>Meu Formulário Upload</h5>
			<img src="test2.jpg" alt=""> <br>

	<!-- Formulário Start Right -->
	<form enctype="multipart/form-data" method="post" action="?envio=true">

		<!-- Arquivo Upload -->
		<h6>Arquivo:</h6>
		<div class="mdl-cell mdl-cell--12-col"> 
			<input class="mdl-textfield__input" type="file" name="campoArquivo">
		</div>

		<!-- Btn Enviar -->
		<div class="mdl-cell mdl-cell--2-col">
			<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
				Enviar
			</button>
		</div>

	<!-- Formulário End -->
	</form>

	<!-- Formulário End -->
	</div>

<!-- Formulário End -->
</div>