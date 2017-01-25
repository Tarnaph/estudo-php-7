<?php include"../assests/head.php" ?>
<?php include"../assests/menu.php" ?> 
<?php echo "<h4>Aula 07 - Formulário</h4>";       ?> 
      <!-- Formulario -->
      <h5>Formulário</h5>
      <form method=POST action="formularios_simples.php">
        Nome:
        <input type="text" name="nome"><br>

        Sobrenome:
        <input type="text" name="sobrenome"><br>

        Estado civil: 
        <select name=estadocivil>
          <option>Solteiro</option>
          <option>Casado</option>
          <option>Divorciado</option>
          <option>Viúvo</option>
        </select>

        <!-- Botões -->
        <input type="reset" value="Limpar">
        <input type="submit" value="Enviar">
      </form>
      
      <!-- Code -->
      <h5>Estudo:</h5>
      <code>               
      No <b>form o method=GET ou POST</b>. <br>
      GET = aparece no url, <br>
      POST = mais seguro. <br>
      <b>action="envia para o destino do method, arquivo php."</b><br><br>

      Na tag input o <b>name="nome que tem que ser igual no php tb."</b><br><br>  
      Estudar os tipos de types da tag input. <b>PROCURAR MAIS SOBRE!</b> <br>  
      hmtl 5: search, email, url, tel, number, range, date, month, week, time, datetime, datetime-local, color <br>

      <h5>Formulario Simples Php</h5>
      <p>Super váriavel <br>
      para POST <b> $_POST["nome do campo"]</b> 
      </p>  
      </code>
    </div>
  </div>
</div>
<?php include"../assests/footer.php" ?>