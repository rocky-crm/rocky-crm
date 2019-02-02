<?php

namespace Finance\Service;

use Finance\Storage\MySQL\CalendarMapper;
use Krystal\Application\Model\AbstractService;
use Krystal\Stdlib\VirtualEntity;
use Krystal\Date\TimeHelper;

final class CalendarService extends AbstractService
{
    /**
     * Calendar mapper instance
     * 
     * @var \Finance\Storage\MySQL\CalendarMapper
     */
    private $calendarMapper;

    /**
     * State initialization
     * 
     * @param \Finance\Storage\MySQL\CalendarMapper $calendarMapper
     * @return void
     */
    public function __construct(CalendarMapper $calendarMapper)
    {
        $this->calendarMapper = $calendarMapper;
    }

    /**
     * {@inheritDoc}
     */
    protected function toEntity(array $row)
    {
        $entity = new VirtualEntity();
        $entity->setId($row['id'])
               ->setSpendingId($row['spending_id'])
               ->setSpending($row['spending'] ?? null)
               ->setDate($row['date'])
               ->setName($row['name'])
               ->setAmount($row['amount']);

        return $entity;
    }

    /**
     * Fetch finance calendar
     * 
     * @param string $date Optional date constraint. Defaults to today
     * @return array
     */
    public function fetchAll($date = null) : array
    {
        if ($date === null) {
            $date = TimeHelper::getNow(false);
        }

        return $this->prepareResults($this->calendarMapper->fetchAll($date));
    }

    /**
     * Fetch calendar item by its ID
     * 
     * @param int $id
     * @return mixed
     */
    public function fetchById(int $id)
    {
        return $this->prepareResult($this->calendarMapper->findByPk($id));
    }

    /**
     * Deletes record by its id
     * 
     * @param int $id
     * @return boolean
     */
    public function deleteById(int $id) : bool
    {
        return $this->calendarMapper->deleteByPk($id);
    }

    /**
     * Persists a record
     * 
     * @param array $input
     * @return boolean
     */
    public function save(array $input)
    {
        return $this->calendarMapper->persist($input);
    }
}