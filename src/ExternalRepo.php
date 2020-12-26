<?php

namespace EuFelipeMateus;

use GuzzleHttp;
use DOMDocument;
use DomXPath;

use EuFelipeMateus\SalarioAnoDB ;

class ExternalRepo {

	private static $url = 'https://www.contabeis.com.br/tabelas/salario-minimo';


    private static function getList(){
		//iniciando variaveis
		$client = new GuzzleHttp\Client();
		$doc = new DOMDocument();
		$index=0;
		$ResultadoFinal;

		///
		$response = $client->get(self::$url);
		@$doc->loadHTML($response->getBody());
		$finder = new DomXPath($doc);

		//
		$nodes = $finder->query('//div[@class="conteudoTabela ajax"]/ul[@class="itemList qtd5"]');		

		foreach ($nodes as $node){

			$lis = $node->childNodes;		
			//Ano
			$ResultadoFinal[$index]["ano"] = $lis->item(1)->textContent;
			//VIgencia
			$ResultadoFinal[$index]['vigencia'] = $lis->item(3)->textContent;
			//Valor
			$ResultadoFinal[$index]['valor'] = self::parserMoney($lis->item(5)->textContent);
			//Atolegal
			$ResultadoFinal[$index]['atoLegal'] = $lis->item(7)->firstChild->getAttribute('href');
			$index++; //Somar valor do indice
		}


		return $ResultadoFinal;
	}

	private static function parserMoney($valor){
		$valor = trim($valor);
		$valor = preg_replace('/\s+/', '', $valor);
		$valor = preg_replace('/\xc2\xa0/', '', $valor);
		return  str_replace('R$', '', $valor);
	}
	
	public static function  getData(){
		$list = self::getList();
		foreach($list as $ano){
			$salario = new SalarioAnoDB();
			$salario->insert($ano);
		}
	}


}