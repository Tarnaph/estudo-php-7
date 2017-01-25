<!-- Título -->
<h5>Aula 10.5 - Abstração, Interfaces e Polimorfismo.</h5>

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

<!-- Título -->
<h6>Abstracão</h6>
<p>
Serve para definir as assinaturas de referencias para outras classes.
</p>

<!-- code pre -->	
<code><pre>
abstract class InstrumentoMusical
{
	public $volume;
	public abstract function tocar();
}
class Guitarra extends InstrumentoMusical
{
	public function tocar()
	{
		echo "Tocando guitarra.";
	}
}

// A classe herda tudo da classe mãe abstract,
sendo obrigátorio declarar o método herdado da mãe

$guitarra = new Guitarra();
$guitarra->tocar();
</pre></code>

<!-- php -->
<?php 

	abstract class InstrumentoMusical
	{
		public $volume;
		public abstract function tocar();
	}

	class Guitarra extends InstrumentoMusical
	{
		public function tocar()
		{
			echo "Tocando guitarra. <br>";
		}
	}

	$guitarra = new Guitarra();
	$guitarra->tocar();

?>

<!-- Interfaces  -->
<h6>Interfaces - Qualidade</h6>
<p>
	Definição de um método que pode ser herdado para
	outros métodos, assim mantendo a assinatura e evitando 
	a rescrita de código. <br>
	<b>MAS NÃO CONSTRUA A FUNC NA INTERFACE</b> <br>
	As classes implementadas com a interface deve costruir a func. ou pelo
	menos criar ela, sem declarar nada em seu corpo.
	Use <code>interface NomeDaInterface</code>
</p>

<!-- code pre -->	
<code><pre>
interface Transportavel
	{
		public function transportar();		
	}

	class GuitarraVerde extends InstrumentoMusical implements Transportavel
	{
		public function tocar()
		{
			echo "Tocando guitarra.";
		}
		public function transportar()
		{
			echo "Transporte de guitarra: entrar em contato com a loja.";
		}
	}

	class Computador implements Transportavel
	{
		public function transportar()
		{
			echo "Transporte de computador: chame a Softblue.";
		}
	}

	$guitarra = new GuitarraVerde();
	$guitarra->tocar();
	$guitarra->transportar();

	$computador = new Computador();
	$computador->transportar();
</pre></code>

<!-- php -->
<?php 

	interface Transportavel
	{
		public function transportar();		
	}

	class GuitarraVerde extends InstrumentoMusical implements Transportavel
	{
		public function tocar()
		{
			echo "Tocando guitarra. <br>";
		}
		public function transportar()
		{
			echo "Transporte de guitarra: entrar em contato com a loja. <br>";
		}
	}

	class Computador implements Transportavel
	{
		public function transportar()
		{
			echo "Transporte de computador: chame a Softblue. <br>";
		}
	}

	$guitarra = new GuitarraVerde();
	$guitarra->tocar();
	$guitarra->transportar();

	$computador = new Computador();
	$computador->transportar();

?>