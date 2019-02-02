<?php

namespace Finance\Storage\MySQL;

use Krystal\Db\Sql\AbstractMapper;

final class CalendarMapper extends AbstractMapper
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName() : string
    {
        return 'rocky_calendar';
    }

    /**
     * {@inheritDoc}
     */
    protected function getPk() : string
    {
        return 'id';
    }
}
