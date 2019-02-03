<?php

namespace Finance\Service;

use Finance\Storage\MySQL\CalendarMapper;
use Krystal\Application\Model\AbstractService;
use Krystal\Stdlib\VirtualEntity;
use Krystal\Stdlib\ArrayUtils;
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
     * Creates pivot data
     * 
     * @return array
     */
    public function getPivotData() : array
    {
        $output = [];

        $rows = $this->calendarMapper->fetchAll(null);
        $partition = ArrayUtils::arrayPartition($rows, 'date', false);

        // Total sum
        $total = 0;

        foreach ($partition as $date => $details) {
            $amounts = array_column($details, 'amount');
            $sum = array_sum($amounts);

            // Increment total counter
            $total += $sum;

            $output[] = [
                'date' => $date,
                'sum' => $sum,
                'details' => $details
            ];
        }

        return [
            'total' => $total,
            'data' => $output
        ];
    }

    /**
     * Counts total amount by specific date
     * 
     * @param string $date Optional date constraint
     * @return float
     */
    public function getSum($date = null)
    {
        $sum = $this->calendarMapper->getSum($date);

        return number_format($sum);
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
