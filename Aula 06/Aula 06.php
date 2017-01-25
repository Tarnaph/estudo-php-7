<?php include"../assests/head.php" ?>
<?php include"../assests/menu.php" ?>
          <?php    

          echo "<h4>Aula 06 - Arquivos</h4>";

          // Indica o path
          echo "<h5><b>Crie um caminho do arquivo</b></h5>";
          echo "Retorna os segundos desde a era linux." ."<br>" ?>
          <code> <pre>$filepath = "/Users/Raphael/Desktop/teste.txt";</pre> </code><?php
          $filepath = "/Users/Raphael/Desktop/teste.txt";

          //is_file - verifica se tem o arquivo
          echo "<h5><b>is_file</b></h5>";
          echo "Verifica se o arquivo existe." ."<br>" ?>
          <code> <pre>is_file($filepath);</pre> </code> <?php
          if (is_file($filepath))
          {
            echo "Existe";
          }
          else
          {
            echo "Não existe.";
          }

          is_file($filepath) ? "Existe" : "Não Existe";

          //fopen - criando/buffer ou abre arquivo
          echo "<h5><b>fopen</b></h5>";
          echo "Cria ou abre arquivo. Sempre fecha o arquivo." ."<br>" ?>
          <code> <pre>$meuArquivo = fopen($filepath,"a+");</pre> </code> <?php
          $meuArquivo = fopen($filepath,"a+");
          fclose($meuArquivo);

          //fclose - fecha o arquivo
          echo "<h5><b>fclose</b></h5>";
          echo "Fecha o arquivo" ."<br>" ?>
          <code> <pre>fclose($meuArquivo);</pre> </code> <?php
          $meuArquivo = fopen($filepath,"a+");
          fclose($meuArquivo);

          //fwrite - escreve algo dentro do arquivo
          echo "<h5><b>fwrite</b></h5>";
          echo "Escreve algo dentro do arquivo." ."<br>" ?>
          <code> <pre>fwrite($meuArquivo,"Softblue");</pre> </code> <?php
          echo "vale notar que fwrite('aqui é o arquivo aberto/criado e não o caminho','Textoadd');<br>";
          $meuArquivo = fopen($filepath,"a+");
          fwrite($meuArquivo,"Softblue");
          fwrite($meuArquivo," - Cursos Online.");
          fwrite($meuArquivo,"\r\n");
          fclose($meuArquivo);
          echo is_file($filepath) ? "Existe" : "Não Existe";
          

          // \r\n - quebra linha em qualquer sistema mac ou pc
          ?><h5><b><code>\r\n</code></b></h5> <?php
          echo "Quebra linha em qualquer sistema mac, pc, linux" ."<br>" ?>
          <code> <pre>\r\n </pre> </code> <?php

          //fread - Leitura do arquivo
          echo "<h5><b>fread</b></h5>";
          echo "Pode ser feito por meio de buffer. E após o comando fica apontado no final." ."<br>";
          $meuArquivo = fopen($filepath,"r");
          $buffer .= fread($meuArquivo, 10);
          $buffer .= fread($meuArquivo, 10);
          $buffer .= fread($meuArquivo, 30);
          echo "$buffer <br>";
          $buffer .= fread($meuArquivo, 30);
          echo "$buffer <br>";
          fclose($meuArquivo);?>
          <code><pre>
          $meuArquivo = fopen($filepath,"r");
          $buffer .= fread($meuArquivo, 10);
          $buffer .= fread($meuArquivo, 10);
          $buffer .= fread($meuArquivo, 30);
          echo "$buffer";
          $buffer .= fread($meuArquivo, 30);
          echo "$buffer";
          fclose($meuArquivo);
          </pre></code> <?php

          //filesize - Tamanho do arquivo passando o caminho.
          echo "<h5><b>filesize</b></h5>";
          echo "Retorna o tamanho do arquivo, passar o caminho." ."<br>";
          $meuArquivo = fopen($filepath,"r");
          $buffer = fread($meuArquivo, filesize($filepath));
          echo "$buffer";
          fclose($meuArquivo);

          //file - linha a linha
          echo "<h5><b>file</b></h5>";
          echo "Lê linha a linha, criando um array. Não tem necessidade de fechar o arquivo." ."<br>";
          $meuArray = file($filepath);
          print_r($meuArray); echo "<br>";
          foreach ($meuArray as $elemento) 
          {
            echo "Linha do arquivo: " .$elemento ."<br>";
          }
          ?>
          <code><pre>
          $meuArray = file($filepath);
          foreach ($meuArray as $elemento) 
          {
            echo "Linha do arquivo: " .$elemento ;
          }
          </pre></code> <?php

          //readdir - Lista arquivos em diretorios
          echo "<h5><b>readdir</b></h5>";
          echo "Lista arquivos em diretorios." ."<br>";
          $dir = opendir("/Users/Raphael/Desktop");
          echo readdir($dir) ."<br>";
          echo readdir($dir) ."<br>";
          fclose($dir);?>
          <code><pre>
          $dir = opendir("/Users/Raphael/Desktop");
          echo readdir($dir);
          echo readdir($dir);
          fclose($dir);?>
          </pre></code> <?php
          
          ?>
          </div>
        </div>

<?php include"../assests/footer.php" ?>
