<?php

namespace App\Helpers\Sir\QueryBuilder;

use Vasilisq\MdxQueryBuilder\OLAP\ConnectionInterface;
use Vasilisq\MdxQueryBuilder\MDX\QueryInterface;
use Vasilisq\MdxQueryBuilder\CellSet;

/**
 * Description of ConnectionStub
 *
 * @author OIVANANGEL
 */
class ConnectionStub implements ConnectionInterface {
    
    public function executeQuery(QueryInterface $query): CellSet {
        $query->toMDX();
        
        return new CellSet();
    }

}
