<!-- Título -->
<h5>Aula 10.1 - Orientação ao Objeto [OO]</h5>

<!-- Class e New Básicos -->
<h6>Class e New Básicos</h6>
<p>Para construir um classe use <code>class NomedaClasse</code>, depois defina
	os atributos. <br>
	Quando for criar um objeto novo baseado em uma classe use <code>new NomedaClasse</code>. <br>
	Set o valores dos atributos acessando os seus atributos: <code>$meucarro->cor ="Preto";</code>.</p>

<!-- Exemplo Class e New Básicos -->	
<code><pre>
class Carro
{
	public $velocidade;
	public $cor;
}

$meuCarro = new Carro();
$meuCarro->velocidade = 50;
$meuCarro->cor = "Preto";
</pre></code>

<!-- Class e New Básicos -->
<?php 
	
	//Classe
	class Carro
	{
		//Atributos
		public $velocidade;
		public $cor;
	}

	//Objeto
	$meuCarro = new Carro();
	$meuCarro->velocidade = 50;
	$meuCarro->cor = "Preto";

	echo "O carro de cor " .$meuCarro->cor ." esta andando a " .$meuCarro->velocidade ."km/h.";
	echo "<br>";

?>

<!-- Construtores -->
<h6>Construtores __construct</h6>
<p>Quando for declarar um classe que tenha seus objetos com parâmetros obrigatorios a 
serem declarados. Defina pelo <code>__construct</code>.</p>

<!-- Exemplo -->
<code><pre>
class Carro2
{
	//Atributos
	public $velocidade;
	public $cor;

	//Construct
	public function __construct($cor)
	{
		$this->cor = $cor;
		$this->velocidade = 0;
	}
}

$meuCarro = new Carro2("Vermelho");	
</pre></code>

<!-- class , new, __construct -->
<?php 

//Classe
	class Carro2
	{
		//Atributos
		public $velocidade;
		public $cor;

		//Construct
		public function __construct($cor)
		{
			$this->cor = $cor;
			$this->velocidade = 0;
		}
	}

	$meuCarro = new Carro2("Vermelho");

	echo "O carro de cor " .$meuCarro->cor ." esta andando a " .$meuCarro->velocidade ."km/h.";
	echo "<br>";

?>

<!-- Private -->
<h6>Private</h6>
<p>Deixa de ser public e vira private, e para acessar use um 
<code>public function getNomedaFunc</code> ou para 
atribuir <code>public function setNomedaFunc</code>. <br>
Nesses casos é possivel fazer validações.</p>
<p>A função get <code>return $this->atributo;</code> <br>
A funcão set <code> $this->atributo = $novoValor;</code></p>

<!-- Exemplo -->
<code><pre>
//Classe
class Carro3
{
	//Atributos
	private $velocidade;
	private $cor;

	//Construct
	public function __construct($cor)
	{
		$this->cor = $cor;
		$this->velocidade = 0;
	}

	//get velociodade
	public function getVelocidade()
	{
		return $this->velocidade;
	}

	//get cor
	public function getCor()
	{
		return $this->cor;
	}

	//set velocidade
	public function setVelocidade($velocidade)
	{
		if ($velocidade > 110 || $velocidade < 0) 
		{
			echo "Velocidade Não permitida";
		}
		else
		{
			$this->velocidade = $velocidade;
		}
	}

	//set cor
	public function setCor($cor)
	{
		$this->cor = $cor;
	}
}

</pre></code>

