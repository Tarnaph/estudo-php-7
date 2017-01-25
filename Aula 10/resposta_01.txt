<?php 
/*-----------------------------------------
Abstract FormaGeometrica
------------------------------------------*/
abstract class FormaGeometrica
{
	abstract public function calculoDaArea();
}
/*-----------------------------------------
Class Quadrado extends FormaGeometric
------------------------------------------*/
class Quadrado extends FormaGeometrica
{
	public $comprimento;
	public $altura;	
	public function __construct($comprimento,$altura)
	{
		$this->comprimento=$comprimento;
		$this->altura=$altura;
	}	
	public function calculoDaArea()
	{
		return $this->comprimento * $this->altura;
	}
}
$quadrado1 = new Quadrado(2,5);
echo "A área do quadrado de comprimento = 2 e altura = 5 é: " .$quadrado1->calculoDaArea();
echo "<br>";
/*-----------------------------------------
Class Circulo extends FormaGeometrica
------------------------------------------*/
class Circulo extends FormaGeometrica
{
	public $raio;
	public function __construct($raio)
	{
		$this->raio=$raio;
	}
	public function calculoDaArea()
	{
		return 3.14 * ($this->raio * $this->raio);
	}
}
$circulo1 = new Circulo(5);
echo "A área do circulo de raio = 5 é: " .$circulo1->calculoDaArea();
echo "<br>";
/*-----------------------------------------
Class Losangulo extends FormaGeometrica
------------------------------------------*/
class Losangulo extends FormaGeometrica
{
	public $diagonalMaior;
	public $diagonalMenor;
	public function __construct($diagonalMaior,$diagonalMenor)
	{
		$this->diagonalMaior=$diagonalMaior;
		$this->diagonalMenor=$diagonalMenor;
	}	
	public function calculoDaArea()
	{
		return ($this->diagonalMaior * $this->diagonalMenor) / 2;
	}
}
$losangulo1 = new Losangulo(2,5);
echo "A área do Losangulo diagonalMenor = 2 e diagonalMaior = 5 é: " .$losangulo1->calculoDaArea();
?>