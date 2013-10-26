<?php

namespace Korpus\DataBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * FileRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FileRepository extends EntityRepository
{

    public function findAllImages()
    {
        $em = $this->getEntityManager();

        $dql = '
            select f from KorpusDataBundle:File f where f.type in (
                select t from KorpusDataBundle:FileType t where t.group = (
                    select g from KorpusDataBundle:FileTypeGroup g where g.title = ?1
                )
            )';
        $query = $em->createQuery($dql);
        $query->setParameter(1, 'image');

        $images = $query->getResult();

        return $images;
    }

    public function findAllImagesInFolder($folder)
    {
        $em = $this->getEntityManager();

        $dql = '
            select f from KorpusDataBundle:File f where f.type in (
                select t from KorpusDataBundle:FileType t where t.group = (
                    select g from KorpusDataBundle:FileTypeGroup g where g.title = ?1
                )
            ) and f.folder = ?2';
        $query = $em->createQuery($dql);
        $query->setParameter(1, 'image');
        $query->setParameter(2, $folder);

        $images = $query->getResult();

        return $images;
    }

}
