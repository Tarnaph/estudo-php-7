<?php include"../assests/head.php" ?>
<?php include"../assests/menu.php" ?>
 <?php echo "<h3>Aula 06 - EXERCÍCIOS</h3>"; ?> 
            
            <!-- EXERCÍCIOS 01 COMEÇO -->
            <h6><b>Exercício 01: </b></h6>
            <p class="justify">
            Escreva uma função que copia um arquivo, 
            baseado em dois parâmetros: caminho de origem, caminho de destino.
            </p>
            <p>
              <b>Reposta:</b>
              <p class="reposta"> 
              <?php               
                // Criei um arquivo fake.txt                 
                $filepath = "/Applications/MAMP/htdocs/Aula 06/Fake.txt";
                $meuArquivo = fopen($filepath ,"a+");
                fwrite($meuArquivo,"oi");
                fclose($meuArquivo);

                /* Algoritimo
                ache o caminho do arquivo
                abra esse arquivo
                leia oque tem dentro e capture
                feche o arquivo
                ache o novo caminho
                abra outro arquivo
                escreva o que foi capturado
                feche o arquivo */           
                              
                function cmdC($filepath,$newfilepath)
                {                
                  $file = fopen($filepath ,"a+");
                  $buffer .= fread($file, filesize($filepath));
                  fclose($file);
                  
                  $fileBuffer = fopen($newfilepath, "w+");
                  fwrite($fileBuffer, "$buffer");
                  fclose($fileBuffer);
                  
                  echo "Arquivo Copiado.";
                }

                $filepath = "/Applications/MAMP/htdocs/Aula 06/Fake.jpg";
                $newfilepath = "/Applications/MAMP/htdocs/Fake.jpg";
                cmdC($filepath,$newfilepath);
              ?>             
              </p>
              <p>
                <code class="meucode">
                <pre class="meucode mdl-shadow--3dp">   
  Command + c             
  function cmdC($filepath,$newfilepath)
  {                
    $file = fopen($filepath ,"a+");
    $buffer .= fread($file, filesize($filepath));
    fclose($file);
    
    $fileBuffer = fopen($newfilepath, "w+");
    fwrite($fileBuffer, "$buffer");
    fclose($fileBuffer);
    
    echo "Arquivo Copiado.";
  }
  
  Command + x
  function cmdD($filepath,$newfilepath,$fileName)
  {                
    $file = fopen($filepath ,"a+");
    $buffer .= fread($file, filesize($filepath));
    fclose($file);
    
    $fileBuffer = fopen($newfilepath, "w+");
    fwrite($fileBuffer, "$buffer");
    fclose($fileBuffer);
    unlink("$fileName");

    echo "Arquivo Copiado e o original foi deletado";
  }
                  </pre>
                </code>
              </p>
              <p>
                <code class="codeprof">
                <pre class="codeprof mdl-shadow--3dp">
  function copia_arquivo($origem, $destino) 
  {
    $arquivoOrigem = fopen($origem, "r");
    $arquivoDestino = fopen($destino, "w");

    while($buffer = fread($arquivoOrigem, 2)) 
    {
      fwrite($arquivoDestino, $buffer);
    }

    fclose($arquivoOrigem);
    fclose($arquivoDestino);
  }
                </pre>
                </code>
              </p>
            </p> 

            <!-- EXERCÍCIOS 02 COMEÇO -->
            <h6><b>Exercício 02: </b></h6>
            <p class="justify">
            Escreva uma função que recebe o caminho de um diretório, 
            e lista todo o conteúdo do diretório em questão.
            </p>
            <p>
              <b>Reposta:</b>
              <p class="reposta"> 
                <?php 
                echo "Não consegui.";                
                ?>             
              </p>
              <p>
                <code class="meucode">
                <pre class="meucode mdl-shadow--3dp">   
  function lista_arquivos($diretorio) 
  {
    $dir = opendir($diretorio);
    while(false !== ($file = readdir($dir))) 
    {
      echo $file ;
    }
    closedir($dir);
  }
                </pre>
                </code>
              </p>
              <p>
                <code class="codeprof">
                <pre class="codeprof mdl-shadow--3dp">
                code...
                </pre>
                </code>
              </p>
            </p>

            <!-- EXERCÍCIOS 03 COMEÇO -->
            <h6><b>Exercício 03: </b></h6>
            <p class="justify">
            Escreva uma função que recebe como parâmetro uma string, e que a 
            mesma abre um arquivo de log, ou abre caso já exista, e concatena essa 
            string no final do arquivo, em uma nova linha.
            </p>
            <p>
              <b>Reposta:</b>
              <p class="reposta">              
                <a href="log.txt">Log criado e escrito.</a>
              <?php 
                function writeALog($log)
                {   
                  $filepath = "/Applications/MAMP/htdocs/Aula 06/log.txt";                              
                  $logFile = fopen($filepath ,"a+");                 
                  fwrite($logFile,"$log\r\n");                  
                  fclose($logFile);
                }
                $go = "Aqui vai meu log querido.";
                writeALog($go);
              ?>             
              </p>
              <p>
                <code class="meucode">
                <pre class="meucode mdl-shadow--3dp">   
  function writeALog($log)
  {   
    $filepath = "/Applications/MAMP/htdocs/Aula 06/log.txt";                              
    $logFile = fopen($filepath ,"a+");                 
    fwrite($logFile,"$log\r\n");                  
    fclose($logFile);
  }
                </pre>
                </code>
              </p>
              <p>
                <code class="codeprof">
                <pre class="codeprof mdl-shadow--3dp">
  function loga_informacao($string) 
  {
    $arquivoDeLog = fopen("C:/log.txt", "a+");

    fwrite($arquivoDeLog, date("d/m/Y H:m:s") . " " . $string . "\r\n");
  }
                </pre>
                </code>
              </p>
            </p>

             <!-- EXERCÍCIOS 04 COMEÇO -->
            <h6><b>Exercício 04: </b></h6>
            <p class="justify">
            Escreva uma função que lê um arquivo de configuraçoes e popula um array, 
            onde o nome da configuração é uma chave do array, e seu valor é o valor da posição 
            do array. Exemplo de um arquivo de configurações:<br>
            server = localhost <br>port = 80 <br>    
            on = true
            </p>
            <p>
              <b>Reposta:</b>
              <p class="reposta"> 
                <?php 

                  function iniToArray($filepath, $filepathBufferIni, $fileName)
                  {                  
                    
                    $file = fopen($filepath ,"a+");                 
                    $buffer = fread($file, filesize($filepath));
                    fclose($file); 

                    $fileBuffer = fopen($filepathBufferIni, "w+");
                    $strTreated = str_replace(" ", "", $buffer);                  
                    fwrite($fileBuffer, "$strTreated");
                    fclose($fileBuffer);

                    $bufferArray = file($filepathBufferIni);                  
                    $bufferStr = implode("&", $bufferArray);
                    parse_str($bufferStr,$newArrayIni);
                    unlink("$fileName");
                    return $newArrayIni; 
                  }

                  $filepath = "/Applications/MAMP/htdocs/Aula 06/sistema.ini";
                  $filepathBufferIni = "/Applications/MAMP/htdocs/Aula 06/buffer_sistema.ini";
                 
                  $go = iniToArray($filepath, $filepathBufferIni, "buffer_sistema.ini");
                  print_r($go);
                ?>             
              </p>
              <p>
                <code class="meucode">
                <pre class="meucode mdl-shadow--3dp">   
  function iniToArray($filepath)
  {                  
    $filepathBufferIni = "/Applications/MAMP/htdocs/Aula 06/buffer_sistema.ini";

    $file = fopen($filepath ,"a+");                 
    $buffer = fread($file, filesize($filepath));
    fclose($file); 

    $fileBuffer = fopen($filepathBufferIni, "w+");
    $strTreated = str_replace(" ", "", $buffer);                  
    fwrite($fileBuffer, "$strTreated");
    fclose($fileBuffer);

    $bufferArray = file($filepathBufferIni);                  
    $bufferStr = implode("&", $bufferArray);
    parse_str($bufferStr,$newArrayIni);
    unlink("buffer_sistema.ini");
    return $newArrayIni; 
  }

  Ou esse mais completo: 
  function iniToArray($filepath, $filepathBufferIni, $fileName)
  {                 
    $file = fopen($filepath ,"a+");                 
    $buffer = fread($file, filesize($filepath));
    fclose($file); 

    $fileBuffer = fopen($filepathBufferIni, "w+");
    $strTreated = str_replace(" ", "", $buffer);                  
    fwrite($fileBuffer, "$strTreated");
    fclose($fileBuffer);

    $bufferArray = file($filepathBufferIni);                  
    $bufferStr = implode("&", $bufferArray);
    parse_str($bufferStr,$newArrayIni);
    unlink("$fileName");
    return $newArrayIni; 
  }
                </pre>
                </code>
              </p>
              <p>
                <code class="codeprof">
                <pre class="codeprof mdl-shadow--3dp">
function carrega_propriedades($origem) 
{
  $propriedades = array();
  /* Para carregar um arquivo de propriedades de forma mais simples, abra o 
  * arquivo por meio do comando 'file' para poder navegar em suas linhas de
  * uma forma mais direta, como em um array. */  
  $arquivo = file($origem);
  for($x = 0; $ x < count($arquivo); $x++) 
  {
    $chave = substr($arquivo[$x], 0, strpos($arquivo[$x], "="));
    $valor = substr($arquivo[$x], strpos($arquivo[$x], "=") + 1);
    $propriedades[$chave] = $valor;
  }
  return $propriedades;
}
                </pre>
                </code>
              </p>
            </p>           
          </div>
        </div>
<?php include"../assests/footer.php" ?>