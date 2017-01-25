<?php 
  $titlePage = "Lista de clientes";
  include"php/structure/header.php";
  include"php/form/validadores.php";
  include"php/form/classes.php";
  include"php/form/banco_de_dados.php";
  include"php/form/upload.php";
  include"php/form/session.php";  
?>
<!-- Conteúdo Card -->
<div id="staggered-test" class="container">    
  <div class="row"> 
    <div class="col s12"> 
      <div class="card grey darken-4 hoverable">
        <div class="card-image">
          <img class="materialboxed" src="img/hero.jpg">
          <?php include"php/structure/menu.php" ?>
        </div> <br> <br>   
        
        <!-- Conteúdo -->  
        <div class="row">
          <div class="input-field offset-s3 col s6">

            <!-- Table -->
            <table class="responsive-table">
              <thead>
                <tr>
                  <th data-field="nome">Nome</th>
                  <th data-field="email">Email</th>
                  <th data-field="telefone">Telefone</th>
<!--              <th data-field="dia">Dia</th>
                  <th data-field="mes">Mês</th>
                  <th data-field="ano">Ano</th>
                  <th data-field="conheceu">Conheceu</th>
                  <th data-field="sexo">Sexo</th>
                  <th data-field="newsletter">Newsletter</th>
                  <th data-field="ui_design">UI Dsg</th>
                  <th data-field="ux_design">UX Dsg</th>
                  <th data-field="gui_design">GUI Dsg</th>
                  <th data-field="html_5">Html 5</th>
                  <th data-field="css_3">Css 3</th>
                  <th data-field="javascript">Javascript</th>
                  <th data-field="php">PHP 7</th>
                  <th data-field="swfit">Swift</th> 
                  <th data-field="senha">Senha</th> -->
                  <th data-field="acao">Ações</th>
                </tr>
              </thead>
              <!-- Table body -->
              <tbody>
                <?php include"php/form/list.php"; ?>             
              </tbody>
            </table>              
          </div>
        </div> 
        <br>        
      </div>
    </div>   
  </div>
</div>
<?php include"php/structure/footer.php"; ?>
      