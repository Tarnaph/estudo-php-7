<?php 
  $titlePage = "Editar";
  include"php/structure/header.php";
  include"php/form/validadores.php";
  include"php/form/classes.php";
  include"php/form/banco_de_dados.php";
  include"php/form/upload.php";
  include"php/form/edit.php";
  include"php/form/session.php";
?>
<!-- Conteúdo Card -->
<div id="staggered-test" class="container">
  <form enctype="multipart/form-data" action="?edit=true" method="post">         
    <div class="row"> 
      <div class="col s12"> 
        <div class="card grey darken-4 hoverable">
          <div class="card-image">
            <img class="materialboxed" src="img/hero.jpg">
            <?php include"php/structure/menu.php" ?>
          </div> <br> <br>

          <!-- Foto -->
          <form method="post" action="?cadastrar=true">
            <div class="row">
              <div class="input-field offset-s3 col s6">
                <div class="file-field input-field">
                  <div class="btn grey darken-3 ">
                    <span>Foto de perfil</span>
                    <input class="mdl-textfield__input" type="file" name="foto">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                  </div>
                </div>               
              </div>
            </div>         
          </form> 

          <!-- Nome -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
              <input type="text" class="validate" name="nome" <?php rtText("nome") ?>>
              <label>Nome</label>
            </div>
          </div>

          <!-- Email -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
              <input type="text" class="validate" name="email" <?php rtText("email") ?>>
              <label>E-mail</label>
            </div>
          </div>

          <!-- Telefone -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
              <input type="text" class="validate" name="telefone" <?php rtText("telefone") ?>>
              <label>Telefone</label>
            </div>
          </div>

          <!-- Data de Nascimento -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
              <label>Data de Nascimento</label> 
            </div> <br> 
          </div>
          <div class="row">   
            <div class="input-field offset-s3 col s2">  
              <tr>
                <label>Dia</label>                         
                <td>      
                  <input type="text" size="2" maxlength="2" name="dia" <?php rtText("dia") ?>>
                </td>
              </tr>                       
            </div>
             <div class="input-field col s2">  
              <tr>
                <label>Mês</label>                         
                <td>      
                  <input type="text" size="2" maxlength="2" name="mes" <?php rtText("mes") ?>>
                </td>
              </tr>                       
            </div>
             <div class="input-field col s2">  
              <tr>
                <label>Ano</label>                         
                <td>      
                  <input type="text" size="2" maxlength="4" name="ano" <?php rtText("ano") ?>>
                </td>
              </tr>                       
            </div>
          </div>
            
         <!-- Como nós conheceu? -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
             <label>Como nós conheceu?</label> <br><br>
              <select name="conheceu">
                <option disabled>Escolha</option>
                <option value="escola" <?php rtSelected("conheceu","escola") ?>>Escola</option>
                <option value="faculdade" <?php rtSelected("conheceu","faculdade") ?>>Faculdade</option>
                <option value="google" <?php rtSelected("conheceu","google") ?>>Google</option>
              </select>             
            </div>
          </div>

          <!-- Gênero -->
           <div class="row">
            <div class="input-field offset-s3 col s6">
            <label>Sexo:</label> <br><br>
                <input  type="radio" id="sexoM" value="M" name="sexo" <?php rtChecked("sexo","M") ?>/>
                <label for="sexoM">Masculino</label>
                <input  type="radio" id="sexoF" value="F" name="sexo" <?php rtChecked("sexo","F") ?>/>
                <label for="sexoF">Feminino</label>            
            </div>
          </div>

          <!-- Receber Newsletter -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
              <div class="switch">
                <label>
                  <p>Newsletter</p>
                  Não
                  <input type="checkbox" name="newsletter" <?php rtChebox("newsletter") ?>>
                  <span class="lever"></span>
                  Novidades!
                </label>
              </div>
            </div>
          </div>
          <br><br><br><br>  

          <!-- Interesses -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
             <label>Interesses:</label> 
                <br> <br>
                <input type="checkbox" id="ui_design" name="ui_design" <?php rtChebox("ui_design") ?>/>
                <label for="ui_design"name>UI Dsg</label>
                &nbsp
                <input type="checkbox" id="ux_design" name="ux_design" <?php rtChebox("ux_design") ?>/>
                <label for="ux_design"name>UX Dsg</label>
                &nbsp
                <input type="checkbox" id="gui_design" name="gui_design" <?php rtChebox("gui_design") ?>/>
                <label for="gui_design"name>GUI Dsg</label>
                &nbsp
                <input type="checkbox" id="html_5" name="html_5" <?php rtChebox("html_5") ?>/>
                <label for="html_5"name>Html 5</label>
                <br> <br>
                <input type="checkbox" id="css_3" name="css_3" <?php rtChebox("css_3") ?>/>
                <label for="css_3"name>Css 3</label>
                &nbsp
                <input type="checkbox" id="javascript" name="javascript" <?php rtChebox("javascript") ?>/>
                <label for="javascript"name>Javascript</label>
                &nbsp
                <input type="checkbox" id="php" name="php" <?php rtChebox("php") ?>/>
                <label for="php"name>PHP 7</label>
                &nbsp
                <input type="checkbox" id="swfit" name="swfit" <?php rtChebox("swfit") ?>/>
                <label for="swfit"name>Swift</label>
                <br>              
            </div>
          </div>
          <br>  
    
          <!-- ID -->
          <input hide type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">     

          <!-- BUTTONS CADASTRO -->
          <div class="row">
            <div class=" col s12 center-align">
              <button type="submit" class="waves-effect waves-light btn grey darken-3 "> 
                <i class="material-icons">trending_flat</i>
              </button>
            </div>
          </div> 
             <br>  

          </div>
        </div>    
      </div>
    </div>
  </form> 
</div>
<?php include"php/structure/footer.php" ?>
      