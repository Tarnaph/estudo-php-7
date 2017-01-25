<?php 
try
{	
  $connection = new PDO("mysql::host=raphaelmorales.com;dbname=exerc08",sqlroot123,sqlroot123);
  $connection->exec("set names utf8");
}
catch(PDOException $e)
{
	echo "Falha:" .$e->getMessage();
	exit();
}

if (isset($_REQUEST["edit"]) && $_REQUEST["edit"] == true ) 
{	
	$sql = "UPDATE usuarios SET
	nome = ?,
	email = ?,
	telefone = ?,
	dia = ?,
	mes = ?,
	ano = ?,
	conheceu = ?,
	sexo = ?,
	newsletter = ?,
	ui_dsg = ?,
	ux_dsg = ?,
	gui_dsg = ?,
	html5 = ?,
	css3 = ?,
	javascript = ?,
	php7 = ?,
	swift = ?
	WHERE id = ?";

	$stmt = $connection->prepare($sql);

	$stmt->bindParam(1, $_POST["nome"]);
	$stmt->bindParam(2, $_POST["email"]);
	$stmt->bindParam(3, $_POST["telefone"]);
	$stmt->bindParam(4, $_POST["dia"]);
	$stmt->bindParam(5, $_POST["mes"]);
	$stmt->bindParam(6, $_POST["ano"]);
	$stmt->bindParam(7, $_POST["conheceu"]);
	$stmt->bindParam(8, $_POST["sexo"]);

	$checkNews = isset($_POST["newsletter"])? 1 : 0;
	$stmt->bindParam(9, $checkNews);

	$checkUi = isset($_POST["ui_design"])? 1 : 0;
	$stmt->bindParam(10, $checkUi);

	$checkUx = isset($_POST["ux_design"])? 1 : 0; 
	$stmt->bindParam(11, $checkUx);

	$checkGui = isset($_POST["gui_design"])? 1 : 0;
	$stmt->bindParam(12, $checkGui);

	$checkHtml = isset($_POST["html_5"])? 1 : 0;
	$stmt->bindParam(13, $checkHtml);

	$checkCss = isset($_POST["css_3"])? 1 : 0;
	$stmt->bindParam(14, $checkCss);

	$checkJavascript = isset($_POST["javascript"])? 1 : 0;
	$stmt->bindParam(15, $checkJavascript);

	$checkPhp = isset($_POST["php"])? 1 : 0;
	$stmt->bindParam(16, $checkPhp);

	$chekSwift = isset($_POST["swfit"])? 1 : 0;
	$stmt->bindParam(17, $chekSwift);

	$stmt->bindParam(18, $_POST["id"]);

	$stmt->execute();

	header('Location:lista.php');
	
	if ($stmt->errorCode() !== "00000") 
	{
		$valido = false;
		$erro = "Erro código " .$stmt->errorCode() .": ";
		$erro .= implode(", ", $stmt->errorInfo());
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
			$_POST["telefone"] = $registro->telefone;
			$_POST["dia"] = $registro->dia;
			$_POST["mes"] = $registro->mes;
			$_POST["ano"] = $registro->ano;
			$_POST["conheceu"] = $registro->conheceu;
			$_POST["sexo"] = $registro->sexo;
			$_POST["newsletter"] = $registro->newsletter == 1 ? true : null;
			$_POST["ui_design"] = $registro->ui_dsg == 1 ? true : null;
			$_POST["ux_design"] = $registro->ux_dsg == 1 ? true : null;
			$_POST["gui_design"] = $registro->gui_dsg == 1 ? true : null;
			$_POST["html_5"] = $registro->html5 == 1 ? true : null;
			$_POST["css_3"] = $registro->css3 == 1 ? true : null;
			$_POST["javascript"] = $registro->javascript == 1 ? true : null;
			$_POST["php"] = $registro->php7 == 1 ? true : null;
			$_POST["swfit"] = $registro->swift == 1 ? true : null;
			$_POST["senha"] = $registro->senha;


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