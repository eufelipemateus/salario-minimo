<?php
declare(strict_types=1);

namespace DataSource\Salarioanodb;

use Atlas\Mapper\Record;

/**
 * @method SalarioanodbRow getRow()
 */
class SalarioanodbRecord extends Record
{
    use SalarioanodbFields;
}
