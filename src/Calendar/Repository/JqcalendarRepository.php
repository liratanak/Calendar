<?php

namespace Calendar\Repository;

use Doctrine\ORM\EntityRepository;

class JqcalendarRepository extends EntityRepository {

	public function findByRange($start, $end) {
		$em = $this->getEntityManager();
		$query = $em->createQueryBuilder();

		$query->select('j')
				->from('Calendar\Entity\Jqcalendar', 'j')
				->where('j.starttime >= :start')
				->andWhere('j.starttime < :end')
				->setParameter('start', new \DateTime(date('Y-m-d H:i:s', $start)))
				->setParameter('end', new \DateTime(date('Y-m-d H:i:s', $end)));

		return $query->getQuery()->getResult();
	}

}