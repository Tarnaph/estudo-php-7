<?php
// Validadores
$erro = null;
$valido = false;

// Conectando com o banco de dados
try
{
    $connection = new PDO("mysql:host=localhost;dbname=cursophp", "root", "root");
    $connection->exec("set names utf8");
}
catch(PDOException $e)
{
    echo "Falha: " . $e->getMessage();
    exit();
}

if (isset($_REQUEST["alterar"]) && $_REQUEST["alterar"] == true ) // verifica se o ?alterar foi setado  
{
	if (strlen(utf8_decode($_POST["nome"])) < 5) // validador do nome
	{
		$erro .= "Seu nome deve ter pelo menos 5 letras. <br>";
	}
	else if (strlen(utf8_decode($_POST["email"])) < 6) // validador de email
	{
		$erro .= "Email deve ter pelo menos 6 letras. <br>";
	}
	else if (is_numeric($_POST["idade"]) == false) // validador idade
	{
		$erro .= "Idade inválida, preencha corretamente com números. <br>";
	}
	else if($_POST["sexo"] != "M" && $_POST["sexo"] != "F") // validador sexo
	{
		$erro .= "Selecione o campo sexo corretamente. <br>";
	}
  else if($_POST["estadocivil"] != "Solteiro" && // validador estado civil
	$_POST["estadocivil"] != "Casado" &&
	$_POST["estadocivil"] != "Divorciado" &&
	$_POST["estadocivil"] != "Viúvo")
	{
		$erro .= "Selecione o campo de estado civil corretamente.";
	}
	else
	{
		$valido = true;

		// Alterar no banco de dados - START
		// Inserindo no banco
		// Cada ? faz referencia ao campos(nome,...) 
		$sql = "UPDATE usuarios SET
		                nome = ?,
		                email = ?,
		                idade = ?,
		                sexo = ?,
		                estado_civil = ?,
		                humanas = ?,
		                exatas = ?,
		                biologicas = ?
		                WHERE id = ?";
		// Prepara o sql para ser executado - definindo os ?
		$stmt = $connection->prepare($sql);

		$stmt->bindParam(1, $_POST["nome"]);
		$stmt->bindParam(2, $_POST["email"]);
		$stmt->bindParam(3, $_POST["idade"]);
		$stmt->bindParam(4, $_POST["sexo"]);
		$stmt->bindParam(5, $_POST["estadocivil"]);

		// SHORT IF para definir 0 ou 1 por causa checkBox
		$checkHumanas = isset($_POST["humanas"]) ? 1 : 0;
		$stmt->bindParam(6, $checkHumanas);

		$checkExatas = isset($_POST["exatas"]) ? 1 : 0;
		$stmt->bindParam(7, $checkExatas);

		$checkBiologicas = isset($_POST["biologicas"]) ? 1 : 0;
		$stmt->bindParam(8, $checkBiologicas);

		$stmt->bindParam(9, $_POST["id"]);

		// Inserindo no banco
		$stmt->execute();
		// Se der erro mostrar o erro no banck
		if ($stmt->errorCode() != "00000") 
		{
			$valido = false;
			$erro = "Erro código " .$stmt->errorCode() .": ";
			$erro .= implode(", ", $stmt->errorInfo());
		}
	}	
}
else
{
	$rs = $connection->prepare("SELECT * FROM usuarios WHERE id = ?");
	$rs->bindParam(1, $_REQUEST["id"]);

	if($rs->execute())
	{
		if($registro = $rs->fetch(PDO::FETCH_OBJ))
		{
			$_POST["nome"] = $registro->nome;
			$_POST["email"] = $registro->email;
			$_POST["idade"] = $registro->idade;
			$_POST["sexo"] = $registro->sexo;
			$_POST["estadocivil"] = $registro->estado_civil;
			$_POST["humanas"] = $registro->humanas == 1 ? true : null;
			$_POST["exatas"] = $registro->exatas == 1 ? true : null ;
			$_POST["biologicas"] = $registro->biologicas == 1 ? true : null;
		}
		else
		{
			$erro = "Registro não encotrado.";
		}
	}
	else
	{
		$erro = "Falha na captura do registro.";
	}
}
?>
<?php if ($valido == true) 
{ echo "<div class='mdl-shadow--8dp'><h6>Dados alterados com sucesso.</h6><a href='Aula%2008.php'> Voltar</a></div>"; } else { ?>

<!-- Formulário Grid Right-->
<div class="mdl-grid mdl-shadow--8dp">

	<!-- Echo para ERRO -->
	<?php if (isset($erro)) { echo "<h6>" .$erro ."</h6>" ."<br>"; } ?>

	<!-- Formulário Start Grid Left -->
	<div class="mdl-grid">		
			<h5>Meu Formulário Avançado.</h5>
			<img src="test1.jpg" alt=""> <br>	

	<!-- Formulário Start Right -->
	<form method="post" action="?alterar=true">
		
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
	
		<!-- Input hidde -->
		<input type="hidden" name=id value="<?php echo $_REQUEST["id"]; ?>">	

		<!-- Btn Alterar -->
		<div class="mdl-cell mdl-cell--2-col">
			<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
				Alterar
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