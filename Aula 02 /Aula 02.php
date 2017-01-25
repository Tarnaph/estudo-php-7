<?php include"../assests/head.php" ?>
<?php include"../assests/menu.php" ?>
          <?php 

          // String de teste.
          $strExemplo = "Em algum lugar entre o certo e o errado, existe um jardim. Encontrarei você lá. - Diana";          

          echo "<h4>String e Funções Especiais</h4>" ."<br>";
          echo "Frase exemplo: " .$strExemplo ."." ."<br> <br>";
          echo "<b>Echo</b> pode ter () ou não :" ."<br>";
          echo "<code> echo (var); ou echo var; </code>" ."<br>";

          // strlen - conta bytes por isso usar utf8_decode. Assim a contagem codifica os caracteres especiais.
          echo "<h4><b>strlen</b></h4> Conta bytes. por isso usar <code> utf8_decode</code>. 
          Assim a contagem codifica os caracteres especiais." ."<br> <br>";
          $x = strlen(utf8_decode($strExemplo));
          echo "<b>A frase exemplo tem :  </b>" ."$x " ."bytes" ."<br>";
          echo "<code> x = strlen(utf8_decode(var)); </code>"; 

          // strpos - Faz uma busca da primeira string e aponta o valor da sua posição.
          echo "<h4><b>strpos</b></h4>Faz uma busca da primeira string e aponta o valor da sua posição." ."<br><br>";
          $x = strpos($strExemplo, "a");
          echo "<b>A primeira letra a </b>dentro da string exemplo esta na posição: " ."$x" ."<br>";
          echo "<code> x = strpos(var,'a'); </code>" ."<br>";
          echo "Ou pode iniciar de um <b>determinado ponto:</b>" ."<br>";
          echo "<code> x = strpos(var,'a', PosicaoInicial); </code>" ."<br>";

          // strpos - FUNC
          function buscarString ($stringTotal, $stringBuscada)
          {
            $position = strpos($stringTotal,"$stringBuscada");
            if ($position == "") 
            {
              echo "<b>A busca não encontrou a posição da string procurada. Tente outra.</b>";
            }            
            while ($position !== FALSE) 
            {
              echo "$position" ." ";
              $position = strpos($stringTotal, "$stringBuscada", $position+1);

            }
          }
          echo "A letra 'a' aparecem nas posicões:  ";
          echo buscarString($strExemplo, "a");
          ?>          
          <pre>
