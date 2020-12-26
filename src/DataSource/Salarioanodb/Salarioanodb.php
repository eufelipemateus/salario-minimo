<?php
declare(strict_types=1);

namespace DataSource\Salarioanodb;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method SalarioanodbTable getTable()
 * @method SalarioanodbRelationships getRelationships()
 * @method SalarioanodbRecord|null fetchRecord($primaryVal, array $with = [])
 * @method SalarioanodbRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method SalarioanodbRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method SalarioanodbRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method SalarioanodbRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method SalarioanodbRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method SalarioanodbSelect select(array $whereEquals = [])
 * @method SalarioanodbRecord newRecord(array $fields = [])
 * @method SalarioanodbRecord[] newRecords(array $fieldSets)
 * @method SalarioanodbRecordSet newRecordSet(array $records = [])
 * @method SalarioanodbRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method SalarioanodbRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Salarioanodb extends Mapper
{
}
