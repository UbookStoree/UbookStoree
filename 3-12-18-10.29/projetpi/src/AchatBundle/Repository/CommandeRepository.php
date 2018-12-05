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
    public function myfindByIdUserV($idUser){
        $query=$this->getEntityManager()->createQuery("SELECT c FROM AchatBundle:Commande c WHERE c.valid=1 AND c.idUtilisateurfk=$idUser");
        return $query->getResult();
    }

    public function myfindCommandeDate($idUser){
        $date=new \DateTime();
        $query=$this->getEntityManager()->createQuery("select  c from AchatBundle:Commande c where c.dateLivraison>:date AND c.valid=1 AND c.idUtilisateurfk=$idUser")->setParameter('date',$date);
        return $query->getResult();
    }
    public function myfindHistoriqueCommande($idUser){
        $date=new \DateTime();
        $query=$this->getEntityManager()->createQuery("select  c from AchatBundle:Commande c where c.dateLivraison<:date AND c.valid=1 AND c.idUtilisateurfk=$idUser")->setParameter('date',$date);
        return $query->getResult();
    }
    public function deleteByCmd($id){
        $query=$this->getEntityManager()->createQuery("Delete c  FROM AchatBundle:LigneCommande c WHERE c.idlignecommande=$id");
        return $query->getResult();
    }
    public function myfindByIdCmd($idcmde){
        $query=$this->getEntityManager()->createQuery("SELECT c FROM AchatBundle:LigneCommande c WHERE c.idcommandefk=$idcmde");
        return $query->getResult();
    }
    public function myfindByIdCmde($idcmde){
        $query=$this->getEntityManager()->createQuery("SELECT c.idlignecommande FROM AchatBundle:LigneCommande c WHERE c.idcommandefk=$idcmde");
        return $query->getResult();
    }



}
