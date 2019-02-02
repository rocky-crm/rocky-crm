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

    /**
     * Returns all calendar entries
     * 
     * @param string $date Optional date constraint
     * @return array
     */
    public function fetchAll($date) : array
    {
        // Columns to be selected
        $columns = [
            self::column('id'),
            self::column('spending_id'),
            SpendingMapper::column('name') => 'spending',
            self::column('date'),
            self::column('name'),
            self::column('amount'),
        ];

        $db = $this->db->select($columns)
                       ->from(self::getTableName())
                       // Spending relation
                       ->leftJoin(SpendingMapper::getTableName(), [
                            SpendingMapper::column('id') => self::getRawColumn('spending_id')
                       ]);

        // Apply if required
        if ($date !== null) {
            $db->whereEquals(self::column('date'), $date);
        }

        $db->orderBy($this->getPk())
           ->desc();

        return $db->queryAll();
    }
}
