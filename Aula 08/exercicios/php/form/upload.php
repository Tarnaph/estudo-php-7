<?php 
if(isset($_REQUEST["cadastrar"]) && $_REQUEST["cadastrar"] == true)
{
  $erro_file_upload = 0;
  
 	if(isset($_FILES["foto"]))
  {
    $arquivoNome = "hero.jpg"; //$_FILES["foto"]["name"];
    $arquivoTipo = $_FILES["foto"]["type"];
    $arquivoTamanho = $_FILES["foto"]["size"];
    $arquivoNomeTemp = $_FILES["foto"]["tmp_name"];
    $erro_file_upload = $_FILES["foto"]["error"];
    
    if($erro_file_upload == 0)
    {
	    if(is_uploaded_file($arquivoNomeTemp))
	    {
	      if(move_uploaded_file($arquivoNomeTemp, "img/". $arquivoNome))
	      {
	          echo "Sucesso! <BR>";	                      
	          echo "Nome original: " . $arquivoNome . "<BR>";
	          echo "Tipo: " . $arquivoTipo . "<BR>";
	          echo "Tamanho: " . $arquivoTamanho . "<BR>";
	          echo "Nome temporário: " . $arquivoNomeTemp . "<BR>";
	      }
	      else
	      {
	      	$erro_file_upload = "Falha ao mover o arquivo (permissão de acesso, caminho inválido)";
	      }
	    }
	    else
	    {
	    	$erro_file_upload = "Erro no envio: arquivo não recebido com sucesso.";
	    }
    }
    else
    {
    	$erro_file_upload = "Erro no envio: " . $erro_file_upload;
    }
  }
  else
  {
  	$erro_file_upload = "Arquivo enviado não encontrado.";
  }
  
  if(!isset($_FILES["foto"]) && $erro_file_upload !== 0)
  {
  	echo $erro_file_upload;
  }
}
?>