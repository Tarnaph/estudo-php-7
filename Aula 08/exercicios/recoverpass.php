<?php 
  $titlePage = "Recuperar senha";
  include"php/structure/header.php";
  include"php/form/validadores.php";
  include"php/form/classes.php";
  include"php/form/recoverpass.php";
?>
<!-- Conteúdo Card -->
<div id="staggered-test" class="container">
  <form enctype="multipart/form-data" action="?recoverpass=true" method="post">         
    <div class="row"> 
      <div class="col s12"> 
        <div class="card grey darken-4 hoverable">
          <div class="card-image">
            <img class="materialboxed" src="img/hero.jpg">
            <?php //include"php/structure/menu.php" ?>
          </div> <br> <br>

        <!-- Texto -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
             <p>
               <h6>Informeu seu email de cadastro.</h6>
             </p>
            </div>
          </div> 

          <!-- Email -->
          <div class="row">
            <div class="input-field offset-s3 col s6">
              <input class="validate" name="email" <?php rtText("email") ?>>
            </div>
          </div>          

          <!-- ID -->
          <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">   


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
      