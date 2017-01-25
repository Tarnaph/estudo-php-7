<?php include"../assests/head.php" ?>
<?php include"../assests/menu.php" ?>

          <?php 

          //print_r - Mostra todo o array, keys e elementos.
          $arraySimples = array("Php", "SQL", "100", "Java");
          $arrayKey = array(0 => "Php", 1 => "SQL", 5 => "100", curso => "Java");
          echo "<h5><b>print_r</b></h5>";
          echo "Mostra todo o array, keys e elementos." ."<br>";
          echo "<code>print_r($ arraySimples);</code>" ."<br>";
          print_r($arraySimples); echo "<br>";
          echo "<code>print_r($ arrayKey);</code>" ."<br>";
          print_r($arrayKey); echo "<br>"; 

          //array Simples
          $arraySimples = array("Php", "SQL", "100", "Java");
          echo "<h5><b>Array Simples</b></h5>";
          echo "Array simples pode conter vários arrays dentro dele." ."<br>";
          print_r($arraySimples); echo "<br>";
          echo "<code>$ arraySimples = array( ``Php``, ``SQL`, ``100``, ``Java``); </code>";

          //array Key
          $arrayKey = array(0 => "Php", 1 => "SQL", 5 => "100", curso => "Java");
          echo "<h5><b>Array Key</b></h5>";
          echo "Array key você declara o keys de cada posição." ."<br>";
          print_r($arrayKey); echo "<br>"; 
          echo "<code>$ arraySimples = array( 0 => ``Php``, 1 => ``SQL``, 5 => ``100``, curso => ``Java``); </code>";

          //Acessando elemento pelo índice/
          echo "<h5><b>Acessando elemento pelo índice</b></h5>";
          echo "Acessa por meio do $ arrayKey[curso]; "." :" ."<br>";
          echo "$arrayKey[curso].<br>";
          echo "<code> $ array[0];</code>.<br>";
          print_r($arrayKey); echo "<br>";
          

          //unset - Elemina posicão de um array
          echo "<h5><b>unset</b></h5>";
          echo "Elemina posicão de um array, ou apaga o array inteiro." ."<br>";
          echo "<code>unset($ arrayKey)</code>" ." => Apaga todo o array."."<br>";
          print_r($arrayKey); echo "<br>";
          echo "<code>unset($ arrayKey['curso'])</code>" ." Fica assim : " ."<br>";
          unset($arrayKey["curso"]);
          print_r($arrayKey);

          //count - Contagem de elementos de um array
          echo "<h5><b>count</b></h5>";
          echo "Contagem de elementos de um array." ."<br>";
          echo "<code> count($ arrayKey);</code> <br>";
          echo "O arrayKey contém : " .count($arrayKey) ." elementos.";

          //sizeof - Contagem de elementos de um array.
          echo "<h5><b>sizeof</b></h5>";
          echo "Contagem de elementos de um array. O mesmo resultado do <code>count</code>." ."<br>";
          echo "<code> sizeof($ arrayKey);</code> <br>";
          echo "O arrayKey contém : " .sizeof($arrayKey) ." elementos.";

          //foreach - Navegação do array. 13:13
          echo "<h5><b>foreach</b></h5>";
          echo "Navegação do array por completo, passando por cada elemento e assim posibilitando criar 
          algo entre cada um deles." ."<br>";
          echo "<code> foreach($ arrayKey as $ elemento){ code ;} ;</code> <br>";
          echo "Por Exemplo: <br>";
          echo "<code> foreach($ arrayKey as $ elemento){ echo `Tem no array: ` .$ elemento .`, ` ; } ;</code> <br>";
          foreach ($arrayKey as $elemento) 
          {
            echo "Tem no array: " ."$elemento" .", ";
          }

          //array_push - Insere no último 14:25
          echo "<h5><b>array_push</b></h5>";
          echo "Insere elemento no último índice do seu array um novo elemento, em sua pilha." ."<br>";
          echo "<code> array_push($ arrayKey, 'novoElemento');</code><br>";
          array_push($arrayKey,"André");
          print_r($arrayKey);

          // array_pop - Captura o último elemento do array.
          echo "<h5><b>array_pop</b></h5>";
          echo "<b>Captura</b> o último elemento do array." ."<br>";
          echo "<code> $ x = array_pop($ arrayKey);</code><br>";
          $x = array_pop($arrayKey);
          echo "O último elemento capturado da pilha é : " ."$x" ."<br>";
          print_r($arrayKey); echo ". Observe que o elemento André não esta mais no array.";
        
          //array_shift -  Captura o primeiro elemento do array. 19:13
          echo "<h5><b>array_shift</b></h5>";
          echo "<b>Captura</b> o primeiro elemento do array." ."<br>";
          echo "<code> $ x = array_shift($ arrayKey);</code><br>";
          $x = array_shift($arrayKey);
          echo "O primeiro elemento capturado da pilha foi: " ."$x" ."<br>";
          print_r($arrayKey); echo ". Observe que o elemento Php não esta mais no array.";

          //array_unshift - Insera no começo do array. 20:28
          echo "<h5><b>array_unshift</b></h5>";
          echo "Insere elemento no primeiro índice do seu array." ."<br>";
          echo "<code> array_unshift($ arrayKey, 'novoElemento');</code><br>";
          array_unshift($arrayKey,"Milani");
          print_r($arrayKey);

          //array_map - Insera uma função em cada elemento do seu array. 21:30
          echo "<h5><b>array_map</b></h5>";
          echo "Insera uma função em cada elemento do seu array." ."<br>";
          function insereMoeda($valor)
          {
            $valor = "R$: " .$valor;
            return $valor;
          }
          $arrayMoeda = array( 140.1, 200, 215.05, 550);
          $arrayMoeda = array_map(insereMoeda, $arrayMoeda);
          print_r($arrayMoeda);
          echo "
          <code><pre>  
          Exemplo:        
          function insereMoeda($ valor)
          {
            $ valor = 'R$:' .$valor;
            return $ valor;
          }
          $ arrayMoeda = array( 140.1, 200, 215.05, 550);
          $ arrayMoeda = array_map(insereMoeda, $ arrayMoeda);
          print_r($ arrayMoeda);
          </pre>
          </code>";

          //array_key_exists - Busca por índice. 26:26
          echo "<h5><b>array_key_exists</b></h5>";
          echo "Busca por índice, retornando TRUE or FALSE." ."<br>";
          echo "Meu novo array: ";
          $arrayKey = array("Linguagem1" => "Php", "Linguagem2" => "SQL" , "Linguagem3" => 100, "Linguagem4" => "Java");
          print_r($arrayKey); echo "<br>";
          if(array_key_exists("Linguagem2", $arrayKey))
          {
            echo "Existe 'Linguagem2' no array. <br>";
          }
          else 
          {
            echo "Não Existe 'Linguagem2' no array. <br>";
          }
          echo "
          <code><pre>
          Exemplo: 
          $ arrayKey = array
          (
            'Linguagem1' => 'Php',
            'Linguagem2' => 'SQL' , 
            'Linguagem3' => 100, 
            'Linguagem4' => 'Java'
          );
          print_r($arrayKey);
          if(array_key_exists('Linguagem2', $arrayKey))
          {
            echo 'Existe 'Linguagem2' no array.';
          }
          else 
          {
            echo 'Não Existe 'Linguagem2' no array.';
          }          
          </pre></code>";

          //array_keys - Retorna um novo array com a lista dos índices. 31:00
          echo "<h5><b>array_keys</b></h5>";
          echo "Retorna um novo array com a lista dos índices." ."<br>";
          $keys = array_keys($arrayKey);
          foreach($keys as $key)
          {
            echo $key ." ";
          }
          echo "
          <code><pre>
          Exemplo: 
          $ keys = array_keys($ arrayKey);
          foreach($ keys as $key)
          {
            echo $key .' ';
          }            
          </pre></code>";

          //array_search - Retorna o índice atrelado ao elemento. 32:27
          echo "<h5><b>array_search</b></h5>";
          echo "Retorna o índice atrelado ao elemento." ."<br>";
          echo "<code> $ key = array_search('elementoProcurado', 'arrayConsultado')<br></code>";
          $key = array_search("Php", $arrayKey);
          echo "A chave do elemento Php é : " ."$key";

          //in_array - Busca por elemento no array retornando TRUE or FALSE 34:10
          echo "<h5><b>in_array</b></h5>";
          echo " Busca por elemento no array retornando TRUE or FALSE." ."<br>";
          $isIn = in_array("Php", $arrayKey);
          if($isIn)
          {
            echo "Elemento existe no array. <br>";
          }
          else
          {
            echo "Não existe o elemento no array. <br>";
          }
          echo "
          <code><pre>
          Exemplo: 
          $ isIn = in_array('Php', $arrayKey);
          if($isIn)
          {
            echo 'Elemento existe no array. ';
          }
          else
          {
            echo 'Não existe o elemento no array.  ';
          }            
          </pre></code>";

          //shuffle - Embaralha o array. 36:30
          echo "<h5><b>shuffle</b></h5>";
          echo "Embaralha o array." ."<br>";
          print_r($arrayKey); echo "<br>";
          shuffle($arrayKey);
          print_r($arrayKey); echo "<br>";
          echo "<code> shuffle($ arrayKey); </code>";

          //sort - Ordenar alfabética depois por números.  38:27
          echo "<h5><b>sort</b></h5>";
          echo "Ordenar alfabética depois por números." ."<br>";
          sort($arrayKey);
          print_r($arrayKey);
          echo "<br>";
          echo "<code>sort($ arrayKey);</code>";

          //rsort - Ordenar de trás para frente. 39:35
          echo "<h5><b>rsort</b></h5>";
          echo "Ordenar de trás para frente." ."<br>";
          rsort($arrayKey);
          print_r($arrayKey);
          echo "<br>";
          echo "<code>rsort($ arrayKey);</code>";

          //explode - separa uma string por um elemento a definir
          echo "<h5><b>explode</b></h5>";
          echo "Separa uma string pelo elemento definido e gera um array" ."<br>";
          echo "
          <code><pre>          
          $ strNova = '10;20;30;40;50';
          $ arrayKey = explode(';', $ strNova);            
          </pre></code>";
          $strNova = "10;20;30;40;50";
          $arrayKey = explode(";", $strNova);
          print_r($arrayKey); 

          //implode - Ao contrario do explode. Transforma um array, intercalando pelo elemento 
          // definodo, em string.
          echo "<h5><b>implode</b></h5>";
          echo "Ao contrario do explode. Transforma um array, 
          intercalando pelo elemento definido, em string." ."<br>";
          echo "
          <code><pre>                           
          $ arrayKey = array('a', 'b', 'c', 'd', 'e');
          $ strNova = implode(';', $ arrayKey);            
          </pre></code>";
          $arrayKey = array("a", "b", "c", "d", "e");
          $strNova = implode(";", $arrayKey);
          echo "$strNova";

          //parse_srt - Parciona uma string e cria um array.
          echo "<h5><b>parse_srt</b></h5>";
          echo "Parciona uma string e cria um array.<br>";
          echo "<code> parse_srt($ srtParaSerQuebrada, $ novoArrayCriado)</code> <br>";
          $minhanovaString = "chave=valor&chave2=valor2&var1=Php";
          parse_str($minhanovaString, $meuNovoArray);
          print_r($meuNovoArray);

          ?>
          </div>
        </div>
<?php include"../assests/footer.php" ?>