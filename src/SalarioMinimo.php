<?php 

namespace EuFelipeMateus;

class SalarioMinimo {	
	public static function getList(){
		$salarioDB = new SalarioAnoDB();
		$salarioList = $salarioDB->getList();

		$index=0;
		$ResultadoFinal;

		foreach($salarioList as $salario){
			$ResultadoFinal[$index]["ano"] = $salario->ano;
			$ResultadoFinal[$index]['vigencia'] =$salario->vigencia;
			$ResultadoFinal[$index]['valor'] = $salario->valor;
			$ResultadoFinal[$index]['atoLegal'] = $salario->atoLegal;
			$index++; //Somar valor do indice

		}
		return $ResultadoFinal;
	}

	public static function getSalarioAtual(){
		$lista =self::getList();
		return $lista[array_key_last($lista)];
	}
	
	public static function getArray(){
		return self::getList();
	}
	
	public static function getJson(){
		return json_encode(SalarioMinimo::getArray()); //retornando resultado final
	}
}