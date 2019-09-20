<?php 

namespace Felipefm32;

use GuzzleHttp;
use DOMDocument;

class SalarioMinimo
{
	private static $url = 'http://www.guiatrabalhista.com.br/guia/salario_minimo.htm';
	
    private static function getList()
    {
		//iniciando variaveis
		$client = new GuzzleHttp\Client();
		$doc = new DOMDocument();
		$index=0;
		$ResultadoFinal;


		$response = $client->get(self::$url);//pegando site

		preg_match('/<table.*?>(.*?)<\/table>/si', $response->getBody(), $matches); //pegar trecho de codigo onde esta a tabela

		$doc->loadHTML($matches[0]);//Carregando tabela no domdocument.

		$tr= $doc->getElementsByTagName('tr')->item(1); //ir para primeira linha

		do{
			$tds = $tr->getElementsByTagName('td'); 
			
			//colocar valores no array final
			$ResultadoFinal[$index]["vigencia"] = trim($tds->item(0)->textContent);
			$ResultadoFinal[$index]["valor_mensal"] = trim($tds->item(1)->textContent);
			$ResultadoFinal[$index]["valor_diario"] = trim($tds->item(2)->textContent);
			$ResultadoFinal[$index]["valor_hora"] = trim($tds->item(3)->textContent);
			$ResultadoFinal[$index]["norma_legal"] = trim($tds->item(4)->textContent);
			$ResultadoFinal[$index]["dou"] = trim($tds->item(5)->textContent);
			
			$index++; //Somar valor do indice

		}while($tr=$tr->nextSibling);
		
		return $ResultadoFinal;
    }
	
	public static function getArray(){
		return self::getList();
	}
	
	public static function getJson(){
		return json_encode(SalarioMinimo::getArray()); //retornando resultado final
;
	}
}