<?php

namespace AchatBundle\Repository;


class LigneCommandeRepository   extends \Doctrine\ORM\EntityRepository
{
    public function myfindByIdCmd($idcmde){
        $query=$this->getEntityManager()->createQuery("SELECT c FROM AchatBundle:LigneCommande c WHERE c.idcommandefk=$idcmde");
        return $query->getResult();
    }

    public function myfindByIdLivre($id){
        $query=$this->getEntityManager()->createQuery("SELECT c as lg FROM AchatBundle:LigneCommande c WHERE c.idlivrefk=$id");
        return $query->getResult();
    }

    public function deleteByCmd($id){
        $query=$this->getEntityManager()->createQuery("Delete c  FROM AchatBundle:LigneCommande c WHERE c.idlignecommande=$id");
        return $query->getResult();
    }








}