<!-- Private, get, set -->
<?php 
	//Classe
	class Carro3
	{
		//Atributos
		private $velocidade;
		private $cor;

		//Construct
		public function __construct($cor)
		{
			$this->getCor($cor);
			$this->setVelocidade(0);
		}

		//get velociodade
		public function getVelocidade()
		{
			return $this->velocidade;
		}

		//get cor
		public function getCor()
		{
			return $this->cor;
		}

		//set velocidade
		public function setVelocidade($velocidade)
		{
			if ($velocidade > 110 || $velocidade < 0) 
			{
				echo "Velocidade Não permitida";
			}
			else
			{
				$this->velocidade = $velocidade;
			}
		}

		//set cor
		public function setCor($cor)
		{
			$this->cor = $cor;
		}
	}

	$meuCarro = new Carro3("Vermelho");
	$meuCarro->setCor("Azul");
	echo "O carro de cor " .$meuCarro->getCor() ." esta andando a " .$meuCarro->getVelocidade() ."km/h.";
	echo "<br>";

	$meuCarro->setVelocidade(70);
	echo "O carro de cor " .$meuCarro->getCor() ." esta andando a " .$meuCarro->getVelocidade() ."km/h.";
	echo "<br>";

	$meuCarro->setVelocidade(-130);
	echo "O carro de cor " .$meuCarro->getCor() ." esta andando a " .$meuCarro->getVelocidade() ."km/h.";
	echo "<br>";

	$meuCarro = new Carro3("Verde");
	echo $meuCarro->getCor();
	$meuCarro->setCor( "Amarelo");
	echo $meuCarro->getCor();
?>

<!-- Private Func -->
<h6>Private Func</h6>
<p>Se for o caso de deixar um método private, crie outro public para acessar-lo</p>

<!-- Exemplo -->
<code><pre>
//Classe
class Carro4
{
	//Atributos
	private $velocidade;
	private $cor;

	//Construct
	public function __construct($cor)
	{
		$this->setCor($cor);
		$this->setVelocidade(0);
	}

	//get velociodade
	public function getVelocidade()
	{
		return $this->velocidade;
	}

	//get cor
	public function getCor()
	{
		return $this->cor;
	}

	//Private set velocidade
	private function setVelocidade($velocidade)
	{
		if ($velocidade > 110 || $velocidade < 0) 
		{
			echo "Velocidade Não permitida";
		}
		else
		{
			$this->velocidade = $velocidade;
		}
	}

	public function acelerar()
	{
		$this->setVelocidade($this->getVelocidade() +1);
	}

	public function frear()
	{
		$this->setVelocidade($this->getVelocidade() -1);
	}

	//set cor
	public function setCor($cor)
	{
		$this->cor = $cor;
	}
}

</pre></code>

<!-- Private, get, set -->
<?php 
	//Classe
	class Carro4
	{
		//Atributos
		private $velocidade;
		private $cor;

		//Construct
		public function __construct($cor)
		{
			$this->setCor($cor);
			$this->setVelocidade(0);
		}

		//get velociodade
		public function getVelocidade()
		{
			return $this->velocidade;
		}

		//get cor
		public function getCor()
		{
			return $this->cor;
		}

		//Private set velocidade
		private function setVelocidade($velocidade)
		{
			if ($velocidade > 110 || $velocidade < 0) 
			{
				echo "Velocidade Não permitida";
			}
			else
			{
				$this->velocidade = $velocidade;
			}
		}

		public function acelerar()
		{
			$this->setVelocidade($this->getVelocidade() +1);
		}

		public function frear()
		{
			$this->setVelocidade($this->getVelocidade() -1);
		}

		//set cor
		public function setCor($cor)
		{
			$this->cor = $cor;
		}
	}

	$meuCarro = new Carro4("Preto");
	$meuCarro->setCor("Preto");
	$meuCarro->acelerar();
	$meuCarro->acelerar();
	$meuCarro->acelerar();
	$meuCarro->acelerar();	
	$meuCarro->frear();

	echo "O carro de cor " .$meuCarro->getCor() ." esta andando a " .$meuCarro->getVelocidade() ."km/h.";
	echo "<br>";
	?>

<!-- Resumo -->
<h6>Resumo</h6>
<p>
	Atributos são private. <br>
	Crie public func get e public func set. <br>
	Tenha __construct, usando seus métodos <br>
	Se tiver um método que não tem necessidade de acessar de fora. private nele.
	E monte um método public que tenha acesso ao private.
</p>
<code><pre>
class Novo
{
	Atributos
	private $atributo;
	
	Public Gets
	public function getNovo()
	{ return $this->atributo };

	Public Sets
	public function setNovo($atributo)
	{ $this->atributo = $atributo };

	Private A Sets
	private function setNovo($atributo)
	{ $this->atributo = $atributo };

	Public Private A Sets
	public function setNovo($atributo)
	{ $this->atributo = $atributo };

	Construct
	public function __construct(#atributo)
	{ $this->Public Sets}
}
</pre></code>