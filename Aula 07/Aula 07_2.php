<?php include"../assests/head.php" ?>
<?php include"../assests/menu.php" ?>

<?php

$erro = null;
$valido = false;


if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true)
{
    if(strlen(utf8_decode($_POST["nome"])) < 5)
    {
        $erro = "Preencha o campo nome corretamente (5 ou mais caracteres)";
    }
    else if(strlen(utf8_decode($_POST["email"])) < 6)
    {
        $erro = "E-mail inválido, preencha corretamente";
    }
    else if(is_numeric($_POST["idade"]) == false)
    {
        $erro = "Campo idade deve ser numérico";  
    }
    else if($_POST["sexo"] != "M" && $_POST["sexo"] != "F")
    {
        $erro = "Selecione o campo sexo corretamente";
    }
    else if($_POST["estadocivil"] != "Solteiro" &&
            $_POST["estadocivil"] != "Casado" &&
            $_POST["estadocivil"] != "Divorciado" &&
            $_POST["estadocivil"] != "Viúvo")
    {
        $erro = "Selecione o campo de estado civil corretamente";
    }
    else
    {
        $valido = true;
    }
}
//32:18
?>


    <?php
      if ($valido == true) 
      {
        echo "Dados enviados com sucesso!";
      }
      else
      {        
      
      if (isset($erro)) 
      {
        echo "<center class='codeprof'>"  .$erro ."</center>";
      }
    ?>
     <?php echo "<h4>Aula 07 - FORMULÁRIO</h4>";       ?>

              <!-- FORMULARIO -->           
              <form method=POST action="?validar=TRUE">
                Nome: 
                <input type="text" name=nome value="<?php echo $_POST["nome"] ?>"> <br>

                E-mail:
                <input type="email" name=email value="<?php echo $_POST["email"] ?>"> <br>

                Idade: 
                <input type="number" name=idade value="<?php if (isset($_POST["idade"])) {echo $_POST["idade"];} else { echo "Sua Idade.";}?>"> <br>

                Sexo:
                <input type="radio" name=sexo value="M"<?php if(isset($_POST["sexo"]) && $_POST["sexo"] == "M") {echo "checked";} ?> > Masculino
                <input type="radio" name=sexo value="F"<?php if(isset($_POST["sexo"]) && $_POST["sexo"] == "F") {echo "checked";} ?> > Feminino <br>

                Interesses:
                <input type="checkbox" name=humanas <?php if(isset($_POST["humanas"])) {echo "checked";}?>> Ciências Humanas
                <input type="checkbox" name=exatas <?php if(isset($_POST["exatas"])) {echo "checked";}?>> Ciências Extas
                <input type="checkbox" name=biologicas <?php if(isset($_POST["biologicas"])) {echo "checked";}?>> Ciências Biológicas <br>

                Estado civil:
                <select name="estadocivil">
                  <option disabled selected>Selecione</option>
                  <option value="Casado" <?php if(isset($_POST["estadocivil"]) && $_POST["estadocivil"] == "Casado") {echo "selected";}?>>Casado</option>
                  <option value="Solteiro" <?php if(isset($_POST["estadocivil"]) && $_POST["estadocivil"] == "Solteiro") {echo "selected";}?>>Solteiro</option>
                  <option value="Divorciado" <?php if(isset($_POST["estadocivil"]) && $_POST["estadocivil"] == "Divorciado") {echo "selected";}?>>Divorciado</option>
                  <option value="Viúvo" <?php if(isset($_POST["estadocivil"]) && $_POST["estadocivil"] == "Viúvo") {echo "selected";}?>>Viúvo</option>
                </select> <br>

                Senha:
                <input type="password" name="senha"><br>
                <input type="submit" value="Enviar">

              </form>
                  

            </div>
          </div>
        </div>
        <br><br><br><br><br><br>
        <?php } ?>   
<?php include"../assests/footer.php" ?>
       