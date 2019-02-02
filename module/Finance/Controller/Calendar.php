<?php

namespace Finance\Controller;

use Krystal\Date\TimeHelper;
use Krystal\Stdlib\VirtualEntity;
use Site\Controller\AbstractCrmController;

final class Calendar extends AbstractCrmController
{
    /**
     * Renders all items
     * 
     * @return string
     */
    public function indexAction() : string
    {
        $entity = new VirtualEntity;
        $entity->setDate(TimeHelper::getNow(false));

        return $this->createGrid($entity);
    }

    /**
     * Creates a grid
     * 
     * @param \Krystal\Stdlib\VirtualEntity $entity
     * @return string
     */
    private function createGrid(VirtualEntity $entity) : string
    {
        return $this->view->render('calendar', array(
            'calendar' => $this->getModuleService('calendarService')->fetchAll(),
            'spendings' => $this->getModuleService('spendingService')->fetchList(),
            'entity' => $entity
        ));
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
