<?php // parei no 1:33
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

if (isset($_REQUEST["alterarSenha"]) && $_REQUEST["alterarSenha"] == true ) // verifica se o ?alterarSenha foi setado  
{
	if ($_POST["senha"] != $_POST["senhaRepete"]) // comparando as senhas
	{
		$erro = "Senha digitadas diferentes. <br>";
	}
	else
	{
		$valido = true;

		// Alterar no banco de dados - START
		// Inserindo no banco
		// Cada ? faz referencia ao campos(nome,...) 
		$sql = "UPDATE usuarios SET
		                senha = ?
		                WHERE id = ?";
		// Prepara o sql para ser executado - definindo os ?
		$stmt = $connection->prepare($sql);

		$passawordHash = md5($_POST["senha"]);
		$stmt->bindParam(1, $passawordHash);
		$stmt->bindParam(2, $_POST["id"]);

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
	$rs = $connection->prepare("SELECT nome, email FROM usuarios WHERE id = ?");
	$rs->bindParam(1, $_REQUEST["id"]);

	if($rs->execute())
	{
		if($registro = $rs->fetch(PDO::FETCH_OBJ))
		{
			$_POST["nome"] = $registro->nome;
			$_POST["email"] = $registro->email;
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
{ echo "<div class='mdl-shadow--8dp'>
<h6>Nova Senha registrada com sucesso.</h6><a href='Aula%2008.php'> Voltar</a></div>"; } else { ?>

<!-- Formulário Grid Right-->
<div class="mdl-grid mdl-shadow--8dp">

	<!-- Echo para ERRO -->
	<?php if (isset($erro)) { echo "<h6>" .$erro ."</h6>" ."<br>"; } ?>

	<!-- Formulário Start Grid Left -->
	<div class="mdl-grid">		
			<h5>Meu Formulário Avançado.</h5>
			<img src="test1.jpg" alt=""> <br>	

	<!-- Formulário Start Right -->
	<form method="post" action="?alterarSenha=true">

		<h6>Nova senha para o usuário.</h6>
		<h5><?php echo $_POST["nome"]; echo "<br>"; echo $_POST["email"];?></h5>

		<!-- Senha -->
		<h6>Senha:</h6>
		<div class="mdl-cell mdl-cell--12-col"> 
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="password" name="senha" >
				<label class="mdl-textfield__label">Nova senha:</label>
			</div> 
		</div>

		<!-- Senha Repete -->
		<div class="mdl-cell mdl-cell--12-col"> 
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="password" name="senhaRepete" >
				<label class="mdl-textfield__label">Senha repete</label>
			</div> 
		</div>

		<!-- Input hidde -->
		<input type="hidden" name=id value="<?php echo $_REQUEST["id"]; ?>">	

		<!-- Btn Enviar -->
		<div class="mdl-cell mdl-cell--2-col">
			<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
				Castrar
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