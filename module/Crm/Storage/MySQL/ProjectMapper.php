<?php

namespace Crm\MySQL;

use Krystal\Db\Sql\AbstractMapper;

class ProjectMapper extends AbstractMapper
{
    /**
     * {@inheritDoc}
     */
    public static function getTableName()
    {
        return 'rocky_projects';
    }
}
