<h5>Aula 09 - Cookie e Session</h5>
<!-- setcookie -->
<h6>setcookie</h6>
<p>
Recebe(nome,valor,tempo(time()+tempoDaSessão)); ou <br>
setcookie(nome,valor,prazo,caminho,domínio,https,httponly);
</p>
<!-- code pre -->	
<code><pre>
setcookie("visitas",0,time() +30*24*60*60);
</pre></code>
<!-- php -->
<?php 
//setcookie("visita",0,time() +30*24*60*60);
?>

<!-- $_COOKIE -->
<h6>$_COOKIE</h6>
<p>
Para acessar uma váriavel do cookie use <code>$_COOKIE</code>.<br>
Não sei o pq mas tive que colocar os 
<code>ob_start();</code> antes do html  <br>
<code>ob_flush();</code> depois do html.
</p>

<!-- code pre -->	
<code><pre>
if(isset($_COOKIE["visitas"])) 
{
	$visitas = $_COOKIE["visitas"] + 1;
}
else
{
	$visitas = 1;
}
setcookie("visitas", $visitas, time() + 30 * 24 * 60 * 60);
echo "Essa é sua visita número: " .$visitas ." em nosso site.";
</pre></code>

<!-- php -->
<?php 
	if(isset($_COOKIE["visita"])) 
	{
		$visita = $_COOKIE["visita"] + 1;
	}
	else
	{
		$visita = 1;
	}
	setcookie("visita", $visita, time() + 2592000000);
	echo "Essa é sua visita número: " .$visita ." em nosso site.";

	if (isset($_REQUEST["autenticar"]) && $_REQUEST["autenticar"] == true) 
	{
		$hasDaSenha = md5($_POST["senha"]);
		try 
		{
			$connection = new PDO("mysql:host=localhost; dbname=cursophp", "root", "root");
			$connection->exec("set names utf8");
		} 
		catch (PDOException $e) 
		{
			echo "Falha: " .$e->getMessage();
			exit();
		}
		$sql = "SELECT nome FROM usuarios WHERE email = ? and senha =?";
		$rs = $connection->prepare($sql);
		$rs->bindParam(1, $_POST["email"]);
		$rs->bindParam(2, $hasDaSenha);

		if ($rs->execute()) 
		{
			if($registro = $rs->fetch(PDO::FETCH_OBJ))
			{
				session_start();
				$_SESSION["usuario"] = $registro->nome;
				header("location: Aula 09.php");
			}
			else
			{
				echo "Dados Inválidos.";
			}
		}
		else
		{
			echo "Falha no acesso ao usúario.";
		}

	}
?>

<!-- Login para area restrita  -->
<h6>Login para area restrita </h6>
<p>
	Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
</p>
	<form action="?autenticar=true" method="post" accept-charset="utf-8">
		email: <input type="text" name="email">
		senha: <input type="password" name="senha">
		<input type="submit" value="autenticar">
	</form>
<!-- php -->
<?php  ?>