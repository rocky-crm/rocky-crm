<?php

namespace Finance\Storage\MySQL;

use Krystal\Db\Sql\AbstractMapper;

final class SpendingMapper extends AbstractMapper
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName() : string
    {
        return 'rocky_spending';
    }

    /**
     * {@inheritDoc}
     */
    protected function getPk() : string
    {
        return 'id';
    }
}
