<?php

namespace AchatBundle\Controller;

use AchatBundle\Entity\Commande;
use AchatBundle\Entity\LigneCommande;
use AchatBundle\Entity\LivreOccasion;
use AchatBundle\Repository\LigneCommandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AchatBundle\Controller\LivreoccController;


class CommandeController extends Controller
{
    public function validerCmdAction($id,Request $request)
    {   $em = $this->getDoctrine()->getManager();
        $commande = $this->getDoctrine()->getRepository(Commande::class)->find($id);
        $date = $commande->getDateCommande();
        date_add($date, date_interval_create_from_date_string('15 days'));
        $commande->setValid(1);
        $em->persist($commande);
        $em->flush();
      //  $lc=new LivreoccController();
       // $livres= $lc->readalloccAction();
       // return new JsonResponse();
        $livres=new LivreOccasion();
        $livres=$this->getDoctrine()->getRepository(LivreOccasion::class)->findAll();
       return $this->render('@Achat/Livreocc/readallocc.html.twig', array('livres' =>$livres
        ));

        //return $this->render('@Achat/Commande/valider_cmd.html.twig', array());
    }
    public function creerCmdAction(Request $request)
    {   $em = $this->getDoctrine()->getManager();
        $commande =new Commande();
        $commande->setIdUtilisateurfk($this->getUser());
        $commande->setDateCommande(new \DateTime());
        //cette date à modifier plustard 7 jrs apres la date de commande par exp
        $commande->setDateLivraison(new \DateTime());
        $commande->setDateCommande(new \DateTime());
        $commande->setPrixtotal(0);
        $commande->setEtatLivraison(0);
        $commande->setQuantite(0);
        $commande->setValid(0);

        $em->persist($commande);
        $em->flush();

        return $this->render('@Achat/Commande/creer_cmd.html.twig', array(
            // ...
        ));
        //return new JsonResponse(array('commande_Id' => $commande->getIdcommande()));
       // return new JsonResponse();
    }
    public function updateCmdAction(Request $request){

        return $this->render('@Achat/Panier/editocc.html.twig', array(
        ));
    }

    public function annulerCmdAction($id, Request $request)
    {   $em = $this->getDoctrine()->getManager();
        $cmd=$this->getDoctrine()->getRepository(Commande::class)->find($id);
        $idlc=$em->getRepository(LigneCommande::class)->myfindByIdCmd($id);
       // $idlig=new LigneCommande();
       foreach ($idlc as $data)
        {// $idlig=$data['idlc'];
            $em->remove($data);
            $em->flush();
       }
        $em->remove($cmd);
        $em->flush();
        $livres=$this->getDoctrine()->getRepository(LivreOccasion::class)->findAll();
        return $this->render('@Achat/Livreocc/readallocc.html.twig', array('livres' =>$livres
        ));
    }

    public function getCmdAction(Request $request)
    {
        $user_id = $this->getUser()->getId();
        $nom=$this->getUser()->getNom();
        //$em = $this->getDoctrine()->getManager();
        $cmds= $this->getDoctrine()->getRepository(Commande::class)->myfindCommandeDate($user_id);

        return $this->render('@Achat/Commande/get_cmd.html.twig', array('cmds' => $cmds,"username" => $nom
            // ...
        ));
    }


    public function historyAction(Request $request)
    {    {   $em = $this->getDoctrine()->getManager();
        $user_id = $this->getUser()->getId();
        $nom=$this->getUser()->getNom();
        //$em = $this->getDoctrine()->getManager();
        $cmds= $this->getDoctrine()->getRepository(Commande::class)->myfindHistoriqueCommande($user_id);

        return $this->render('@Achat/Commande/history.html.twig', array('cmds' => $cmds,"username" => $nom,
            // ...
        ));
    }}


    public function searchCmdAction()
    {

        return $this->render('@Achat/Commande/search_cmd.html.twig', array(

        ));
    }

}
