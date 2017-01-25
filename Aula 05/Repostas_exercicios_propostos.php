<?php

/***************
* Exerc�cio 01 *
***************/
echo "Exerc�cio 01: ";

function data_br_para_us($data) 
{

	$ano = substr($data, 6, 4);
	$mes = substr($data, 3, 2);
	$dia = substr($data, 0, 2);

	return $ano . "-" . $mes . "-" . $dia . substr($data, 10); 

}
echo data_br_para_us("31/12/2010 12:00:00");

echo "<BR><BR>";



/***************
* Exerc�cio 02 *
***************/
echo "Exerc�cio 02: ";

function data_us_para_br($data) 
{

	$ano = substr($data, 0, 4);
	$mes = substr($data, 5, 2);
	$dia = substr($data, 8, 2);

	return $dia . "/" . $mes . "/" . $ano . substr($data, 10); 

}
echo data_us_para_br("2010-12-31 12:00:00");

echo "<BR><BR>";



/***************
* Exerc�cio 03 *
***************/
echo "Exerc�cio 03: ";

function split_data($data) {

	$ano = substr($data, 0, 4);
	$mes = substr($data, 5, 2);
	$dia = substr($data, 8, 2);

	$hora = substr($data, 11, 2);
	$minuto = substr($data, 14, 2);
	$segundo = substr($data, 17, 2);

	return array($ano, $mes, $dia, $hora, $minuto, $segundo);

}
print_r(split_data("2010-12-31 12:00:00"));

echo "<BR><BR>";



/***************
* Exerc�cio 04 *
***************/
echo "Exerc�cio 04: ";

function diferenca($data1, $data2, $formatoBrasileiro) 
{

  /*
  * Nas opera��es desta fun��o algum padr�o deve ser adotado. Neste exemplo
  * foi adotado que as datas ser�o convertidas para formato americano caso
  * n�o estejam.    
  */  
	if($formatoBrasileiro) {
		$data1 = data_br_para_us($data1);
		$data2 = data_br_para_us($data2);
	}

  /*
  * A constru��o do timestamp � realizada por meio de um split da data informada
  * e em seguida utilizando a fun��o mktime com os par�metros obtidos no split.  
  */  
	$split1 = split_data($data1);
	$split2 = split_data($data2);

	$time1 = mktime($split1[3], $split1[4], $split1[5], $split1[1], $split1[2], $split1[0]);
	$time2 = mktime($split2[3], $split2[4], $split2[5], $split2[1], $split2[2], $split2[0]);

  // Com as datas em timestamp, basta substrair para obter a diferen�a em segundos
	$diferenca = $time2 - $time1;

  /*
  * Para saber em dias a diferen�a, multiplique por 60 segundos, 
  * 60 minutos e 24 horas, que � o n�mero de segundos de um dia. Armazene
  * o resto desta diferen�a para calcular posteriormente as horas que n�o chegam
  * a formar um dia na diferen�a.  
  */  
	$dia = round($diferenca/(24*60*60));
	$diferenca = $diferenca % (24*60*60);

  /*
  * O mesmo procedimento � realizado calculando as horas do tempo que sobrou
  * na opera��o anterior. O que sobrar, deve ser armazenado para calcular o 
  * n�mero de minutos que n�o chegou a preencher uma hora completa. Por �ltimo,
  * sobram os segundos.      
  */  
	$hora = round($diferenca/(60*60));
	$diferenca = $diferenca % (60*60);

	$minuto = round($diferenca/(60));
	$segundo = $diferenca % (60);

	echo "A diferen�a � de ".$dia." dias, ".$hora." horas, ".$minuto." minutos e ".$segundo." segundos.";
}
echo diferenca("20/12/2010 12:00:00", "23/12/2010 14:05:17", TRUE);

echo "<BR><BR>";



/***************
* Exerc�cio 05 *
***************/
echo "Exerc�cio 05: ";

function valida_data($dataUS) 
{
	$split = split_data($dataUS);
	return checkdate($split[1], $split[2], $split[0]);
}
echo valida_data("2010-12-31") ? "Verdadeiro" : "Falso";
echo valida_data("2010-02-31") ? "Verdadeiro" : "Falso";

?>
