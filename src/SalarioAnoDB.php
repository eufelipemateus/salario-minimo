<?php
namespace EuFelipeMateus;

use TORM\Model as Model;


use Atlas\Orm\Atlas;
use Atlas\Orm\Transaction\AutoTransact;
use DataSource\Salarioanodb\Salarioanodb as SalarioAno;

class SalarioAnoDB {
    private $atlas;

    function __construct(){
        $this->atlas = Atlas::new(
			'sqlite:database.sqlite3'
		);
    }


    public  function insert($data){

        $thread = $this->atlas->newRecord(SalarioAno::class, [
            'ano' =>  $data['ano'],
            'vigencia' => $data['vigencia'],
            'valor' => $data['valor'],
            'atoLegal' => $data['atoLegal'],
        ]);
        $this->atlas->insert($thread);
    }


    public function getList(){
        return $this->atlas->select(SalarioAno::CLASS)->fetchRecordSet();
    }
}