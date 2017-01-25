<!-- Teoria da aula 07.3 -->
<h4>Teoria da aula 07.3 - Recuperar os dados e validações</h4>	
<p>
	a) Escreva o html normalmente. <br>
		1 - Crie um if para saber se os campos do formulário estão sendo recebidos para
		serem válidados. Ou seja, o if vai estar relacionado a url '?validar', criada para
		não válidar na primeira vez que a págiana for carregada. <br>
<code><pre>
if (isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true) 
{
# code...
}</pre></code>
		2 - Dentro do primeiro if crie um if para válidar o nome, usando utf8_decode para 
		não contar acentos e caracter latinos. <br>
		a - Gere um <code>erro</code> nessa condicão. E defina que <code>erro</code> é null
		no começo do código.
<code><pre>
$erro = null;
if (isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true)
{
	if (strlen(utf8_decode($_POST["nome"])) < 5)
	{
		$erro .= "Seu nome deve ter pelo menos 5 letras.";
	}
}
</pre></code>
		3 - Crie os validadores para email, seguindo o mesmo bloco if, usando else if. <br>
		4 - Crie os validadores para idade, usando is_numeric() para determinar que o 
		campo é exclusivamente para números.
<code><pre>
else if (is_numeric($_POST["idade"]) == false)
{
	#code
}
</pre></code>
		5 - Validador para sexo, tem que dois value: M e F. Verifique se o $_POST["sexo"] é M && F.
<code><pre>
else if($_POST["sexo"] != "M" && $POST["sexo"] != "F") // validador sexo
{
	$erro .= "Selecione o campo sexo corretamente.";
}
</pre></code>
		6 - Para o campo Estado civil:
<code><pre>
else if($_POST["estadocivil"] != "Solteiro" && 
$_POST["estadocivil"] != "Casado" &&
$_POST["estadocivil"] != "Divorciado" &&
$_POST["estadocivil"] != "Viúvo")
{
	$erro .= "Selecione o campo de estado civil corretamente.";
}
</pre></code>
		7 - Crie agora um bloco else com $valido com valor true, e no começo do código
		set ela para false. <br>
		8 - Construa funcões que recuperem os dados enviados pelo usuário, no caso de algum 
		outro campo não tenha passado pela validação. Como por exemplo: 
<code><pre>
// Funcões recuperar campo preenchido
function returnText($value) 
{
	if (isset($_POST["$value"] ) ) 
	{
		echo "value='" .$_POST["$value"] ."'";		
	}
}

// Funcão recuperar valor checked
function returnChecked($name, $value) 
{
	if (isset($_POST["$name"]) && $_POST["$name"] == "$value") 
	{
		echo "checked";		
	}
}	
</pre></code>
		9 - Então em caso de sucesso, construa uma menssagem de "cadastro realizado" e esconda o formulário.
		Para esconder crie um if com  'dados enviados' e um else que começa no inicio do <code>form</code> e só fecha no final
		do <code>form</code>.
<code><pre>
<!-- Hide if $valido == true Start -->
if ($valido == true) { echo "Dados enciados com sucesso."; } else {
</pre></code> <br>
</p>
