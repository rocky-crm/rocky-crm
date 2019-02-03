<?php

namespace Finance\Controller;

use Krystal\Date\TimeHelper;
use Krystal\Stdlib\VirtualEntity;
use Site\Controller\AbstractCrmController;

final class Calendar extends AbstractCrmController
{
    /**
     * Renders pivot table
     * 
     * @return string
     */
    public function pivotAction() : string
    {
        return $this->view->render('pivot', [
            'data' => $this->getModuleService('calendarService')->getPivotData()
        ]);
    }

    /**
     * Renders all items
     * 
     * @param string $date
     * @return string
     */
    public function indexAction($date = null) : string
    {
        if ($date === null) {
            $date = TimeHelper::getNow(false);
        }

        $entity = new VirtualEntity;
        $entity->setDate($date);

        return $this->createGrid($entity, $date);
    }

    /**
     * Explore by date
     * 
     * @param string $date
     * @return string
     */
    public function exploreAction() : string
    {
        $date = $this->request->getQuery('date');

        return $this->indexAction($date);
    }

    /**
     * Creates a grid
     * 
     * @param \Krystal\Stdlib\VirtualEntity $entity
     * @param mixed $date Optional date override. Defaults to today
     * @return string
     */
    private function createGrid(VirtualEntity $entity, $date = null) : string
    {
        return $this->view->render('calendar', [
            'date' => $date,
            'calendar' => $this->getModuleService('calendarService')->fetchAll($date),
            'sum' => $this->getModuleService('calendarService')->getSum($date),
            'spendings' => $this->getModuleService('spendingService')->fetchList(),
            'entity' => $entity
        ]);
    }

    /**
     * Renders edit form
     * 
     * @param int $id
     * @return mixed
     */
    public function editAction(int $id)
    {
        $entity = $this->getModuleService('calendarService')->fetchById($id);

        if ($entity) {
            return $this->createGrid($entity);
        } else {
            return false;
        }
    }

    /**
     * Saves data
     * 
     * @return mixed
     */
    public function saveAction()
    {
        $input = $this->request->getPost();

        $this->getModuleService('calendarService')->save($input);
        return 1;
    }

    /**
     * Deletes an item
     * 
     * @param int $id
     * @return void
     */
    public function deleteAction(int $id)
    {
        $this->getModuleService('calendarService')->deleteById($id);

        return $this->response->back();
    }
}
