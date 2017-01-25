<?php 
	session_start();
	if (!isset($_SESSION["usuario"])) 
	{
		echo "Erro de permissão.";
		exit();
	}
	echo "Olá" .$_SESSION["usuario"];
	echo "<br>";
?>

<h5>Conteúdo Sigiloso</h5>

<!-- Session -->
<h6>Session</h6>
<p>
	[Conteúdo privado/sigiloso]
</p>
