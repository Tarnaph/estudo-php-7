<?php 
  $titlePage = "Login";
  include"php/structure/header.php";
  include"php/form/login.php";
  include"php/form/classes.php";

?>
<!-- conteúdo Card -->
<div class="container">
  <form action="?login=true" method="post">         
    <div class="row"> 
      <div class="col s12"> 
        <div class="card grey darken-4 hoverable">
          <div class="card-image">
            <img class="materialboxed" src="img/hero.jpg">
            <?php //include"php/structure/menu.php" ?>
          </div> <br> <br>

          <!-- Loggin -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
              <input type="text" class="validate" name="email" <?php  rtText("email"); ?>>
              <label for="first_name">E-mail</label>
            </div>
          </div>

          <!-- SENHA -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
              <input id="password" type="password" class="validate" name="senha">
              <label for="password">Password</label>
               <a href="recoverpass.php" title="Esqueceu a senha?"> Esqueceu a senha? </a>
            </div>
          </div> <br> <br>             

          <!-- BUTTONS LOGIN -->
          <div class="row">
            <div class="col s6 right-align">
              <a href="cadastro.php" class="waves-effect waves-light btn grey darken-3 ">
                <i class="material-icons">contacts</i>
              </a>
            </div>
          
          <!-- BUTTONS CADASTRO -->
            <div class="row">
              <div class="col s6 left-align">
                <button type="submit" class="waves-effect waves-light btn grey darken-3 "> 
                  <i class="material-icons">trending_flat</i>
                </button>
              </div>
            </div>            
          </div>
        </div>    
      </div>
    </div>
  </form> 
</div>
<?php include"php/structure/footer.php" ?>
      