<?php

namespace Korpus\DataBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends EntityRepository
{

    public function findNextEvents()
    {
        //entity manager
        $em = $this->getEntityManager();

        //today, date part
        $today = new \DateTime('now');
        $today->setTime(0, 0, 0);

        $dql = 'select e from KorpusDataBundle:Event e where e.eventDate >= ?1 order by e.eventDate asc';

        $query = $em->createQuery($dql);
        $query->setParameter(1, $today);

        $events = $query->getResult();

        if (!$events)
            return null;

        return $events;
    }

}
