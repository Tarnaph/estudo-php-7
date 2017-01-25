<?php 

if ($valido == true) 
{
	include"php/form/class_conectionPDO.php";
	
	$sql = "INSERT INTO usuarios
	(nome, email, telefone, dia, mes,
	ano, conheceu, sexo,
	newsletter, ui_dsg, ux_dsg, gui_dsg, html5,
	css3, javascript, php7, swift, senha) VALUES 
	(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

	$stmt = $conection->prepare($sql);

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

	$passwordHash = md5($_POST["senha"]);
	$stmt->bindParam(18, $passwordHash);

	$stmt->execute();

	header('Location:index.php');
	
	if ($stmt->errorCode() !== "00000") 
	{
		$valido = false;
		$erro = "Erro código " .$stmt->errorCode() .": ";
		$erro .= implode(", ", $stmt->errorInfo());
	}
}

?>