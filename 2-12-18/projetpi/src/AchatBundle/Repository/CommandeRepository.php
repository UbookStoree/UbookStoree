<?php

namespace AchatBundle\Repository;


class CommandeRepository  extends \Doctrine\ORM\EntityRepository
{
   /* public function myfindByIdUser($idUser){
    $query=$this->getEntityManager()->createQuery("SELECT c FROM AchatBundle:Commande c WHERE c.valid=0 AND c.idUtilisateurfk=:id")
    ->setParameter(':id',$idUser);
    return $query->getResult();
}*/
    public function myfindByIdUser($idUser){
        $query=$this->getEntityManager()->createQuery("SELECT c.idcommande as idcmd FROM AchatBundle:Commande c WHERE c.valid=0 AND c.idUtilisateurfk=$idUser");
        return $query->getResult();
    }

    public function myfindByValide(){
        $query=$this->getEntityManager()->createQuery("SELECT c FROM AchatBundle:Commande c WHERE c.valid=1 ");
        return $query->getResult();
    }

    public function myfindByIdUserValide($idUser){
        $query=$this->getEntityManager()->createQuery("SELECT c.idcommande as idcmd FROM AchatBundle:Commande c WHERE c.valid=1 AND c.idUtilisateurfk=$idUser");
        return $query->getResult();
    }



}
