<?php 
  $titlePage = "Trocar a senha";
  include"php/structure/header.php";
  include"php/form/validadores.php";
  include"php/form/classes.php";
  include"php/form/session.php";
  include"php/form/editpass.php";
?>
<!-- Conteúdo Card -->
<div id="staggered-test" class="container">
  <form enctype="multipart/form-data" action="?editpass=true" method="post">         
    <div class="row"> 
      <div class="col s12"> 
        <div class="card grey darken-4 hoverable">
          <div class="card-image">
            <img class="materialboxed" src="img/hero.jpg">
            <?php include"php/structure/menu.php" ?>
          </div> <br> <br>

        <!-- Texto -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
             <p>
               <h5>Trocar a senha</h5>
             </p>
            </div>
          </div> 

          <!-- Email -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
              <input type="hidden" class="validate" name="email" <?php rtText("email") ?>>
            </div>
          </div>          

          <!-- ID -->
          <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">   

          <!-- Nova Senha -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
              <input id="password" type="text" class="validate" name="senha" <?php rtText("senha") ?>>
              <label for="password">Nova Senha</label>          
            </div>
          </div> <br> <br>

          <!-- Nova Senha -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
              <input id="password" type="text" class="validate" name="repetesenha" <?php rtText("repetesenha") ?>>
              <label for="password">Repita Senha</label>          
            </div>
          </div> <br> <br>      

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
      