<b>Função buscarString</b><code>
function buscarString ($stringTotal, $stringBuscada)
{
  $position = strpos($stringTotal,"$stringBuscada");
  if ($position == "") 
  {
    echo "<b>A busca não encontrou as posições da palavra procurada. Tente outra.</b>";
  }            
  while ($position !== FALSE) 
  {
    echo "$position" ." ";
    $position = strpos($stringTotal, "$stringBuscada", $position+1);
  }</code></pre>          
          <?php
          // strchr - Mostra o restante da string apartir do primeiro resultado da busca.
          echo "<h4><b>strchr</b></h4>Mostra o restante da string apartir do primeiro resultado da busca.<br>";
          $x = strchr($strExemplo,"o");
          echo "O <b>restante</b> da string <b>apartir da busca</b> por `o` é: "."$x" ."<br>";
          echo "<code> x = strchr(var,'string')</code><br>";
          
          // strrchr -  Mostra o restante da string, apartir do primeiro resultado da busca de tras para frente .
          echo "<h4><b>strrchr</b></h4>Mostra o restante da string, apartir do primeiro resultado da busca de tras para frente .<br>";
          $x = strrchr($strExemplo,"o");
          echo "O <b>restante</b> da string <b>apartir da busca de trás para frente</b> por `o` é: "."$x" ."<br>";
          echo "<code> x = strrchr(var,'string')</code><br>";

          //substr - Mesmo que strrchr mas usa o indice numérico.
          echo "<h4><b>substr</b></h4>Mesmo que strrchr mas usa o índice numérico.<br>";
          $x = substr($strExemplo, 32);
          echo "O <b>restante</b> da string apartir da busca pelo <b>índice numérico 32</b> é : "."$x" ."<br>";
          echo "<code> x = substr(var, 32)</code><br><br>";

          // terceiro paremetro
          echo "O terceiro parâmetro é o tamanho da string retornada.<br>";
          $x = substr($strExemplo, 32, 10);
          echo "O <b>restante</b> da string apartir da busca pelo <b>índice numérico 32 com 10 índices</b> de tamanho é :<br>"."$x" ."<br>";
          echo "<code> x = substr(var, 32, 10)</code><br>";

          // str_replace - substitui a string
          echo "<h4><b>str_replace</b></h4>Substitui uma string.<br>";
          $x = str_replace("jardim", "castelo de jade", $strExemplo);
          echo "Substituindo a string `jardim` por `castelo de jade` fica assim: "."<br>"."$x" ."<br>";
          echo "<code> x = str_replace(``stringAntiga``, ``stringNova``, varString)</code>";

          // chr - imprime string da tabela ascii
          echo "<h4><b>chr</b></h4>Imprime string da tabela ascii.<br>";
          $x = chr(36);
          echo "o codigo ascii 36 é: " .$x . "<br>";
          echo "<code>$x"."x = chr(36);</code>";

          //strtolower - converte a string para caixa baixa
          echo "<h4><b>strtolower</b></h4>Converte a string para caixa baixa. <br>";
          $x = strtolower($strExemplo);
          echo "Todas as strings de caixa alta ficam em baixa: "."<br>"."$x" ."<br>";
          echo "<code> $ x = strtolower($ varString)</code>";     

          //strtoupper Converte a string para caixa alta. 
          echo "<h4><b>strtoupper ou mb_strtoupper</b></h4>Converte a string para caixa alta. <br>";
          $x = mb_strtoupper($strExemplo);
          echo "Todas as strings para caixa alta: "."<br>"."$x" ."<br>";
          echo "<code>  $ x = mb_strtoupper($ varString);</code>";    

          //ucfirst - A primeira letra fica em caixa alta.
          echo "<h4><b>ucfirst</b></h4>A primeira letra fica em caixa alta. <br>";
          $x = ucfirst($strExemplo);
          echo "Todas as strings para caixa alta: "."<br>"."$x" ."<br>";
          echo "<code>  $ x = ucfirst($ varString);</code>"; 

          //ucwords - Primeira letra de cada palavra em caixa alta.
          echo "<h4><b>ucwords</b></h4>A primeira letra de cada palavra em caixa alta. <br>";
          $x = ucwords($strExemplo);
          echo "A primeira letra de cada palavra fica em caxia alta: "."<br>"."$x" ."<br>";
          echo "<code>  $ x = ucwords($ varString);</code>"; 

          //strrev - Reverte a string, de trás para frente.
          echo "<h4><b>strrev</b></h4>Reverte a string, de trás para frente. <br>";
          $x = strrev($strExemplo);
          echo "A frase de trás para frente fica assim: "."<br>" ."$x" ."<br>";
          echo "<code>  $ x = strrev($ varString);</code>";
          echo "<h6>😁 Verificar depois como que decodifica acentos!</h6>"; 

          //trim - Tira o espaço em branco do começo e do final da string
          echo "<h4><b>trim</b></h4>Tira o espaço em branco do começo e do final da string.<br>";
          $x = trim($strExemplo);
          echo "Tira o espaço em branco do começo e do final da string: "."<br>"."$x" ."<br>";
          echo "<code>  $ x = trim($ varString);</code>"; 

          //ltrim - Tira o espaço do começo da string
          echo "<h4><b>ltrim</b></h4>Tira o espaço do começo da string. <br>";
          $x = ltrim($strExemplo);
          echo "Tira o espaço do começo da string: "."<br>"."$x" ."<br>";
          echo "<code>  $ x = ltrim($ varString);</code>"; 

          //rtrim - Tira o espaço da direita da string
          echo "<h4><b>rtrim</b></h4>Tira o espaço do começo da string. <br>";
          $x = rtrim($strExemplo);
          echo "Tira o espaço do final da string: "."<br>"."$x" ."<br>";
          echo "<code>  $ x = rtrim($ varString);</code>"; 

          //str_split - Quebra a string em tamanho determinado retornando um(uns) arrays.
          echo "<h4><b>str_split</b></h4>Quebra a string em tamanho determinado retornando um(uns) arrays.<br>";
          $x = str_split($strExemplo, 5);
          echo "Esse comando retorna um array de tamanho escolhido, no casao 5 posições: "."<br>";
          echo "$x[0]<br>";echo "$x[1]<br>";echo "$x[2]<br>";echo "$x[3]<br>";echo "$x[4]<br>
          $x[5]<br>";echo "$x[6]<br>";echo "$x[7]<br>";echo "$x[8]<br>";echo "$x[9]<br>" ."...e assim vai o resto.";
          echo "<br>";
          echo "<code>  $ x = str_split($ varString, numeroDoArray);</code>";

          //explode - Caracter faz a separação.
          echo "<h4><b>explode</b></h4>Caracter faz a separação. Retornando um(uns) arrays.<br>";
          $x = explode(" ", $strExemplo);
          echo "Esse comando retorna um array de tamanho escolhido, no casao 5 posições: "."<br>";
          echo "$x[0]<br>" ."$x[1]<br>"."$x[2]<br>"."$x[3]<br>." ."...e assim por diante.";
          echo "<br>";
          echo "<code>  $ x = explode(stringDaQuebra, varString);</code>";

          //sha1 - Código criptografico
          echo "<h4><b>sha1</b></h4>Código criptografico. <br>";
          $x = sha1($strExemplo);
          echo "A frase criptografada é: "."<br>"."$x" ."<br>";
          echo "<code>  $ x = sha1($ varString);</code>"; 

          //md5 - Código criptografico
          echo "<h4><b>md5</b></h4>Código criptografico. <br>";
          $x = md5($strExemplo);
          echo "A frase criptografada é: "."<br>"."$x" ."<br>";
          echo "<code>  $ x = md5($ varString);</code>"; 

          //crypt - Código criptografico + token
          echo "<h4><b>crypt</b></h4>Código criptografico. <br>";
          $x = crypt($strExemplo, "raphael123");
          echo "A frase criptografada é: "."<br>"."$x" ."<br>";
          echo "<code>  $ x = crypt($ varString, ``token``);</code>"; 

          // Dica de Token
          echo "<h6>✌🏻A maneira mais segura de se armazenar uma senha é concatenar a senha do usuário um senha
          segura criada pelo backend.</h6><code> $ x = crypt($ strExemplo, ``raphael123``);</code>";    

          ?>
          
          </div>
        </div>
<?php include"../assests/footer.php" ?>