<?php include"../assests/head.php" ?>
<?php include"../assests/menu.php" ?>
    
          <?php  
          echo "<h3>Aula 05 - Date</h3>";      
          //time ou timestamp- Retorna os segundos desde a era linux.
          echo "<h5><b>time</b></h5>";
          echo "Retorna os segundos desde a era linux." ."<br>" ?>
          <code> <pre>$agora = time();</pre> </code><?php
          $agora = time();
          echo "$agora" ."<br>";

          //date - Formata o retorno time
          echo "<h5><b>date</b></h5>";
          echo "Formata o retorno time." ."<br>";
          ?> 
          <code><pre>date("Y-m-d H:i:s", time())</pre></code>
          <?php 
          echo date("d/m/Y H:i:s", time()) ."<br>";

          // strtotime - converte string em dados para date
          echo "<h5><b>strtotime</b></h5>";
          echo "Converte string em dados para date." ."<br>";
          $novoTimestamp = strtotime("+1 day", time());
          echo date("d/m/Y H:i:s", $novoTimestamp) ."<br>";
          echo date("d/m/Y H:i:s", strtotime("+0 day", time())) ."<br>";
          echo date("d/m/Y H:i:s", strtotime("+7 day", time())) ."<br>";
          echo date("d/m/Y H:i:s", strtotime("next monday", time())) ."<br>";
          echo date("d/m/Y H:i:s", strtotime("last friday", time())) ."<br>";
          echo date("d/m/Y H:i:s", strtotime("+1 month", time())) ."<br>";
          echo date("d/m/Y H:i:s", strtotime("+10 hour", time())) ."<br>";
          echo date("d/m/Y H:i:s", strtotime("+1 week", time())) ."<br>";?>
          <code><pre>strtotime("+1 day", time());</pre></code> <?php 

          //mktime - Obtenha o timestamp de uma data
          echo "<h5><b>mktime</b></h5>";
          echo "Obtenha o timestamp de uma data." ."<br>";?>
          <code><pre>mktime(0,0,0,1,1,3000);</pre></code>
          <code><pre>mktime(hora,minuto,segundo,mês,dia,ano,hdv);</pre></code> <?php
          $meuTimestamp = mktime(0,0,0,1,1,3000);
          echo "$meuTimestamp <br>";
          echo date("d/m/Y H:i:s", $meuTimestamp) ."<br>";
        
          //checkdate(mes,dia,ano)- Verifica se existe uma data
          echo "<h5><b>checkdate</b></h5>";
          echo "Verifica se existe uma data." ."<br>";?>
          <code><pre>checkdate(mes,dia,ano);</pre></code> <?php 
          $data1 = checkdate (2,15,2020);
          if ($data1 == TRUE) 
          {
            echo "A data1 existe! <br>";
          }
          else
          {
            echo "A data 1 não existe! <br>";
          }
           $data1 = checkdate (22,15,2020);
          if ($data2 == TRUE) 
          {
            echo "A data 2 existe! <br>";
          }
          else
          {
            echo "A data 2 não existe! <br>";
          }

          // calculo de diferença de datas.
          echo "<h5><b>Calculos</b></h5>";
          echo "Calculo de diferença de datas." ."<br>"; ?>
          <code><pre>
          $data1 = mktime(0,0,0,11,29,2020);
          $data2 = mktime(0,0,0,12,31,2020);

          $difSeconds = $data2 - $data1;
          echo "Diferença em segundos: " ."$difSeconds";

          $difMinutes = ($data2 - $data1) / 60;
          echo "Diferença em minutos: " ."$difMinutes";

          $difHours = (($data2 - $data1) / 60) / 60;
          echo "Diferença em Horas: " ."$difHours";

          $difDays = (($data2 - $data1) / 60 / 60) / 24;
          echo "Diferença em Dias: " ."$difDays";

          $difAno = (($data2 - $data1) / 60 / 60 / 24) / 365;
          echo "Diferença em Ano: " ."$difAno";

          </pre></code>

          <?php 

          $data1 = mktime(0,0,0,11,29,2020);
          $data2 = mktime(0,0,0,12,31,2020);

          $difSeconds = $data2 - $data1;
          echo "Diferença em segundos: " ."$difSeconds" ."<br>";

          $difMinutes = ($data2 - $data1) / 60;
          echo "Diferença em minutos: " ."$difMinutes" ."<br>";

          $difHours = (($data2 - $data1) / 60) / 60;
          echo "Diferença em Horas: " ."$difHours" ."<br>";

          $difDays = (($data2 - $data1) / 60 / 60) / 24;
          echo "Diferença em Dias: " ."$difDays" ."<br>";

          $difAno = (($data2 - $data1) / 60 / 60 / 24) / 365;
          echo "Diferença em Ano: " ."$difAno";        
                 
          ?>
          </div>
        </div>
<?php include"../assests/footer.php" ?>