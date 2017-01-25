<!-- Validador php -->
<?php include"validador_form02.php" ?>

<!-- Hide if $valido == true Start -->
<?php if ($valido == true) 
{ echo "<div class='mdl-shadow--8dp'><h6>Dados enviadoscom sucesso.</h6><a href='Aula%2008.php'> Voltar</a></div>"; } else { ?>

<!-- Formulário Grid Right-->
<div class="mdl-grid mdl-shadow--8dp">

	<!-- Echo para ERRO -->
	<?php if (isset($erro)) { echo "<h6>" .$erro ."</h6>" ."<br>"; } ?>

	<!-- Formulário Start Grid Left -->
	<div class="mdl-grid">		
			<h5>Meu Formulário Avançado.</h5>
			<img src="test1.jpg" alt=""> <br>	

	<!-- Formulário Start Right -->
	<form method="post" action="?validar=true">
		
		<!-- Nome -->
		<h6>Nome:</h6>
		<div class="mdl-cell mdl-cell--12-col"> 
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" name="nome" autocomplete="on" <?php returnText("nome");?>>				
				<label class="mdl-textfield__label">Deve ter pelo menos 6 letras.</label>
			</div> 
		</div>

		<!-- Email -->
		<h6>E-mail:</h6>
		<div class="mdl-cell mdl-cell--12-col"> 
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="email" name="email" autocomplete="on" <?php returnText("email");?>>
				<label class="mdl-textfield__label">Deve ter pelo menos 6 letras.</label>
			</div>  
		</div>
		
		<!-- Idade -->
		<h6>Idade:</h6>
		<div class="mdl-cell mdl-cell--12-col"> 
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="number" name="idade" <?php returnText("idade");?>>
				<label class="mdl-textfield__label">Apenas números.</label>
			</div> 
		</div>

		<!-- Sexo -->
		<h6>Sexo:</h6>

		<!-- Masculino -->
		<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
			<input type="radio" class="mdl-radio__button" name="sexo" value="M" <?php returnChecked("sexo","M");?>>
			<span class="mdl-radio__label">Masculino</span>
		</label>
	
		<!-- Feminino -->
		<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect">
			<input type="radio" class="mdl-radio__button" name="sexo" value="F" <?php returnChecked("sexo","F");?>>
			<span class="mdl-radio__label">Feminino</span>
		</label>

		<!-- Interesses -->
		<h6>Interesses:</h6>
		
		<!-- Humanas -->
		<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
			<input type="checkbox" class="mdl-checkbox__input" name="humanas" <?php returnChebox("humanas");?>>
			<span class="mdl-checkbox__label">Ciências Humanas</span>
		</label>

		<!-- Exatas -->
		<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
			<input type="checkbox" class="mdl-checkbox__input" name="exatas" <?php returnChebox("exatas");?>>
			<span class="mdl-checkbox__label">Ciências Exatas</span>
		</label>

		<!-- Biológicas -->
		<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect">
			<input type="checkbox" class="mdl-checkbox__input" name="biologicas" <?php returnChebox("biologicas");?>>
			<span class="mdl-checkbox__label">Ciências Biológicas</span>
		</label>

		<!-- Formulário Estado Civil -->		
		<h6>Estado Civil:</h6>
		<select class="mdl-textfield mdl-js-textfield " name="estadocivil">
			<option disabled selected>Selecione...</option>
			<option <?php returnSelected("estadocivil","Solteiro");?>>Solteiro</option>
			<option <?php returnSelected("estadocivil","Casado");?>>Casado</option>
			<option <?php returnSelected("estadocivil","Divorciado");?>>Divorciado</option>
			<option <?php returnSelected("estadocivil","Viúvo");?>>Viúvo</option>
		</select>	

		<!-- Senha -->
		<h6>Senha:</h6>
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

	<!-- Formulário Start Grid Left Formulário Grid End-->
	</div>
	
<!-- Formulário Grid End -->
</div>

<!-- Hide if $valido == true End -->
<?php } ?>