<!-- Supervariáveis -->
	<?php 
		$resultado = "As supervariável acessadas foram: "
    .$_POST["nome"] .", "
    .$_POST["email"].", "
    .$_POST["idade"].", "
    .$_POST["estadocivil"].".";     
	?>

<!-- Formulário Grid Right-->
<div class="mdl-grid mdl-shadow--8dp">

	<!-- Formulário 2 Grid Left -->
	<div class="mdl-grid">		
			<h5>Meu Formulário Simples.</h5>
			<img src="test.jpg" alt=""> <br>
			
			<!-- Echo das supervariáveis -->
			<?php
			if (isset($_POST["nome"])) 
   	 	{
    		echo "$resultado";
    	}
			?>					
	</div>

	<!-- Formulário Start Right -->
	<form method="post" action="Aula%2007_4.php?validar">
		
		<!-- Formulário Nome -->
		<div class="mdl-cell mdl-cell--12-col"> 
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" name="nome" autocomplete="on" >
				<label class="mdl-textfield__label">Nome:</label>
			</div> 
		</div>

		<!-- Formulário Email -->
		<div class="mdl-cell mdl-cell--12-col"> 
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="email" name="email" autocomplete="on">
				<label class="mdl-textfield__label">E-mail:</label>
			</div>  
		</div>
		
		<!-- Formulário Idade -->
		<div class="mdl-cell mdl-cell--12-col"> 
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="number" name="idade" >
				<label class="mdl-textfield__label">Idade:</label>
			</div> 
		</div>
		
		<!-- Formulário Estado Civil -->
		<div class="mdl-cell mdl-cell--12-col"> 
			Estado Civil:
			<select class="mdl-textfield mdl-js-textfield " name="estadocivil">
				<option disabled selected>Selecione</option>
				<option>Solteiro</option>
				<option>Casado</option>
				<option>Divorciado</option>
				<option>Viúvo</option>
			</select>
		</div>

		<!-- Formulário Senha -->
		<div class="mdl-cell mdl-cell--12-col"> 
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="password" name="senha" >
				<label class="mdl-textfield__label">Senha:</label>
			</div> 
		</div>

		<!-- Btn Enviar -->
		<div class="mdl-cell mdl-cell--2-col">
			<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
				Enviar
			</button>
		</div>

		<!-- Formulário End -->
	</form>

<!-- Formulário Grid End-->
</div>