<?php

namespace Finance\Storage\MySQL;

use Krystal\Db\Sql\AbstractMapper;

final class SpendingMapper extends AbstractMapper
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return 'rocky_spending';
    }
}
