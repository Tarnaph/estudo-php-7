<?php
/*--------------------------------------
				ABSTRACT PESSOA
--------------------------------------*/
abstract class Pessoa
{
	public $nome;
	public $telefone;
	public $endereco;
	abstract function getInfo();
}

/*--------------------------------------
				USUARIO CLASS
--------------------------------------*/
class Usuario extends Pessoa
{
	public $locacoes;
	public function getInfo()
	{
		$buffer .="Usuário: " .$this->nome ."." ."<br>";
		$buffer .="Telefone: " .$this->telefone ."." ."<br>";
		$buffer .="Endereço: " .$this->endereco ."." ."<br>";
		$buffer .="Alocou: " .$this->locacoes ."." ."<br><br>";
		return $buffer;
	}

	public function __construct($nome,$telefone,$endereco,$locacoes)
	{
		$this->nome=$nome;
		$this->telefone=$telefone;
		$this->endereco=$endereco;
		$this->locacoes=$locacoes;
	}
}

/*--------------------------------------
				FUNCIONARIO CLASS
--------------------------------------*/
class Funcionario extends Pessoa
{
	private $salario;
	public function getInfo()
	{
		$buffer .="Funcionário: " .$this->nome ."." ."<br>";
		$buffer .="Telefone: " .$this->telefone ."." ."<br>";
		$buffer .="Endereço: " .$this->endereco ."." ."<br>";
		$buffer .="Salário de: " .$this->salario ."." ."<br><br>";
		return $buffer;
	}
	public function getSalario()
	{
		echo $this->salario;
	}
	public function setSalario($novoSalario)
	{
		$this->salario=$novoSalario;
	}
	public function __construct($nome,$telefone,$endereco,$salario)
	{
		$this->nome=$nome;
		$this->telefone=$telefone;
		$this->endereco=$endereco;
		$this->salario=$salario;
	}
}

/*--------------------------------------
				ABSTRACT MIDIA
--------------------------------------*/
abstract class Midia
{
	public $titulo;
	public $categoria;
	abstract function getInfo();
}

/*--------------------------------------
				CD CLASS
--------------------------------------*/
class Cd extends Midia
{
	public $artista;
	public function getInfo()
	{
		$buffer .= "Album: " .$this->titulo ."<br>";
		$buffer .= "Artista: " .$this->artista ."<br>";
		$buffer .= "Categoria: " .$this->categoria ."<br><br>";
		return $buffer;
	}
	public function __construct($titulo,$artista,$categoria)
	{
		$this->titulo=$titulo;
		$this->artista=$artista;
		$this->categoria=$categoria;
	}
}

/*--------------------------------------
				DVD CLASS
--------------------------------------*/
class Dvd extends Midia
{
	public function getInfo()
	{
		$buffer .= "Título: " .$this->titulo ."<br>";
		$buffer .= "Categoria: " .$this->categoria ."<br><br>";
		return $buffer;
	}
	public function __construct($titulo,$categoria)
	{
		$this->titulo=$titulo;
		$this->categoria=$categoria;
	}
}

/*--------------------------------------
				BLURAY CLASS
--------------------------------------*/
class Bluray extends Midia
{
	public $resolucao;
	public function getInfo()
	{
		$buffer .= "Título: " .$this->titulo ."<br>";
		$buffer .= "Categoria: " .$this->categoria ."<br>";
		$buffer .= "Resolução: " .$this->resolucao ."<br><br>";
		return $buffer;
	}
	public function __construct($titulo,$categoria,$resolucao)
	{
		$this->titulo=$titulo;
		$this->categoria=$categoria;
		$this->resolucao=$resolucao;
	}
}

/*--------------------------------------
				LOCACAO CLASS
--------------------------------------*/
class Locacao
{
	public $usuario;
	public $funcionario;
	public $midia;

	public function getInfo()
	{
		$buffer .= "Locação realizada por: ".$this->usuario ."<br>";
		$buffer .= "Atendimento: " .$this->funcionario ."<br>";
		$buffer .= "A produto alugado: " .$this->midia ."<br><br>";
		return $buffer;
	}

	public function __construct($usuario,$funcionario,$midia)
	{
		$this->usuario=$usuario;
		$this->funcionario=$funcionario;
		$this->midia=$midia;
	}
}

/*--------------------------------------
				LOCADORA CLASS
--------------------------------------*/
class Locadora
{
	private $funcionarios = array();
	private $usuarios = array();
	private $midias = array();
	private $locacoes = array();

	/*--------------------------------------
					CREATE OBJ
	--------------------------------------*/
	public function criarFuncionario($nome,$telefone,$endereco,$salario)
	{
		$funcionario = new Funcionario($nome,$telefone,$endereco,$salario);
		array_push($this->funcionarios,$funcionario);
	}
	public function criarUsuario($nome,$telefone,$endereco,$locacoes)
	{
		$usuario = new Usuario($nome,$telefone,$endereco,$locacoes);
		array_push($this->usuarios,$usuario);
	}
	public function criarCD($titulo,$artista,$categoria)
	{
		$cd = new Cd($titulo,$artista,$categoria);
		array_push($this->midias,$cd);
	}
	public function criarDVD($titulo,$categoria)
	{
		$dvd = new Dvd($titulo,$categoria);
		array_push($this->midias,$dvd);
	}
	public function criarBluray($titulo,$categoria,$resolucao)
	{
		$bluray = new Bluray($titulo,$categoria,$resolucao);
		array_push($this->midias,$bluray);
	}
	public function criarLocacao($usuario,$funcionario,$midia)
	{
		$locacao = new Locacao($usuario,$funcionario,$midia);
		array_push($this->locacoes,$locacao);
	}
	/*--------------------------------------
					LIST OBJ
	--------------------------------------*/
	public function listFuncionarios()
	{
		foreach ($this->funcionarios as $funcionario)
		{
			echo $funcionario->getInfo();
		}
	}
	public function listUsuarios()
	{
		foreach ($this->usuarios as $usuario)
		{
			echo $usuario->getInfo();
		}
	}
	public function listMidias()
	{
		foreach ($this->midias as $midia)
		{
			echo $midia->getInfo();
		}
	}
	public function listLocacao()
	{
		foreach($this->locacoes as $locacao)
		{
			echo $locacao->getInfo();
		}
	}
}
// $locadora = new Locadora();
// $locadora->criarFuncionario("Raphael","000000","Casa","R$:1.800,00");
// $locadora->criarFuncionario("Marcela","000000","Casa","R$:1.800,00");
// $locadora->listFuncionarios();

// $locadora->criarUsuario("Rosa","telefone","Votorantim","0");
// $locadora->criarUsuario("André","telefone","Sorocaba-SP","0");
// $locadora->listUsuarios();

// $locadora->criarCD("As quatro estações.","Legião Urbana","Rock Nacional");
// $locadora->criarDVD("Ivete: Ao Vivo.","Música");
// $locadora->criarBluray("Asteroid III","Ficção","$4k");
// $locadora->listMidias();

// $locadora->criarLocacao("Rosa","Raphael","Ivete Ao Vivo.");
// $locadora->criarLocacao("André","Raphael","Asteroid III");
// $locadora->criarLocacao("André","Raphael","Asteroid II");
// $locadora->listUsuarios();
echo "<b>Faltou Atualizar o número de locações!</b>";
?>
