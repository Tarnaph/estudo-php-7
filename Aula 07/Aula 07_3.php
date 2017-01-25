<?php include"../assests/head.php" ?> <!-- Header -->
<?php include"../assests/menu.php" ?>

<?php

if(isset($_REQUEST["envio"]) && $_REQUEST["envio"] == "true")
{
  //$erro = 0;
  
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

<FORM enctype="multipart/form-data" method=POST action="Aula%2007_3.php?envio=true">
	Arquivo:
	<INPUT type=FILE name=campoArquivo><BR>
	<INPUT type=SUBMIT value='Enviar'>
</FORM>



<?php include"../assests/footer.php" ?>