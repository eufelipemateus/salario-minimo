<?php
declare(strict_types=1);

namespace DataSource\Salarioanodb;

use Atlas\Mapper\RecordSet;

/**
 * @method SalarioanodbRecord offsetGet($offset)
 * @method SalarioanodbRecord appendNew(array $fields = [])
 * @method SalarioanodbRecord|null getOneBy(array $whereEquals)
 * @method SalarioanodbRecordSet getAllBy(array $whereEquals)
 * @method SalarioanodbRecord|null detachOneBy(array $whereEquals)
 * @method SalarioanodbRecordSet detachAllBy(array $whereEquals)
 * @method SalarioanodbRecordSet detachAll()
 * @method SalarioanodbRecordSet detachDeleted()
 */
class SalarioanodbRecordSet extends RecordSet
{
}
