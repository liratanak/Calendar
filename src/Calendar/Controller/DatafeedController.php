<?php

namespace Calendar\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DatafeedController extends AbstractActionController {

	public function listAction() {
		$data = NULL;

		$events = $this->getEntityManager()->getRepository('Calendar\Entity\Jqcalendar')->findAll();

		$allEvents = array('events'=>array());

		foreach ($events as $e) {

			$allEvents['events'][] = array(
					$e->getId() . '',
					$e->getSubject(),
					date('m/d/Y H:i', date_timestamp_get($e->getStarttime())),
					date('m/d/Y H:i', date_timestamp_get($e->getEndtime())),
					$e->getIsalldayevent() . '',
					0,
					0,
					$e->getColor(),
					1, //EDITABLE
					$e->getLocation(),
					null,
			);
		}
//		$allEvents['events']['error'] = NULL;

		$this->layout('layout/blank');
		return new ViewModel(array(
								'data' => json_encode($allEvents),
						));
	}

	public function removeAction() {
		$postData = $this->getRequest()->getPost();

		$this->getEntityManager()->remove($this->getEntityManager()->find('Calendar\Entity\Jqcalendar', $postData->calendarId));
		$this->getEntityManager()->flush();
		
		$data = '{"IsSuccess":true,"Msg":"Succefully"}';
		$this->layout('layout/blank');
		return new ViewModel(array(
								'data' => $data,
						));
	}

	public function editAction() {

		$evenId = $this->params('id');
		$event = NULL;

		if (NULL !== $evenId) {
			$event = $this->getEntityManager()->find('Calendar\Entity\Jqcalendar', $evenId);
		}


		return new ViewModel(array(
								'event' => $event,
						));
	}

	public function addDetailsAction() {

		$eventId = $this->params('id');

		$data = '{"IsSuccess":false,"Msg":"Fail"}';


		if ($this->getRequest()->isPost()) {
			$postData = $this->getRequest()->getPost();
			if (NULL !== $eventId) {
				$event = $this->getEntityManager()->find('Calendar\Entity\Jqcalendar', $eventId);
			} else {
				$event = new \Calendar\Entity\Jqcalendar();
			}
			if (NULL !== $event) {
				$event->setSubject($postData->Subject);
				$event->setColor($postData->colorvalue);

				$event->setStarttime(\DateTime::createFromFormat('m/d/Y H:i', $postData->stpartdate . ' ' . $postData->stparttime));
				$event->setEndtime(\DateTime::createFromFormat('m/d/Y H:i', $postData->etpartdate . ' ' . $postData->etparttime));

				$event->setLocation($postData->Location);
				$event->setDescription($postData->Description);

				if ($postData->IsAllDayEvent) {
					$event->setIsalldayevent($postData->IsAllDayEvent);
				} else {
					$event->setIsalldayevent(0);
				}

				$this->getEntityManager()->persist($event);
				$this->getEntityManager()->flush();

				$data = '{"IsSuccess":true,"Msg":"Succefully"}';
			}
		}
		$this->layout('layout/blank');
		return new ViewModel(array(
								'data' => $data,
						));
	}

	/**
	 * Entity manager instance
	 * 
	 * @var Doctrine\ORM\EntityManager
	 */
	protected $em;

	/**
	 * Returns an instance of the Doctrine entity manager loaded from the service 
	 * locator
	 * 
	 * @return Doctrine\ORM\EntityManager
	 */
	public function getEntityManager() {
		if (null === $this->em) {
			$this->em = $this->getServiceLocator()
							->get('doctrine.entitymanager.orm_default');
		}
		return $this->em;
	}

}