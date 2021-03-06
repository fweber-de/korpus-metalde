<?php

namespace Korpus\DataBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SourceLogRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SourceLogRepository extends EntityRepository
{

    public function findAllPerNewsPost()
    {
        $em = $this->getEntityManager();
        
        $dql = 'select l, p, count(l.post) from KorpusDataBundle:SourceLog l join l.post p group by l.post order by l.post desc';
        
        $query = $em->createQuery($dql);
        
        return $query->getResult();
    }

}
