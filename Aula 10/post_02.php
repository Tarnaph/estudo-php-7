<!-- Título -->
<h5>Aula 10.3 - Herança e elementos Estáticos [OO]</h5>

<!-- Título -->
<h6>Título</h6>
<p>
	Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
	Pariatur quam, inventore fugit a enim nostrum ipsum nam quis 
	officiis velit! Temporibus culpa unde porro aperiam error 
	quidem eveniet aspernatur minus.
</p>

<!-- code pre -->	
<code><pre>
...code
</pre></code>

<!-- php -->
<?php 
echo "string";
?>

<!-- Herança -->
<h6>Class básica</h6>
<p>
	Foi criado uma classe básica de instrumento, com atributos isPercussao, que pode ser declarado
	false or true, um atributo volume. No construct($isPercurssao,$volume) são obrigatórios.
</p>

<!-- Exemplo Class e New Básicos -->	
<code><pre>
class instrumentoMusical
	{
		public $isPercussao;
		public $volume;

		public function __construct($isPercussao,$volume)
		{
			$this->isPercussao = $isPercussao;
			$this->volume = $volume;
		}

		public function tocar()
		{
			echo "Tocando no volume: " . $this->volume. " becibéis.";
		}
	}

$instrumentoMusical = new instrumentoMusical(true, 80);
</pre></code>

<!-- Class e New Básicos -->
<?php 
	class instrumentoMusical
	{
		public $isPercussao;
		public $volume;

		public function __construct($isPercussao,$volume)
		{
			$this->isPercussao = $isPercussao;
			$this->volume = $volume;
		}

		public function tocar()
		{
				echo "Tocando no volume: " . $this->volume. " becibéis. <br>";
		}
	}

	$instrumentoMusical = new instrumentoMusical(true, 80);
	if ($instrumentoMusical->isPercussao) 
	{
		echo "Instrumento de percurssão, volume: " .$instrumentoMusical->volume ."<br>";
	}
	else
	{
		echo "Instrumento não de percurssão, volume: " .$instrumentoMusical->volume ."<br>";
	}

?>

<!-- extends -->
<h6>extends</h6>
<p>
	Para fazer uma nova classe com herança de outra use <code>extends</code>. <br>
	Ficando assim. <code>class classeFilha extends classeMãe { code novos}</code>.
	Vale lembrar notar que todas os atributos, funct e construct funcinam normalmente
	na classe filha herdadas da classe mãe. <br>
	<b>Toda mudança feita </b>na <b>classe mãe</b> vai ser <b>incluida</b> na <b>classe filha</b>, incluindo
	novos métodos, atributos e construct.
</p>

<!-- Exemplo Class e New Básicos -->	
<code><pre>
class Guitarra extends instrumentoMusical
{

}

$guitarra = new instrumentoMusical(false, 40);
</pre></code>

<!-- Class e New Básicos -->
<?php 
class Guitarra extends instrumentoMusical
{

}

$guitarra = new instrumentoMusical(false, 40);
echo "Acessando: o tocar() da classe mãe: " .$guitarra->tocar();
if ($guitarra->isPercussao) 
{
	echo "Instrumento de percurssão, volume: " .$guitarra->volume ."<br>";
}
else
{
	echo "Instrumento não de percurssão, volume: " .$guitarra->volume ."<br>";
}
?>

<!-- Sobrescrita -->
<h6>Sobrescrita</h6>
<p>
Pode sobrescrever um método herdado da classe mãe. <br>
Como a seguir: 
</p>

<!-- Sobrescrita code pre -->	
<code><pre>
class Guitarra2 extends instrumentoMusical
{
	public function tocar()
	{
		echo "Tocando no amplificador " .$this->volume ." becibéis.";
	}
}

$guitarra = new Guitarra2(false,40);
echo $guitarra->tocar();
</pre></code>

<!-- Class e New Básicos -->
<?php 
class Guitarra2 extends instrumentoMusical
{
	public function tocar()
	{
		echo "Tocando no amplificador " .$this->volume ." becibéis." ."<br>";
	}
}

$guitarra = new Guitarra2(false,40);
echo $guitarra->tocar();
?>

<!-- Final evita que classe filhas sobrescrevam um método -->
<h6>Final - evita que classe filhas sobrescrevam um método</h6>
<p>
	<code>Final</code> faz que o método não possa ser sobrescrito pelas classes filhas. <br>
</p>

<!-- code pre final -->	
<code><pre>
class instrumentoMusical
{
	public $isPercussao;
	public $volume;

	public function __construct($isPercussao,$volume)
	{
		$this->isPercussao = $isPercussao;
		$this->volume = $volume;
	}

	<b>public final function tocar()</b>
	{
			echo "Tocando no volume: " . $this->volume. " becibéis";
	}
}
</pre></code>

<!-- Parent -->
<h6>Parent</h6>
<p>
	<code>Parent</code> acessa o método acima da sua classe.
	Para usar use <code>::</code>
</p>

<!-- code pre -->	
<code><pre>
class Guitarra2 extends instrumentoMusical
{
	public function tocar()
	{
		echo "Tocando no amplificador " .$this->volume ." becibéis." ."<br>";
	}
	public function tocarGuitarra()
	{
		$this->tocar(); //Acessando seu próprio método.
		<b>parente::tocar();</b> //Acessando o método da classe acima dessa.
	}
}
</pre></code>

<!-- php -->
<?php 
?>

<!-- Static  -->
<h6>Static ::</h6>
<p>
<code>static</code> faz que o atributo, método, construct seja focado apenas
pela classe ou seja, quando uma classe filha acessar ele vai puxar diretamente 
da classe que contém o elemento static, fazendo assim que o servidor poupe recurso.
<b>Vale lembrar:</b> que o elemento declarado com <code>static</code> pode ser acessado 
diretamente sem a necessidade de criar um new class. 
Como no exemplo: <code> echo escalaMusical<b>::</b>$escalaDoMaior;</code> <br>
<b>Para usar:</b><b> nomeDaClasse::$atributo/Func/Construct</b>. Portanto é acessado pelo
<b>$</b>.
</p>

<!-- code pre -->	
<code><pre>
class escalaMusical
{
	public static $escaladoMaior = "C D E F G A B C";
}
echo escalaMusical::$escaladoMaior;
</pre></code>

<!-- php -->
<?php 
class escalaMusical
{
	public static $escaladoMaior = "C D E F G A B C";
}
echo escalaMusical::$escaladoMaior;
echo escalaMusical::$escaladoMaior = "casa";

?>


<!--  Resumo  -->
<h6> Resumo </h6>
<p>Resumo dessa aula. <b>6 Novidades!</b><br>

</p>
<p>
	<b>extends</b> - Herda da classe mãe. <br>
	<b>sobrescrita</b> - Pode sobrescrever as funct da classeMãe. Apenas escrevendo com mesmo nome. <br>
	<b>final</b> - Impede que a func seja sobrescrita pelas classe filhas. <br>
	<b>parent</b> - Acessa a func de uma classe acima. <code>parente::tocar()</code>  <br>
	<b>protected</b> - Protege a func na sua casse, mas os filhos podem sobrescrever.<br>
	<b>static</b> - Já declara os parâmetros dos atributos, poupando memória e podendo ser acessada diretamente. 
	<code>nomeDaClasse::$algo</code><br>
</p>