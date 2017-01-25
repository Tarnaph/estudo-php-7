<?php 
try 
{
	$conection = new PDO("mysql::host=raphaelmorales.com;dbname=exerc08",sqlroot123,sqlroot123);
	$conection->exec("set names utf8");
} 
catch (PDOException $e) 
{
	echo "Falha na coneção com o banco: " .$e->getMessage();
	exit();
}
?>