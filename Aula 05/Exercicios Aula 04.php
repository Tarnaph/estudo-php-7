<?php include"../assests/head.php" ?>
<?php include"../assests/menu.php" ?>
    
            <?php echo "<h3>Aula 05 - EXERCÍCIOS</h3>";       ?>
            <!-- EXERCÍCIOS 01 COMEÇO -->
            <h6><b>Exercício 01: </b></h6>
            <p class="justify">
            Escreva uma função que receba uma data no formato brasileiro (d/m/Y H:i:s) 
            e converta para o formato americano (Y-m-d H:i:s).
            Para a string "31/12/2010 12:00:00" o resultado deve ser "2010-12-31 12:00:00 ".
            </p>
            <p>
              <b>Reposta:</b>
              <p class="reposta"> 
              <?php 
              
              $x = date("d/m/Y H:i:s", time() );

              function dataBrToUs ($dataBr)
              {
                $arrayExplode = explode(" ", $dataBr); 
                $arrayShift = array_shift($arrayExplode); 
                $arrayExplodeData = explode("/", $arrayShift);
                $arrayExplode = implode("", $arrayExplode);
                $d = $arrayExplodeData[0];
                $m = $arrayExplodeData[1];
                $Y = $arrayExplodeData[2];
                $result = "$Y" ."-" ."$m" ."-" ."$d" ." " ."$arrayExplode";
                return $result;                             
              }

              $go = dataBrToUs($x);
              echo $go;

              ?>             
              </p>
              <p>
                <code class="meucode">
                <pre class="meucode mdl-shadow--3dp">   
  function dataBrToUs ($dataBr)
  {
    $arrayExplode = explode(" ", $dataBr); 
    $arrayShift = array_shift($arrayExplode); 
    $arrayExplodeData = explode("/", $arrayShift);
    $arrayExplode = implode("", $arrayExplode);
    $d = $arrayExplodeData[0];
    $m = $arrayExplodeData[1];
    $Y = $arrayExplodeData[2];
    $result = "$Y" ."-" ."$m" ."-" ."$d" ." " ."$arrayExplode";
    return $result;                             
  }
                </pre>
                </code>
              </p>
              <p>
                <code class="codeprof">
                <pre class="codeprof mdl-shadow--3dp">
  function data_br_para_us($data) 
  {
    $ano = substr($data, 6, 4);
    $mes = substr($data, 3, 2);
    $dia = substr($data, 0, 2);
    return $ano . "-" . $mes . "-" . $dia . substr($data, 10); 
  }
                </pre>
                </code>
              </p>
            </p>

            <!-- EXERCÍCIOS 02 COMEÇO -->
            <h6><b>Exercício 02: </b></h6>
            <p class="justify">
            Escreva uma função que receba uma data no formato americano (Y-m-d H:i:s) e 
            converta para o formato brasileiro (d/m/Y H:i:s).
            Para a data "2010-12-31 12:00:00" o resultado deve ser "31/12/2010 12:00:00 ".
            </p>
            <p>
              <b>Reposta:</b>
              <p class="reposta"> 
              <?php              
               $dataUs = date("Y-m-d H:i:s", time() );

              function dataUsToBr ($dataUs)
              {
                $arrayExplode = explode(" ", $dataUs); 
                $arrayShift = array_shift($arrayExplode); 
                $arrayExplodeData = explode("-", $arrayShift);
                $arrayExplode = implode("", $arrayExplode);
                $Y = $arrayExplodeData[0];
                $m = $arrayExplodeData[1];
                $d = $arrayExplodeData[2];
                $result = "$d" ."/" ."$m" ."/" ."$Y" ." " ."$arrayExplode";
                return $result;                             
              }

              $go = dataUsToBr($dataUs);
              echo $go;             
              ?>             
              </p>
              <p>
                <code class="meucode">
                <pre class="meucode mdl-shadow--3dp">   
  function dataUsToBr ($dataUs)
  {
    $arrayExplode = explode(" ", $dataUs); 
    $arrayShift = array_shift($arrayExplode); 
    $arrayExplodeData = explode("/", $arrayShift);
    $arrayExplode = implode("", $arrayExplode);
    $Y = $arrayExplodeData[0];
    $m = $arrayExplodeData[1];
    $d = $arrayExplodeData[2];
    $result = "$d" ."/" ."$m" ."/" ."$Y" ." " ."$arrayExplode";
    return $result;                             
  }
                </pre>
                </code>
              </p>
              <p>
                <code class="codeprof">
                <pre class="codeprof mdl-shadow--3dp">
  function data_us_para_br($data) 
  {

    $ano = substr($data, 0, 4);
    $mes = substr($data, 5, 2);
    $dia = substr($data, 8, 2);

    return $dia . "/" . $mes . "/" . $ano . substr($data, 10); 

  }
                </pre>
                </code>
              </p>
            </p>

            <!-- EXERCÍCIOS 03 COMEÇO -->
            <h6><b>Exercício 03: </b></h6>
            <p class="justify">
           Escreva uma função que receba uma data no formato americano 
           e retorne um array, contendo em suas 6 primeiras 
           posiçoes as informaçoes de ano, mês, dia, hora, minuto e segundos respectivamente.
           Para a data "2010-12-31 12:00:00" o resultado deve ser 
           "Array ( [0] => 2010 [1] => 12 [2] => 31 [3] => 12 [4] => 00 [5] => 00 )".
            </p>
            <p>
              <b>Reposta:</b>
              <p class="reposta"> 
              <?php              
                $dateUs = date("Y-m-d H:i:s", time() );
                echo "$dateUs <br>";
                
                function retornaArrayDate($dateUs)
                {
                  $arrayReplace = str_replace("-", " ", $dateUs);
                  $arrayReplace = str_replace(":", " ", $arrayReplace);
                  $arrayReplace = str_replace(" ", ";", $arrayReplace);
                  $arrayExplode = explode(";", $arrayReplace); 
                  return $arrayExplode; 
                }
                $dataUs = date("Y-m-d H:i:s", time() );
                $go = retornaArrayDate($dateUs);
                print_r($go);

              ?>             
              </p>
              <p>
                <code class="meucode">
                <pre class="meucode mdl-shadow--3dp">   
  function retornaArrayDate($dateUs)
  {
    $arrayReplace = str_replace("-", " ", $dateUs);
    $arrayReplace = str_replace(":", " ", $arrayReplace);
    $arrayReplace = str_replace(" ", ";", $arrayReplace);
    $arrayExplode = explode(";", $arrayReplace); 
    return $arrayExplode; 
  }
                </pre>
                </code>
              </p>
              <p>
                <code class="codeprof">
                <pre class="codeprof mdl-shadow--3dp">
  function split_data($data) 
  {
  $ano = substr($data, 0, 4);
  $mes = substr($data, 5, 2);
  $dia = substr($data, 8, 2);

  $hora = substr($data, 11, 2);
  $minuto = substr($data, 14, 2);
  $segundo = substr($data, 17, 2);

  return array($ano, $mes, $dia, $hora, $minuto, $segundo);
  }
                </pre>
                </code>
              </p>
            </p>

            <!-- EXERCÍCIOS 04 COMEÇO -->
            <h6><b>Exercício 04: </b></h6>
            <p class="justify">
            Escreva uma função que receba duas datas e uma flag indicando 
            se as datas estão no formato brasileiro (BR) ou americano (US) 
            e imprima na tela a diferença entre as datas, no formato: "A diferença é 
            de _ dias, _ horas, _ minutos e _ segundos."
            Para as datas "20/12/2010 12:00:00" e "23/12/2010 14:05:17" o resultado deve ser 
            "A diferença é de 3 dias, 2 horas, 5 minutos e 17 segundos.".
            </p>
            <p>
              <b>Reposta:</b>
              <p class="reposta"> 
              <?php     

              function difDatas($data1, $data2, $flag)
              {
                if ($flag == "BR")
                {              
                  //data1
                  $resultDias = $data1[0] .$data1[1];             
                  $resultaHoras = $data1[11] .$data1[12] ;
                  $resultMin = $data1[14] .$data1[15];
                  $resultSec = $data1[17] .$data1[18];
                  //data1
                  $resultDias2 = $data2[0] .$data2[1];             
                  $resultaHoras2 = $data2[11] .$data2[12];
                  $resultMin2 = $data2[14] .$data2[15];
                  $resultSec2 = $data2[17] .$data2[18];
                  //result
                  $difDias = $resultDias2 - $resultDias;
                  $difHoras = $resultaHoras2 - $resultaHoras;
                  $difMin = $resultMin2 - $resultMin;
                  $difSec = $resultSec2 - $resultSec;
                  //Return
                  $resp = "A diferença é de $difDias dias, $difHoras horas, 
                  $difMin minutos e $difSec segundos.[BR]";
                  return $resp;
                }
                elseif ($flag == "US")
                {
                  //data1                           
                  $resultDias = $data1[8] .$data1[9];             
                  $resultaHoras = $data1[11] .$data1[12] ;
                  $resultMin = $data1[14] .$data1[15];
                  $resultSec = $data1[17] .$data1[18];
                  //data2
                  $resultDias2 = $data2[8] .$data2[9];             
                  $resultaHoras2 = $data2[11] .$data2[12];
                  $resultMin2 = $data2[14] .$data2[15];
                  $resultSec2 = $data2[17] .$data2[18];
                  //result
                  $difDias = $resultDias2 - $resultDias;
                  $difHoras = $resultaHoras2 - $resultaHoras;
                  $difMin = $resultMin2 - $resultMin;
                  $difSec = $resultSec2 - $resultSec;
                  //return
                  $resp = "A diferença é de $difDias dias, $difHoras horas, 
                  $difMin minutos e $difSec segundos.[US]";
                  return $resp;
                }
                else
                {
                  return "<b>Only working with BR or US format. Thank you.</b>";
                }
              }

              $data01 = "2010/12/20 12:00:00";
              $data02 = "2010/12/23 14:05:17";
              $x = difDatas($data01, $data02, "US");
              echo "$x";

              ?>             
              </p>
              <p>
                <code class="meucode">
                <pre class="meucode mdl-shadow--3dp">   
  function difDatas($data1, $data2, $flag)
  {
    if ($flag == "BR")
    {              
      //data1
      $resultDias = $data1[0] .$data1[1];             
      $resultaHoras = $data1[11] .$data1[12] ;
      $resultMin = $data1[14] .$data1[15];
      $resultSec = $data1[17] .$data1[18];

      //data2
      $resultDias2 = $data2[0] .$data2[1];             
      $resultaHoras2 = $data2[11] .$data2[12];
      $resultMin2 = $data2[14] .$data2[15];
      $resultSec2 = $data2[17] .$data2[18];

      //result
      $difDias = $resultDias2 - $resultDias;
      $difHoras = $resultaHoras2 - $resultaHoras;
      $difMin = $resultMin2 - $resultMin;
      $difSec = $resultSec2 - $resultSec;

      //Return
      $resp = "A diferença é de $difDias dias, $difHoras horas, 
      $difMin minutos e $difSec segundos.[BR]";
      return $resp;
    }
    elseif ($flag == "US")
    {
      //data1                           
      $resultDias = $data1[8] .$data1[9];             
      $resultaHoras = $data1[11] .$data1[12] ;
      $resultMin = $data1[14] .$data1[15];
      $resultSec = $data1[17] .$data1[18];

      //data2
      $resultDias2 = $data2[8] .$data2[9];             
      $resultaHoras2 = $data2[11] .$data2[12];
      $resultMin2 = $data2[14] .$data2[15];
      $resultSec2 = $data2[17] .$data2[18];

      //result
      $difDias = $resultDias2 - $resultDias;
      $difHoras = $resultaHoras2 - $resultaHoras;
      $difMin = $resultMin2 - $resultMin;
      $difSec = $resultSec2 - $resultSec;

      //return
      $resp = "A diferença é de $difDias dias, $difHoras horas, 
      $difMin minutos e $difSec segundos.[US]";
      return $resp;
    }
    else
    {
      return "<b>Only working with BR or US format. Thank you.</b>";
    }
  }
                </pre>
                </code>
              </p>
              <p>
                <code class="codeprof">
                <pre class="codeprof mdl-shadow--3dp">
  function diferenca($data1, $data2, $formatoBrasileiro) 
  {
  /*
  * Nas operações desta função algum padrão deve ser adotado. Neste exemplo
  * foi adotado que as datas serão convertidas para formato americano caso
  * não estejam.    
  */  

  if($formatoBrasileiro) 
  {
    $data1 = data_br_para_us($data1);
    $data2 = data_br_para_us($data2);
  }

  /*
  * A construção do timestamp é realizada por meio de um split da data informada
  * e em seguida utilizando a função mktime com os parâmetros obtidos no split.  
  */  

  $split1 = split_data($data1);
  $split2 = split_data($data2);

  $time1 = mktime($split1[3], $split1[4], $split1[5], $split1[1], $split1[2], $split1[0]);
  $time2 = mktime($split2[3], $split2[4], $split2[5], $split2[1], $split2[2], $split2[0]);

  // Com as datas em timestamp, basta substrair para obter a diferença em segundos
  $diferenca = $time2 - $time1;

  /*
  * Para saber em dias a diferença, multiplique por 60 segundos, 
  * 60 minutos e 24 horas, que é o número de segundos de um dia. Armazene
  * o resto desta diferença para calcular posteriormente as horas que não chegam
  * a formar um dia na diferença.  
  */  

  $dia = round($diferenca/(24*60*60));
  $diferenca = $diferenca % (24*60*60);

  /*
  * O mesmo procedimento é realizado calculando as horas do tempo que sobrou
  * na operação anterior. O que sobrar, deve ser armazenado para calcular o 
  * número de minutos que não chegou a preencher uma hora completa. Por último,
  * sobram os segundos.      
  */  

  $hora = round($diferenca/(60*60));
  $diferenca = $diferenca % (60*60);

  $minuto = round($diferenca/(60));
  $segundo = $diferenca % (60);

  echo "A diferença é de ".$dia." dias, ".$hora." horas, ".$minuto." minutos e ".$segundo." segundos.";
  }
                </pre>
                </code>
              </p>
            </p>

            <!-- EXERCÍCIOS 05 COMEÇO -->
            <h6><b>Exercício 05: </b></h6>
            <p class="justify">
            Escreva uma função que receba uma data no formato americano e informe 
            se é uma data e hora válida ou não, retornando um valor boleano para isto.
            Para a data "2010-12-31" o resultado deve ser verdadeiro, e para a data "2010-02-31" 
            o resultado deve ser falso.
            </p>
            <p>
              <b>Reposta:</b>
              <p class="reposta"> 
              <?php 
              $myDataUs = "2010-02-31"; //9 array

              function consultarValidadeData($dataUS)
              {              
                $myDay = $dataUS[8] .$dataUS[9];
                $myMonth = $dataUS[5] .$dataUS[6];
                $myYear = $dataUS[0] .$dataUS[1] .$dataUS[2] .$dataUS[3];
                $data = checkdate($myMonth,$myDay,$myYear) ? $resp = "Data válida" : $resp = "Data não válida!";
                return $resp;                
              }

              $go = consultarValidadeData($myDataUs);
              echo "$go";

              ?>  
              </p>
              <p>
                <code class="meucode">
                <pre class="meucode mdl-shadow--3dp">   
  function consultarValidadeData($dataUS)
  {              
    $myDay = $dataUS[8] .$dataUS[9];
    $myMonth = $dataUS[5] .$dataUS[6];
    $myYear = $dataUS[0] .$dataUS[1] .$dataUS[2] .$dataUS[3];
    $data = checkdate($myMonth,$myDay,$myYear) ? 
    $resp = "Data válida" : $resp = "Data não válida!";
    return $resp;                
  }
                </pre>
                </code>
              </p>
              <p>
                <code class="codeprof">
                <pre class="codeprof mdl-shadow--3dp">
  function valida_data($dataUS) 
  {
    $split = split_data($dataUS);
    return checkdate($split[1], $split[2], $split[0]);
  }
                </pre>
                </code>
              </p>
            </p>
          </div>
        </div>
<?php include"../assests/footer.php" ?>