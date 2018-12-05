<?php
/**
 * Created by PhpStorm.
 * User: Hewlett-Packard
 * Date: 26/11/2018
 * Time: 20:04
 */

namespace EbookBundle\Repository;
use Doctrine\ORM\EntityRepository;


class FavorisRepository extends EntityRepository
{

    public function mesFavorisInactiveUser($iduser)
    {
        $qb = $this->createQueryBuilder('e')
            ->where('e.id_user = :id_user')->setParameter('id_user', $iduser);


        $results = $qb->getQuery()->getResult();

        return $results;
    }
    public  function findbyEbook($id_Ebook,$id_user)
    {
        $query = $this->getEntityManager()->createQuery("Select COUNT (e) FROM EbookBundle\Entity\Favoris e WHERE e.id_Ebook =:id_Ebook AND e.id_user=:id_user")
            ->setParameter('id_Ebook', $id_Ebook)
            ->setParameter('id_user', $id_user);
        return $query->getSingleScalarResult();

    }

}