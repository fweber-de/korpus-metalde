<?php

namespace Korpus\DataBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * NewsPostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NewsPostRepository extends EntityRepository
{

    public function findLatestPost()
    {
        //entity manager
        $em = $this->getEntityManager();

        $currentDate = new \DateTime('now');
        //$currentDate->setTime(0, 0, 0);

        $dql = 'select n from KorpusDataBundle:NewsPost n where n.publishDate <= ?1 order by n.publishDate desc';

        $query = $em->createQuery($dql);
        $query->setParameter(1, $currentDate);
        $query->setMaxResults(1);

        $post = $query->getResult();

        if (!$post)
            return null;

        return $post[0];
    }

    public function findSurroundingPosts($slug)
    {
        //entity manager
        $em = $this->getEntityManager();

        $dqlA = 'select n from KorpusDataBundle:NewsPost n where n.slug = ?1';
        $query = $em->createQuery($dqlA);
        $query->setParameter(1, $slug);
        $query->setMaxResults(1);
        $post = $query->getResult();
                
        $dqlB = 'select n from KorpusDataBundle:NewsPost n where n.publishDate < ?1';
        $query = $em->createQuery($dqlB);
        $query->setParameter(1, $post[0]->getPublishDate());
        $query->setMaxResults(1);
        $leftPost = $query->getResult();
        
        $dqlC = 'select n from KorpusDataBundle:NewsPost n where n.publishDate > ?1';
        $query = $em->createQuery($dqlC);
        $query->setParameter(1, $post[0]->getPublishDate());
        $query->setMaxResults(1);
        $rightPost = $query->getResult();
                
        return array(@$leftPost[0], @$rightPost[0]);
    }

}
